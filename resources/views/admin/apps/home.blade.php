@extends('admin.layouts.app')

@section('title')
    Beranda
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Sugeng Rawuh
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
                    <div class="box-header with-border">
                        <h3 class="box-title">BOX </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="text-center">COL MD 4</h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-center">COL MD 8</h4>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                </div>
                <!-- /.box -->
            </div>


        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->

    </section>
@endsection
