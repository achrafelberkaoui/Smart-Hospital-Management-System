@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center"
     style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3');
            background-size: cover;
            background-position: center;">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-blue-600 mb-4">
            Smart Hospital Management System
        </h2>
        <p class="text-black-600 mb-6">
            Manage patients, doctors, and appointments بسهولة واحترافية.
        </p>

        <a href="/login"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
            Get Started
        </a>
    </div>
</div>
@endsection