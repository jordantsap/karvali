<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.roomtypes.index',[
            'roomTypes'=> RoomType::withTranslation()
        ->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomType = new RoomType();

        $roomType->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $roomType->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $roomType->save();

        toastr()->addSuccess('Room Type was saved successfully.');

        return redirect(route('owner.room-types.show', $roomType->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $roomType = RoomType::find($id);

        return view('auth.roomtypes.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        return view('auth.roomtypes.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, RoomType $roomType)
    {
        $roomType = RoomType::find($roomType->id);

        foreach (config('translatable.locales') as $locale => $lang) {
            $roomType->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $roomType->save();

        toastr()->addSuccess('Room Type was Updated successfully.');

        return redirect(route('owner.room-types.show', $roomType->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $this->authorize('delete-products', 'App\Product');
        RoomType::where('id',$id)->delete();
        toastr()->addSuccess('Room Type was deleted successfully.');
        return redirect(route('owner.room-types.index'));
    }
}
