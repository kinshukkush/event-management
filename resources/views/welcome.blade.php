<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" type="image/png" href="{{ asset('mylogo.png') }}">
</head>

<body class="relative text-white flex flex-col items-center justify-center min-h-screen p-6 overflow-hidden bg-gray-900">
    
    <div class="absolute inset-0 animate-gradient bg-gradient-to-br from-pink-600 via-purple-700 to-indigo-800 z-0 opacity-90"></div>
    
    <div class="relative z-10 min-h-screen flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 animate__animated animate__fadeInDown text-white drop-shadow-lg">
            Welcome to Event Manager 🎉
        </h1>
        <p class="mb-10 text-xl md:text-2xl animate__animated animate__fadeInUp text-gray-100">
            Manage and discover amazing events
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate__animated animate__fadeInUp max-w-4xl w-full">
            <a href="{{ route('events.index') }}" class="bg-gray-800 bg-opacity-90 backdrop-blur-sm shadow-2xl rounded-2xl p-8 hover:bg-gray-700 transition transform hover:scale-110 hover:shadow-pink-500/50 border border-gray-700">
                <div class="text-blue-400 text-5xl mb-4">📅</div>
                <div class="text-white text-lg font-bold">All Events</div>
                <p class="text-gray-300 text-sm mt-2">Browse upcoming events</p>
            </a>
            <a href="{{ route('events.create') }}" class="bg-gray-800 bg-opacity-90 backdrop-blur-sm shadow-2xl rounded-2xl p-8 hover:bg-gray-700 transition transform hover:scale-110 hover:shadow-green-500/50 border border-gray-700">
                <div class="text-green-400 text-5xl mb-4">✏️</div>
                <div class="text-white text-lg font-bold">Create Event</div>
                <p class="text-gray-300 text-sm mt-2">Host your own event</p>
            </a>
            <a href="{{ route('bookings.index') }}" class="bg-gray-800 bg-opacity-90 backdrop-blur-sm shadow-2xl rounded-2xl p-8 hover:bg-gray-700 transition transform hover:scale-110 hover:shadow-red-500/50 border border-gray-700">
                <div class="text-red-400 text-5xl mb-4">🎫</div>
                <div class="text-white text-lg font-bold">My Bookings</div>
                <p class="text-gray-300 text-sm mt-2">View your bookings</p>
            </a>
        </div>

        <div class="mt-12 animate__animated animate__fadeIn animate__delay-1s">
            @guest
                <a href="{{ route('login') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-lg shadow-lg transition transform hover:scale-105 font-semibold text-lg">
                    Get Started →
                </a>
            @endguest
        </div>
    </div>
    
    <style>
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-gradient {
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
    </style>

</body>
</html>
