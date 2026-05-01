@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto p-6 space-y-6">

    <h1 class="text-2xl font-bold">Dossier Médical</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-5">
        <h2 class="text-lg font-semibold mb-2">Patient</h2>
    <p>
            <b>Nom :</b> 
        {{ $patient->name }}
    </p>
    <p>
            <b>Email :</b> 
        {{ $patient->email }}
    </p>
    </div>

    @if($patient->dossiersMedicaux->count())

        @foreach($patient->dossiersMedicaux as $dossier)

            <div class="bg-gray-50 border rounded-xl p-4 space-y-1 text-sm text-gray-600">

                <p>
                    <b>Médecin :</b> 
                    {{ $dossier->doctor->name ?? 'Unknown' }}
                </p>
                <p>
                    <b>Service :</b> 
                    {{ $dossier->service->name ?? 'Unknown' }}
                </p>

                <p>
                    <b>Date :</b> 
                    {{ $dossier->created_at->format('d/m/Y H:i') }}
                </p>

            </div>

            <div class="bg-white shadow rounded-xl p-5">
                <h3 class="font-semibold mb-2">Diagnostic</h3>
                <p class="text-gray-700">{{ $dossier->diagnostic }}</p>
            </div>

            <div class="bg-white shadow rounded-xl p-5">
                <h3 class="font-semibold mb-2">Traitement</h3>
                <p class="text-gray-700">{{ $dossier->traitement }}</p>
            </div>

            @if(auth()->user()->role === 'doctor')
                <a href="{{ route('dossier.create', $patient->id) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">
                    + Nouveau dossier
                </a>
            @endif
                <a href="{{ route('dossier.edit', $dossier->id) }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg">
                    Modifier
                </a>
                
            <div class="mt-6">
                <h2 class="text-lg font-bold mb-3">Observations</h2>

            @if($dossier->observations->count())
            <div class="space-y-3">
                @foreach($dossier->observations as $obs)
                <div class="bg-white shadow rounded-xl p-4">
                <div class="text-xs text-gray-500 mb-2">
                    <b>Infirmier :</b> {{ $obs->user->name }} <br>
                    <b>Date :</b> {{ $obs->created_at->format('d/m/Y H:i') }}
                </div>
                <p class="font-medium">
                    <b>Type :</b> {{ $obs->type }}
                </p>
                <p class="font-medium">
                    <b>Value :</b> {{ $obs->value }}
                </p>
                    <p class="text-gray-600 text-sm mt-1">
                    <b>Observation :</b> {{ $obs->note }}
                    </p>
                </div>
                @endforeach
            </div>
            @else
                    <div class="bg-gray-100 p-3 rounded">
                        Aucune observation trouvée.
                    </div>
                @endif
            </div>

            @if(auth()->user()->role === 'infirmier')
                <div class="bg-white shadow rounded-xl p-5 mt-6">

                    <h2 class="font-bold mb-3">Ajouter observation</h2>

                    <form method="POST" action="{{ route('observations.store') }}" class="space-y-3">
                        @csrf

                        <input type="hidden" name="dossier_medical_id" value="{{ $dossier->id }}">

                        <input type="text" name="type"
                               class="w-full border p-2 rounded"
                               placeholder="Type">

                        <input type="text" name="value"
                               class="w-full border p-2 rounded"
                               placeholder="Valeur">

                        <textarea name="note"
                                  class="w-full border p-2 rounded"
                                  placeholder="Observation"></textarea>

                        <button class="bg-green-600 text-white px-4 py-2 rounded">
                            Ajouter
                        </button>

                    </form>

                </div>
            @endif
            <hr class="my-6">
        @endforeach
    @else
        <div class="bg-gray-100 p-4 rounded">
            Aucun dossier trouvé.
        </div>
        @if(auth()->user()->role === 'doctor')
            <a href="{{ route('dossier.create', $patient->id) }}"
               class="inline-block mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg">
                Créer dossier
            </a>
        @endif
    @endif

</div>
@endsection