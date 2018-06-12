<?php

namespace Tests\Unit\Models;

use App\Models\Content;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContentTest extends TestCase
{
    private $objContent;
    
    private $content;

    public function start(){
        $this->objContent = new \StdClass;
        $this->content = new Content;
    }

    public function setUp(){
        parent::setUp();
        $this->start();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
