<?php

namespace App\Repositories;

use App\Models\Place;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use WebAppId\Content\Models\ContentCategory;
use WebAppId\Content\Models\TimeZone;
use WebAppId\Content\Repositories\ContentCategoryRepository;
use WebAppId\Content\Repositories\ContentRepository;
use WebAppId\Content\Repositories\TimeZoneRepository;

/**
 * Class PlaceRepository
 * @package App\Models
 */
class PlaceRepository extends ContentRepository
{
    private $contentCategoryRepository;
    private $contentGeometryRepository;
    private $contentGeometryCoordinateRepository;
    private $contentRepository;
    private $timezoneRepository;
    
    
    public function __construct()
    {
        
        $this->contentCategoryRepository = new ContentCategoryRepository();
        $this->contentRepository = new ContentRepository();
        $this->timezoneRepository = new TimeZoneRepository();
        $this->contentGeometryCoordinateRepository = new ContentGeometryCoordinateRepository();
        $this->contentGeometryRepository = new ContentGeometryRepository();
    }
    
    /**
     * @param $contentId
     * @param $categoryId
     * @param $userId
     * @return ContentCategory
     */
    private function createContentCategory($contentId, $categoryId, $userId)
    {
        $objContentCategory = new \StdClass;
        $objContentCategory->content_id = $contentId;
        $objContentCategory->categories_id = $categoryId;
        $objContentCategory->user_id = $userId;
        return $this->contentCategoryRepository->addContentCategory($objContentCategory, new ContentCategory());
    }
    
    public function addPlace($placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id)
    {
        $objContent = new \StdClass;
        $objContent->title = $placeProperties['Name'];
        $objContent->code = $code;
        $objContent->description = $placeProperties['Name'];
        $objContent->keyword = $keyword;
        $objContent->og_title = $placeProperties['Name'];
        $objContent->og_description = $placeProperties['Name'];
        $objContent->default_image = '1';
        $objContent->status_id = '2';
        $objContent->language_id = '1';
        $objContent->publish_date = Carbon::now('UTC');
        $objContent->additional_info = $listPlace;
        $objContent->content = $placeProperties['description']==null?'':$placeProperties['description'];
        $objContent->time_zone_id = $timezone->id;
        $objContent->creator_id = $user_id;
        $objContent->owner_id = $owner_id;
        $objContent->user_id = $user_id;
        
        $result = $this->addContent($objContent, new Place());
        
        if ($result) {
            $resultContentCategory = $this->contentCategoryRepository->getContentCategoryByContentIdAndCategoryId($result->id, '2', new ContentCategory());
            if ($resultContentCategory == null) {
                $this->createContentCategory($result->id, '2', $user_id);
            }
        }
        return $result;
    }
    
    /**
     * @param $content
     * @param $placeProperties
     * @param $code
     * @param $keyword
     * @param $listPlace
     * @param $timezone
     * @param $owner_id
     * @param $user_id
     * @return bool
     */
    public function updatePlace($content, $placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id)
    {
        try {
            $content->title = $placeProperties['Name'];
            $content->code = $code;
            $content->description = $placeProperties['Name'];
            $content->keyword = $keyword;
            $content->og_title = $placeProperties['Name'];
            $content->og_description = $placeProperties['Name'];
            $content->default_image = '1';
            $content->status_id = '2';
            $content->language_id = '1';
            $content->publish_date = Carbon::now('UTC');
            $content->additional_info = $listPlace;
            $content->content = $placeProperties['description']==null?'':$placeProperties['description'];;
            $content->time_zone_id = $timezone->id;
            $content->owner_id = $owner_id;
            $content->user_id = $user_id;
            $content->save();
            
            $resultContentCategory = $this->contentCategoryRepository->getContentCategoryByContentIdAndCategoryId($content->id, '2', new ContentCategory());
            
            if ($resultContentCategory == null) {
                $this->createContentCategory($content->id, '2', $user_id);
            }
            return $content;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }
    
    /**
     * @param $string
     * @return string|string[]|null
     */
    function clean($string)
    {
        $string = str_replace('&nbsp;', '', htmlentities($string));
        
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        
        return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
    }
    
    /**
     * @param $dataPlace
     * @param $user_id
     * @param $owner_id
     * @param $timezone
     * @return bool|mixed|\WebAppId\Content\Models\Content|ContentCategory
     */
    public function addBulkPlace($dataPlace, $user_id, $owner_id, $timezone)
    {
        
        $listPlace = $dataPlace['features'];
        $timezone = $this->timezoneRepository->getOneTimeZoneByName($timezone, new TimeZone());
        
        for ($i = 0; $i < count($listPlace); $i++) {
            $code = str_replace(' ', '-',
                $this->clean(strtolower($listPlace[$i]['properties']['Name'])));
            $keyword = str_replace(' ', ',',
                $this->clean(strtolower($listPlace[$i]['properties']['Name'])));
            
            $content = $this->getContentByCode($code, new Place());
            $placeProperties = $listPlace[$i]['properties'];
            $placeGeometry = $listPlace[$i]['geometry'];
            $placeCoordinate = $listPlace[$i]['geometry']['coordinates'];
            
            if ($content == null) {
                $content = $this->addPlace($placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if (!$content) {
                    return false;
                }
            } else {
                $result = $this->updatePlace($content, $placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if (!$result) {
                    return false;
                }
            }
            
            $contentGeometry = $this->contentGeometryRepository->getContentGeometryByContentId($content->id);
            
            if (count($contentGeometry) > 0) {
                $this->contentGeometryCoordinateRepository->deleteGeometryCoordinateByGeometryId($contentGeometry[0]->id);
            }
            $this->contentGeometryRepository->deleteContentGeometryByContentId($content->id);
            
            $placeGeometry['content_id'] = $content->id;
            $placeGeometry['user_id'] = $user_id;
            
            $placeGeometry = $this->contentGeometryRepository->addContentGeometry((Object)$placeGeometry);
            if (!$placeGeometry) {
                return false;
            } else {
                $placeCoordinate['geometry_id'] = $placeGeometry->id;
                $placeCoordinate['user_id'] = $user_id;
                $geometryCoordinate = $this->contentGeometryCoordinateRepository->addGeometryCoordinate($placeCoordinate);
                if (!$geometryCoordinate) {
                    return false;
                }
            }
            
        }
        
        return $content;
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getPlaceById($id)
    {
        return $this->contentRepository->getContentById($id, new Place());
    }
    
    /**
     * @return \WebAppId\Content\Models\Content
     */
    public function getAllPlace()
    {
        return $this->contentRepository->getAll(new Place());
    }
    
    /**
     * @param null $type
     * @param null $paginate
     * @return mixed
     */
    public function getList($type = null, $paginate = null)
    {
        $place = new Place();
        if (!isset($type)) {
            return $place->select(
                'contents.*',
                'categories.name as type'
            )
                ->join('content_categories', 'contents.id', '=', 'content_categories.content_id')
                ->join('categories', 'content_categories.categories_id', '=', 'categories.id')
                ->where('categories.name', 'posko')
                ->orWhere('categories.name', 'shelter')
                ->paginate($paginate);
        } else {
            $place->select(
                'contents.*',
                'categories.name as type'
            )
                ->join('content_categories', 'contents.id', '=', 'content_categories.content_id')
                ->join('categories', 'content_categories.categories_id', '=', 'categories.id')
                ->where('categories.name', $type)
                ->paginate($paginate);
        }
        
        
    }
    
    /**
     * @param $code
     * @return mixed
     */
    public function getPlaceByCode($code)
    {
        return $this->contentRepository->getContentByCode($code, new Place());
    }
    
    
}
