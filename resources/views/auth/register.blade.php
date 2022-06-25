@extends('layouts.guest',['title'=>'منصة بريد | إنشاء حساب'])

@section('body')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5 col-12 p-md-3 p-4">
                <img class="img-fluid d-block  mx-auto my-3" width="50%" src="{{asset('images/logo.gif')}}" alt="bareed-logo">
                <p class="text-center sans-font grey-text">Powered By : <b>BrAiN</b></p>
                <div class="grey-border radius-80 p-5">
                   <form method="POST" action="{{ route('register') }}">

                    @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                       @foreach ($errors->all() as $item)
                       <p>
                        {{$item}}
                    </p>
                       @endforeach
                    </div>
                    @endif
                    @csrf
                    <div class="form-group text-right my-3">
                        <label for="name">الاسم  </label>
                        <input id="name" class="form-control radius-20" type="text" name="name">
                    </div>
                    <div class="form-group text-right my-3">
                        <label for="email">اسم المستخدم  </label>
                        <input id="email" class="form-control radius-20" type="text" name="email">
                    </div>
                    <div class="form-group text-right  my-3">
                        <label for="password">كلمة المرور  </label>
                        <input id="password" class="form-control radius-20" type="password" name="password">
                    </div>
                    <div class="form-group text-right  my-3">
                        <label for="password_confirmation">إعادة كلمة المرور  </label>
                        <input id="password_confirmation" class="form-control radius-20" type="password" name="password_confirmation">
                    </div>


                    <button class="btn white-text d-block  w-100 green-bg radius-20 mt-5 mb-3" type="submit">إنشاء حساب</button>
                    <a class="btn  white-text  d-block w-100 fb-bg radius-20 my-3" href="{{ url('auth/facebook') }}"><span class="mx-2 fa fa-facebook-square"></span>تسجيل الدخول بواسطة فيسبوك</a>


                    </form>
             </div>
             <p class="sans-font text-center "><small>Develped By : <a class="non-anchor" href="">Hussam Hammad</a> | <a class="non-anchor" href="https://github.com/Ruba559">Ruba Abd Albaki</a></small></p>
        </div>
    </div>
</div>
@endsection





{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
 --}}
