@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-8 px-4">
    <h2 class="text-3xl font-semibold mb-6 text-gray-100">🎉 Upcoming Events</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-3 rounded mb-4 shadow-lg animate__animated animate__fadeIn">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('events.create') }}" class="inline-block bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
            ➕ Create New Event
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($events as $event)
        <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden flex flex-col h-full border border-gray-700 hover:border-pink-500 transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="h-48 w-full object-cover">
            @else
                <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-400 text-xl">📅 No Image</span>
                </div>
            @endif
            <div class="p-5 flex flex-col justify-between flex-grow">
                <div>
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $event->title }}</h3>
                    <p class="text-gray-300 mb-3">{{ Str::limit($event->description, 100) }}</p>
                    <p class="text-sm text-gray-400 mb-4">
                        <strong class="text-pink-400">📅 Date:</strong> {{ $event->date }}<br>
                        <strong class="text-pink-400">⏰ Time:</strong> {{ $event->time }}
                    </p>
                </div>
                <div class="flex justify-center mt-auto">
                    <a href="{{ route('events.show', $event) }}"
                       class="text-pink-500 font-semibold border-2 border-pink-500 px-6 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-pink-500 hover:text-white hover:scale-105">
                       View Details →
                    </a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-gray-400 text-lg col-span-3 text-center py-10">📭 No events available.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection
