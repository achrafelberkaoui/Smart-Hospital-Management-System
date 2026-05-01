@extends('layouts.dashboard')

@section('content')

<div class="p-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Dashboard
    </h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="grid grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-5 rounded-xl shadow">
            <h2 class="text-gray-500 text-sm">Total Appointments</h2>
            <p class="text-2xl font-bold mt-2">{{ $total }}</p>
        </div>

        <div class="bg-yellow-100 p-5 rounded-xl shadow">
            <h2 class="text-yellow-700 text-sm">Pending</h2>
            <p class="text-2xl font-bold mt-2">{{ $pending }}</p>
        </div>

        <div class="bg-green-100 p-5 rounded-xl shadow">
            <h2 class="text-green-700 text-sm">Confirmed</h2>
            <p class="text-2xl font-bold mt-2">{{ $confirmed }}</p>
        </div>
        <div class="bg-green-100 p-5 rounded-xl shadow">
            <h2 class="text-green-700 text-sm">Completed</h2>
            <p class="text-2xl font-bold mt-2">{{ $Completed }}</p>
        </div>

        <div class="bg-blue-100 p-5 rounded-xl shadow">
            <h2 class="text-blue-700 text-sm">Today</h2>
            <p class="text-2xl font-bold mt-2">{{ $today }}</p>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Recent Appointments</h2>

            <a href="{{ route('appointments.index') }}"
               class="text-blue-600 hover:underline">
                View All →
            </a>
        </div>

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3">Patient</th>
                    <th class="p-3">Doctor</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($appointments as $appointment)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium">
                        {{$appointment->patient->name}}
                    </td>
                    <td class="p-3">
                        {{$appointment->doctor->name}}
                    </td>
                    <td class="p-3">
                        {{$appointment->date}} - {{$appointment->time}}
                    </td>
                    <td class="p-3">
                        @if($appointment->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Pending</span>
                        @elseif($appointment->status == 'confirmed')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Confirmed</span>
                        @elseif($appointment->status == 'cancelled')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Cancelled</span>
                        @else
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">Completed</span>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection