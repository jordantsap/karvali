<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputsHelper;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\FieldProduct;
use App\Models\Image as ImageModel;
use App\Models\Option;
use App\Models\OptionProduct;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->withTranslation()
            ->with('category')
            ->paginate();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $producttypes = ProductType::all();

        return view('auth.products.create', compact('producttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

//        dd($request->all());

        $product = new Product();
        $product->active = $request->active;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->user_id = auth()->id();
        $product->company_id = $request->company_id;
        $product->product_type = $request->product_type;
        $product->save();

        // Save option values
        $optionValues = $request->input('fieldvalue', []);
        foreach ($optionValues as $optionId => $value) {
            $optionValue = new FieldProduct();
            $optionValue->product_id = $product->id;
            $optionValue->field_id = $optionId;
            $optionValue->value = $value;
            $optionValue->save();
        }

        $imageFields = GetInputsHelper::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/products', $imageName);
                $location = public_path("images/products/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $product->{$fieldName} = $imagePath;
            }
        }

        $product->save();

        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/products', $imageName); // You can specify a custom directory
                $location = public_path("images/products/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $product->images()->save($upload);

            }
        }

        foreach (config('translatable.locales') as $locale => $lang) {
            $product->translateOrNew($locale)->title = $request->{$locale}['title'];
            $product->translateOrNew($locale)->slug = Str::slug($request->{$locale}['title']);
            $product->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $product->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
//            $product->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $product->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $product->save();

//        return $product->uploads();
        toastr()->addSuccess('Accommodation was saved successfully.');

        return redirect(route('owner.products.show', $product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
//        $product = Product::find($id;
        $product->load('fields');
//        return $product->fields;


        return view('auth.products.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::withTranslation()->find($id);
        $categories = ProductType::withTranslation()->get();

        return view('auth.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $imageFields = GetInputsHelper::imageFields();
//        dd($request->except($imageFields));

        $product->update($request->except($imageFields));

//        $product->amenities()->sync($request->input('amenities', []));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/products', $imageName);
                $location = public_path("images/products/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $product->{$fieldName} = $imagePath;
            }
        }
        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $product->images()->delete();
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/products', $imageName); // You can specify a custom directory
                $location = public_path("images/products/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $product->images()->save($upload);
//                $image->sync([$upload]);

            }
        }

        $product->save();

        toastr()->addSuccess('Product Updated successfully.');

        return redirect(route('owner.products.show', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
