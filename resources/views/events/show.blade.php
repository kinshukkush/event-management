@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-4">
    <a href="{{ route('events.index') }}" class="inline-block mb-6 text-pink-400 hover:text-pink-300 font-medium">&larr; Back to Events</a>

    <div class="bg-gray-800 rounded-lg shadow-xl p-8 border border-gray-700">
        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-64 object-cover rounded-lg mb-6 border-2 border-gray-700">
        @endif

        <h2 class="text-3xl font-semibold text-white mb-4">{{ $event->title }}</h2>
        <p class="text-gray-300 mb-6 text-lg">{{ $event->description }}</p>

        <ul class="space-y-3 mb-6 text-gray-200">
            <li class="flex items-center"><strong class="text-pink-400 mr-2">📍 Location:</strong> {{ $event->location }}</li>
            <li class="flex items-center"><strong class="text-pink-400 mr-2">📅 Date:</strong> {{ $event->date }}</li>
            <li class="flex items-center"><strong class="text-pink-400 mr-2">⏰ Time:</strong> {{ $event->time }}</li>
            <li class="flex items-center"><strong class="text-pink-400 mr-2">👥 Capacity:</strong> {{ $event->capacity }}</li>
        </ul>

        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
            <a href="{{ route('events.edit', $event) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg shadow-lg transition transform hover:scale-105">✏️ Edit</a>

            <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow-lg transition transform hover:scale-105">🗑️ Delete</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-600 text-white p-4 rounded-lg mb-4 shadow-lg">✅ {{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="bg-red-600 text-white p-4 rounded-lg mb-4 shadow-lg">❌ {{ session('error') }}</div>
        @endif

        <div class="mt-6 p-6 bg-gray-700 rounded-lg">
            @auth
                @if($event->bookings->where('user_id', auth()->id())->count())
                    <form action="{{ route('bookings.destroy', $event->bookings->where('user_id', auth()->id())->first()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white hover:bg-red-600 px-6 py-3 rounded-lg shadow-lg w-full transition transform hover:scale-105">❌ Cancel My Booking</button>
                    </form>
                @else
                    <form action="{{ route('events.book', $event) }}" method="POST">
                        @csrf
                        <button class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg shadow-lg w-full transition transform hover:scale-105">🎫 Book This Event</button>
                    </form>
                @endif

                <p class="mt-4 text-sm text-gray-300 text-center">
                    <strong>Booked:</strong> {{ $event->bookings->count() }} / {{ $event->capacity }}
                </p>
            @else
                <p class="text-blue-400 mt-4 text-center">
                    Please <a href="{{ route('login') }}" class="underline font-semibold hover:text-blue-300">login</a> to book this event.
                </p>
            @endauth
        </div>
    </div>
</div>
@endsection
