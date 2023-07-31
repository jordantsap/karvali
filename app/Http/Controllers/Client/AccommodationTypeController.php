<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationTypeRequest;
use App\Http\Requests\UpdateAccommodationTypeRequest;
use App\Models\AccommodationType;

class AccommodationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccommodationTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccommodationTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function show(AccommodationType $accommodationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccommodationType $accommodationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccommodationTypeRequest  $request
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccommodationTypeRequest $request, AccommodationType $accommodationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccommodationType $accommodationType)
    {
        //
    }
}
