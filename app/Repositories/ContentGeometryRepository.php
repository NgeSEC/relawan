<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-06
 * Time: 00:34
 */

namespace App\Repositories;

use App\Models\ContentGeometry;
use Illuminate\Database\QueryException;

/**
 * Class ContentGeometryRepository
 * @package App\Repositories
 */
class ContentGeometryRepository
{
    
    private $contentGeometry;
    
    public function __construct()
    {
        $this->contentGeometry = new ContentGeometry();
    }
    
    /**
     * @param $contentId
     * @return mixed
     */
    public function getContentGeometryByContentId($contentId)
    {
        return $this->contentGeometry->where('content_id', $contentId)->get();
    }
    
    /**
     * @param $contentId
     */
    public function deleteContentGeometryByContentId($contentId)
    {
        $resultContentGeometry = $this->getContentGeometryByContentId($contentId);
        if (count($resultContentGeometry) > 0) {
            for ($i = 0; $i < count($resultContentGeometry); $i++) {
                $resultContentGeometry[$i]->delete();
            }
            
        }
    }
    
    /**
     * @param $data
     * @return ContentGeometry|null
     */
    public function addContentGeometry($data)
    {
        try {
            $result = new ContentGeometry();
            $result->content_id = $data->content_id;
            $result->type = $data->type;
            $result->user_id = $data->user_id;
            $result->save();
            
            return $result;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
    }
}