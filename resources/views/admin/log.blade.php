@extends('layouts.dashboard')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">System Logs</h1>

    <div class="bg-white shadow rounded-xl overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3">User</th>
                    <th class="p-3">Action</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">
                        {{ $log->user->name }}
                    </td>
                    <td class="p-3">
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                            {{ $log->action }}
                        </span>
                    </td>
                    <td class="p-3">
                        {{ $log->description }}
                    </td>

                    <td class="p-3">
                        {{ $log->created_at->format('Y-m-d H:i') }}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>

</div>

@endsection