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
    
    /**
     * @param ContentGeometry $contentGeometry
     * @param $contentId
     * @return mixed
     */
    public function getContentGeometryByContentId(ContentGeometry $contentGeometry, $contentId)
    {
        return $contentGeometry->where('content_id', $contentId)->get();
    }
    
    /**
     * @param ContentGeometry $contentGeometry
     * @param $contentId
     */
    public function deleteContentGeometryByContentId(ContentGeometry $contentGeometry, $contentId)
    {
        $resultContentGeometry = $this->getContentGeometryByContentId($contentGeometry, $contentId);
        if (count($resultContentGeometry) > 0) {
            for ($i = 0; $i < count($resultContentGeometry); $i++) {
                $resultContentGeometry[$i]->delete();
            }
            
        }
    }
    
    /**
     * @param ContentGeometry $contentGeometry
     * @param $data
     * @return ContentGeometry|null
     */
    public function addContentGeometry(ContentGeometry $contentGeometry, $data)
    {
        try {
            
            $contentGeometry->content_id = $data->content_id;
            $contentGeometry->type = $data->type;
            $contentGeometry->user_id = $data->user_id;
            $contentGeometry->save();
            
            return $contentGeometry;
        } catch (QueryException $e) {
            report($e);
            return null;
        }
    }
}