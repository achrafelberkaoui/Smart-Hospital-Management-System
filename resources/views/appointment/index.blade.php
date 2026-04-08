@extends('layouts.app')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Appointments</h1>

        <a href="{{ route('appointments.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + New Appointment
        </a>
    </div>

        <!-- ERRORS -->
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


    <!-- Table -->
    <div class="bg-white shadow rounded-xl overflow-hidden">

        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="p-4">Patient</th>
                    <th class="p-4">Doctor</th>
                    <th class="p-4">Service</th>
                    <th class="p-4">Date</th>
                    <th class="p-4">Time</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($appointments as $appointment)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-4 font-medium">
                        {{ $appointment->patient->name }}
                    </td>

                    <td class="p-4">
                        {{ $appointment->doctor->name }}
                    </td>

                    <td class="p-4">
                        {{ $appointment->service->name ?? '-' }}
                    </td>

                    <td class="p-4">
                        {{ $appointment->date }}
                    </td>

                    <td class="p-4">
                        {{ $appointment->time }}
                    </td>

                    <!-- STATUS BADGE -->
                    <td class="p-4">
                        @if($appointment->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">Pending</span>
                        @elseif($appointment->status == 'confirmed')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Confirmed</span>
                        @elseif($appointment->status == 'cancelled')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">Cancelled</span>
                        @else
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">Completed</span>
                        @endif
                    </td>

                    <!-- ACTIONS -->
                    <td class="p-4 text-center space-x-2">

                        <a href="{{ route('appointments.edit', $appointment) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Edit
                        </a>

                        <form action="{{ route('appointments.destroy', $appointment) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                    onclick="return confirm('Delete?')">
                                Cancel
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $appointments->links() }}
    </div>

</div>

@endsection