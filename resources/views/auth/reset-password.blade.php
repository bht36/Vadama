{{--  <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}

@extends('auth.layout')

@section('content')
    <div class="text-center">
        <img style="width:60%;" src="{{ asset('logo/Login.png') }}" alt="Vada Ma" class="img-fluid">
        <h5 class="mt-3">Reset Your Password</h5>
    </div>

    <h5 class="login-box-msg">Enter a new password</h5>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ route('reset.password.post') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Address -->
        <div class="input-group mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                placeholder="Email" name="email" value="{{ old('email', $email) }}" required readonly>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Password -->
        <div class="input-group mb-3">
            <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif"
                placeholder="New Password" name="password" id="passwordInput" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash cursor-pointer" id="togglePassword"></span>
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <!-- Confirm Password -->
        <div class="input-group mb-3">
            <input type="password" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif"
                placeholder="Confirm Password" name="password_confirmation" id="confirmPasswordInput" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash cursor-pointer" id="toggleConfirmPassword"></span>
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = this;
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const confirmPasswordInput = document.getElementById('confirmPasswordInput');
            const toggleIcon = this;
            confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection

