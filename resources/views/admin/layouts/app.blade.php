<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME') }} | @yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="app" class="wrapper">
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

<script src="{{ asset('js/app.js') }}"></script>

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
    $('#datemask').inputmask('dd-mm-yyyy', {'placeholder': 'dd-mm-yyyy'})
    $('#datemaskyear').inputmask("9999", {
        postValidation: function (buffer, opts) {
            return parseInt(buffer.join('')) <= (new Date()).getFullYear();
        }
    });

    $('.select2').select2()

</script>
@yield('script');
</body>
</html>
