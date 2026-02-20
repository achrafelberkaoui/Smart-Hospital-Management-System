@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-1/2 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Ajouter Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Nom</label>
            <input type="text" name="name" class="border p-2 w-full rounded" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="border p-2 w-full rounded">
            @error('email')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Téléphone</label>
            <input type="text" name="telephone" class="border p-2 w-full rounded">
            @error('telephone')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection