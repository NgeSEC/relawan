<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_id = 1;
        $data = [
            [
                'code' => 'ID',
                'name' => 'Indonesian',
                'image_id' => $image_id
            ],
            [
                'code' => 'EN',
                'name' => 'English',
                'image_id' => $image_id
            ]
        ];

        foreach ($data as $key)
        {
            $request = new \stdClass;
            $request->code = $key['code'];
            $request->name = $key['name'];
            $request->image_id = $key['image_id'];
            $request->user_id = '1';
            $request->image_id = 1;

            $languages = new Language;
            if(count($languages->getLanguageByName($request->name))==0){
                $languages->addLanguage($request);
            }
        }
    }
}
