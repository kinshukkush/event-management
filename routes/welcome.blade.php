<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-black flex flex-col items-center justify-center min-h-screen p-6">
    <div class="min-h-screen flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl font-bold mb-2">Welcome to Event Manager 🎉</h1>
        <p class="mb-6 text-lg">Navigate the platform:</p>

        <div class="flex space-x-6 animate-bounce">
            <a href="{{ route('events.index') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-blue-100 transition">
                <div class="text-blue-600 text-2xl">📅</div>
                <div class="text-black mt-2">All Events</div>
            </a>
            <a href="{{ route('events.create') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-green-100 transition">
                <div class="text-green-600 text-2xl">✏️</div>
                <div class="text-black mt-2">Create Event</div>
            </a>
            <a href="{{ route('bookings.index') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-red-100 transition">
                <div class="text-red-600 text-2xl">📌</div>
                <div class="text-black mt-2">My Bookings</div>
            </a>
        </div>
    </div>
</body>
</html>
