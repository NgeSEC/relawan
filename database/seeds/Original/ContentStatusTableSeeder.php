<?php

use Illuminate\Database\Seeder;
use App\Models\ContentStatus;

class ContentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Draft',
            ],
            [
                'name' => 'Publish',
            ],
            [
                'name' => 'Unpublish',
            ],
            [
                'name' => 'Cancel',
            ],
            [
                'name' => 'Comming Soon',
            ],
        ];

        foreach ($data as $key) {
            $request = new \stdClass;
            $request->name = $key['name'];
            $request->user_id = '1';

            $contentStatus = new ContentStatus;
            if(count($contentStatus->getContentStatusesByName($request->name))==0){
                $contentStatus->addContentStatus($request);
            }
        }
    }
}
