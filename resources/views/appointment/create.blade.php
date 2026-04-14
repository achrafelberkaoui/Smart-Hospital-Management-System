@extends('layouts.dashboard')

@section('content')

<div class="max-w-4xl mx-auto mt-10 px-4">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Create Appointment
        </h2>

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

         <form method="POST"
              action="{{ route('appointments.store') }}"
              class="space-y-5">
        
            @csrf
        
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Patient</label>
                <select name="patient_id" class="w-full border p-2 rounded-lg">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div>
                @if(auth()->user()->role === 'doctor')
                <label class="block mb-1 font-semibold text-gray-700">Doctor</label>
                <select name="doctor_id" class="w-full border p-2 rounded-lg">
                        <option value="{{ auth()->id() }}">
                            {{ auth()->user()->name }}
                        </option>
                </select>
                @else
                <label class="block mb-1 font-semibold text-gray-700">Doctor</label>
                <select name="doctor_id" class="w-full border p-2 rounded-lg">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
                @endif
            </div>
        
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Service</label>
                <select name="service_id" class="w-full border p-2 rounded-lg">
                    <option value="">-- Optional --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Date</label>
                <input type="date" name="date"
                    value="{{ old('date') }}"
                    class="w-full border p-2 rounded-lg">
            </div>
        
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Time</label>
                <select name="time" class="w-full border p-2 rounded-lg">
                    @foreach($slots as $slot)
                        <option value="{{ $slot }}">
                            {{ $slot }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Status</label>
                <select name="status" class="w-full border p-2 rounded-lg">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                Create
            </button>
        
        </form>

    </div>

</div>

@endsection