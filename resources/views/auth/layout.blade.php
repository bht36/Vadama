<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="icon" href="{{asset('build/assets/frontend/img/Favicon.png')}}" type="image/png">
    <!--  Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- PW seen or ***** --}}
    <link rel="stylesheet" href="{{asset('build/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Main Theme style -->
    <link rel="stylesheet" href="{{asset('build/assets/dist/css/adminlte.min.css')}}">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">

      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          @if(session()->has('error'))
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('error') }}
              </div>
          @endif
        @if ($errors->any())    
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @yield('content')
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('build/assets/dist/js/adminlte.min.js')}}"></script>
  </body>