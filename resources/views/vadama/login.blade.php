@extends('vadama.layouts.header')
@section('content')
<div class="container-fluid">
    <div class="row login-container">
        <!-- Left Side: Logo + Welcome Message + Image -->
        <div class="col-md-6 d-none d-md-block image-section">
            <div class="text-center">
                  <!-- Logo -->
              
                <!-- Welcome Message (centered below the logo) -->
                <div class="welcome-message mb-2">
                    <h1>Welcome back</h1>
                    <p>Login to see the latest Update</p>
                </div>
            </div>
            <!-- Image Section -->
            <div class="image-holder">
                <img src="{{ asset('picture/image.png') }}" class="d-block w-100 h-100" alt="...">
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card p-4 shadow-lg login-form w-100">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="text-center">
                    <h4 class="mt-5 fw-semibold text-dark fs-5">Login</h4>
                </div>

                <form method="POST" action="{{ route('login_acc') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <i id="togglePassword" class="fa fa-eye position-absolute top-50 end-0 translate-middle-y" style="right: 10px; cursor: pointer;"></i>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #79090f; border-color: #79090f;">Login</button>
                    </div>
                </form>

                <div class="text-center mt-2">
                    <p class="py-2">
                        Don't have an account? <a href="{{ route('signup') }}" class="text-decoration-none">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        background-color: #ffffff;
    }

    .login-container {
        height: 90vh;
        display: flex;
        justify-content: space-between;
    }

    .image-section {
        background-size: cover;
        position: relative;
        text-align: center;
        flex: 0 0 50%; 
    }
    .welcome-message {
    position: absolute;
    top: 25%; /* Moved up from 35% */
    left: 50%; /* Centered horizontally from 70% */
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.8);
    padding:px;
    border-radius: 10px;
    width: 80%;
    text-align: center;
    }

    .image-holder {
        position: absolute;
        top: 10%; /* Moved up from 15% */
        left: 50%; /* Centered horizontally from 70% */
        transform: translate(-50%, 50%);
        width: 500px;
        height: 350px;
        background: #ccc;
        border-radius: 10px;
    }

    .login-form {
        max-width: 400px;
        width: 100%;
        height:70%;
    }

    .custom-btn {
        background-color: #79090F;
        color: white;
        border: none;
    }

    .custom-btn:hover {
        background-color: #844F52;
    }

    .custom-btn:active,
    .custom-btn.active,
    .btn.custom-btn:active,
    .btn.custom-btn.active {
        background-color: #630308 !important;
        border-color: #630308 !important;
    }

    .position-relative.d-flex.align-items-center {
        display: flex;
        align-items: center;
    }

    .position-relative {
        position: relative;
    }

    .position-absolute {
        position: absolute;
    }

    .top-50 {
        top: 50%;
    }

    .end-0 {
        right: 0;
    }

    .translate-middle-y {
        transform: translateY(-50%);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPasswordHidden = password.type === 'password';
            password.type = isPasswordHidden ? 'text' : 'password';

            this.classList.toggle('fa-eye', isPasswordHidden);
            this.classList.toggle('fa-eye-slash', !isPasswordHidden);
        });
    });
</script>
@endsection
