<?php

namespace App\Http\Controllers\Owner;

use App\Enums\Status;
use App\Exceptions\HouseUnavailableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHouseBookingRequest;
use App\Models\HouseBooking;
use App\Services\HouseBookingService;

class HouseBookingController extends Controller
{
    public function index()
    {
        $bookings = HouseBooking::query()
            ->whereHas('house.company', fn ($query) => $query->where('user_id', auth()->id()))
            ->with(['house', 'company'])
            ->latest()
            ->paginate();

        return view('auth.house-bookings.index', compact('bookings'));
    }

    public function update(UpdateHouseBookingRequest $request, HouseBooking $houseBooking, HouseBookingService $bookings)
    {
        try {
            if ($request->input('decision') === 'accept') {
                $bookings->accept($houseBooking);
                $message = 'Booking accepted.';
            } else {
                $bookings->cancel($houseBooking, Status::CANCELEDBYADMIN);
                $message = 'Booking cancelled.';
            }
        } catch (HouseUnavailableException $exception) {
            return back()->withErrors(['booking' => $exception->getMessage()]);
        }

        if (function_exists('toastr')) {
            toastr()->addSuccess($message);
        }

        return back()->with('status', $message);
    }
}
