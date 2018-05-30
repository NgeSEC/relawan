<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objCategory = new Category;
        $objNewCategory = new \StdClass;

        $categories[] = array('name'=>'posko', 'code'=>'posko', 'user_id'=>'1');

        for ($i=0; $i < count($categories) ; $i++) {
            if(count($objCategory->getCategoryByCode($categories[$i]['code']))==0){ 
                $objCategory->addCategory((Object)$categories[$i]);
            }
        }
    }
}
