<?php

use Illuminate\Database\Seeder;
use WebAppId\Content\Models\Category;
use WebAppId\Content\Repositories\CategoryRepository;
use WebAppId\Content\Services\Params\AddCategoryParam;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objCategory = new CategoryRepository();
    
        $categories[] = array('name' => 'posko', 'code' => 'posko', 'user_id' => '1', 'status_id' => '1');
        $categories[] = array('name' => 'shelter', 'code' => 'shelter', 'user_id' => '1', 'status_id' => '1');
        $categories[] = array('name' => 'disaster area', 'code' => 'disaster-area', 'user_id' => '1', 'status_id' => '1');
    
        for ($i = 0; $i < count($categories); $i++) {
            $result = $objCategory->getCategoryByCode($categories[$i]['code'], new Category());
        
            if ($result === null) {
                $addCategoryParam = new AddCategoryParam();
                $addCategoryParam->setName($categories[$i]['name']);
                $addCategoryParam->setCode($categories[$i]['code']);
                $addCategoryParam->setUserId($categories[$i]['user_id']);
                $addCategoryParam->setStatusId($categories[$i]['status_id']);
            
                $objCategory->addCategory($addCategoryParam, new Category());
            }
        }
    }
}
