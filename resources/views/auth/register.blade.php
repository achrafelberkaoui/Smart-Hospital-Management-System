@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        
        <h2 class="text-3xl font-bold text-center mb-6 text-blue-600">
            Create Account
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="text-sm font-medium">Full Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-500"
                       placeholder="John Doe">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-500"
                       placeholder="email@example.com">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium">Date de naissance</label>
                <input type="date"
                       name="birth_date"
                       value="{{ old('birth_date') }}"
                       class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-500">
                @error('birth_date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium">Password</label>
                <input type="password"
                       name="password"
                       class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-500"
                       placeholder="••••••••">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="text-sm font-medium">Confirmation</label>
                <input type="password"
                       name="password_confirmation"
                       class="w-full mt-1 p-3 rounded-lg border focus:ring-2 focus:ring-blue-500"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                Sign Up
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6 text-sm">
            Already have an account?
            <a href="/login" class="text-blue-600 underline">Login</a>
        </p>
    </div>
</div>
@endsection