@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Dossier Médical</h1>
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
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
        @if(auth()->user()->role === 'doctor')
        <a href="{{ route('dossier.edit',$patient->dossierMedical->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
            Edit
        </a>
        @endif
        
        <div class="mt-6">
        <h2 class="text-lg font-bold mb-4">Observations</h2>
        @if($patient->dossierMedical->observations !== null)
        @foreach($patient->dossierMedical->observations as $obs)
        <div class="bg-white shadow rounded-xl p-4 mb-4">
            <div class="text-sm text-gray-500">
                <h2 class="text-lg font-bold mb-4"> <b>Infirmier </b>: {{ $obs->user->name }}</h2>
                <p><b>Date</b>:  {{ $obs->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <p><b>{{ $obs->type }}</b>: {{ $obs->value }}</p>
            <p> <b>Observation</b>: {{ $obs->note }}</p>
        </div>
        @endforeach
        @else
        <div class="bg-gray-100 p-4 rounded mb-4">
            Aucun observation trouvé.
        </div>
        @endif
        </div>

        @if(auth()->user()->role === 'infirmier')
    <div class="bg-white shadow rounded-xl p-5 mt-6">
        <h2 class="text-lg font-bold mb-4">Ajouter Observation</h2>

        <form method="POST" action="{{ route('observations.store') }}">
            @csrf

            <input type="hidden" name="dossier_medical_id"
                   value="{{ $patient->dossierMedical->id }}">

            <label for="type" class="text-lg font-bold mb-4">Type</label>
            <input type="text" name="type" class="w-full border p-2 rounded mb-2" placeholder="Type">
            
            <label for="value" class="text-lg font-bold mb-4">Value</label>
            <input type="text" name="value" class="w-full border p-2 rounded mb-2" placeholder="Valeur">
            <textarea name="note" class="w-full border p-2 rounded mb-2" placeholder="Observation"></textarea>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Ajouter
            </button>
        </form 
        @endif

    
    @else
        <div class="bg-gray-100 p-4 rounded mb-4">
            Aucun dossier trouvé.
        </div>
        @if(auth()->user()->role === 'doctor')
        <a href="{{ route('dossier.create', $patient->id ) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Créer Dossier
        </a>
        @endif
    @endif

</div>
@endsection