<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Accommodation;
use App\Models\Attribute;
use App\Models\ProductType;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();

        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productType = ProductType::all();
        return view('admin.attributes.create', compact('productType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request, Attribute $attribute)
    {
        $attribute = new Attribute();

        $attribute->product_type_id = $request->product_type;

        $attribute->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $attribute->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $attribute->save();

        toastr()->addSuccess('Attribute was saved successfully.');

        return redirect(route('admin.attributes.show', $attribute->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('admin.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $productTypes = ProductType::withTranslation()->get();
        return view('admin.attributes.edit', compact('attribute', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeRequest  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute = Attribute::find($attribute->id);
        foreach (config('translatable.locales') as $locale => $lang) {
            $attribute->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $attribute->save();

        toastr()->addSuccess('Attribute was Updated successfully.');

        return redirect(route('admin.attributes.show', $attribute->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $this->authorize('delete-products', 'App\Product');
        Attribute::where('id',$id)->delete();
        toastr()->addSuccess('Attribute was deleted successfully.');
        return redirect(route('admin.attributes.index'));
    }
}
