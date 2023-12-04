<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $productAttributes = ProductAttribute::all();
        return view('auth.product-attributes.index',compact('productAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $attributes = Attribute::all();

        return view('auth.product-attributes.create',compact('products','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductAttributeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductAttributeRequest  $request
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductAttributeRequest $request, ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        //
    }
}
