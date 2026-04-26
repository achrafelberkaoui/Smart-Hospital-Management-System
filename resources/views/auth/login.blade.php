
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center"
     style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3');
            background-size: cover;
            background-position: center;">

    <div class="w-full max-w-md backdrop-blur-lg bg-white/20 border border-white/30 rounded-2xl shadow-2xl p-8">
        
        <h2 class="text-3xl font-bold text-white text-center mb-6">
            Login
        </h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="text-white text-sm">Email</label>
                <input type="email"
                       class="w-full mt-1 p-3 rounded-lg bg-white/80" name="email"
                       placeholder="email@example.com" value="{{ old('email') }}">
            @error('email')
            <p style="color:red">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label class="text-white text-sm">Password</label>
                <input type="password" name="password"
                       class="w-full mt-1 p-3 rounded-lg bg-white/80"
                       placeholder="••••••••">
            </div>

            <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">
                Login
            </button>
        </form>

        <p class="text-center text-white mt-6 text-sm">
            Don’t have an account?
            <a href="{{ route('register') }}" class="underline">Sign up</a>
        </p>
    </div>
</div>
@endsection