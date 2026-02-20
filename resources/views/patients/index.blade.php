@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Liste des Patients</h2>

    <a href="{{ route('patients.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       Ajouter Patient
    </a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nom</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Telephone</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td class="border px-4 py-2">{{ $patient->id }}</td>
                <td class="border px-4 py-2">{{ $patient->name }}</td>
                <td class="border px-4 py-2">{{ $patient->email }}</td>
                <td class="border px-4 py-2">{{ $patient->telephone }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('patients.edit', $patient) }}" 
                       class="bg-yellow-400 text-white px-2 py-1 rounded">Modifier</a>

                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded"
                                onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection