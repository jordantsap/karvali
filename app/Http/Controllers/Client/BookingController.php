<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function viewRooms()
    {
        $rooms = Room::with('roomType')->get();
        $accommodations = Accommodation::all();
        $roomTypes = RoomType::all();
        return view('rooms.index', compact('rooms','accommodations','roomTypes'));
    }

    public function createBookingForm(Room $room)
    {
        return view('bookings.create', ['room' => $room]);
    }

    public function storeBooking(Request $request, Room $room)
    {
//        dd($request->all());

        $this->validate($request, [
            'room_id' => 'required',
            'children' => 'nullable',
            'check_in_date' => 'required',
            'adults' => 'required',
            'check_out_date' => 'required',
            // Add more validation rules as needed
        ]);

// Check if the selected room is available for the chosen date and time
        $room = Room::findOrFail($request->input('room_id'));
        $checkInTime = $request->input('check_in_date') . ' ' . $request->input('check_in_time');
        $checkOutTime = $request->input('check_out_date') . ' ' . $request->input('check_out_time');

// Check if there are any conflicting bookings
        $conflictingBooking = Booking::where('room_id', $room->id)
            ->where('check_in_time', $checkInTime)
            ->first();

        if ($conflictingBooking) {
            return redirect()->back()->with('error', 'This room is already booked for the selected date and time.');
        }

// Create the booking
        Booking::create([
            'user_id' => auth()->id(), // Assuming you have authentication set up
            'room_id' => request()->input('room_id'),
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'check_in_time' => $request->input('check_in_time'),
            'check_out_time' => $request->input('check_out_time'),
        ]);

        return redirect()->route('front.room.show', compact('room'))->with('success', 'Booking created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);

        return view('bookings.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookingRequest $request
     * @param Room $room
     * @return RedirectResponse
     */
    public function store(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'check_in_date' => 'required|date',//|after_or_equal:now',
            'check_out_date' => 'required|date',//|after:check_in_date',
            'check_in_time' => 'required|date',//|after_or_equal:now',
            'check_out_time' => 'required|date',//|after:check_in_date',
        ]);
        $room = Room::find($room);
        $room->id = $request->input('room_id');

        $room->bookings()->create($validatedData);

        return redirect()->route('rooms.show', compact('room'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
