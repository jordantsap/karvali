<?php

namespace App\Http\Controllers;

use App\Models\ListingType;
use App\Http\Requests\StoreListingTypeRequest;
use App\Http\Requests\UpdateListingTypeRequest;

class ListingTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreListingTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListingType  $listingType
     * @return \Illuminate\Http\Response
     */
    public function show(ListingType $listingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListingType  $listingType
     * @return \Illuminate\Http\Response
     */
    public function edit(ListingType $listingType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListingTypeRequest  $request
     * @param  \App\Models\ListingType  $listingType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingTypeRequest $request, ListingType $listingType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListingType  $listingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListingType $listingType)
    {
        //
    }
}
