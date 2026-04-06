@extends('layouts.app')

@section('content')
<h1>{{ isset($appointment) ? 'Edit' : 'Create' }} Appointment</h1>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ isset($appointment) ? route('appointments.update', $appointment) : route('appointments.store') }}" method="POST">
    @csrf
    @if(isset($appointment))
        @method('PUT')
    @endif

    <label>Patient:</label>
    <select name="patient_id">
        <option value="">Select patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ (isset($appointment) && $appointment->patient_id == $patient->id) ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select><br>

    <label>Doctor:</label>
    <select name="doctor_id">
        <option value="">Select doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" {{ (isset($appointment) && $appointment->doctor_id == $doctor->id) ? 'selected' : '' }}>
                {{ $doctor->name }}
            </option>
        @endforeach
    </select><br>

    <label>Service:</label>
    <select name="service_id">
        <option value="">Select service</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}" {{ (isset($appointment) && $appointment->service_id == $service->id) ? 'selected' : '' }}>
                {{ $service->name }}
            </option>
        @endforeach
    </select><br>

    <label>Date:</label>
    <input type="date" name="date" value="{{ $appointment->date ?? old('date') }}"><br>

    <label>Time:</label>
    <input type="time" name="time" value="{{ $appointment->time ?? old('time') }}"><br>

    <label>Status:</label>
    <select name="status">
        <option value="pending" {{ (isset($appointment) && $appointment->status == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ (isset($appointment) && $appointment->status == 'confirmed') ? 'selected' : '' }}>Confirmed</option>
        <option value="cancelled" {{ (isset($appointment) && $appointment->status == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
        <option value="completed" {{ (isset($appointment) && $appointment->status == 'completed') ? 'selected' : '' }}>Completed</option>
    </select><br><br>

    <button type="submit">{{ isset($appointment) ? 'Update' : 'Create' }}</button>
</form>

<a href="{{ route('appointments.index') }}">Back to list</a>
@endsection