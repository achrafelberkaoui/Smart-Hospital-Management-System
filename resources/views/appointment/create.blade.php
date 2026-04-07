@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6">
        {{ isset($appointment) ? 'Edit Appointment' : 'Create Appointment' }}
    </h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ isset($appointment) ? route('appointments.update',$appointment) : route('appointments.store') }}">
        @csrf
        @if(isset($appointment)) @method('PUT') @endif

        <!-- Patient -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Patient</label>
            <select name="patient_id" class="w-full border p-2 rounded">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}"
                        {{ (isset($appointment) && $appointment->patient_id==$patient->id) ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Doctor -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Doctor</label>
            <select name="doctor_id" class="w-full border p-2 rounded">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}"
                        {{ (isset($appointment) && $appointment->doctor_id==$doctor->id) ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Service -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Service</label>
            <select name="service_id" class="w-full border p-2 rounded">
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
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block mb-1 font-semibold">Date</label>
                <input type="date" name="date"
                       value="{{ $appointment->date ?? old('date') }}"
                       class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Time</label>
                <input type="time" name="time"
                       value="{{ $appointment->time ?? old('time') }}"
                       class="w-full border p-2 rounded">
            </div>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <a href="{{ route('appointments.index') }}"
               class="text-gray-600">← Back</a>

            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                {{ isset($appointment) ? 'Update' : 'Create' }}
            </button>
        </div>

    </form>

</div>

@endsection