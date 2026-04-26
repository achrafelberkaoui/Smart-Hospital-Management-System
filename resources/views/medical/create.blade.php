@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto p-6">

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
    <h1 class="text-2xl font-bold mb-6">Créer Dossier Médical</h1>
    <div class="bg-white shadow rounded-xl p-4 mb-6">
        <h2 class="text-lg font-semibold mb-2">Patient</h2>
        <p><b>Name:</b> {{ $patient->name }}</p>
        <p><b>Email:</b> {{ $patient->email }}</p>
    </div>
    <form method="POST" action="{{ route('dossier.store') }}">
        @csrf

        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
        <div class="mb-4">
            <label class="block font-semibold mb-1">Diagnostic</label>
            <textarea name="diagnostic" class="w-full border p-3 rounded-lg"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Traitement</label>
            <textarea name="traitement" class="w-full border p-3 rounded-lg"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
            Save
        </button>
    </form>

</div>

@endsection