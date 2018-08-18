<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Website untuk mencari pasaran, pawukon, weton, geblag dan di sediakan juga API nya">
    <meta name="keywords" content="Pasaram. pawukon, weton, geblak, geblak, API perhitungan jawa">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta property="og:title" content="Website untuk mencari pasaran, pawukon, weton, geblag dan di sediakan juga API nya" />
    <meta property="og:description " content="Website untuk mencari pasaran, pawukon, weton, geblag dan di sediakan juga API nya" />
    <meta property="og:type" content="website" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/bower/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/bower/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/bower/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('adminlte/bower/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('adminlte/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('adminlte/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('adminlte/bower/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/bower/select2/dist/css/select2.css')}}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{  URL::asset('adminlte/plugins/pace/pace.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.layouts.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
        <!-- MODAL -->
    {{--@include('apps.modals')--}}
    <!--MODAL-->
    </div>
    <!-- /.content-wrapper -->

@include('admin.layouts.footer')

<!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<script src="{{  URL::asset('adminlte/bower/jquery/dist/jquery.min.js')}}"></script>
<script src="{{  URL::asset('adminlte//bower/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/bower/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{ URL::asset('adminlte/bower/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/bower/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ URL::asset('adminlte/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/bower/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{  URL::asset('adminlte/bower/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{  URL::asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{  URL::asset('adminlte/bower/fastclick/lib/fastclick.js')}}"></script>
<script src="{{  URL::asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{  URL::asset('adminlte/dist/js/demo.js')}}"></script>
<script src="{{  URL::asset('adminlte/bower/PACE/pace.min.js')}}"></script>
{{--<script src="{{  URL::asset('js/custom.js')}}"></script>--}}



<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                console.log("result")
            }
        })
    })
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    $('#datemaskyear').inputmask("9999", {
        postValidation: function (buffer, opts) {
            return parseInt(buffer.join('')) <= (new Date()).getFullYear();
        }
    });

    $('.select2').select2()

</script>
</body>
</html>
