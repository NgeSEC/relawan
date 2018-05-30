<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use Auth;

class PoskoTest extends TestCase
{
    public function setUp(){
        parent::setUp();
    }

    private function data(){
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

        $response = $this->withSession(['timezone'=>'Asia/Jakarta'])->post('/references/posko/save-bulk', $this->data());
        $this->assertEquals(200, $response->status());
    }

    public function testDoubleBulk(){
        Session::start();
        $this->secure();

        $response = $this->withSession(['timezone'=>'Asia/Jakarta'])->post('/references/posko/save-bulk', $this->data());
        $response = $this->withSession(['timezone'=>'Asia/Jakarta'])->post('/references/posko/save-bulk', $this->data());
        $this->assertEquals(200, $response->status());
        $this->assertTrue(true);
    }
}
