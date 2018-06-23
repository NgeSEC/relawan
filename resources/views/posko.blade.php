@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <h2>Daftar POSKO</h2>
        <div id="btnContainer">
            @if (app('request')->input('posko'))
            <a href="{{ route('daftar-posko') }}" class="btn">Lihat Semua</a>
            @else
            <a href="{{ route('daftar-posko') }}" class="btn active">Lihat Semua</a>
            @endif
            <a href="{{ route('daftar-posko') }}?posko=pengungsi" class="btn {{ app('request')->input('posko') === 'pengungsi' ? 'active':''}} ">Posko Pengungsi</a>
            <a href="{{ route('daftar-posko') }}?posko=ternak" class="btn {{ app('request')->input('posko') === 'ternak' ? 'active':''}}">Shelter Ternak</a>
        </div>
        <div class="card-grid">
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href="/?lat=-7.51971&lon=110.335118"> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href="{{ route('detail-posko', ['slug' => 'pos-desa-jati']) }}"> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:lightGreen; padding: .3em"><i class="fa fa-paw fa-2x" style="color:white"></i></span>
              <div>
                <h4>Shelter Gunung Pring</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sapi: 4</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kambing: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kerbau: 0</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Anjing: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kucing: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Abidah </div>
                <div><span class="fa fa-phone-square"></span> 08023897990</div>
              </div>
                <div class="card-footer">
                    <a href="/?lat=-7.55423&lon=110.317374"> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href="{{ route('detail-posko', ['slug' => 'shelter-gunung-pring']) }}"> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:lightGreen; padding: .3em"><i class="fa fa-paw fa-2x" style="color:white"></i></span>
              <div>
                <h4>Shelter Gunung Pring</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sapi: 4</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kambing: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kerbau: 0</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Anjing: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kucing: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Abidah </div>
                <div><span class="fa fa-phone-square"></span> 08023897990</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card">
                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
              <div>
                <h4>Pos Desa Jati</h4>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Balita: 24</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Ibu Hamil: 7</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Lansia: 8</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Difable: 3</li>
                    <li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sakit: 10</li>
                </ul>
                <div><span class="fa fa-user"></span> Sukron </div>
                <div><span class="fa fa-phone-square"></span> 0930480090</div>
              </div>
                <div class="card-footer">
                    <a href=""> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>
                    <a href=""> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                </div>
            </div>
          </div>
        </div>
    <div class="pagination">
      <a href="#">&lsaquo;&lsaquo;</a>
      <a href="#">&lsaquo;</a>
      <a href="#" class="selected">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">&rsaquo;</a>
      <a href="#">&rsaquo;&rsaquo;</a>
    </div>
    </div>
</section>
@endsection
