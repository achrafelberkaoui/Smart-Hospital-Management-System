@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Modifier Dossier</h1>

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
    <div class="bg-white shadow rounded-xl p-4 mb-6">
        <h2 class="text-lg font-semibold mb-2">Patient</h2>
        <p><b>Name:</b> {{ $dossier->patient->name }}</p>
        <p><b>Email:</b> {{ $dossier->patient->email }}</p>
    </div>
    <form method="POST" action="{{ route('dossier.update', $dossier->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="patient_id" value="{{ $dossier->patient->id }}">
        <div class="mb-4">
            <label class="block font-semibold mb-1">Diagnostic</label>
            <textarea name="diagnostic" class="w-full border p-3 rounded-lg">
            {{ $dossier->diagnostic }}
            </textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">traitement</label>
            <textarea name="traitement" class="w-full border p-3 rounded-lg">
             {{ $dossier->traitement}}
            </textarea>
        </div>

        <button class="bg-green-600 text-white px-5 py-2 rounded-lg">
            Update
        </button>
    </form>

</div>
@endsection