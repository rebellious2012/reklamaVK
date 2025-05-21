<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
  <title>Administrator | @yield('title', 'Panel')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('adminka/plugins/fonts-googleapis/fonts.googleapis.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminka/plugins/fontawesome-pro/css/all.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('adminka/plugins/select2/css/select2.min.css')}}">
  <!-- Theme style -->
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{asset('adminka/plugins/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('adminka/plugins/toastr/toastr.min.css')}}">
    @stack('prepend-styles')
    <link rel="stylesheet" href="{{asset('adminka/dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminka/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminka/plugins/summernote/summernote-bs4.min.css') }}">
    @stack('styles')
  @yield('style')
  <!-- Favicon -->
  <link href="{{asset('adminka/dist/img/favicon.png')}}" rel="icon" />
</head>
<body class="hold-transition sidebar-mini2">

<div class="wrapper">
    <!-- Preloader -->
  <div class="preloader5 flex-column justify-content-center align-items-center">
{{--    <img class="animation__shake" src="{{asset('adminka/dist/img/refresh.gif')}}" alt="refresh" height="60" width="60">--}}
  </div>
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    <div class="content-wrapper">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @yield('content')

        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
          <strong>Copyright &copy; 2024 <a href="">Administrator</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
          </div>
        </footer>

        <!-- Control Sidebar -->
{{--        <aside class="control-sidebar control-sidebar-dark">--}}
{{--          <!-- Control sidebar content goes here -->--}}
{{--        </aside><!-- /.control-sidebar -->--}}
      </div><!-- ./wrapper -->

      <!-- jQuery -->
      <script src="{{asset('adminka/plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('adminka/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <!-- AdminLTE App -->
      <script src="{{asset('adminka/dist/js/adminlte.min.js')}}"></script>
      <script src="{{asset('adminka/plugins/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('adminka/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('adminka/dist/js/demo.js')}}"></script>
<script src="{{asset('adminka/dist/js/main.js')}}"></script>
@yield('script')
</body>
</html>
