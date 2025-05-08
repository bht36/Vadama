<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Menu</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Add this inside the <head> section -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- Custom CSS -->
    <style>
        .navbar {
            padding: 10px 20px;
        }

        /* Logo Styling */
        .navbar-brand {
            margin-right: 30px;
            font-weight: bold;
        }

        /* Centering the Navbar Items */
        .navbar-nav {
            flex: 1;
            justify-content: center;
        }

        /* Ensuring Dropdown Aligns to the Right */
        .dropdown-menu {
            min-width: 200px;
            max-width: 250px;
            right: 0;
            left: auto !important;
        }

        /* Profile Icon on Right */
        .user-profile {
            display: flex;
            align-items: center;
            margin-left: auto; /* Ensure the user profile is aligned to the right */
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            /* Make sure the profile is still on the right for smaller screens */
            .user-profile {
                margin-left: auto;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Logo on Left -->
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('logo/Login.png') }}" alt="Logo" style="height: 40px; width: auto;">
        </a>
        

        <!-- Navbar Toggler for Mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links (Center Aligned) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('aboutus') }}">About Us</a>
                </li>
                @if (!Auth::guard('account')->check() || Auth::guard('account')->user()->user_type !== 'seller')
                    @if (Route::currentRouteName() !== 'login_seller')
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('login_seller') }}">Become a Seller</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#">Contacts</a>
                </li>
            </ul>

            <!-- User Profile (Right Side) -->
            @auth('account')
            <div class="nav-item dropdown user-profile">
                <a href="#" id="profileDropdown" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::guard('account')->user()->profile_picture ? asset('storage/uploads/profile_pictures/' . Auth::guard('account')->user()->profile_picture) : asset('logo/User.png') }}" 
                        alt="User Image" 
                        class="rounded-circle" 
                        width="40" height="40">
                </a>
                <div class="dropdown-menu dropdown-menu-right mt-2 shadow" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a class="dropdown-item" href="{{ route('accountprofile') }}">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>                    
                    @if(Auth::guard('account')->check() && Auth::guard('account')->user()->user_type === 'seller')
                        <a class="dropdown-item" href="{{ route('leaseproperty') }}">
                            <i class="fas fa-home mr-2"></i> Lease Property
                        </a>
                    @endif
                    @if(Auth::guard('account')->check() && Auth::guard('account')->user()->user_type === 'seller')
                        <a class="dropdown-item" href="{{ route('view_leaseproperty') }}">
                            <i class="fas fa-home mr-2"></i> Rental Listings
                        </a>
                    @endif
                    @if(Auth::guard('account')->check() && Auth::guard('account')->user()->user_type === 'seller')
                    <a class="dropdown-item" href="{{ route('my-rental-requests') }}">
                        <i class="fas fa-hand-paper mr-2"></i> Request Property
                    </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout_acc') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
            @else
            @if (Route::currentRouteName() !== 'login')
                        <a href="{{ route('login') }}" class="btn btn-outline-dark font-weight-bold ml-3">Login</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<!-- Content -->
<div class="content">
    @yield('content')
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Dropdown Toggle Script -->
<script>
    $(document).ready(function(){
        $('#profileDropdown').click(function(e){
            e.preventDefault();
            $(this).next('.dropdown-menu').toggleClass('show');
        });

        // Close dropdown when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('.dropdown-menu, #profileDropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>

</body>
</html>
