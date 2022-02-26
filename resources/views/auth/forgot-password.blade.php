@extends('layouts.mainapp')

@section('content')
<div class="main-content">
        <form method="POST" action="{{ route('password.email') }}"class="my-form">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-hero-btn >
                    {{ __('Back') }}
                </x-hero-btn>

                
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>

               
            </div>
        </form>
</div>
@endsection