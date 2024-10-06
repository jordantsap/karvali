<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmenityRequest;
use App\Http\Requests\UpdateAmenityRequest;
use App\Models\Amenity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.amenities.index', [
            'amenities'=> Amenity::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('auth.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAmenityRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $amenity = new Amenity();

        $amenity->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $amenity->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $amenity->save();

        toastr()->addSuccess('Amenity was saved successfully.');

        return redirect(route('owner.amenities.show', $amenity->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Amenity $amenity
     * @return Response
     */
    public function show(Amenity $amenity)
    {
//        $amenity = Amenity::find($id);

        return view('auth.amenities.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Amenity $amenity
     * @return Response
     */
    public function edit(Amenity $amenity)
    {
        return view('auth.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAmenityRequest $request
     * @param Amenity $amenity
     * @return Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        $amenity = Amenity::find($amenity->id);

        foreach (config('translatable.locales') as $locale => $lang) {
            $amenity->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $amenity->save();

        toastr()->addSuccess('Amenity was Updated successfully.');

        return redirect(route('owner.amenities.show', $amenity->id));
    }

    /**
     * Remove the specified accommodation from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
//        $this->authorize('delete-products', 'App\Product');
        Amenity::where('id',$id)->delete();
        toastr()->addSuccess('Amenity was deleted successfully.');
        return redirect(route('owner.amenities.index'));
    }
}
