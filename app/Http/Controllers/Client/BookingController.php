<?php

namespace App\Http\Controllers\Client;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingEmail;
use App\Models\Booking;
use App\Models\Room;
use App\Services\EventService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;

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
        $check_in_date = Carbon::parse($checkInDate);
        $check_out_date = Carbon::parse($checkOutDate);
        $isRoomAvailable = $room->isAvailable($check_in_date, $check_out_date);

        if (!$isRoomAvailable) {
            return redirect()->back()->withInput()->withErrors(['availability' => 'The room is not available for the selected dates.']);
        } else {
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
            $recipientEmail = "rahul.tr@aipopuli.com";
            $username = $request->input("name");
            $bookingId = $room->id;
            //Mail::to($recipientEmail)->send(new BookingEmail($username, $bookingId, $checkInDate, $checkOutDate));
            return redirect(route('front.bookings.booking_cart'));
        }

    }

    public function bookingCart()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $email = $user->email;

            $translation_room_id = Booking::where('email', $email)->pluck('room_id');
            $booking_details = Booking::where('email', $email)
            ->where('status', 'Pending')
                ->with('room')
                ->get();

            return view('bookings.cart', compact('booking_details', 'user'));
        } else {
            return redirect(route('userlogin'));
        }
    }
    public function confirmBooking(Request $request)
    {
        if (Auth::check()) {
            $checkOutDate = $request->check_out_date;
            $id = decrypt($request->id);
            $checkInDate = $request->check_in_date;
            $booking = Booking::find($id);
            $booking->update([
                'status' => 'Booked', 
            ]);
            
            toastr()
                ->persistent()

                ->addSuccess('Booking created successfully!');
            $recipientEmail = "rahul.tr@aipopuli.com";
            $username = $request->input("name");
            $bookingId = $request->booking_id;
            Mail::to($recipientEmail)->send(new BookingEmail($username, $bookingId, $checkInDate, $checkOutDate));
            return redirect(route('front.bookings.booking_cart'));
           
        }
        else {
            return redirect(route('userlogin'));
        }
            
    }

}
