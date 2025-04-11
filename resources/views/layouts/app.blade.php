<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('mylogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body id="body" class="bg-gray-100 text-gray-800 min-h-screen flex flex-col transition duration-300 ease-in-out">
    <!-- Dark Mode Toggle -->
    <button id="darkToggle" 
            class="fixed right-5 top-24 z-50 p-3 bg-white text-gray-800 shadow-lg rounded-full hover:scale-105 transition"
            title="Toggle Dark Mode">
        <i id="themeIcon" class="fas fa-moon"></i>
    </button>

    <!-- Navbar -->
    <nav id="navbar" class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center transition duration-300 ease-in-out">
        <a class="text-2xl font-bold" href="{{ url('/') }}">EventManager</a>
        <div class="space-x-4">
            @auth
                <a href="{{ route('events.index') }}" class="hover:text-pink-500 transition">All Events</a>
                <a href="{{ route('bookings.index') }}" class="hover:text-pink-500 transition">My Bookings</a>
                <a href="{{ route('dashboard') }}" class="hover:text-pink-500 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-pink-500 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-pink-500 transition">Login</a>
                <a href="{{ route('register') }}" class="hover:text-pink-500 transition">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    @if (request()->is('/'))
        <section class="bg-cover bg-center h-[60vh] flex items-center justify-center animate__animated animate__fadeIn" style="background-image: url('https://images.unsplash.com/photo-1551739440-b9f42c5a1cce?auto=format&fit=crop&w=1350&q=80');">
            <div class="text-center bg-black bg-opacity-50 p-10 rounded-lg">
                <h1 class="text-4xl md:text-5xl font-bold text-white animate__animated animate__zoomIn">Plan & Book Amazing Events</h1>
                <p class="text-white mt-4 text-lg">Make your next gathering unforgettable with EventManager</p>
                <a href="{{ route('events.index') }}" class="mt-6 inline-block bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition">Browse Events</a>
            </div>
        </section>
    @endif

    <!-- Main Content -->
    <div class="flex-grow">
        <main class="py-10 px-6 animate__animated animate__fadeInUp">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Dark Mode Script -->
    <script>
        const toggleBtn = document.getElementById("darkToggle");
        const icon = document.getElementById("themeIcon");
        const body = document.getElementById("body");
        const navbar = document.getElementById("navbar");

        function applyDarkMode(isDark) {
            if (isDark) {
                body.classList.remove("bg-gray-100", "text-gray-800");
                body.classList.add("bg-[#1e293b]", "text-gray-100");

                navbar.classList.remove("bg-gray-900");
                navbar.classList.add("bg-[#111827]"); // Darker shade than body

                icon.className = "fas fa-sun";
            } else {
                body.classList.remove("bg-[#1e293b]", "text-gray-100");
                body.classList.add("bg-gray-100", "text-gray-800");

                navbar.classList.remove("bg-[#111827]");
                navbar.classList.add("bg-gray-900");

                icon.className = "fas fa-moon";
            }
        }

        toggleBtn.addEventListener("click", () => {
            const isDark = body.classList.contains("bg-[#1e293b]");
            applyDarkMode(!isDark);
            localStorage.setItem("theme", !isDark ? "dark" : "light");
        });

        window.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme === "dark") {
                applyDarkMode(true);
            }
        });
    </script>
</body>
</html>
