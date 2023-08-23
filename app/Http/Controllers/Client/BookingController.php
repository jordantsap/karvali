<?php

namespace App\Http\Controllers\Client;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Services\EventService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $room = Room::all();
        return view('bookings.create',compact('room'));
    }

    public function store(Request $request, $roomId)
    {
        $room = Room::findOrFail($roomId); // Assuming you have a Room model

        // Validate the form data
        $request->validate([
            'title' => 'required',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);

        // Check room availability for the specified dates
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        $isRoomAvailable = $room->isAvailable($checkInDate, $checkOutDate);

        if (!$isRoomAvailable) {
            return redirect()->back()->withInput()->withErrors(['availability' => 'The room is not available for the selected dates.']);
        }

        // If room is available, create booking
        Booking::create([
            'room_id' => $room->id,
            'title' => $request->input('title'),
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'status' => Status::Received,
        ]);

        return redirect()->back()->with('success', 'Booking created successfully!');
    }

    public function getAvailableDates(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $bookings = Booking::whereBetween('start_date', [$startDate, $endDate])
            ->orWhereBetween('end_date', [$startDate, $endDate])
            ->get();

        $currentDate = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $dates = [];

        while ($currentDate->lte($end)) {
            $isBooked = $bookings->filter(function($booking) use ($currentDate) {
                return $currentDate->between($booking->start_date, $booking->end_date);
            })->count();

            if (!$isBooked) {
                $dates[] = $currentDate->toDateString();
            }

            $currentDate->addDay();
        }

        return response()->json($dates);
    }

}
