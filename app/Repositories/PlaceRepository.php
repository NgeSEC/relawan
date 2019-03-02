<?php

namespace App\Repositories;

use App\Models\Place;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use WebAppId\Content\Models\ContentCategory;
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
        $objContent->content = $placeProperties['description'] == null ? '' : $placeProperties['description'];
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
            $content->content = $placeProperties['description'] == null ? '' : $placeProperties['description'];;
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
            return $place->select(
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
