@extends('layouts.app')

@section('content')
<div class="min-h-screen relative flex items-center justify-center">

    <!-- Background -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-6">

        @if(session('error'))
            <p class="text-red-400 mb-4 bg-red-900/40 px-4 py-2 rounded">
                {{ session('error') }}
            </p>
        @endif

        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Smart Hospital Management System
        </h1>

        <p class="text-gray-200 mb-8 max-w-xl mx-auto">
            Manage patients, doctors, appointments and hospital services
            in one powerful platform.
        </p>

        @if(!Auth::user())

            <a href="/login"
               class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-3 rounded-xl font-semibold shadow-lg">
                Get Started
            </a>

        @else

            <a href="/dashboard"
               class="bg-green-600 hover:bg-green-700 transition text-white px-8 py-3 rounded-xl font-semibold shadow-lg">
                Go to Dashboard
            </a>

        @endif

    </div>

</div>
@endsection