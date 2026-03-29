@extends('layouts.dashboard')

@section('content')
<div class="max-w-xl mx-auto">

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold text-yellow-500 mb-6">
            ✏️ Modifier Service
        </h2>

        <form action="{{ route('services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-sm font-semibold mb-1">
                    Nom du Service
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $service->name) }}"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-400">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">

                <a href="{{ route('services.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Retour
                </a>

                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg shadow">
                    Mettre à jour
                </button>

            </div>

        </form>

    </div>

</div>
@endsection