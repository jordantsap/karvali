<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
//    public function getAvailableDates(Request $request)
//    {
//        $events = array();
//        $bookings = Booking::all();
//
//        foreach ($bookings as $booking) {
//            // Format the data for each room as an event
//            $events[] = [
//                'title' => $booking->title, // Use room name as event title
//                'start_date' => $booking->start_date, // Use available date field from your Room model
//                'end_date' => $booking->end_date, // Use available date field from your Room model
//                // Add other event properties if needed
//            ];
//        }
//
//        return view('rooms.show', ['bookings', $bookings]);
//    }
//    public function index(Request $request)
//    {
//        if($request->ajax())
//        {
//            $data = Event::all();
////            whereDate('start', '>=', $request->start)
////                ->whereDate('end',   '<=', $request->end)
////                ->get(['id', 'title', 'start', 'end']);
//            return response()->json($data);
//        }
//        return view('auth.rooms.show',compact('data'));
//    }
    public function getAvailableDates(Request $request)
    {
        if($request->ajax())
        {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('auth.rooms.show');
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $event = Room::create([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'update')
            {
                $event = Room::find($request->id)->update([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {
                $event = Room::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }

}
