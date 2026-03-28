@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">

    <h2 class="text-3xl font-bold text-blue-600 mb-8">
        Admin Dashboard
    </h2>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Patients</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                {{ $patients }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Doctors</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">
                {{ $doctors }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Services</h3>
            <p class="text-3xl font-bold text-purple-600 mt-2">
                {{ $services }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Appointments</h3>
            <p class="text-3xl font-bold text-red-600 mt-2">
                {{ $appointments }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Users</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">
                {{ $users }}
            </p>
        </div>

    </div>

    <!-- Actions -->
    <div class="mt-10 grid md:grid-cols-4 gap-6">

        <a href="{{ route('patients.index') }}"
           class="bg-white p-6 rounded-xl shadow hover:bg-blue-50 transition">
            <h3 class="text-lg font-semibold text-blue-600">Patients</h3>
            <p class="text-gray-500 text-sm">Manage patients</p>
        </a>

        <a href="{{ route('services.index') }}"
           class="bg-white p-6 rounded-xl shadow hover:bg-blue-50 transition">
            <h3 class="text-lg font-semibold text-blue-600">Services</h3>
            <p class="text-gray-500 text-sm">Manage services</p>
        </a>

        <a href="{{ route('users.index') }}"
           class="bg-white p-6 rounded-xl shadow hover:bg-blue-50 transition">
            <h3 class="text-lg font-semibold text-blue-600">Users</h3>
            <p class="text-gray-500 text-sm">Manage users & roles</p>
        </a>

        <a href="#"
           class="bg-white p-6 rounded-xl shadow hover:bg-blue-50 transition">
            <h3 class="text-lg font-semibold text-blue-600">Appointments</h3>
            <p class="text-gray-500 text-sm">Manage appointments</p>
        </a>

    </div>

</div>
@endsection