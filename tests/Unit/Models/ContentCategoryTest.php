<?php

namespace Tests\Unit\Models;

use App\Models\ContentCategory;
use Tests\TestCase;
use Tests\Unit\Models\ContentTest;

class ContentCategoryTest extends TestCase
{

    private $objContentCategory;
    private $resultContent;
    private $resultCategory;

    private $contentCategory;
    private $contentTest;
    private $categoryTest;

    public function getObjContentCategory()
    {
        return $this->objContentCategory;
    }

    private function createDummyContent()
    {
        return $this->contentTest->createContent();
    }

    private function createDummyCategory()
    {
        return $this->categoryTest->createCategory();
    }

    public function createDummy()
    {
        $this->resultContent = $this->createDummyContent();
        if (!$this->resultContent) {
            $this->assertTrue(false);
        } else {
            $this->resultCategory = $this->createDummyCategory();
            if (!$this->resultCategory) {
                $this->assertTrue(false);
            } else {
                $this->objContentCategory->content_id = $this->resultContent->id;
                $this->objContentCategory->categories_id = $this->resultCategory->id;
                $this->objContentCategory->user_id = '1';
            }
        }
    }

    public function createContentCategory()
    {
        $this->createDummy();
        return $this->contentCategory->addContentCategory($this->objContentCategory);
    }

    private function start()
    {
        $this->contentCategory = new ContentCategory;
        $this->objContentCategory = new \StdClass;
        $this->contentTest = new ContentTest;
        $this->contentTest->setUp();
        $this->categoryTest = new CategoryTest;
        $this->categoryTest->setUp();
    }

    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    public function testAddContentCategory()
    {
        $result = $this->createContentCategory();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testUpdateContentCategory()
    {
        $resultContentCategory = $this->createContentCategory();

        if (!$resultContentCategory) {
            $this->assertTrue(false);
        } else {
            $result = $this->createDummyCategory();
            $this->objContentCategory->content_id = $this->resultContent->id;
            $this->objContentCategory->categories_id = $result->id;
            $this->objContentCategory->user_id = '1';
            $result = $this->contentCategory->updateContentCategory($this->objContentCategory, $resultContentCategory->id);
            if ($result) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }

    public function testDeleteContentCategoryById()
    {
        $result = $this->createContentCategory();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->contentCategory->deleteContentCategory($result->id);
            if ($result) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }

    public function testContentCategoryGetAll(){
        $result = $this->createContentCategory();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->contentCategory->getAll();
            if(count($result)>0){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }
        }
    }
}
