@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-4">
    <a href="{{ route('events.index') }}" class="inline-block mb-6 text-pink-600 hover:underline">&larr; Back to Events</a>

    <div class="bg-white rounded-lg shadow p-6">
        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-64 object-cover rounded mb-6">
        @endif

        <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $event->title }}</h2>
        <p class="text-gray-700 mb-6">{{ $event->description }}</p>

        <ul class="space-y-2 mb-6">
            <li><strong>📍 Location:</strong> {{ $event->location }}</li>
            <li><strong>📅 Date:</strong> {{ $event->date }}</li>
            <li><strong>⏰ Time:</strong> {{ $event->time }}</li>
            <li><strong>👥 Capacity:</strong> {{ $event->capacity }}</li>
        </ul>

        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
            <a href="{{ route('events.edit', $event) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">Edit</a>

            <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">Delete</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <div class="mt-6">
            @auth
                @if($event->bookings->where('user_id', auth()->id())->count())
                    <form action="{{ route('bookings.destroy', $event->bookings->where('user_id', auth()->id())->first()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-100 text-red-700 hover:bg-red-200 px-4 py-2 rounded shadow">Cancel My Booking</button>
                    </form>
                @else
                    <form action="{{ route('events.book', $event) }}" method="POST">
                        @csrf
                        <button class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow">Book This Event</button>
                    </form>
                @endif

                <p class="mt-4 text-sm text-gray-600">
                    Booked: {{ $event->bookings->count() }} / {{ $event->capacity }}
                </p>
            @else
                <p class="text-blue-600 mt-4">
                    Please <a href="{{ route('login') }}" class="underline">login</a> to book this event.
                </p>
            @endauth
        </div>
    </div>
</div>
@endsection
