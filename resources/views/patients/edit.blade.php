@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-1/2 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Modifier Patient</h2>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Nom</label>
            <input type="text" name="name" class="border p-2 w-full rounded"
                   value="{{ old('name', $patient->name) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Date de naissance</label>
            <input type="date" name="date_naissance" class="border p-2 w-full rounded"
                   value="{{ old('date_naissance', $patient->date_naissance) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Téléphone</label>
            <input type="text" name="phone" class="border p-2 w-full rounded"
                   value="{{ old('phone', $patient->phone) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Adresse</label>
            <input type="text" name="address" class="border p-2 w-full rounded"
                   value="{{ old('address', $patient->address) }}">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection