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
    public function index()
    {
        return Booking::all();
        return view('bookings.index');
    }
//    public function create()
//    {
//        $room = Room::all();
//        return view('bookings.create',compact('room'));
//    }

    public function store(Request $request, $roomId)
    {

//        if (!auth()->user()) {
//
//            toastr()
//                ->persistent()
////                ->closeButton()
//                ->addError(__('alerts.bookunauth'));
//
//            return redirect()->back();
//        }
        $room = Room::findOrFail($roomId); // Assuming you have a Room model

        // Validate the form data
        $request->validate([
            'name' => 'nullable',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'email' => 'nullable|email',
        ]);

        // Check room availability for the specified dates
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        $isRoomAvailable = $room->isAvailable($checkInDate, $checkOutDate);

        if (!$isRoomAvailable) {
            return redirect()->back()->withInput()->withErrors(['availability' => 'The room is not available for the selected dates.']);
        }
        else{
            // If room is available, create booking
            Booking::create([
                'room_id' => $room->id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                'adults' => $request->input('adults'),
                'children' => $request->input('children'),
                'status' => Status::PENDING,
            ]);
            toastr()
                ->persistent()
//                ->closeButton()
                ->addSuccess('Booking created successfully!');

            return redirect()->back();
        }

    }

}
