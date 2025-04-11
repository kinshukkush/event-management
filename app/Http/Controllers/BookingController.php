<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookedEvents = Booking::where('user_id', auth()->id())
                               ->with('event')
                               ->get();

        return view('bookings.index', compact('bookedEvents'));
    }

    public function store(Request $request, Event $event)
    {
        $user = Auth::user();

        if ($event->capacity <= $event->bookings()->count()) {
            return redirect()->back()->with('error', 'Sorry, this event is full.');
        }

        $existing = Booking::where('user_id', $user->id)
                           ->where('event_id', $event->id)
                           ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already booked this event.');
        }

        Booking::create([
            'user_id' => $user->id,
            'event_id' => $event->id
        ]);

        return redirect()->back()->with('success', 'You have successfully booked this event!');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
}
