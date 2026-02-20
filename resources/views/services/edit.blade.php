@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-1/2 mx-auto">
    <h2 class="text-2xl font-bold mb-4">Modifier Service</h2>

    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Nom du Service</label>
            <input type="text" name="name" class="border p-2 w-full rounded"
                   value="{{ old('name', $service->name) }}">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection