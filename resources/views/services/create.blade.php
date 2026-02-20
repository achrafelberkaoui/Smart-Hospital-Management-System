@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-1/2 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Ajouter Service</h2>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Nom du Service</label>
            <input type="text" name="name" class="border p-2 w-full rounded" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection