@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit User</h2>

<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}" class="border p-2 mb-2 w-full">
    <input type="email" name="email" value="{{ $user->email }}" class="border p-2 mb-2 w-full">

    <!-- ROLE -->
    <select name="role" class="border p-2 mb-4 w-full">
        <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
        <option value="doctor" {{ $user->role=='doctor'?'selected':'' }}>Doctor</option>
        <option value="infirmier" {{ $user->role=='infirmier'?'selected':'' }}>Infirmier</option>
        <option value="reception" {{ $user->role=='reception'?'selected':'' }}>Reception</option>
        <option value="user" {{ $user->role=='user'?'selected':'' }}>User</option>
    </select>

    <!-- SERVICES -->
    <div class="mb-4">
        <p class="font-semibold">Services</p>

        @foreach($services as $service)
            <label class="block">
                <input type="checkbox" name="services[]"
                       value="{{ $service->id }}"
                       {{ $user->services->contains($service->id) ? 'checked' : '' }}>
                {{ $service->name }}
            </label>
        @endforeach
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection