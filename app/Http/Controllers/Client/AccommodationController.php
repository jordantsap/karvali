<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccommodationController extends Controller
{

    public $sources = [
        [
            'model'      => '\\App\\Models\\Room',
            'date_field' => 'start_time',
            'field'      => 'title',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.rooms.edit',
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $accommodations = Accommodation::with('accommodationType')
//            ->translated()
            ->withTranslation()
            ->paginate();

        $accommodationTypes = AccommodationType::withTranslation()->get();

        return view('accommodations.index', compact('accommodations', 'accommodationTypes'));
    }

    public function category(Accommodation $accommodation, $slug)
    {
         $accommodationType = AccommodationType::with('accommodations')
             ->whereTranslation('slug', $slug)
             ->first();

        $accommodations = Accommodation::whereHas('accommodationType',function($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
        })->paginate();

         return view('accommodations.category', compact(['accommodations','accommodationType']));
    }

    /**
     * Display the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $accommodation = Accommodation::with('accommodationType')->whereTranslation('slug', $slug)->first();
        $rooms = $accommodation->rooms;
//
        $availableEvents = [];
        foreach ($rooms as $room) {
            $availableDates = $this->getAvailableDates($room->id, Carbon::now(), Carbon::now()->addMonths(6));

            foreach ($availableDates as $date) {
                $availableEvents[] = [
                    'title' => $room->title,
                    'start' => $date,
                    'end' => $date,
                ];
            }
        }
//        return $availableEvents;
        return view('accommodations.show', compact('accommodation', 'rooms', 'availableEvents'));
    }
    private function getAvailableDates($roomId, $startDate, $endDate)
    {
        $bookedDates = Booking::where('room_id', $roomId)
            ->where('check_out_date', '>', $startDate)
            ->where('check_in_date', '<', $endDate)
            ->get();

        $reservedDates = [];
        foreach ($bookedDates as $booking) {
            $checkin = Carbon::parse($booking->checkin_date);
            $checkout = Carbon::parse($booking->checkout_date);

            $datesInRange = $checkin->copy();
            while ($datesInRange->lt($checkout)) {
                $reservedDates[] = $datesInRange->format('m-d-Y');
                $datesInRange->addDay();
            }
        }

        $availableDates = [];
        $currentDate = Carbon::parse($startDate);
        while ($currentDate->lte($endDate)) {
            if (!in_array($currentDate->format('Y-m-d'), $reservedDates)) {
                $availableDates[] = $currentDate->copy()->format('Y-m-d');
            }
            $currentDate->addDay();
        }

        return $availableDates;
    }

}
