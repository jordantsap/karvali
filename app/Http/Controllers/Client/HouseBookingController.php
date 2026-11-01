<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\HouseUnavailableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHouseBookingRequest;
use App\Models\House;
use App\Services\HouseBookingService;

class HouseBookingController extends Controller
{
    public function store(StoreHouseBookingRequest $request, House $house, HouseBookingService $bookings)
    {
        try {
            $bookings->place($house, array_merge($request->validated(), [
                'user_id' => auth()->id(),
            ]));
        } catch (HouseUnavailableException $exception) {
            return back()->withInput()->withErrors(['availability' => $exception->getMessage()]);
        }

        $message = $house->isForSale()
            ? 'Your purchase request was sent to '.$house->company->title.'.'
            : 'Your stay request was sent to '.$house->company->title.'.';

        if (function_exists('toastr')) {
            toastr()->addSuccess($message);
        }

        return redirect()
            ->route('front.house.show', $house->slug)
            ->with('status', $message);
    }
}
