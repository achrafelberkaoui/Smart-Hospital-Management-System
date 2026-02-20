<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Smart Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen">

    <!-- Header -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Smart Hospital</h1>

        <div class="space-x-4">
            <a href="/" class="text-gray-600 hover:text-blue-600">Home</a>
            @if(!Auth::user())
            <a href="/login" class="text-gray-600 hover:text-blue-600">Login</a>
            <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                Sign up
            </a>
            @endif
            @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>

    <!-- Page content -->
    @yield('content')

</body>
</html>