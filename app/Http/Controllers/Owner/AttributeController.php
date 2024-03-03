<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Accommodation;
use App\Models\Attribute;
use App\Models\AttributeType;
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
        $attributes = Attribute::withTranslation()->get();

        return view('auth.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
        $attributeTypes = AttributeType::all();

        return view('auth.attributes.create', compact('productTypes','attributeTypes'));
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
        $attribute->attribute_type_id = $request->attribute_type;

        $attribute->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $attribute->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $attribute->save();

        toastr()->addSuccess('Attribute was saved successfully.');

        return redirect(route('owner.attributes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('auth.attributes.show', compact('attribute'));
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
        $attributeTypes = AttributeType::all();
        return view('auth.attributes.edit', compact('attribute', 'productTypes', 'attributeTypes'));
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

        $attribute->product_type_id = $request->product_type_id;
        $attribute->attribute_type_id = $request->attribute_type_id;

        $attribute->save();

        foreach (config('translatable.locales') as $locale => $lang) {
            $attribute->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $attribute->save();

        toastr()->addSuccess('Attribute was Updated successfully.');

        return redirect(route('owner.attributes.show', $attribute->id));
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
        return redirect(route('owner.attributes.index'));
    }
}
