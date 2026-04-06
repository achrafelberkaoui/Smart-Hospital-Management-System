@extends('layouts.app')

@section('content')
<h1>Appointments</h1>

<a href="{{ route('appointments.create') }}">Create New Appointment</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->patient->name }}</td>
            <td>{{ $appointment->doctor->name }}</td>
            <td>{{ $appointment->service->name ?? '-' }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->status }}</td>
            <td>
                <a href="{{ route('appointments.edit', $appointment) }}">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $appointments->links() }}
@endsection