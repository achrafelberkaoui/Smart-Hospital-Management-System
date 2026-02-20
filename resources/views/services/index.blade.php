@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Liste des Services</h2>

    <a href="{{ route('services.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       Ajouter Service
    </a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nom</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="border px-4 py-2">{{ $service->id }}</td>
                <td class="border px-4 py-2">{{ $service->name }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('services.edit', $service) }}" 
                       class="bg-yellow-400 text-white px-2 py-1 rounded">Modifier</a>

                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
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