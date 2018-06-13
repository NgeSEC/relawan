<?php

namespace Tests\Unit\Models;

use App\Models\Place;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Tests\Unit\PlaceTest as PlaceTestIntegration;

class PlaceTest extends TestCase
{
    private $placeTestIntegration;
    private $place;

    private $objPlaceTestIntegration;

    public function start()
    {
        $this->placeTestIntegration = new PlaceTestIntegration;
        $this->place = new Place;
    }

    public function createDummy()
    {
        $this->objPlaceTestIntegration = $this->placeTestIntegration->getData();
        return $this->place->addBulkPlace(json_decode($this->objPlaceTestIntegration['data'], true), '1', '1');
    }

    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    public function testAddPlace()
    {
        Session::start();
        session(['timezone' => 'Asia/Jakarta']);
       
        $result = $this->createDummy();
        if ($result) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        Session::flush();
    }
}
