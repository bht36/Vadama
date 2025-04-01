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

    <!-- Right Side: Registration Form -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="card p-4 shadow-lg login-form" style="width: 100%; max-width: 500px;">
        <div class="text-center">
          <h4 class="mt-3 fw-semibold text-dark fs-3">Sign up</h4>
        </div>
        <form action="{{ route('register_acc') }}" method="POST">
          @csrf
          
          <!-- First Name Field -->
          <div class="mt-3 mb-3">
            <div class="row">
              <div class="col-md-6">
                <label class="form-label">First name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                @error('first_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Last name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                @error('last_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
      
          <!-- Username Field -->
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
            @error('username')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
      
          <!-- Phone Number Field -->
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
            @error('phone_number')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
      
          <!-- Email Address Field -->
          <div class="mb-3 position-relative">
            <label class="form-label">Email</label>
            <div class="position-relative">
              <input type="text" name="email" class="form-control pe-5 @error('email') is-invalid @enderror" value="{{ old('email') }}">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
      
          <!-- Password Field -->
          <div class="mb-3 position-relative password-wrapper">
            <label class="form-label">Password</label>
            <div class="position-relative">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
      
          <!-- Confirm Password Field -->
          <div class="mb-3 position-relative password-wrapper">
            <label class="form-label">Confirm Password</label>
            <div class="position-relative">
              <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword">                   
              @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
      
          <div class="mt-4">
            <button type="submit" class="btn custom-btn w-100" style="background-color: #79090f; border-color: #79090f;">Signup</button>
          </div>
    
          <div class="text-center mt-3">
            <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const togglePassword1 = document.getElementById('togglePassword1');
    const password1 = document.getElementById('password');
    
    const togglePassword2 = document.getElementById('togglePassword2');
    const password2 = document.getElementById('confirmPassword');

    togglePassword1.addEventListener('click', function () {
      const isPasswordHidden1 = password1.type === 'password';
      password1.type = isPasswordHidden1 ? 'text' : 'password';
      this.classList.toggle('fa-eye', isPasswordHidden1);
      this.classList.toggle('fa-eye-slash', !isPasswordHidden1);
    });

    togglePassword2.addEventListener('click', function () {
      const isPasswordHidden2 = password2.type === 'password';
      password2.type = isPasswordHidden2 ? 'text' : 'password';
      this.classList.toggle('fa-eye', isPasswordHidden2);
      this.classList.toggle('fa-eye-slash', !isPasswordHidden2);
    });
  });
</script>

<style>
  * {
    background-color: #ffffff;
  }

  .login-container {
    height: 100vh;
  }

  .image-section {
    background: url('https://source.unsplash.com/800x800/?office') no-repeat center center;
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
    height: auto;
    max-width: 450px;
    width: 100%;
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

  .login-form .form-label {
    font-size: 1rem;
  }
</style>
@endsection
