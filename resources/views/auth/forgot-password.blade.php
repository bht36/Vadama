{{--
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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
    <h5 class="login-box-msg">Forgot Your Password?</h5>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('No problem. Just let us know your email address and we will send you a password reset link.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="mt-5">
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <div class="row justify-content-center">
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
            </div>
        </div>

    </form>

    <p class="mt-3 mb-1">
        <a href="{{ route('admin.login') }}">Back to Login</a>
    </p>
@endsection

