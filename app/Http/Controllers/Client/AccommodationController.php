<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Booking;
use App\Models\Room;
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
        $accommodation = Accommodation::whereTranslation('slug', $slug)->first();
        $availableDates = $this->getAvailableDates($accommodation->id);

        return view('accommodations.show', compact('accommodation', 'availableDates'));
    }
    public function getAvailableDates($accommodationId)
    {
        // Retrieve the accommodation and its rooms
        $accommodation = Accommodation::findOrFail($accommodationId);
        $rooms = $accommodation->rooms;

        // Fetch all bookings for the rooms of the accommodation
        $bookings = Booking::whereIn('room_id', $rooms->pluck('id')->toArray())
            ->get();

        // Convert bookings into an array of available dates
        $availableDates = [];

        foreach ($rooms as $room) {
            $roomBookings = $bookings->where('room_id', $room->id);

            // Example logic to determine available dates
            // You need to implement your own logic here
            $roomAvailableDates = [];

            // Push available dates for this room
            foreach ($roomBookings as $booking) {
                // Example logic: Convert booking dates to available dates
                $roomAvailableDates[] = [
                    'id' => $booking->id,
                    'title' => 'Available',
                    'start' => $booking->check_out_date,
                    'end' => $booking->check_in_date,
                ];
            }

            $availableDates = array_merge($availableDates, $roomAvailableDates);
        }

        return response()->json($availableDates);
    }

}
