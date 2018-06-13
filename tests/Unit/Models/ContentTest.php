<?php

namespace Tests\Unit\Models;

use App\Models\Content;
use Tests\TestCase;

class ContentTest extends TestCase
{
    private $objContent;

    private $content;

    private function start()
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

    public function createContent()
    {
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
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testGetContentByCode()
    {
        $result = $this->createContent();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->content->getContentByCode($result->code);
            if ($result != null) {
                $this->assertTrue(true);
                $this->assertEquals($this->objContent->title,$result->title);
                $this->assertEquals($this->objContent->code,$result->code);
                $this->assertEquals($this->objContent->description,$result->description);
                $this->assertEquals($this->objContent->keyword,$result->keyword);
                $this->assertEquals($this->objContent->og_title,$result->og_title);
                $this->assertEquals($this->objContent->og_description,$result->og_description);
                $this->assertEquals($this->objContent->default_image,$result->default_image);
                $this->assertEquals($this->objContent->status_id,$result->status_id);
                $this->assertEquals($this->objContent->language_id,$result->language_id);
                $this->assertEquals($this->objContent->publish_date,$result->publish_date);
                $this->assertEquals($this->objContent->additional_info,$result->additional_info);
                $this->assertEquals($this->objContent->content,$result->content);
                $this->assertEquals($this->objContent->time_zone_id,$result->time_zone_id);
                $this->assertEquals($this->objContent->owner_id,$result->owner_id);
                $this->assertEquals($this->objContent->user_id,$result->user_id);
            } else {
                $this->asserTrue(false);
            }
        }
    }

    public function testUpdateContentByCode()
    {
        $result = $this->createContent();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->createDummy();
            $result = $this->content->updateContentByCode($this->objContent, $result->code);
            if ($result) {
                $this->assertTrue(true);
            } else {
                $this->asserTrue(false);
            }
        }
    }
}
