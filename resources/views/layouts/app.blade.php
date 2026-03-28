<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Smart Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <!-- Logo -->
            <a href="/" class="text-2xl font-bold text-blue-600">
                🏥 Smart Hospital
            </a>

            <!-- Links -->
            <div class="hidden md:flex items-center space-x-6">

                <a href="/" class="text-gray-600 hover:text-blue-600 transition">
                    Home
                </a>

                @auth
                <a href="/dashboard"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Dashboard
                </a>
                @endauth

                <!-- Guest -->
                @guest
                <a href="/login"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Login
                </a>

                <a href="/signup"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                    Sign up
                </a>
                @endguest

                <!-- Auth -->
                @auth
                <div class="flex items-center space-x-3">

                    <!-- User name -->
                    <span class="text-gray-700 font-medium">
                        {{ Auth::user()->name }}
                    </span>

                    <!-- Role badge -->
                    <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs">
                        {{ Auth::user()->role }}
                    </span>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>

                </div>
                @endauth

            </div>

            <!-- Mobile button -->
            <div class="md:hidden">
                <button onclick="toggleMenu()" class="text-gray-600">
                    ☰
                </button>
            </div>

        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden px-6 pb-4">

            <a href="/" class="block py-2 text-gray-600">Home</a>

            @auth
            <a href="/dashboard" class="block py-2 text-gray-600">Dashboard</a>
            @endauth

            @guest
            <a href="/login" class="block py-2 text-gray-600">Login</a>
            <a href="/signup" class="block py-2 text-blue-600">Sign up</a>
            @endguest

            @auth
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button class="w-full bg-red-600 text-white py-2 rounded">
                    Logout
                </button>
            </form>
            @endauth

        </div>

    </nav>

    <!-- CONTENT -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white text-center py-4 text-gray-500 text-sm shadow-inner">
        © {{ date('Y') }} Smart Hospital - All rights reserved
    </footer>

    <!-- JS -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>