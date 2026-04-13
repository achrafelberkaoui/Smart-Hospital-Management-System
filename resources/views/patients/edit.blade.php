@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-1/2 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Modifier Patient</h2>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')
@if(session('error'))
    <p class="bg-red-100 text-red-700 p-2 rounded mb-2">
        {{ session('error') }}
    </p>
@endif

@if(session('success'))
    <p class="bg-green-100 text-green-700 p-2 rounded mb-2">
        {{ session('success') }}
    </p>
@endif


@if($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <div class="mb-4">
            <label class="block font-semibold">Nom</label>
            <input type="text" name="name" class="border p-2 w-full rounded"
                   value="{{ old('name', $patient->name) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Téléphone</label>
            <input type="text" name="telephone" class="border p-2 w-full rounded"
                   value="{{ old('phone', $patient->telephone) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="text" name="email" class="border p-2 w-full rounded"
                   value="{{ old('email', $patient->email) }}">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection