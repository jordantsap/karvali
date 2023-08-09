<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationRequest;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Image as ImageModel;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $types = AccommodationType::withTranslation()->get();

        return view('auth.accommodations.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreAccommodationRequest $request, Accommodation $accommodation)
    {
//        dd($request->all());

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
//        $accommodation->uploads = $request->imgfile;


        $accommodation->save();

        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
        $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/accommodations', $imageName); // You can specify a custom directory
                $location = public_path("images/accommodations/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $accommodation->images()->save($upload);

            }
        }

        foreach (config('translatable.locales') as $locale => $lang) {
            $accommodation->translateOrNew($locale)->title = $request->{$locale}['title'];
            $accommodation->translateOrNew($locale)->slug = Str::slug($request->{$locale}['title']);
            $accommodation->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $accommodation->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $accommodation->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $accommodation->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $accommodation->save();

//        return $accommodation->uploads();
        toastr()->addSuccess('Accommodation was saved successfully.');

        return redirect(route('owner.accommodation.show', $accommodation->id));

    }

    /**
     * Display the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Application|Factory|View
     */
    public function show(Accommodation $accommodation)
    {
        $accommodation = Accommodation::with('accommodationType')
            ->whereTranslation('slug',$accommodation->slug)
            ->first();

//        $room = $accommodation->has('rooms');

        return view('auth.accommodations.show', compact(['accommodation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Application|Factory|View
     */
    public function edit($slug)
    {
        $accommodation = Accommodation::withTranslation()
            ->whereTranslation('slug', $slug)->first();
        $accommodationTypes = AccommodationType::withTranslation()->get();

        return view('auth.accommodations.edit', compact(['accommodation', 'accommodationTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Accommodation $accommodation
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        $accommodation->update($request->all());


        toastr()->addSuccess('Accommodation Updated successfully.');

        return redirect(route('owner.accommodation.show', $accommodation->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Accommodation $accommodation
     * @return Response
     */
    public function destroy(Accommodation $accommodation)
    {
        Accommodation::where('id',$accommodation->id)->delete();
        toastr()->addSuccess('Accommodation was deleted successfully.');
        return redirect(route('owner.accommodation.index'));
    }
}
