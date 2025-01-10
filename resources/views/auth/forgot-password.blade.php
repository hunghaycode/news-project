{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
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



@extends('frontend.layouts.master')

@section('content')
    <link href="{{ asset('auth/assets/css/styles.css') }}" rel="stylesheet">

    <!-- login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            @if (session()->has('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>

                        @endif
                            <h4 class="card-title mb-4">Forgot your password?</h4>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" type="text" name="email" required>
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

 

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Email Password Reset Link </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-4 mb-0">Don't have account? <a href="{{ route('register') }}">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
