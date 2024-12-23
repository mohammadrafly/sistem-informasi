@extends('layouts.app')

@section('content')
    <div class="container max-w-md">
        <h1 class="text-2xl font-bold text-white">
            Welcome, {{ Auth::user()->name }}
        </h1>
        <p class="text-gray-400 mt-4">
            Technify is a powerful and intuitive field service management platform designed to help businesses optimize their operations. With easy task scheduling, real-time tracking, and seamless communication, Technify empowers service teams to deliver outstanding customer experiences.
        </p>
    </div>
@endsection
