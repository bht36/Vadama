<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>forgetpassword</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
      height: 580px;
      max-width: 400px;
      width: 100%;
    }
    /* Smaller logo size */
    .log2 img {
      width: 100px;
      height: 100px;
      margin-top: 50px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .login-form {
      height: 600px;
      max-width: 400px;
      width: 100%;
    }

    /* Custom Button Styles */
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

    .text-center p {
      font-size: 1rem;
    }

    /* Padding and margin adjustments for text */
    .text-center p a {
      text-decoration: none;
      font-weight: bold;
      color: #79090F;
    }
  </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row login-container">
          <!-- Left Side: Logo + Image -->
          <div class="col-md-6 d-none d-md-block image-section">
            <div class="logo-container text-center">
              <img src="{{ asset('logo\Login.png') }}" alt="Logo">
            </div>
            <div class="image-holder">
            <img src="{{ asset('picture/image.png') }}" class="d-block w-100" style="height: 430px;" alt="...">
            </div> 
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
  <div class="card p-4 shadow-lg login-form">
    
  <form>
      <!-- Email Confirmation Heading -->
      <div class="mt-5 mb-5 text-center">
        <h4 class="fw-bold text-dark fs-3 mb-4">Forgot your password?</h4>
        <p class="mb-3 text-dark fs-5">
          Enter the email associated with your<br>
          Vada Ma account to receive a reset<br>
          password link.
        </p>
      </div>
      <!-- Email Input Field with Mail Icon -->
<div class="mb-4 position-relative">
  <label class="form-label">Email address</label>
  <div class="position-relative">
    <input type="email" class="form-control pe-5" required placeholder="Enter your email">
    <!-- Mail Icon inside the input field, aligned to the left -->
    <i class="fas fa-envelope position-absolute top-50 end-0 translate-middle-y me-3"></i>
  </div>
</div>

<!-- Continue Button -->
<div>
  <button onclick="window.location.href='{{ route('forgetconfirmation') }}'" class="btn custom-btn w-100">Continue</button>
</div>

<!-- Footer Text -->
<div class="text-center mt-3">
  <a href="{{ route('login')}}" class="text-decoration-none">Return to Login</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
