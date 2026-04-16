@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Dossier Médical</h1>

    <div class="bg-white shadow rounded-xl p-4 mb-6">
        <h2 class="text-lg font-semibold mb-2">Patient</h2>
        <p><b>Name:</b> {{ $patient->name }}</p>
        <p><b>Email:</b> {{ $patient->email }}</p>
    </div>

    @if($patient->dossierMedical)
        <div class="bg-white shadow rounded-xl p-4 mb-4">
            <h2 class="font-semibold mb-2">Diagnostic</h2>
            <p>{{ $patient->dossierMedical->diagnostic }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-4 mb-4">
            <h2 class="font-semibold mb-2">Traitement</h2>
            <p>{{$patient->dossierMedical->traitement }}</p>
        </div>

        <a href="{{ route('dossier.edit',$patient->dossierMedical->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
            Edit
        </a>
    @else
        <div class="bg-gray-100 p-4 rounded mb-4">
            Aucun dossier trouvé.
        </div>

        <a href="{{ route('dossier.create', $patient->id ) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Créer Dossier
        </a>
    @endif

</div>
@endsection