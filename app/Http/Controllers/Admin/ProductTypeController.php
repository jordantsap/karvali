<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::withTranslation()

        // ->where('user_id', auth()->user()->id)

            ->orderBy('created_at', 'desc')->get();

        return view('admin.product-types.index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.product-types.create');
    }
    public function store(Request $request)
    {
        $productType = new ProductType();

        foreach (config('translatable.locales') as $locale => $lang) {
            $productType->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $productType->save();

        toastr()->addSuccess('ProductType was saved successfully.');

        return redirect(route('admin.product-types.index'));
    }

    public function show(ProductType $productType)
    {
        $productType = ProductType::whereTranslation('slug',$productType->slug)
            ->first();

//        $room = $accommodation->has('rooms');

        return view('auth.product-type.show', compact(['productType']));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   $ this->authorize('delete-products', 'App\Product');
        ProductType::where('id',$id)->delete();
        $notification = array(
            'message' => 'CompanyType deleted successfully',
            'alert-type' => 'success'
        );
        return redirect(route('admin.product-types.index'))->with($notification);
    }
}
