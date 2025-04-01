@extends('vadama.layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row login-container">
            <!-- Left Side: Logo + Image -->
            <div class="col-md-6 d-none d-md-block image-section">
              <div class="logo-container text-center">
                <img src="{{ asset('logo/Login.png') }}" alt="Logo" >
              </div>
              <div class="image-holder">
                <img src="{{ asset('picture/image.png') }}" class="d-block w-100" style="max-width: 100%; height: auto;" alt="...">
              </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card p-4 shadow-lg login-form">
                    <!-- Success message alert -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <h4 class="mt-3 fw-semibold text-dark fs-3">Login</h4>
                    </div>
                    <form method="POST" action="{{ route('login_acc') }}">
                      @csrf
                  
                      <!-- Email Address Field -->
                      <div class="mb-3 position-relative">
                          <label class="form-label">Email</label>
                          <div class="position-relative d-flex align-items-center">
                              <input type="email" name="email" class="form-control pe-5 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                              <i class="fas fa-envelope position-absolute top-50 end-0 translate-middle-y me-3"></i>
                          </div>
                          @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                  
                      <!-- Password Field -->
                      <div class="mb-3 position-relative password-wrapper">
                          <label class="form-label">Password</label>
                          <div class="position-relative d-flex align-items-center">
                              <input type="password" name="password" class="form-control" id="password" required>
                              <i class="fas fa-eye-slash toggle-password position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword"></i>
                          </div>
                          @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                  
                      <div class="d-flex justify-content-between">
                          <a href="{{ route('forgetpassword') }}" class="text-decoration-none">Forgot Password?</a>
                      </div>
                  
                      <div class="mt-3">
                          <button class="btn custom-btn w-100">Login</button>
                      </div>
                  </form>
                  
                    <div class="text-center mt-3">
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
            height: 100vh;
        }

        .image-section {
            background-size: cover;
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 10px;
        }

        .logo-container img {
            width: 150px;
            margin-left: 200px;
            height: 150px;
        }

        .image-holder {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: 45px;
            margin-left: 100px;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 400px;
            background: #ccc;
            border-radius: 10px;
        }

        .login-form {
            height: 510px;
            max-width: 400px;
            width: 100%;
        }

        /* Custom Button Styles */
        .custom-btn {
            background-color: #79090F;  /* Default color */
            color: white;  /* Text color */
            border: none;
        }

        .custom-btn:hover {
            background-color: #844F52;  /* Hover color */
        }

        /* Increase specificity to override Bootstrap defaults */
        .custom-btn:active,
        .custom-btn.active,
        .btn.custom-btn:active,
        .btn.custom-btn.active {
            background-color: #630308 !important;  /* Active (clicked) color */
            border-color: #630308 !important;
        }

        /* Align input fields and icons */
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
