@extends('layouts.dashboard')

@section('content')
<div class="max-w-xl mx-auto">

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold text-blue-600 mb-6">
            ➕ Ajouter Service
        </h2>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label class="block text-sm font-semibold mb-1">
                    Nom du Service
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Ex: Cardiologie"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">

                <a href="{{ route('services.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Retour
                </a>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                    Enregistrer
                </button>

            </div>
        </form>

    </div>

</div>
@endsection