<?php

namespace Tests\Unit\Models;

use App\Models\ContentStatus;
use Tests\TestCase;

class ContentStatusTest extends TestCase
{
    private $objContentStatus;

    private $contentStatus;

    public function start(){
        $this->objContentStatus = new \StdClass;
        $this->contentStatus = new ContentStatus;
    }

    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    private function createDummy()
    {
        $this->objContentStatus->name = $this->faker->word;
        $this->objContentStatus->user_id = '1';
        return $this->objContentStatus;
    }

    public function createContentStatus(){
        $this->createDummy();

        return $this->contentStatus->addContentStatus($this->objContentStatus); 
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddContentStatus()
    {
        $result = $this->createContentStatus();

        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    

    public function testGetContentStatus(){
        $result = $this->createContentStatus();

        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->contentStatus->getContentStatus();
            if(count($result)>0){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }
        }
    }

    public function testUpdateContentStatus(){
        $result = $this->createContentStatus();

        if (!$result) {
            $this->assertTrue(false);
        }else{
            $this->createDummy();
            $result = $this->contentStatus->updateContentStatus($result->id, $this->objContentStatus);
            if($result){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }
        }
    }

}
