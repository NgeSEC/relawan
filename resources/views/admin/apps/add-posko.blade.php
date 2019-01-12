@extends('admin.layouts.app')

@section('title')
    Admin - Posko
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Tambah Posko
        </h1>
        {{--<ol class="breadcrumb">--}}
        {{--<li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>--}}
        {{--</ol>--}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('map/css/leaflet.css') }}" rel="stylesheet">
        <link href="{{ asset('map/css/leaflet.usermarker.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('map/css/L.Control.Locate.css') }}">
        <link rel="stylesheet" href="{{ asset('map/css/L.Control.Layers.Tree.css') }}" crossorigin="">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('map/css/leaflet.awesome-markers.css') }}">

        <style>
            html, body, #container, #map {
                padding: 0;
                margin: 0;
            }
            html, body, #map, #container {
                height: 460px;
            }
        </style>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <!-- form -->
                        <form role="form" method="POST" action={{route("admin.references.posko.save")}}>
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name"
                                           placeholder="Nama Posko">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                              placeholder="Keterangan"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Kapasitas</label>
                                <div class="col-sm-10">
                                    <input name="capacity" type="number" class="form-control" placeholder="Jumlah">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputProvinsi" class="col-sm-2 col-form-label">Jenis Posko</label>
                                <div class="col-sm-10">
                                    @foreach($place_types as $key => $value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kind"
                                                   value="{{$value->id}}">
                                            <label class="form-check-label" for="exampleRadios1">
                                                &nbsp {{$value->code}} - {{$value->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <input name="pic" type="text" class="form-control"
                                           placeholder="Nama Penanggung Jawab">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Nomor Kontak</label>
                                <div class="col-sm-10">
                                    <input name="phone" type="tel" class="form-control" placeholder="Nomor HP/Telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select name="province" class="form-control" id="inputProvince">
                                        <option selected>Pilih</option>
                                        @foreach( $provinces as $key => $province )
                                            <option value="{{ $province->id }}">{{ $province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select name="regency" class="form-control" id="inputRegency">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select name="district" class="form-control" id="inputDistrict">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKelurahan" class="col-sm-2 col-form-label">Kelurahan/Desa</label>
                                <div class="col-sm-10">
                                    <select name="village" class="form-control" id="inputVillage">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" id="alamat" rows="3"
                                              placeholder="Jl. Nama Jalan, Nama Gedung"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Koordinat</label>
                                <div class="col-sm-2">
                                    <input name="long" class="form-control" id="long" rows="3"
                                           placeholder="Longitude"/>
                                    <input name="lat" class="form-control" id="lat" rows="3"
                                           placeholder="Latitude"/>
                                </div>
                                <div id="map" class="col-sm-7">
                                    <script src="{{ asset('map/js/leaflet.js') }}"></script>
                                    <script src="{{ asset('map/js/leaflet.extras.js') }}"></script>
                                    <script src="{{ asset('map/js/leaflet.bouncemarker.js') }}"></script>
                                    <script src="{{ asset('map/js/leaflet.awesome-markers.min.js') }}"></script>
                                    <script type="text/javascript" src="{{ asset('map/js/L.Control.Locate.min.js') }}"></script>
                                    <script type="text/javascript" src="{{ asset('map/js/L.Control.Layers.Tree.js') }}"></script>

                                    <script>
                                        var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> Contributors'
                                        });
                                        //remember last position
                                        var rememberLat = document.getElementById('lat').value;
                                        var rememberLong = document.getElementById('long').value;
                                        if( !rememberLat || !rememberLong ) { rememberLat = -7.5907423; rememberLong = 110.4097974;}

                                        var map = new L.Map('map', {
                                            'center': [rememberLat,rememberLong ],
                                            'zoom': 12,
                                            'layers': [tileLayer]
                                        });

                                        var marker = L.marker([rememberLat, rememberLong],{
                                            draggable: true
                                        }).addTo(map);

                                        marker.on('dragend', function (e) {
                                            updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
                                        });
                                        map.on('click', function (e) {
                                            marker.setLatLng(e.latlng);
                                            updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
                                        });
                                        function updateLatLng(lat,lng,reverse) {
                                            if(reverse) {
                                                marker.setLatLng([lat,lng]);
                                                map.panTo([lat,lng]);
                                            } else {
                                                document.getElementById('lat').value = marker.getLatLng().lat;
                                                document.getElementById('long').value = marker.getLatLng().lng;
                                                map.panTo([lat,lng]);
                                            }
                                        }
                                    </script>

                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                        <!-- /form -->

                    </div>
                </div>
                <!-- /.box -->
                <div class="pagination">
                    {{--{{ $poskos->links() }}--}}
                </div>
            </div>


        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->

    </section>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            // get Kabupaten
            $("#inputProvince").change(function () {
                    $.get("{{ route('city.list.json', '') }}/" + this.value, function (data) {
                        $("#inputRegency option").remove().append("");
                        $("#inputRegency").append(new Option("Pilih")).change();
                        $.each(data, function (key, value) {
                            $("#inputRegency").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

            // get Kecamatan
            $("#inputRegency").change(function () {
                    $.get("{{ route('districts.list.json', '') }}/" + this.value, function (data) {
                        $("#inputDistrict option").remove().append("")
                        $("#inputDistrict").append(new Option("Pilih")).change();
                        ;
                        $.each(data, function (key, value) {
                            $("#inputDistrict").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

            // get Kelurahan
            $("#inputDistrict").change(function () {
                    $.get("{{ route('villages.list.json', '') }}/" + this.value, function (data) {
                        $("#inputVillage option").remove().append("");
                        $("#inputVillage").append(new Option("Pilih")).change();
                        $.each(data, function (key, value) {
                            $("#inputVillage").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

        });
    </script>
@endsection
