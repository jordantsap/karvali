<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationRequest;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $accommodations = Accommodation::where('user_id', auth()->user()->id)
            ->withTranslation()
            ->orderByDesc('created_at')
            ->paginate();

        return view('auth.accommodations.index', compact('accommodations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $types = AccommodationType::withTranslation()->get();

        return view('auth.accommodations.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAccommodationRequest $request, Accommodation $accommodation)
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
     * @param \App\Models\Accommodation $accommodation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Accommodation $accommodation)
    {
        $accommodation = Accommodation::find($accommodation->id);

        return view('auth.accommodations.show', [$accommodation->id], compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Accommodation $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        $accommodation = Accommodation::withTranslation()
            ->where('id', $accommodation->id)->firstOrFail();
        $accommodationTypes = AccommodationType::withTranslation()->get();

        return view('auth.accommodations.edit', compact(['accommodation', 'accommodationTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accommodation $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        $accommodation->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Accommodation $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
    }
}
