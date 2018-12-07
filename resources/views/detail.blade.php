@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container panel">
        <h2>{{ $posko->title }}</h2>
        <h3><span class="fa fa-bar-chart-o"></span> Statistik &amp; Informasi Dasar</h3>
        <div class="row">
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Pengungsi</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Laki-laki</td>
                  <td>332</td>
                </tr>
                <tr>
                  <td>Perempuan</td>
                  <td>316</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>TOTAL</td>
                  <td>648</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sebaran Usia</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>TK/SD</td>
                  <td>106</td>
                </tr>
                <tr>
                  <td>SMP</td>
                  <td>21</td>
                </tr>
                <tr>
                  <td>SMA</td>
                  <td>8</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Kondisi</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Balita</td>
                  <td>24</td>
                </tr>
                <tr>
                  <td>Ibu Hamil</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>Lanjut Usia</td>
                  <td>18</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Kesehatan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Difabel</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>Sakit</td>
                  <td>3</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="2">Contact</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Koordinator</td>
                  <td>Sukron</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>0817628778</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="2">Koordinat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Latitude (Lintang)</td>
                  <td>{{ $posko->coordinate['lat'] }}</td>
                </tr>
                <tr>
                  <td>Longitude (Bujur)</td>
                  <td>{{ $posko->coordinate['lon'] }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <h4>Alamat</h4>
        <p>Desa Jati, Ngemplak, Sleman, Yogyakarta</p>
        <img width="600" src="https://static-maps.yandex.ru/1.x/?lang=en-US&ll={{ $posko->coordinate['lon'] }},{{ $posko->coordinate['lat'] }}&z=13&l=sat&size=600,300&pt={{ $posko->coordinate['lon'] }},{{ $posko->coordinate['lat'] }},flag" alt="Peta Desa Jati">
        <h3><span class="fa fa-file-text"></span> Fasilitas</h3>
        {!!   $posko->description !!}
        <div class="container">

        </div>
    </div>
</section>
@endsection
