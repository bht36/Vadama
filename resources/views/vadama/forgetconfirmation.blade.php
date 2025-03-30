<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Confirmation</title>
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

    <!-- Right Side: Email Confirmation -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="card p-4 shadow-lg login-form">
        <div class="log2 text-center">
          <img src="{{ asset('picture\MAIL.png') }}" alt="Logo">
        </div>
        <form>
          <!-- Email Confirmation Heading -->
          <div class="mb-4 text-center">
            <h4 class="mb-3">Check your email</h4>
            <p>We have sent a password reset link to the following email address:</p>
            <a href="#" class="d-block mb-3">johitthebe@gmail.com</a>
            <p>You will receive a password reset link shortly.</p>
          </div>

          <!-- Resend Button -->
          <div class="mt-3">
            <button class="btn custom-btn w-100">Resend Mail</button>
          </div>

          <!-- Footer Text -->
          <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ route('index.signup') }}" class="text-decoration-none">Sign up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
