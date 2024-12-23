@extends('layouts.app')

@section('content')

<div class="md:min-w-[500px] md:min-h-[500px] rounded-md p-5 bg-gray-900">
    <div class="text-center p-5">
        <h1 class="uppercase font-bold text-3xl">{{ env('APP_NAME') }}</h1>
        <p>Log in to your account.</p>
        @include('components.message')
    </div>
    <div class="p-5">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="space-y-2">
                <label for="email">Email</label>
                <input type="email" class="py-2 px-2 text-white font-bold w-full rounded-md bg-black @error('email') border border-red-500 @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2 mt-5">
                <label for="password">Password</label>
                <input type="password" class="py-2 px-2 text-white font-bold w-full rounded-md bg-black @error('password') border border-red-500 @enderror" name="password" id="password" placeholder="****************">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            @if ($errors->has('email'))
                <div class="mt-2">
                    <p class="text-red-500 text-sm">{{ $errors->first('email') }}</p>
                </div>
            @endif
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 transition-colors duration-300 w-full mt-5 rounded-md py-3 text-white font-bold">Sign In</button>
        </form>
        <div class="mt-5 flex justify-between">
            <div>
                <label>
                    <input type="checkbox" name="remember" id="remember-me" />
                    Remember me
                </label>
            </div>
            <a href="{{ route('page.forgot-password') }}" class="hover:text-sky-700 transition-colors duration-300">Forgot Password?</a>
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('page.register') }}">Don't have an account? <span class="text-sky-500 hover:text-sky-700 transition-colors duration-300">Register</span></a>
        </div>
    </div>
</div>

@endsection
