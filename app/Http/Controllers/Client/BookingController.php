<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookingRequest $request, Room $room)
    {
        // Validate input, handle form submission, and create booking
        // You can access the room ID, start time, and end time from the request
        $roomId = $request->input('room_id');
        $room = Room::find($roomId);
        $startDate = $request->input('check_in');
        $endDate = $request->input('check_out');

        Booking::create([
            'room_id' => $roomId,
            'check_in' => Carbon::createFromFormat('d-m-Y H:i:s', $startDate),
            'check_out' => $endDate,//Carbon::createFromFormat('d-m-Y H:i:s', $request->input('check_out')),

            // other booking details
        ]);

        // Redirect back with a success message
        return redirect(route('front.room.show', compact('room')))->with('success', 'Booking created successfully!');
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
