<?php

namespace Tests\Unit\Models;

use App\Repositories\PlaceRepository;
use Tests\TestCase;
use Tests\Unit\PlaceTest as PlaceTestIntegration;

class PlaceRepositoryTest extends TestCase
{
    private $placeTestIntegration;
    private $place;
    private $timezone;

    private $objPlaceTestIntegration;

    public function start()
    {
        $this->placeTestIntegration = new PlaceTestIntegration;
        $this->place = new PlaceRepository;
        $this->timezone = 'Asia/Jakarta';
    }

    public function createDummy()
    {
        $this->objPlaceTestIntegration = $this->placeTestIntegration->getData();
        return $this->place->addBulkPlace(json_decode($this->objPlaceTestIntegration['data'], true), '1', '1', $this->timezone);
    }

    public function setUp()
    {
        parent::setUp();
        $this->start();
    }

    public function testAddPlace()
    {
        $result = $this->createDummy();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testGetAllPlace()
    {
        $result = $this->createDummy();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->place->getAllPlace();
            if (count($result) > 0) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }

    public function testGetPlaceById()
    {
        $result = $this->createDummy();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->place->getPlaceById($result->id);
            if ($result != null) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }

    public function testGetPlaceByCode()
    {
        $result = $this->createDummy();
        if (!$result) {
            $this->assertTrue(false);
        } else {
            $result = $this->place->getPlaceByCode($result->code);
            if ($result != null) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        }
    }
}
