<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rooms = Room::where('accommodation_id', auth()->user()->accommodations()->first())
            ->withTranslation()
            ->paginate();

        return view('auth.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accommodations = Accommodation::where('user_id', auth()->id())->get();

        return view('auth.rooms.create', compact('accommodations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room();
        $room->accommodation_id = $request->accommodation_id;
        $room->active = $request->active;
//        $room->accommodation_type_id = $request->accommodation_type_id;
        $room->capacity = $request->capacity;
        $room->price = $request->price;
        $room->beds = $request->beds;
        // images

        $room->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $room->translateOrNew($locale)->title = $request->{$locale}['title'];
            $room->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $room->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
//            $room->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $room->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $room->save();

        toastr()->addSuccess('Accommodation was saved successfully.');

        return redirect(route('owner.rooms.show', $room->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room = Room::find($room->id);

        return view('auth.rooms.show',[$room->id], compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $categories = AccommodationType::all();
        $room = Room::find($room->id);

        return view('auth.rooms.edit', compact('room','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
