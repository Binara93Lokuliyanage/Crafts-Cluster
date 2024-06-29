@extends('front.layouts.app')

@section('content')

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">

        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Access to Education</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "auth-form-container">


<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>

                <input id="type" class="block mt-1 w-full" type="hidden" name="type" value = "student"  />
            </div>
            <div class="form-group">
                <div class = "two-col">
                    <div>
                        <x-label for="name" :value="__('First Name')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        
                    </div>
                    <div>
                        <x-label for="last_name" :value="__('Last Name')" />
        
                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class = "two-col">
                    <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="material_file" :value="__('Upload Profile Picture')" />
            
                <x-input id="material_file" class="block mt-1 w-full" type="file" name="material_file"  required />
            </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class = "two-col">
                    <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
                </div>
            </div>
            

            

            

            <div class="flex items-center justify-end mt-4 margin-top">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="btn-primary">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

</div>
</div>

</div>

</div>
</section>



@endsection