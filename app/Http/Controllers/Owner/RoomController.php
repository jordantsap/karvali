<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputs;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Amenity;
use App\Models\Image as ImageModel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rooms = Room::whereIn('accommodation_id', auth()->user()->accommodations->pluck('id'))
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
        $categories = RoomType::all();
        $roomTypes = RoomType::all();
        $accommodations = Accommodation::where('user_id', auth()->id())->get();
        $amenities = Amenity::withTranslation()->get();

        return view('auth.rooms.create', compact('accommodations', 'categories', 'roomTypes','amenities'));
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
        $room->active = $request->active;
        $room->accommodation_id = $request->accommodation_id;
        $room->room_type_id = $request->room_type_id;
//        $room->amenity_id = $request->input('amenities', []);
        $room->capacity = $request->capacity;
        $room->price = $request->price;
        $room->beds = $request->beds;

        $imageFields = GetInputs::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/rooms', $imageName);
                $location = public_path("images/rooms/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $room->{$fieldName} = $imagePath;
            }
        }

        $room->save();
        $room->amenities()->sync($request->input('amenities', []));


        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/rooms', $imageName); // You can specify a custom directory
                $location = public_path("images/rooms/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $room->images()->save($upload);

            }
        }


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
        $room = Room::with('accommodation')->where('id',$room->id)->first();

        return view('auth.rooms.show', compact('room'));
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
        $roomTypes = RoomType::all();
        $room = Room::with('accommodation')->where('id',$room->id)->first();

        return view('auth.rooms.edit', compact('room','categories','roomTypes'));
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
        $imageFields = GetInputs::imageFields();

        $room->update($request->except($imageFields));

        $room->amenities()->sync($request->input('amenities', []));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/rooms', $imageName);
                $location = public_path("images/rooms/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $room->{$fieldName} = $imagePath;
            }
        }
        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $room->images()->delete();
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/rooms', $imageName); // You can specify a custom directory
                $location = public_path("images/rooms/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $room->images()->save($upload);
//                $image->sync([$upload]);

            }
        }

        $room->save();


        toastr()->addSuccess('Room was Updated successfully.');

        return redirect(route('owner.rooms.show', $room));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::where('id',$room->id)->delete();
        toastr()->addSuccess('Room was deleted successfully.');
        return redirect(route('owner.rooms.index'));
    }
}
