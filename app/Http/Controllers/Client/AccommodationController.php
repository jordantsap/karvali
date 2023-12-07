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
            'model' => '\\App\\Models\\Room',
            'date_field' => 'start_time',
            'field' => 'title',
            'prefix' => '',
            'suffix' => '',
            'route' => 'admin.rooms.edit',
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

        $accommodations = Accommodation::whereHas('accommodationType', function ($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
        })->paginate();

        return view('accommodations.category', compact(['accommodations', 'accommodationType']));
    }

    /**
     * Display the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        //dd(session('check_in_date'));
        $check_in_date = Carbon::parse(session('check_in_date'));
        $check_out_date = Carbon::parse(session('check_out_date'));
        $accommodation = Accommodation::with('accommodationType')->whereTranslation('slug', $slug)->first();
        $bookedRoomIds = Booking::where(function ($query) use ($check_in_date, $check_out_date) {
            $query->where(function ($dateQuery) use ($check_in_date, $check_out_date) {
                // Check for overlapping bookings
                $dateQuery->where('check_in_date', '<', $check_out_date)
                    ->where('check_out_date', '>', $check_in_date);
            })->orWhere(function ($dateQuery) use ($check_in_date, $check_out_date) {
                // Check for consecutive bookings
                $dateQuery->where('check_in_date', '>', $check_out_date);
            });
        })
            ->pluck('room_id')
            ->toArray();

        // Get available rooms for the accommodation
        $rooms = $accommodation->rooms->whereNotIn('id', $bookedRoomIds);
        
        $availableEvents = [];
        foreach ($rooms as $room) {
            $availableDates = $this->getAvailableDates($room->id, $check_in_date, $check_out_date);

            foreach ($availableDates as $date) {
                $availableEvents[] = [
                    'title' => $room->title,
                    'start' => $date,
                    'end' => $date,
                ];
            }
        }
        //dd($availableEvents);
        //        return $availableEvents;
        return view('accommodations.show', compact('accommodation', 'rooms', 'availableEvents'));
    }




    public function accommodationSearch(Accommodation $accommodation, Request $request)
    {




        $dateRange = $request->search_date;

        // Separate start and end dates
        list($startDate, $endDate) = explode(' - ', $dateRange);

        // Convert string dates to Carbon instances



        $rules = [
            'accomodation_type' => 'required' // Ensure room_count is a positive integer
        ];
        $messages = [
            'accomodation_type' => 'Please select accommodation type.',
        ];

        $this->validate($request, $rules, $messages);

        $startDate = Carbon::createFromFormat('m/d/Y', $startDate);
        $endDate = Carbon::createFromFormat('m/d/Y', $endDate);
        $adults = $request->adult;
        $child = $request->child;
        $requestCount = $request->room;

        $slug = $request->accomodation_type;

        $accommodationType = AccommodationType::with('accommodations')
            ->whereTranslation('accommodation_type_id', $slug)
            ->first();


        session([
            'check_in_date' => $startDate,
            'check_out_date' => $endDate,
        ]);

        $accommodations = Accommodation::with([
            'rooms' => function ($roomQuery) use ($adults, $child, $startDate, $endDate) {
                $roomQuery->whereDoesntHave('bookings', function ($bookingQuery) use ($startDate, $endDate) {
                    $bookingQuery->where(function ($dateQuery) use ($startDate, $endDate) {
                        // Check for overlapping bookings
                        $dateQuery->where('check_in_date', '<', $endDate)
                            ->where('check_out_date', '>', $startDate);
                    })->orWhere(function ($dateQuery) use ($startDate, $endDate) {
                        // Check for consecutive bookings
                        $dateQuery->where('check_in_date', '>', $endDate);
                    });
                })
                    ->where(function ($query) use ($adults, $child) {
                        // Check for available capacity based on adults and children
                        $query->where('adults', '>=', $adults)
                            ->where('kids', '>=', $child);
                    });
            }
        ])
            ->withCount('rooms')
            ->whereHas('accommodationType', function ($query) use ($slug) {
                $query->whereTranslation('accommodation_type_id', $slug);
            })
            ->having('rooms_count', '>=', $requestCount) // Filter based on the room count
            ->paginate();
        $request->flash();
        // if (!empty($accommodations) && isset($accommodations[0])) {
        //     $rooms = $accommodations[0]->rooms;
        //     if ($rooms) {
        //         $roomCount = $rooms->count();
        //     }
        // } else {
        //     // Handle the case where $accommodations is empty or null
        //     toastr()
        //         ->persistent()
        //         ->closeButton()
        //         ->addError('No Accommodations available for the selected date!!!');
        //     return view('accommodations.category', compact(['accommodations', 'accommodationType']));
        // }
        // dd($roomCount);
        // if ($accommodations[0]->rooms->count() > 0) {
        //     return view('accommodations.category', compact(['accommodations', 'accommodationType']));
        // } else{
        //     toastr()
        //         ->persistent()
        //         ->closeButton()
        //         ->addError('No Rooms available for the selected date!!!');
        //          return view('accommodations.category', compact(['accommodations', 'accommodationType']));
        // }
        return view('accommodations.category', compact(['accommodations', 'accommodationType']));
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
