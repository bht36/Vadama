<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Swoyam icon  --}}
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Swoyam background  --}}
    <link rel="stylesheet" href="{{ asset('build/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    {{-- Swoyam sidebat tab  --}}
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    {{-- Swoyam add css --}}
    <link rel="stylesheet" href="{{asset('css/admin.css')}}?v={{rand()}}">
    <!-- Swoyam Pie chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/venn.js"></script>

    {{-- Swoyam Drop down in side bar arrow --}}
    <script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script>
    @yield('header-styles')
    @yield('header-scripts')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li> -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle mr-1"></i>
                        Admin
                    </a>
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

                        <a href="" class="dropdown-item">
                            <i class="fas fa-cog"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            {{-- <form class="d-inline" action="{{ route('admin.logout') }}" method="post"> --}}
                            <form class="d-inline" action="" method="post">
                                
                                @csrf
                                <button class="logout_btn btn btn-success" type="submit"><i
                                        class="fas fa-sign-out-alt"></i> {{ __('logout') }}</button>
                            </form>
                        </a>
                    </div> 
                </li>
               

            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('logo/Login.png') }}" alt="Bhada Ma" class="img-fluid" style="width: 100px; height: auto;">
                </div>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
                <!-- Sidebar Menu -->
                <nav class="mt-2" style="padding-bottom: 104px;">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

                       
                        @include('admin.nav-items')
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- /.content-wrapper -->
        {{-- Swoyam footer --}}
        <footer class="main-footer">
            <strong> {{ __('Copyright') }} &copy;&nbsp;<?php echo date('Y'); ?>&nbsp; {{ __('Bhada Ma') }}</strong>

             <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 11.0
        </div> 
        </footer>
    </div>
    
    <!-- Bootstrap 4 -->
    {{-- Swoyam Dropdown in logout --}}
    <script src="{{ asset('build/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Swoyam Dont khow --}}
    <script src="{{ asset('build/assets/dist/js/adminlte.js') }}"></script>
    @yield('scripts')
    @yield('footer-scripts')
</body>
</html>