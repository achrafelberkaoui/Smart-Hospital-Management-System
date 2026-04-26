@extends('layouts.dashboard')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-600">
            🏥 Liste des Services
        </h2>

        <a href="{{ route('services.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
           + Ajouter
        </a>
    </div>

    <!-- Success message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg overflow-hidden">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Nom</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($services as $service)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-3">{{ $service->id }}</td>

                    <td class="p-3 font-medium">
                        {{ $service->name }}
                    </td>

                    <td class="p-3 text-center space-x-2">

                        <a href="{{ route('services.edit', $service) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form action="{{ route('services.destroy', $service) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Supprimer ce service ?')">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        Aucun service trouvé
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection