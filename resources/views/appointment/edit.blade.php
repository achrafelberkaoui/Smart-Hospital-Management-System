@extends('layouts.dashboard')

@section('content')

<div class="max-w-4xl mx-auto mt-10 px-4">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Edit Appointment
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
              action="{{ route('appointments.update', $appointment) }}"
              class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Patient</label>
                <select name="patient_id" class="w-full border p-2 rounded-lg">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}"
                            {{ $appointment->patient_id == $patient->id ? 'selected':'' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="doctor_id" id="doctor_select" class="w-full border p-2 rounded-lg">

            @if(auth()->user()->role === 'doctor')
                    <option value="{{ auth()->id() }}"
                        data-service="{{ auth()->user()->service_id }}"
                        data-service-name="{{ auth()->user()->service->name }}">
                        {{ auth()->user()->name }}
                    </option>
                @else
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}"
                            data-service="{{ $doctor->service_id }}"
                            data-service-name="{{ $doctor->service->name }}"
                            {{ old('doctor_id', $appointment->doctor_id ?? '') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach

                @endif
                </select>
            </div>

            <div>
              <label class="block mb-1 font-semibold text-gray-700">Service</label>
              <input type="text" id="service_name"
                  class="w-full border p-2 rounded-lg bg-gray-100"
                  readonly>            
            </div>
                <input type="hidden" name="service_id" id="service_id">


            <div>
                <label class="block mb-1 font-semibold text-gray-700">Date</label>
                <input type="date" name="date"
                    value="{{ old('date', $appointment->date) }}"
                    class="w-full border p-2 rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Time</label>
                <select name="time" class="w-full border p-2 rounded-lg">
                    @foreach($slots as $slot)
                        <option value="{{ $slot }}"
                            {{ $appointment->time == $slot ? 'selected' : '' }}>
                            {{ $slot }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Status</label>
                <select name="status" class="w-full border p-2 rounded-lg">
                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                Update
            </button>

        </form>

    </div>

</div>

<script>
function updateService() {
    let select= document.getElementById('doctor_select');
    let selected = select.options[select.selectedIndex];
    let serviceId = selected.getAttribute('data-service');
    let serviceName= selected.getAttribute('data-service-name');
    document.getElementById('service_id').value = serviceId;
    document.getElementById('service_name').value = serviceName;
}
document.getElementById('doctor_select').addEventListener('change', updateService);
updateService();
</script>

@endsection