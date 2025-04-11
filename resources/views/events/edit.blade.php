@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
    <h2 class="text-3xl font-semibold mb-8 text-gray-800">Edit Event</h2>

    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-2">Event Title</label>
            <input type="text" name="title" value="{{ $event->title }}" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>{{ $event->description }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Location</label>
            <input type="text" name="location" value="{{ $event->location }}" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-2">Date</label>
                <input type="date" name="date" value="{{ $event->date }}" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Time</label>
                <input type="time" name="time" value="{{ $event->time }}" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Capacity</label>
            <input type="number" name="capacity" value="{{ $event->capacity }}" min="1" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Replace Image (optional)</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-4 py-2">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="mt-4 max-w-xs rounded shadow">
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow transition">Update Event</button>
            <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
</div>
@endsection
