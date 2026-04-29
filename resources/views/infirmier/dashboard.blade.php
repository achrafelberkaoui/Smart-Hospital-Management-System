@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard Infirmier</h1>
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
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

    <div class="bg-white p-4 rounded-xl shadow">
        <h2 class="text-gray-500 text-sm">Patients</h2>
        <p class="text-2xl font-bold">{{ $patients->count() }}</p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <h2 class="text-gray-500 text-sm">Service</h2>
        <p class="text-xl font-bold">
            {{ auth()->user()->service->name ?? 'Aucun' }}
        </p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <h2 class="text-gray-500 text-sm">Aujourd'hui</h2>
        <p class="text-xl font-bold">
            {{ now()->format('d/m/Y') }}
        </p>
    </div>

</div>

<div class="bg-white shadow rounded-xl p-4">
    <h2 class="text-lg font-bold mb-4">Patients de votre service</h2>

    @forelse($appointments as $appointment)
        <div class="flex justify-between items-center border-b py-3">

            <div>
                <p class="font-semibold">{{ $appointment->patient->name }}</p>
                <p class="text-sm text-gray-500">
                    {{ $appointment->service->name ?? 'aucun' }}
                </p>
            </div>

            <a href="{{ route('dossier.show', $appointment->patient->id) }}"
               class="bg-blue-600 text-white px-4 py-1 rounded-lg">
                Voir
            </a>

        </div>
    @empty
        <p class="text-gray-500">Aucun patient</p>
    @endforelse

</div>

@endsection