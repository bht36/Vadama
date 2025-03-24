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
    
    <!-- FontAwesome Icons (Used for icons in UI) -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- AdminLTE CSS (Main UI framework) -->
    <link rel="stylesheet" href="{{ asset('build/assets/dist/css/adminlte.min.css') }}">
    
    <!-- overlayScrollbars (Used for sidebar scrolling effects) -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    
    <!-- Custom CSS (Admin-specific styles) -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}?v={{rand()}}">
    
    <!-- Highcharts for Pie charts (If charts are not used, this can be commented out) -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/venn.js"></script>

    <!-- Code for the filter pop-up in the admin panel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    
    <!-- jQuery (Required for AdminLTE and Bootstrap functionalities) -->
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
                            <form class="d-inline" action="" method="post">
                                @csrf
                                <button class="logout_btn btn btn-success" type="submit">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('logout') }}
                                </button>
                            </form>
                        </a>
                    </div> 
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('logo/Login.png') }}" alt="Bhada Ma" class="img-fluid" style="width: 100px; height: auto;">
                </div>
            </a>
            <div class="sidebar">
                <nav class="mt-2" style="padding-bottom: 104px;">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @include('admin.nav-items')
                    </ul>
                </nav>
            </div>
        </aside>
        
        <!-- Content Wrapper -->
        @yield('content')
        
        <!-- Footer -->
        <footer class="main-footer">
            <strong> {{ __('Copyright') }} &copy;&nbsp;<?php echo date('Y'); ?>&nbsp; {{ __('Bhada Ma') }}</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 11.0
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap 4 (If Bootstrap is not used extensively, can be commented out) -->
    <script src="{{ asset('build/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- AdminLTE JavaScript (If unused features of AdminLTE are included, they can be optimized) -->
    <script src="{{ asset('build/assets/dist/js/adminlte.js') }}"></script>
    
    @yield('scripts')
    @yield('footer-scripts')
</body>
</html>
