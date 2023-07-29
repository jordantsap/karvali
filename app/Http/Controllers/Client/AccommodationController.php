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
        $accommodations = Accommodation::withTranslation()
            ->paginate();

        return view('accommodations.index', compact('accommodations'));
    }

    /**
     * Display the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Response
     */
    public function show($slug)
    {
        $accommodation = Accommodation::withTranslation()->whereTranslation('slug',$slug)->first();

        return view('accommodations.show', compact('accommodation'));
    }

    public function category(AccommodationType $accommodationType)
    {
         return $accommodationType->accommodations()->withTranslation()->paginate();
    }

}
