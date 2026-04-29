@extends('layouts.dashboard')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Liste des Patients</h2>
    @if(in_array(auth()->user()->role, ['admin','reception']))
    <a href="{{ route('patients.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       Ajouter Patient
    </a>
    @endif

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border">
    <input 
        type="text" 
        id="searchInput"
        placeholder="Search patient : name / id / service"
        class="mb-4 w-full p-2 border rounded-lg"
    />
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nom</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Telephone</th>
                @if(in_array(auth()->user()->role, ['admin','reception']))
                <th class="px-4 py-2 border">Actions</th>
                @else
                <th class="px-4 py-2 border">Dossier</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr class="border-t hover:bg-gray-50 transition"
                data-name="{{ strtolower($patient->name) }}"
                data-id="{{ $patient->id }}"
                data-serv="{{ $patient->dossiersMedicaux->first()->service->name ?? null}}">
                <td class="border px-4 py-2">{{ $patient->id }}</td>
                <td class="border px-4 py-2">{{ $patient->name }}</td>
                <td class="border px-4 py-2">{{ $patient->email }}</td>
                <td class="border px-4 py-2">{{ $patient->telephone }}</td>
                @if(in_array(auth()->user()->role, ['admin','reception']))
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
                @else
                    <td class="border px-4 py-2 space-x-2">
                    @if($patient->dossiersMedicaux)
                        <a href="{{ route('dossier.show', $patient->id) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded">
                           Voir
                        </a>
                    @else
                        <a href="{{ route('dossier.show', $patient) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded">
                           Créer
                        </a>
                    @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $patients->links() }}
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        let name = row.getAttribute('data-name');
        let id = row.getAttribute('data-id');
        let serv = row.getAttribute('data-serv');
        if(name.includes(value) || id.includes(value) || serv.includes(value)){
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }

    });
});
</script>

@endsection