<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Menu</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Bootstrap CSS (Use Bootstrap's default styles) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- FontAwesome Icons (Used for icons in UI) -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/dist/css/adminlte.min.css') }}">
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    
    <!-- Custom CSS (Admin-specific styles) -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ rand() }}">

    <!-- Highcharts for Pie charts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/venn.js"></script>
    
    <!-- jQuery and Bootstrap Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery for AdminLTE functionalities -->
    <script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script>

    @yield('header-styles')
    @yield('header-scripts')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link font-weight-bold" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link font-weight-bold" href="#">Contacts</a></li>
            </ul>

            @if(Session::has('user'))
                <span class="mr-3">Welcome, {{ Session::get('user')['name'] ?? 'User' }}</span>
                <a href="{{ route('logout_acc') }}" class="btn btn-danger">Logout</a>
            @else
                <a href="{{ route('login_acc') }}" class="btn btn-outline-dark font-weight-bold ml-3">Login</a>
            @endif
        </div>
    </div>
</nav>


    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS and other dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
