@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-6">Mes Observations</h1>

@foreach($observations as $obs)
<div class="bg-white p-4 mb-3 rounded shadow">

    <div class="text-sm text-gray-500 mb-1">
        {{ $obs->created_at->format('d/m/Y H:i') }}
    </div>

    <p><b>{{ $obs->type }}</b>: {{ $obs->value }}</p>
    <p>{{ $obs->note }}</p>

</div>
@endforeach

@endsection