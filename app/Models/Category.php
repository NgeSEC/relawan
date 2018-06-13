<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Category extends Model
{
    protected $table='categories';

    protected $hidden=['created_at','updated_at'];

    protected $fillable=['id','code','name'];

    /**
     * Method To Add Data Category
     *
     * @param Request $data
     * @return Boolean true/false
     */
    public function addCategory($data){
        try{
            $this->code = $data->code;
            $this->name = $data->name;
            $this->user_id = $data->user_id;
            $this->save();
            return $this;
        }catch(QueryException $e){
            report($e);
            return false;
        }
    }
    
    /**
     * Method To Get Data Category
     *
     * @param Integer $id
     * @return Category $data
     */
    public function getOne($id){
        return $this->findOrFail($id);
    }

    /**
     * Method To Update Category
     *
     * @param Request $data
     * @param Integer $id
     * @return Boolean true/false
     */
    public function updateCategory($data, $id){
        try{
            $categoryData = $this->getOne($id);

            if(!empty($categoryData)){
                $categoryData->code = $data->code;
                $categoryData->name = $data->name;
                $categoryData->user_id = $data->user_id;
                $categoryData->save();
                return true;
            }else{
                return false;
            }
        }catch(QueryException $e){
            report($e);
            return false;
        }
    }

    /**
     * Method to Delete category Data
     *
     * @param Integer $id
     * @return Boolean true/false
     */
    public function deleteCategory($id){
        try{
            $categoryData = $this->getOne($id);
            if(!empty($categoryData)){
                $categoryData->delete();
                return true;
            }else{
                return false;
            }
        }catch(QueryException $e){
            report($e);
            return false;
        }
    }

    /**
     * Get All Category
     *
     * @return Category $data
     */
    public function getAll(){
        return $this->all();
    }

    /**
     * Method For Get Data Category Use name like or code
     *
     * @param Request $request
     * @return object list category / empty object
     */
    public function getDataWhere($search=""){
        $result = $this->where('code', $search)
            ->orWhere('name','LIKE','%'.$search.'%')
            ->get();
        return $result;
    }


    public function getDatatable($search, $order_column, $order_dir, $limit_start, $limit_length){
        $result = $this
            ->select('id', 'code', 'name')
            ->where('code','LIKE','%'.$search.'%')
            ->orWhere('name','LIKE','%'.$search.'%')
            ->orderBy($order_column, $order_dir)
            ->offset($limit_start)
            ->limit($limit_length)
            ->get();
        return $result; 
    }

    public function getSearch($search=""){
        $result = $this
            ->where('code','LIKE','%'.$search.'%')
            ->orWhere('name','LIKE','%'.$search.'%')
            ->get();
        return $result;
    }

    public function getCategoryByCode($code){
        return $this->where('code', $code)->first();
    }
}
