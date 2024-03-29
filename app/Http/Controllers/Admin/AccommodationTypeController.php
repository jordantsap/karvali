<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationTypeRequest;
use App\Models\AccommodationType;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AccommodationTypeController extends Controller
{
//    public function __construct()
//    {
//        return $this->middleware('role:admin|Super Admin');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $accommodationTypes = AccommodationType::withTranslation()
            ->orderBy('created_at', 'desc')->get();

        return view('admin.accommodation-types.index',compact('accommodationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.accommodation-types.create');
    }

    public function store(Request $request, AccommodationType $accommodationType)
    {
//        AccommodationType::create([
//            'en' => [
//                'title' => '$request->title',
//                'slug' => '$request->slug',
//            ],
//            'el' => [
//                'title' => 'Κάμπιγκ',
//                'slug' => 'kamping',
//            ],
//        ]);
        $accommodationType = new AccommodationType();
        $accommodationType->fill([
            'en' => [
                'title' => 'My first edited post',
            ],
            'de' => [
                'title' => 'Mein erster bearbeiteter Beitrag',
            ],
        ]);
        return $accommodationType->get();

//        toastr()->addSuccess('Accommodation Type Created Successfully');
//
//        return redirect(route('admin.accommodation-types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param AccommodationType $accommodationType
     * @return Response
     */
    public function show(AccommodationType $accommodationType)
    {
        return view('admin.accommodations.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AccommodationType $accommodationType
     * @return Response
     */
    public function edit(AccommodationType $accommodationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AccommodationType $accommodationType
     * @return Response
     */
    public function update(Request $request, AccommodationType $accommodationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AccommodationType $accommodationType
     * @return Response
     */
    public function destroy(AccommodationType $accommodationType)
    {
        //
    }
}
