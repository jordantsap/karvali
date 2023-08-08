<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $accommodations = Accommodation::with('accommodationType')
//            ->translated()
            ->withTranslation()
            ->paginate();

        $accommodationTypes = AccommodationType::withTranslation()->get();

        return view('accommodations.index', compact('accommodations', 'accommodationTypes'));
    }

    /**
     * Display the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Response
     */
    public function show($slug)
    {
        $accommodation = Accommodation::whereTranslation('slug', $slug)->first();

        return view('accommodations.show', compact('accommodation'));
    }

    public function category(Accommodation $accommodation, $slug)
    {
         $accommodationType = AccommodationType::with('accommodations')
             ->whereTranslation('slug', $slug)
             ->first();

        $accommodations = Accommodation::whereHas('accommodationType',function($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
        })->paginate();

         return view('accommodations.category', compact(['accommodations','accommodationType']));
    }

}
