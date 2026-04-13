@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto mt-10 px-4">

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <!-- TITLE -->
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            {{ isset($appointment) ? '✏️ Edit Appointment' : '➕ Create Appointment' }}
        </h2>

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

        <!-- FORM -->
        <form method="POST"
              action="{{ isset($appointment) ? route('appointments.update',$appointment) : route('appointments.store') }}"
              class="space-y-5">
            @csrf
            @if(isset($appointment)) @method('PUT') @endif

            <!-- Patient -->
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Patient</label>
                <select name="patient_id"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}"
                            {{ (isset($appointment) && $appointment->patient_id==$patient->id) ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Doctor -->
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Doctor</label>
                <select name="doctor_id"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}"
                            {{ (isset($appointment) && $appointment->doctor_id==$doctor->id) ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Service -->
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Service</label>
                <select name="service_id"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Optional --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}"
                            {{ (isset($appointment) && $appointment->service_id==$service->id) ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date + Time -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Date</label>
                    <input type="date" name="date"
                        value="{{ old('date', $appointment->date ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Time</label>
                    <select name="time" class="w-full border p-2 rounded-lg">
                        @foreach($slots as $slot)
                            <option value="{{ $slot }}"
                                @if(isset($taken) && in_array($slot, $taken)) disabled @endif
                                @if(isset($appointment) && $appointment->time == $slot) selected @endif>
                                {{ $slot }} @if(isset($taken) && in_array($slot, $taken)) (Taken) @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Status</label>
                <select name="status"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
                    <option value="pending" {{ old('status', $appointment->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $appointment->status ?? '') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ old('status', $appointment->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status', $appointment->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- BUTTONS -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('appointments.index') }}"
                   class="text-gray-500 hover:text-gray-700 transition">
                    ← Back
                </a>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition">
                    {{ isset($appointment) ? 'Update' : 'Create' }}
                </button>
            </div>

        </form>

    </div>

</div>

@endsection