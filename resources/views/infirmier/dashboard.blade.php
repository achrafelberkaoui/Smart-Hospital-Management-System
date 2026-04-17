@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard Infirmier</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

    <div class="bg-white p-4 rounded-xl shadow">
        <h2 class="text-gray-500 text-sm">Patients avec dossier</h2>
        <p class="text-2xl font-bold">{{ $patients->count() }}</p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <h2 class="text-gray-500 text-sm">Rôle</h2>
        <p class="text-2xl font-bold">Infirmier</p>
    </div>

</div>

<div class="bg-white shadow rounded-xl p-4">
    <h2 class="text-lg font-bold mb-4">Liste des patients</h2>
    @forelse($patients as $patient)
    <div class="flex justify-between items-center border-b py-3">

        <div>
            <p class="font-semibold">{{ $patient->name }}</p>
            <p class="text-sm text-gray-500">{{ $patient->email }}</p>
        </div>

        <a href="{{ route('dossier.show', $patient->id) }}"
           class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700">
            Voir dossier
        </a>

    </div>

    @empty
        <p class="text-gray-500">Aucun patient trouvé</p>
    @endforelse

</div>

@endsection