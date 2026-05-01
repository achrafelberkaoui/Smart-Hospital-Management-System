@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-6">Mes Observations</h1>

    @foreach($observations as $obs)
    <div class="bg-white p-4 mb-4 rounded-xl shadow hover:shadow-md transition">

        <div class="flex justify-between text-sm text-gray-500 mb-2">
            <span>
        {{$obs->dossier->patient->name ??'Unknown' }}        
        </span>
        <span>
            {{ $obs->created_at->format('d/m/Y H:i') }}
        </span>
    </div>

    <div class="mb-2">
        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
            {{ $obs->type }}
        </span>
    </div>

    <p class="font-semibold text-lg">{{ $obs->value }}</p>

    @if($obs->note)
        <p class="text-gray-600 mt-2">{{ $obs->note }}</p>
    @endif

</div>
@endforeach

@endsection