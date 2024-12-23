@extends('layouts.app')

@section('content')

<div class="md:min-w-[500px] md:min-h-[500px] rounded-md p-5 bg-gray-900">
    <div class="text-center p-5">
        <h1 class="uppercase font-bold text-3xl">{{ env('APP_NAME') }}</h1>
        <p>Create your account.</p>
        @include('components.message')
    </div>
    <div class="p-5">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="space-y-2">
                <label for="name">Name</label>
                <input type="text" class="py-2 px-2 text-white font-bold w-full rounded-md bg-black @error('name') border border-red-500 @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2 mt-5">
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
            <div class="space-y-2 mt-5">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="py-2 px-2 text-white font-bold w-full rounded-md bg-black @error('password_confirmation') border border-red-500 @enderror" name="password_confirmation" id="password_confirmation" placeholder="****************">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 transition-colors duration-300 w-full mt-5 rounded-md py-3 text-white font-bold">Register</button>
        </form>
        <div class="mt-10 text-center">
            <a href="{{ route('page.login') }}">Already have an account? <span class="text-sky-500 hover:text-sky-700 transition-colors duration-300">Login</span></a>
        </div>
    </div>
</div>

@endsection
