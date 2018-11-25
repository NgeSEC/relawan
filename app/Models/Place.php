<?php

namespace App\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use WebAppId\Content\Models\Content;
use WebAppId\Content\Models\ContentCategory;
use WebAppId\Content\Models\TimeZone;

class Place extends Content
{
    private $contentGeometry;
    private $contentGeometryCoordinate;
    private $contentCategory;
    private $timezone;

    public function __construct()
    {
        $this->contentGeometry = new ContentGeometry;
        $this->contentCategory = new ContentCategory;
        $this->contentGeometryCoordinate = new ContentGeometryCoordinate;
        $this->timezone = new TimeZone;
    }

    private function createContentCategory($contentId, $categoryId, $userId){
        $objContentCategory = new \StdClass;
        $objContentCategory->content_id = $contentId;
        $objContentCategory->categories_id = $categoryId;
        $objContentCategory->user_id = $userId;
        return $this->contentCategory->addContentCategory($objContentCategory);
    }

    public function addPlace($placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id)
    {
        $objContent = new \StdClass;
        $objContent->title = $placeProperties['Name'];
        $objContent->code = $code;
        $objContent->description = $placeProperties['description'];
        $objContent->keyword = $keyword;
        $objContent->og_title = $placeProperties['Name'];
        $objContent->og_description = $placeProperties['description'];
        $objContent->default_image = '1';
        $objContent->status_id = '2';
        $objContent->language_id = '1';
        $objContent->publish_date = Carbon::now('UTC');
        $objContent->additional_info = $listPlace;
        $objContent->content = '';
        $objContent->time_zone_id = $timezone->id;
        $objContent->owner_id = $owner_id;
        $objContent->user_id = $user_id;

        $result = $this->addContent($objContent);
        if($result!=false){
            $resultContentCategory = $this->contentCategory->getContentCategoryByContentIdAndCategoryId($result->id, '2');
            if($resultContentCategory==null){
                $result = $this->createContentCategory($result->id, '2', $user_id);
            }
        }
        return $result;
    }

    public function updatePlace($content, $placeProperties, $code, $keyword, $listPlace, $timezone, $owner_id, $user_id){
        try {
            $content->title = $placeProperties['Name'];
            $content->code = $code;
            $content->description = $placeProperties['description'];
            $content->keyword = $keyword;
            $content->og_title = $placeProperties['Name'];
            $content->og_description = $placeProperties['description'];
            $content->default_image = '1';
            $content->status_id = '2';
            $content->language_id = '1';
            $content->publish_date = Carbon::now('UTC');
            $content->additional_info = $listPlace;
            $content->content = '';
            $content->time_zone_id = $timezone->id;
            $content->owner_id = $owner_id;
            $content->user_id = $user_id;
            $content->save();

            $resultContentCategory = $this->contentCategory->getContentCategoryByContentIdAndCategoryId($content->id, '2');

            if($resultContentCategory==null){
                $result = $this->contentCategory->addContentCategory($content->id, '2', $user_id);
            }
            return true;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    function clean($string) {
        $string = str_replace('&nbsp;', '', htmlentities($string));

        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
    }

    public function addBulkPlace($dataPlace, $user_id, $owner_id, $timezone)
    {

        $result = true;
        $listPlace = $dataPlace['features'];
        $timezone = $this->timezone->getOneTimeZoneByName($timezone);

        for ($i = 0; $i < count($listPlace); $i++) {
            $code = str_replace(' ', '-',
                $this->clean(strtolower($listPlace[$i]['properties']['Name'])));
            $keyword = str_replace(' ', ',',
                $this->clean(strtolower($listPlace[$i]['properties']['Name'])));
            $objContent = new Content;
            $content = $this->getContentByCode($code);
            $placeProperties = $listPlace[$i]['properties'];
            $placeGeometry = $listPlace[$i]['geometry'];
            $placeCoordinate = $listPlace[$i]['geometry']['coordinates'];

            if ($content == null) {
                $content  = $this->addPlace($placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if (!$content) {
                    return false;
                }
            } else {
                $result = $this->updatePlace($content, $placeProperties, $code, $keyword, json_encode($listPlace[$i]), $timezone, $owner_id, $user_id);
                if(!$result){
                    return false;
                }
            }

            $contentGeometry = $this->contentGeometry->getContentGeometryByContentId($content->id);

            if (count($contentGeometry) > 0) {
                $this->contentGeometryCoordinate->deleteGeometryCoordinateByGeometryId($contentGeometry[0]->id);
            }
            $this->contentGeometry->deleteContentGeometryByContentId($content->id);

            $placeGeometry['content_id'] = $content->id;
            $placeGeometry['user_id'] = $user_id;

            $placeGeometry = $this->contentGeometry->addContentGeometry((Object) $placeGeometry);
            if (!$placeGeometry) {
                return false;
            } else {
                $placeCoordinate['geometry_id'] = $placeGeometry->id;
                $placeCoordinate['user_id'] = $user_id;
                $geometryCoordinate = $this->contentGeometryCoordinate->addGeometryCoordinate($placeCoordinate);
                if (!$geometryCoordinate) {
                    return false;
                }
            }

        }
        return $content;
    }

    public function getPlaceById($id)
    {
        return $this->find($id);
    }

    public function getAllPlace()
    {
        return $this->get();
    }

    public function contentGeometry()
    {
        return $this->hasMany('App\Models\ContentGeometry', 'content_id', 'id');
    }

    public function getPlaceByCode($code)
    {
        return $this->getContentByCode($code);
    }

    public function getList($type=null, $paginate=null){
        if (!isset($type)) {
            return $this->select(
                    'contents.*',
                    'categories.name as type'
                )
                ->join('content_categories', 'contents.id', '=', 'content_categories.content_id')
                ->join('categories', 'content_categories.categories_id', '=', 'categories.id')
                ->where('categories.name', 'posko')
                ->orWhere('categories.name', 'shelter')
                ->paginate($paginate);
        } else {
            $this->select(
                    'contents.*',
                    'categories.name as type'
                )
                ->join('content_categories', 'contents.id', '=', 'content_categories.content_id')
                ->join('categories', 'content_categories.categories_id', '=', 'categories.id')
                ->where('categories.name', $type)
                ->paginate($paginate);
        }


    }
}
