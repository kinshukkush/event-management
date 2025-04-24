@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-8 px-4">
    <h2 class="text-3xl font-semibold mb-6 text-gray-1000">Upcoming Events</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('events.create') }}" class="inline-block bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow transition">
            + Create New Event
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($events as $event)
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="h-48 w-full object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image Available</span>
                </div>
            @endif
            <div class="p-4 flex flex-col justify-between flex-grow">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                    <p class="text-gray-700 mb-3">{{ Str::limit($event->description, 100) }}</p>
                    <p class="text-sm text-gray-600 mb-4">
                        <strong>Date:</strong> {{ $event->date }}<br>
                        <strong>Time:</strong> {{ $event->time }}
                    </p>
                </div>
                <div class="flex justify-center mt-auto">
                    <a href="{{ route('events.show', $event) }}"
                       class="text-pink-600 font-semibold border border-pink-600 px-4 py-2 rounded transition duration-300 ease-in-out hover:bg-pink-600 hover:text-white hover:scale-105">
                       View Details
                    </a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-gray-600">No events available.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection
