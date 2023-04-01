<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
      $this->authorize('view_products', 'App\Product');
        $products = Product::orderBy('id', 'DESC')->paginate(9);
        return view('admin.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->authorize('create_products', 'App\Models\Product');
        $producttypes = ProductType::all();
        return view('admin.products.create', compact('producttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'title' =>'required|max:100',
          'description' =>'required',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'company_id' => '',
          'active' => 'nullable',
          'user_id' => '',
          'product_type' => '',
          'header' => '',
          'logo' => '',
          'image1' =>'',
          'image2' => '',
          'image3' => '',
          'sku' => '',
          'price' => '',
          ]);
      $product = new Product;
      $product->title = $request->input('title');
      $product->slug = Str::slug($request->input('title'), '-');
      $product->meta_description = $request->input('meta_description');
      $product->meta_keywords = $request->input('meta_keywords');
      $product->company_id = $request->company_id;
      $product->sku = $request->sku;
      $product->price = $request->price;
      $product->product_type = $request->product_type;
      $product->header = $request->header;
      $product->logo = $request->logo;
      $product->image1 = $request->image1;
      $product->image2 = $request->image2;
      $product->image3 = $request->image3;
      $product->active = $request->active;
      $product->description = $request->description;
      $product->user_id = Auth::user()->id;

      if ($request->hasFile('header')) {
          $header = $request->file('header');
          $filename = time() . '.' . $header->getClientOriginalExtension();
          $location = public_path("images/products/" . $filename);
//          dd($location);
          Image::make($header)->resize(800, 400)->save($location);
          // Storage::put($image)->save($location);
          $product->header = $filename;
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $location = public_path("images/products/" . $filename);
            Image::make($logo)->resize(800, 400)->save($location);
            // Storage::put($image)->save($location);
            $product->logo = $filename;
          }

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename = time() . '.' . $image1->getClientOriginalExtension();
            $location = public_path("images/products/" . $filename);
            Image::make($image1)->resize(800, 400)->save($location);
            // Storage::put($image)->save($location);
            $product->image1 = $filename;
          }

          if ($request->hasFile('image2')) {
              $image2 = $request->file('image2');
              $filename = time() . '.' . $image2->getClientOriginalExtension();
              $location = public_path("images/products/" . $filename);
              Image::make($image2)->resize(800, 400)->save($location);
              // Storage::put($image)->save($location);
              $product->image2 = $filename;
            }

            if ($request->hasFile('image3')) {
                $image3 = $request->file('image3');
                $filename = time() . '.' . $image3->getClientOriginalExtension();
                $location = public_path("images/products/" . $filename);
                Image::make($image3)->resize(800, 400)->save($location);
                $product->image3 = $filename;
              }
      $product->save();
      $notification = array(
      'message' => 'Product added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('prods.show',$product->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($product);
        $this->authorize('view_products', Product::class);

        $product = Product::whereTranslation('id',$id)->with('category')->withTranslation()->first();

        return view('admin.products.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update_products', 'App\Product');
      $categories = ProductType::all();
      $product = Product::find($id);
      
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      $this->validate($request,[
          'title' =>'required|max:100',
          'slug' => 'unique:products,title',
          'descrition' =>'sometimes',
          'meta_description' =>'max:160',
          'meta_keywords' =>'',
          'active' => 'nullable',
          'company_id' => '',
          'user_id' => '',
          'product_type' => '',
          'header' => '',
          'logo' => '',
          'image1' =>'',
          'image2' => '',
          'image3' => '',
          'sku' => '',
          'price' => '',
          ]);

      $product = Product::find($product->id);
      $product->title = $request->title;
      $product->slug = Str::slug($request->title, '-');
      $product->meta_description = $request->input('meta_description');
      $product->meta_keywords = $request->input('meta_keywords');
      $product->company_id = $request->company_id;
      $product->sku = $request->sku;
      $product->price = $request->price;
      $product->product_type = $request->product_type;
      $product->header = $request->header;
      $product->logo = $request->logo;
      $product->image1 = $request->image1;
      $product->image2 = $request->image2;
      $product->image3 = $request->image3;
      $product->active = $request->active;
      $product->description = $request->description;
      $product->user_id = Auth::user()->id;

      if ($request->hasFile('header')) {
        //add new photo
          $header = $request->file('header');
          $filename = time() . '.' . $header->getClientOriginalExtension();
          $location = public_path("images/products/" . $filename);
          $oldfile = public_path("images/products/" . $product->header);
          // dd($oldfile);
          if(File::exists($oldfile))
          {
             File::delete($oldfile);
           }
           Image::make($header)->resize(800, 400)->save($location);
          $product->header = $filename;
        }

        if ($request->hasFile('logo')) {
        //add new photo
          $logo = $request->file('logo');
          $filename = time() . '.' . $logo->getClientOriginalExtension();
          $location = public_path("images/products/" . $filename);
          $oldfile = public_path("images/products/" . $product->logo);
          // dd($oldfile);
          if(File::exists($oldfile))
          {
             File::delete($oldfile);
           }
           Image::make($logo)->resize(800, 400)->save($location);
          $product->logo = $filename;
        }

        if ($request->hasFile('image1')) {
          //add new photo
            $image1 = $request->file('image1');
            $filename = time() . '.' . $image1->getClientOriginalExtension();
            $location = public_path("images/products/" . $filename);
            $oldfile1 = public_path("images/products/" . $product->image1);
            // dd($oldfile);
            if(File::exists($oldfile1))
            {
               File::delete($oldfile1);
             }
             Image::make($image1)->resize(800, 400)->save($location);
            $product->image1 = $filename;
          }

          if ($request->hasFile('image2')) {
            //add new photo
              $image2 = $request->file('image2');
              $filename = time() . '.' . $image2->getClientOriginalExtension();
              $location = public_path("images/products/" . $filename);
              $oldfile2 = public_path("images/products/" . $product->image2);
              // dd($oldfile);
              if(File::exists($oldfile2))
              {
                 File::delete($oldfile2);
               }
               Image::make($image2)->resize(800, 400)->save($location);
              $product->image2 = $filename;
            }

            if ($request->hasFile('image3')) {
              //add new photo
                $image3 = $request->file('image3');
                $filename = time() . '.' . $image3->getClientOriginalExtension();
                $location = public_path("images/products/" . $filename);
                $oldfile3 = public_path("images/products/" . $product->image3);
                // dd($oldfile);
                if(File::exists($oldfile3))
                {
                   File::delete($oldfile3);
                 }
                 Image::make($image3)->resize(800, 400)->save($location);
                $product->image3 = $filename;
              }
      $product->save();
      $notification = array(
      'message' => 'Product updated successfully',
      'alert-type' => 'info'
      );
      return redirect(route('prods.show', $product->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('delete_products', 'App\Product');
      Product::where('id',$id)->delete();
      $notification = array(
      'message' => 'User deleted successfully',
      'alert-type' => 'success'
      );
      return redirect(route('prods.index'))->with($notification);
    }
}
