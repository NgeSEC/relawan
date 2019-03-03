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
            <a href="{{ route('daftar-posko') }}?posko=posko" class="btn {{ app('request')->input('posko') === 'posko' ? 'active':''}} ">Posko Pengungsi</a>
            <a href="{{ route('daftar-posko') }}?posko=shelter" class="btn {{ app('request')->input('posko') === 'shelter' ? 'active':''}}">Shelter Ternak</a>
        </div>
        <div class="card-grid">

            @if(empty($poskoes))
                    <h3>Data not found.</h3>
            @else
                @if(count($poskoes) === 0)
                    <h3>Empty data.</h3>
                @else
                    @foreach( $poskoes as $posko )
                        <div class="card-wrap">
                            <div class="card">
                                <span class="fa-pull-right" style="background:DodgerBlue; padding: .3em"><i class="fa fa-home fa-2x" style="color:white"></i></span>
                                <div>
                                    <h4>{{ $posko->title }}</h4>
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
                                    {{--<a href="/?lat=-7.51971&lon=110.335118"> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP </a>--}}
                                    <a href="/?lat={{ $posko->coordinate['lat'] }}&lon={{ $posko->coordinate['lon'] }}"> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP </a>
                                    <a href="{{ route('detail-posko', ['slug' => $posko->code]) }}"> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif



            {{--CONTOH BUAT TIPE SHELTER--}}

          {{--<div class="card-wrap">--}}
            {{--<div class="card">--}}
                {{--<span class="fa-pull-right" style="background:lightGreen; padding: .3em"><i class="fa fa-paw fa-2x" style="color:white"></i></span>--}}
              {{--<div>--}}
                {{--<h4>Shelter Gunung Pring</h4>--}}
                {{--<ul class="fa-ul">--}}
                    {{--<li><span class="fa-li"><i class="fa fa-check-square"></i></span> Sapi: 4</li>--}}
                    {{--<li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kambing: 7</li>--}}
                    {{--<li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kerbau: 0</li>--}}
                    {{--<li><span class="fa-li"><i class="fa fa-check-square"></i></span> Anjing: 3</li>--}}
                    {{--<li><span class="fa-li"><i class="fa fa-check-square"></i></span> Kucing: 10</li>--}}
                {{--</ul>--}}
                {{--<div><span class="fa fa-user"></span> Abidah </div>--}}
                {{--<div><span class="fa fa-phone-square"></span> 08023897990</div>--}}
              {{--</div>--}}
                {{--<div class="card-footer">--}}
                    {{--<a href="/?lat=-7.55423&lon=110.317374"> <span class="fa fa-map-marker fa-lg"></span> VIEW on MAP</a>--}}
                    {{--<a href="{{ route('detail-posko', ['slug' => 'shelter-gunung-pring']) }}"> <span class="fa fa-info-circle fa-lg"></span> DETAIL</a>--}}
                {{--</div>--}}
            {{--</div>--}}
          {{--</div>--}}

            <div class="pagination">
                @if(empty($poskoes))
                @else
                @if(count($poskoes) == 0)
                @else
                {{ $poskoes->links() }}
                @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
