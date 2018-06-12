<?php

namespace Tests\Unit\Models;

use App\Models\Content;
use Tests\TestCase;

class ContentTest extends TestCase
{
    private $objContent;

    private $content;

    public function start()
    {
        $this->objContent = new \StdClass;
        $this->content = new Content;
    }

    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    public function createDummy()
    {
        $this->objContent->title = $this->faker->word;
        $this->objContent->code = $this->faker->word;
        $this->objContent->description = $this->faker->text;
        $this->objContent->keyword = $this->faker->word;
        $this->objContent->og_title = $this->faker->word;
        $this->objContent->og_description = $this->faker->text;
        $this->objContent->default_image = '1';
        $this->objContent->status_id = '1';
        $this->objContent->language_id = '1';
        $this->objContent->publish_date = $this->faker->date($format = 'Y-m-d', $max = 'now');
        $this->objContent->additional_info = $this->faker->text;
        $this->objContent->content = $this->faker->text;
        $this->objContent->time_zone_id = '1';
        $this->objContent->owner_id = '1';
        $this->objContent->user_id = '1';

        return $this->objContent;
    }


    private function createContent(){
        $this->createDummy();
        return $this->content->addContent($this->objContent);
    }

    /**
     * unit test method for add content
     *
     * @return void
     */
    public function testAddContent()
    {
        $result = $this->createContent();
        if(!$result){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }

    public function testGetContentByCode(){
        $result = $this->createContent();
        if(!$result){
            $this->assertTrue(false);
        }else{
            $result = $this->content->getContentByCode($this->objContent->code);
            if($result!=null){
                $this->assertTrue(true);
            }else{
                $this->asserTrue(false);
            }
        }
    }
}
