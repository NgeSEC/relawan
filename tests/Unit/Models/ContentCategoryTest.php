<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContentCategory;
use App\Models\Content;
use App\Models\Category;

class ContentCategoryTest extends TestCase
{

    private $objContentCategory;
    private $objCategory;
    private $objContent;

    private $contentCategory;
    private $category;
    private $content;

    public function getObjContentCategory(){
        return $this->objContentCategory;
    }

    public function setUp()
    {
        parent::setUp();
        $this->contentCategory = new ContentCategory;
    }   
    

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddContentCategory()
    {
        
    }
}
