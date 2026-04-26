@extends('layouts.dashboard')

@section('content')
<div class="max-w-2xl mx-auto">
        <!-- ERRORS -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold text-blue-600 mb-6">
            ✏️ Edit User
        </h2>

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <!-- NAME -->
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- ROLE -->
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Role</label>
                <select name="role"
                        class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500">

                    <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                    <option value="doctor" {{ $user->role=='doctor'?'selected':'' }}>Doctor</option>
                    <option value="infirmier" {{ $user->role=='infirmier'?'selected':'' }}>Infirmier</option>
                    <option value="reception" {{ $user->role=='reception'?'selected':'' }}>Reception</option>
                    <option value="user" {{ $user->role=='user'?'selected':'' }}>User</option>

                </select>
            </div>

            <!-- SERVICES -->
            <div class="mb-5">
                <p class="font-semibold mb-2">Services</p>

                <div class="grid grid-cols-2 gap-2">
                    @foreach($services as $service)
                        <label class="flex items-center space-x-2 bg-gray-100 p-2 rounded hover:bg-gray-200">
                            <input type="radio"
                                   name="service"
                                   value="{{ $service->id }}"
                                   {{ $user->service && $user->service->id == $service->id ? 'checked' : '' }}>
                            <span>{{ $service->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="flex justify-between">

                <a href="{{ route('users.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Back
                </a>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>
@endsection