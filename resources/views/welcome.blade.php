
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('mylogo.png') }}">

</head>

<body class="relative text-white flex flex-col items-center justify-center min-h-screen p-6 overflow-hidden">
    
    <div class="absolute inset-0 animate-gradient bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 z-0"></div>
    
    <div class="relative z-10 min-h-screen flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl font-bold mb-2 animate__animated animate__fadeInDown">Welcome to Event Manager 🎉</h1>
        <p class="mb-6 text-xl animate__animated animate__fadeInUp">Navigate the platform:</p>

        <div class="flex space-x-6 animate__animated animate__fadeInUp">
            <a href="{{ route('events.index') }}" class="bg-white bg-opacity-80 shadow-md rounded-lg p-6 hover:bg-blue-200 transition transform hover:scale-105">
                <div class="text-blue-600 text-2xl">📅</div>
                <div class="text-black mt-2 font-semibold">All Events</div>
            </a>
            <a href="{{ route('events.create') }}" class="bg-white bg-opacity-80 shadow-md rounded-lg p-6 hover:bg-green-200 transition transform hover:scale-105">
                <div class="text-green-600 text-2xl">✏️</div>
                <div class="text-black mt-2 font-semibold">Create Event</div>
            </a>
            <a href="{{ route('bookings.index') }}" class="bg-white bg-opacity-80 shadow-md rounded-lg p-6 hover:bg-red-200 transition transform hover:scale-105">
                <div class="text-red-600 text-2xl">📌</div>
                <div class="text-black mt-2 font-semibold">My Bookings</div>
            </a>
        </div>
    </div>
    
    <style>
        @keyframes gradientBG {
            0% { background-position: 3% 10%; }
            20% { background-position: 100% 50%; }
            10% { background-position: 0% 50%; }
        }

        .animate-gradient {
            background-size: 300% 100%;
            animation: gradientBG 10s ease infinite;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</body>

</html>