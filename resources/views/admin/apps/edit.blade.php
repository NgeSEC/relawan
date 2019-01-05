@extends('admin.layouts.app')

@section('title')
    Admin - Posko
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Edit Posko
        </h1>
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>--}}
        {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <!-- form -->
                        <form role="form" method="POST" action="{{ route('update-posko', $editPosko->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Nama Posko" value="{{$editPosko->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="desc" class="form-control" height="48" value="{{$editPosko->description}}">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kind" value="warga">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Warga
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kind" value="ternak">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Ternak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <input name="pic" type="text" class="form-control" placeholder="Nama Penanggung Jawab">
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
                                    <textarea name="address" class="form-control" id="alamat" rows="3" placeholder="Jl. Nama Jalan, Nama Gedung"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Koordinat</label>
                                <div class="col-sm-2">
                                    <input name="lat" class="form-control" id="alamat" rows="3"
                                           placeholder="Latitude"/>
                                    <input name="long" class="form-control" id="alamat" rows="3"
                                           placeholder="Longitude"/>
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
        $(document).ready(function() {
            // get Kabupaten
            $("#inputProvince").change(function () {
                    $.get("/api/regencies?province_id=" + this.value, function (data) {
                        $("#inputRegency option").remove().append("");
                        $("#inputRegency").append(new Option("Pilih")).change();
                        $.each( data, function( key, value ) {
                            $("#inputRegency").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

            // get Kecamatan
            $("#inputRegency").change(function () {
                    $.get("/api/districts?regency_id=" + this.value, function (data) {
                        $("#inputDistrict option").remove().append("")
                        $("#inputDistrict").append(new Option("Pilih")).change();;
                        $.each( data, function( key, value ) {
                            $("#inputDistrict").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

            // get Kelurahan
            $("#inputDistrict").change(function () {
                    $.get("/api/villages?district_id=" + this.value, function (data) {
                        $("#inputVillage option").remove().append("");
                        $("#inputVillage").append(new Option("Pilih")).change();
                        $.each( data, function( key, value ) {
                            $("#inputVillage").append(new Option(value.name, value.id));
                        });
                    }, "json");
                }
            );

        });
    </script>
@endsection
