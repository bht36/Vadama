<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    /* Form adjustments for responsiveness */
    .login-form .form-label {
      font-size: 1rem;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row login-container">
    <!-- Left Side: Logo + Image -->
    <div class="col-md-6 d-none d-md-block image-section">
      <div class="logo-container text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="Logo">
      </div>
      <div class="image-holder">
        <img src="{{ asset('storage/uploads/banner/main_image/1743057470_1500x450.png') }}" class="d-block w-100" alt="...">
      </div> 
    </div>

    <!-- Right Side: Login Form -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="card p-4 shadow-lg login-form">
        <div class="text-center">
          <h4 class="mt-3">Sign up</h4>
        </div>
        <form>
          <!-- Username Field -->
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" required>
          </div>

          <!-- Email Address Field -->
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" required>
          </div>

          <!-- Password Field -->
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" required>
          </div>

          <!-- Phone Number Field -->
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" required>
          </div>

          <div class="d-flex justify-content-between">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot Password?</a>
          </div>
          <div class="mt-3">
            <!-- Apply custom button styles -->
            <button class="btn custom-btn w-100">Signup</button>
          </div>

        <div class="text-center mt-3">
          <p>Already have an account? <a href="{{ route('index.login') }}" class="text-decoration-none">Login</a></p>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
