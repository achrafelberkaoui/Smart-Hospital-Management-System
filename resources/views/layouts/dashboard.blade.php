<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Smart Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-700 text-white p-6 hidden md:block">

        <h2 class="text-2xl font-bold mb-8">
        <!-- Logo -->
            <a href="/" class="flex items-center text-2xl font-bold text-blue-600 gap-2">
                <img src="{{ asset('images/logo.jfif') }}" alt="CHP Logo" class="h-10 w-10 object-contain">
                <span>SHMS CHP</span>
            </a>
        </h2>

        <nav class="space-y-4">

            <a href="/dashboard" class="block hover:bg-blue-600 p-2 rounded">
                Dashboard
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="block hover:bg-blue-600 p-2 rounded">
                    Users
                </a>

                <a href="{{ route('services.index') }}" class="block hover:bg-blue-600 p-2 rounded">
                    Services
                </a>
            @endif

            @if(in_array(auth()->user()->role, ['admin','reception']))
                <a href="{{ route('patients.index') }}" class="block hover:bg-blue-600 p-2 rounded">
                    Patients
                </a>
            @endif

            <a href=" {{ route('appointments.index')}}" class="block hover:bg-blue-600 p-2 rounded">
                Appointments
            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">

            <h1 class="font-semibold text-lg">
                Welcome, {{ auth()->user()->name }}
            </h1>

            <div class="flex items-center space-x-4">

                <span class="bg-gray-200 px-2 py-1 rounded text-sm">
                    {{ auth()->user()->role }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-600 text-white px-3 py-1 rounded">
                        Logout
                    </button>
                </form>

            </div>

        </header>

        <!-- CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>