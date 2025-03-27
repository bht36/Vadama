{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('auth.layout')
@section('content')
    <div class="text-center">
        @if (session('reset-password-msg'))
            <div class="alert alert-success  alert-dismissible fade show" id="success-alert">
                {{ session('reset-password-msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <img style="width:60%;" src="{{ asset('logo/Login.png') }}" alt="Vada Ma" class="img-fluid">
        <h5 class="mt-3">Vada Ma</h5>
    </div>
    <h5 class="login-box-msg">Sign in</h5>
    @if (session('message'))
        <div class="alert alert-success  alert-dismissible fade show">{{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.login.submit') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                placeholder="Email" name="email" autocomplete="off">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif"
                placeholder="Password" name="password" id="passwordInput" autocomplete="off">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash mr-2 cursor-pointer" id="togglePassword" style="cursor:pointer"></span>
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group mt-1 ml-1 pl-1">
                <div class="captcha">
                    <span></span>
                    {{-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> --}}
                </div>

                {{-- @error('g-recaptcha-response')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
            </div>
            {{-- <div class="col-8">
      <div class="icheck-primary">
        <input type="checkbox" id="remember" name="remember" value="1">
        <label for="remember">
          Remember Me
        </label>
      </div>
    </div> --}}

            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <!-- /.social-auth-links -->
    <p class="mb-1">
        <a href="">I forgot my password</a>

        {{-- @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a> --}}
        {{-- @endif --}}
    </p>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('togglePassword');

            // Toggle the type attribute
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
@endsection
