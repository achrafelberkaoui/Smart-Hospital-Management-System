@extends('layouts.dashboard')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-600">
            👥 Users Management
        </h2>
    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg overflow-hidden">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Role</th>
<<<<<<< HEAD
                    <th class="p-3 text-left">Service</th>
=======
                    <th class="p-3 text-left">Services</th>
>>>>>>> feature/services-crud
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $user)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-3 font-medium">
                        {{ $user->name }}
                    </td>

                    <td class="p-3">
                        {{ $user->email }}
                    </td>

                    <!-- ROLE BADGE -->
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-sm
                            @if($user->role=='admin') bg-red-100 text-red-600
                            @elseif($user->role=='doctor') bg-green-100 text-green-600
                            @elseif($user->role=='infirmier') bg-purple-100 text-purple-600
                            @elseif($user->role=='reception') bg-blue-100 text-blue-600
                            @else bg-gray-200 text-gray-700
                            @endif">
                            {{ $user->role }}
                        </span>
                    </td>

                    <!-- SERVICES -->
<<<<<<< HEAD
                    <td class="p-3"> 
                        <span class="bg-gray-200 px-2 py-1 rounded text-xs">
                            {{ $user->service->name ?? 'No service' }}
                        </span>
=======
                    <td class="p-3">
                        @foreach($user->services as $service)
                            <span class="bg-gray-200 px-2 py-1 rounded text-xs">
                                {{ $service->name }}
                            </span>
                        @endforeach
>>>>>>> feature/services-crud
                    </td>

                    <!-- ACTIONS -->
                    <td class="p-3 text-center space-x-2">

                        <a href="{{ route('users.edit', $user) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('users.destroy', $user) }}"
                              class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Delete this user ?')">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        No users found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection