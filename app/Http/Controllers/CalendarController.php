<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getAvailableDates(Request $request)
    {
        $events = array();
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            // Format the data for each room as an event
            $events[] = [
                'title' => $booking->title, // Use room name as event title
                'start_date' => $booking->start_date, // Use available date field from your Room model
                'end_date' => $booking->end_date, // Use available date field from your Room model
                // Add other event properties if needed
            ];
        }

        return view('rooms.show', ['bookings', $bookings]);
    }

}
