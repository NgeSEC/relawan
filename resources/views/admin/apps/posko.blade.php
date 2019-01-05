@extends('admin.layouts.app')

@section('title')
    Admin - Posko
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Daftar Posko
            <a type="button" class="btn btn-primary" href="/admin/posko/add">+</a>
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">Import GeoJson</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
        </ol>
    </section>


    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- list -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $poskos as $key => $posko)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td><b>{{ $posko->title }}</b></td>
                            <td>
                                <a href="{{ route('edit-posko', $posko->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm">delete</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /list -->
                </div>
                <!-- /.box -->
                <div class="pagination">
                    {{ $poskos->links() }}
                </div>
            </div>


        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->

        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import GeoJson File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(array('action' => 'AdminController@doImportGeoJson',
                                            'method' => 'POST',
                                            'enctype'=>'multipart/form-data')) !!}
                    {{--<form role="form" method="POST" action={{action("AdminController@doImportGeoJson")}}>--}}
                        {{--{{ csrf_field() }}--}}
                        <div class="modal-body">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    {{--</form>--}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </section>
@endsection
