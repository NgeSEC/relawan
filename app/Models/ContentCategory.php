<?php

namespace App\Models;

use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model; 

class ContentCategory extends Model
{
    //
    protected $table = 'content_categories';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['id','content_id','categories_id'];

    /**
     * Method To Add Data ContentCategory
     *
     * @param Request $data
     * @return Boolean true/false
     */
    public function addContentCategory($data)
    {
        try {
            $this->content_id = $data->content_id;
            $this->categories_id = $data->categories_id;
            $this->user_id = $data->user_id;
            $this->save();
            return $this;
        } catch(QueryException $e){
            report($e);
            return false;
        }
    }
    
    /**
     * Method To Get Data ContentCategory
     *
     * @param Integer $id
     * @return ContentCategory $data
     */
    public function getContentCategoryById($id)
    {
        return $this->findOrFail($id);
    }

    /**
     * Method To Update ContentCategory
     *
     * @param Request $data
     * @param Integer $id
     * @return Boolean true/false
     */
    public function updateContentCategory($data, $id)
    {
        try {
            $ContentCategory = $this->getContentCategoryById($id);

            if(! empty($ContentCategory)){
                $ContentCategory->content_id = $data->content_id;
                $ContentCategory->categories_id = $data->categories_id;
                $ContentCategory->user_id = $data->user_id;
                $ContentCategory->save();

                return true;
            } else {
                return false;
            }
        } catch(QueryException $e){
            report($e);
            return false;
        }
    }

    /**
     * Method to Delete ContentCategory Data
     *
     * @param Integer $id
     * @return Boolean true/false
     */
    public function deleteContentCategory($id)
    {
        try {
            $ContentCategory = $this->getContentCategoryById($id);
            if(! empty($ContentCategory)){
                $ContentCategory->delete();
                return true;
            } else {
                return false;
            }
        } catch (QueryException $e){
            report($e);
            return false;
        }
    }

    /**
     * Get All ContentCategory
     *
     * @return ContentCategory $data
     */
    public function getAll()
    {
        return $this->all();
    }
}
