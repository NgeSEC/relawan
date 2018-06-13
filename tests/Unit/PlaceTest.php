<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function getData()
    {
        $data['data'] = '
            {
                "type": "FeatureCollection",
                "crs": {
                    "type": "name",
                    "properties": {
                        "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
                    }
                },
                "features": [
                    {
                        "type": "Feature",
                        "properties": {
                            "Name": "Pos Pengungsian Desa Jati",
                            "description": "Pos Pengungsian Desa Jati",
                            "timestamp": null,
                            "begin": null,
                            "end": null,
                            "altitudeMode": null,
                            "tessellate": -1,
                            "extrude": 0,
                            "visibility": -1,
                            "drawOrder": null,
                            "icon": null
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [
                                110.335118,
                                -7.51971,
                                0.0
                            ]
                        }
                    }
                ]
            }
        ';
        return $data;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBulk()
    {
        Session::start();
        $this->secure();

        $response = $this->withSession(['timezone' => 'Asia/Jakarta'])->post('/references/place/save-bulk', $this->getData());
        $this->assertEquals(200, $response->status());
    }

    public function testDoubleBulk()
    {
        Session::start();
        $this->secure();

        $response = $this->withSession(['timezone' => 'Asia/Jakarta'])->post('/references/place/save-bulk', $this->getData());
        $response = $this->withSession(['timezone' => 'Asia/Jakarta'])->post('/references/place/save-bulk', $this->getData());
        $this->assertEquals(200, $response->status());
    }
}
