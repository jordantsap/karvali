<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;

class EventService
{ // not used
    public function createRecurringEvents($requestData): void
    {
        $recurringUntil            = Carbon::parse($requestData['recurring_until'])->setTime(23, 59, 59);
        $requestData['check_in_date'] = Carbon::parse($requestData['check_in_date'])->addWeek();
        $requestData['check_out_date']   = Carbon::parse($requestData['check_out_date'])->addWeek();

        while ($requestData['check_out_date']->lte($recurringUntil)) {
            $this->createEvent($requestData);
            $requestData['check_in_date']->addWeek();
            $requestData['check_out_date']->addWeek();
        }
    }

    public function createEvent($requestData)
    {
        $requestData['check_in_date'] = $requestData['check_in_date']->format('Y-m-d H:i');
        $requestData['check_out_date']   = $requestData['check_out_date']->format('Y-m-d H:i');

        return Booking::create($requestData);
    }


    public function checkRoomAvailability($checkinDate, $checkoutDate)
    {
        // Query the database to check room availability for the given dates
        $availableRooms = Room::whereHas('bookings', function ($query) use ($checkinDate, $checkoutDate) {
            $query->where(function ($q) use ($checkinDate, $checkoutDate) {
                $q->whereBetween('check_in_date', [$checkinDate, $checkoutDate])
                    ->orWhereBetween('check_out_date', [$checkinDate, $checkoutDate]);
            });
        })->count();

        return $availableRooms > 0;
    }
}
