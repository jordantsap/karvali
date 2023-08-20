<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $events = [];
        $rooms = Room::with('events')->get(); // Retrieve rooms with their associated events

        foreach ($rooms as $room) {
            foreach ($room->events as $event) {
                $events[] = [
                    'title' => $room->name,
                    'start' => $event->start_date . ' ' . $event->start_time,
                    'end' => $event->end_date . ' ' . $event->end_time,
                ];
            }
        }

        return response()->json($events);
    }
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
