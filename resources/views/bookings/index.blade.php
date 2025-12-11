@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-white">🎫 My Booked Events</h1>

    @if (session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-4 shadow-lg animate__animated animate__fadeIn">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-600 text-white p-4 rounded-lg mb-4 shadow-lg animate__animated animate__fadeIn">
            ❌ {{ session('error') }}
        </div>
    @endif

    @if ($bookedEvents->isEmpty())
        <div class="text-center text-gray-400 text-lg py-10">💭 You haven't booked any events yet.</div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($bookedEvents as $booking)
            <div class="bg-gray-800 shadow-xl rounded-2xl p-5 border border-gray-700 transition transform hover:scale-105 hover:shadow-2xl hover:border-pink-500 duration-300 animate__animated animate__fadeInUp flex flex-col">
    
    @if ($booking->event->image)
        <img src="{{ asset('storage/' . $booking->event->image) }}" alt="Event Image" class="w-full h-48 object-cover rounded-xl mb-4 border-2 border-gray-700">
    @else
        <div class="w-full h-48 bg-gray-700 flex items-center justify-center rounded-xl mb-4">
            <span class="text-gray-400 text-xl">📅 No Image Available</span>
        </div>
    @endif

    <h2 class="text-xl font-semibold text-white">{{ $booking->event->title }}</h2>
    <p class="text-gray-300 mt-2">{{ $booking->event->description }}</p>
    <p class="text-sm text-pink-400 mt-2 mb-4 font-medium">📅 Date: {{ \Carbon\Carbon::parse($booking->event->date)->format('d M Y') }}</p>

    <div class="mt-auto">
        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Cancel this booking?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-3 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105">
                ❌ Cancel Booking
            </button>
        </form>
    </div>
</div>

            @endforeach
        </div>
    @endif
</div>
@endsection
