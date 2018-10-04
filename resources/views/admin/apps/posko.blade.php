@extends('admin.layouts.app')

@section('title')
    Admin - Posko
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Daftar Posko <a type="button" class="btn btn-primary" href="/admin/posko/add">+</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
        </ol>
    </section>

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
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
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

    </section>
@endsection
