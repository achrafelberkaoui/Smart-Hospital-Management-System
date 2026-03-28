@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Users</h2>

@if(session('success'))
    <p class="text-green-600">{{ session('success') }}</p>
@endif

<table class="w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Services</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>

            <td>
                @foreach($user->services as $service)
                    <span class="bg-gray-200 px-2 rounded">
                        {{ $service->name }}
                    </span>
                @endforeach
            </td>

            <td>
                <a href="{{ route('users.edit', $user) }}"
                   class="bg-yellow-400 px-2 py-1 rounded">
                   Edit
                </a>

                <form method="POST"
                      action="{{ route('users.destroy', $user) }}"
                      class="inline">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-600 text-white px-2 py-1 rounded">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $users->links() }}
</div>
@endsection