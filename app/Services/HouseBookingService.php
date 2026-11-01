<?php

namespace App\Services;

use App\Enums\HouseListing;
use App\Enums\Status;
use App\Exceptions\HouseUnavailableException;
use App\Models\House;
use App\Models\HouseBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HouseBookingService
{
    /**
     * Create a rent stay or a purchase request for one house.
     * The listing type always comes from the house, which belongs to a rental company.
     */
    public function place(House $house, array $attributes): HouseBooking
    {
        return DB::transaction(function () use ($house, $attributes) {
            $house = House::query()->whereKey($house->id)->lockForUpdate()->firstOrFail();

            if (!$house->isListed()) {
                throw new HouseUnavailableException('This house is not available.');
            }

            $checkIn = $this->dateOrNull($attributes['check_in_date'] ?? null);
            $checkOut = $this->dateOrNull($attributes['check_out_date'] ?? null);

            if ($house->isForRent()) {
                $this->assertStay($house, $checkIn, $checkOut);
            }

            return HouseBooking::create([
                'house_id' => $house->id,
                'company_id' => $house->company_id,
                'user_id' => $attributes['user_id'] ?? null,
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'phone' => $attributes['phone'] ?? null,
                'listing_type' => $house->listing_type,
                'check_in_date' => $checkIn,
                'check_out_date' => $checkOut,
                'guests' => $house->isForRent() ? ($attributes['guests'] ?? null) : null,
                'offer_price' => $house->isForSale()
                    ? ($attributes['offer_price'] ?? $house->price)
                    : null,
                'message' => $attributes['message'] ?? null,
                'status' => Status::PENDING,
            ]);
        });
    }

    public function accept(HouseBooking $booking): HouseBooking
    {
        return DB::transaction(function () use ($booking) {
            $booking = HouseBooking::query()->whereKey($booking->id)->lockForUpdate()->firstOrFail();
            $house = House::query()->whereKey($booking->house_id)->lockForUpdate()->firstOrFail();

            if ($booking->status !== Status::PENDING) {
                throw new HouseUnavailableException('Only a pending booking can be accepted.');
            }

            if (!$house->isListed()) {
                throw new HouseUnavailableException('This house is not available.');
            }

            if ($booking->listing_type === HouseListing::RENT) {
                if (!$house->isAvailable($booking->check_in_date, $booking->check_out_date, $booking->id)) {
                    throw new HouseUnavailableException('Those dates are already booked.');
                }
            }

            $booking->status = Status::COMPLETED;
            $booking->save();

            if ($house->isForSale()) {
                $house->status = House::STATUS_SOLD;
                $house->save();

                $house->bookings()
                    ->where('id', '!=', $booking->id)
                    ->where('status', Status::PENDING)
                    ->update(['status' => Status::CANCELEDBYADMIN]);
            }

            return $booking->fresh(['house', 'company']);
        });
    }

    public function cancel(HouseBooking $booking, string $status = Status::CANCELEDBYADMIN): HouseBooking
    {
        return DB::transaction(function () use ($booking, $status) {
            $booking = HouseBooking::query()->whereKey($booking->id)->lockForUpdate()->firstOrFail();

            if (!in_array($booking->status, [Status::PENDING, Status::COMPLETED], true)) {
                throw new HouseUnavailableException('This booking can no longer be changed.');
            }

            $booking->status = $status;
            $booking->save();

            $house = $booking->house()->lockForUpdate()->first();

            if ($house && $house->isForSale()) {
                $stillSold = $house->bookings()->where('status', Status::COMPLETED)->exists();
                $house->status = $stillSold ? House::STATUS_SOLD : House::STATUS_AVAILABLE;
                $house->save();
            }

            return $booking->fresh(['house', 'company']);
        });
    }

    private function assertStay(House $house, ?string $checkIn, ?string $checkOut): void
    {
        if (!$checkIn || !$checkOut || $checkOut <= $checkIn) {
            throw new HouseUnavailableException('Choose a check-out date after the check-in date.');
        }

        if (!$house->isAvailable($checkIn, $checkOut)) {
            throw new HouseUnavailableException('The house is already booked for those dates.');
        }
    }

    private function dateOrNull($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return Carbon::parse($value)->toDateString();
    }
}
