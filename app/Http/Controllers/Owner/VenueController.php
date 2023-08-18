<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputs;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\GroupType;
use App\Models\Image as ImageModel;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.venues.index', [
            'venues' => Venue::where('user_id', auth()->user()->id)
                ->withTranslation()
                ->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyTypes = Amenity::all();
//        $groupTypes = GroupType::all();

        return view('auth.venues.create', compact(['companyTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $venue = new Venue();
        $venue->user_id = auth()->id();
        $venue->active = $request->active;
//        $venue->accommodation_type_id = $request->accommodation_type_id;
        $venue->website = $request->website;
        $venue->telephone = $request->telephone;
        $venue->facebook = $request->facebook;
        $venue->twitter = $request->twitter;
        $venue->email = $request->email;
        $venue->entrance = $request->entrance;
//        $venue->start_date = $request->start_date;
//        $venue->end_date = $request->end_date;
//        $venue->start_time = $request->start_time;
//        $venue->end_time = $request->end_time;


        $imageFields = GetInputs::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/venues', $imageName);
                $location = public_path("images/venues/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $venue->{$fieldName} = $imagePath;
            }
        }

        $venue->save();

        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/venues', $imageName); // You can specify a custom directory
                $location = public_path("images/venues/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $venue->images()->save($upload);

            }
        }

        foreach (config('translatable.locales') as $locale => $lang) {
            $venue->translateOrNew($locale)->title = $request->{$locale}['title'];
            $venue->translateOrNew($locale)->slug = \Str::slug($request->{$locale}['title'], '-');
            $venue->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $venue->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $venue->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $venue->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $venue->save();

        toastr()->addSuccess('Venue was saved successfully.');

        return redirect(route('owner.venues.show', $venue->id));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        $venue = Venue::with('events')->withTranslation()->find($venue->id)->first();

        return view('auth.venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
//        $venue = Venue::withTranslation()->whereTranslation('slug', $venue->slug)->first();

        return view('auth.venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $imageFields = GetInputs::imageFields();

        $venue->update($request->except($imageFields));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/accommodations', $imageName);
                $location = public_path("images/accommodations/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $venue->{$fieldName} = $imagePath;
            }
        }
        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $venue->images()->delete();
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/venues', $imageName); // You can specify a custom directory
                $location = public_path("images/venues/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $venue->images()->save($upload);
//                $image->sync([$upload]);

            }
        }
        $venue->save();

        toastr()->addSuccess('Venue was Updated successfully.');

        return redirect(route('owner.venues.show', $venue->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
