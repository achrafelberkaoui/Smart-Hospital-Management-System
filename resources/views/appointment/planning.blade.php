@extends('layouts.dashboard')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">My Planning</h1>
@if($appointments->isEmpty())
    <p>No appointments found</p>
@endif
    @foreach($appointments->groupBy('date') as $date => $dayAppointments)

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-blue-600 mb-2">
                {{ $date }}
            </h2>

            <div class="bg-white shadow rounded-lg">

                @foreach($dayAppointments as $appointment)

                    <div class="flex justify-between p-4 border-b">

                        <div>
                            <p class="font-medium">
                                {{ $appointment->patient->name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $appointment->time }}
                            </p>
                        </div>

                        <div>
                            @if($appointment->status == 'pending')
                                <span class="text-yellow-600">Pending</span>
                            @elseif($appointment->status == 'confirmed')
                                <span class="text-green-600">Confirmed</span>
                            @elseif($appointment->status == 'cancelled')
                                <span class="text-red-600">Cancelled</span>
                            @endif
                        </div>

                    </div>

                @endforeach

            </div>
        </div>

    @endforeach

</div>

@endsection