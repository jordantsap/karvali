<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationRequest;
use App\Http\Requests\UpdateAccommodationRequest;
use App\Models\Accommodation;
use App\Models\AccommodationType;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accommodations.index', [
            'accommodations' => Accommodation::with('accommodationType')->withTranslation()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accommodationType = AccommodationType::withTranslatioin()->get();

        return view('admin.accommodations.create', compact('accommodationType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccommodationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccommodationRequest $request,  Accommodation $accommodation)
    {
        $accommodation = new Accommodation();

        $accommodation->user_id = $request->user_id;
        $accommodation->active = $request->active;
        $accommodation->accommodation_type_id = $request->accommodation_type_id;
        $accommodation->website = $request->website;
        $accommodation->telephone = $request->telephone;
        $accommodation->facebook = $request->facebook;
        $accommodation->twitter = $request->twitter;
        $accommodation->email = $request->email;
        $accommodation->total_rooms = $request->total_rooms;
        $accommodation->header = $request->header;
        $accommodation->logo = $request->logo;
        $accommodation->image1 = $request->image1;
        $accommodation->image2 = $request->image2;
        $accommodation->image3 = $request->image3;
        $accommodation->imgfile = $request->imgfile;

        $accommodation->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $accommodation->translateOrNew($locale)->title = $request->{$locale}['title'];
            $accommodation->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $accommodation->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $accommodation->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $accommodation->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $accommodation->save();

        toastr()->addSuccess('Accommodation was saved successfully.');

        return redirect(route('owner.accommodation.show', $accommodation->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccommodationRequest  $request
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccommodationRequest $request, Accommodation $accommodation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
    }
}
