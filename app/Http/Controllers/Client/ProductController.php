<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\Company;
use App\Models\Comment;
class ProductController extends Controller
{
  public function index()
  {
    // $producttypes = ProductType::withTranslation()->get();
    $products = Product::with('category','company','likes','comments')
    ->withTranslation()
    ->active()
    ->paginate(8);

      return view('products.index', compact('products'));
  }

  public function show(Product $slug)
  {
    $product = Product::whereTranslation('slug', $slug)
    ->with(['company','category','likes','comments'])->first();

      return view('products.show', compact('product'));
  }
  public function category($slug)
    {
      $producttype = ProductType::with('products')
          ->whereTranslation('slug', $slug)
          ->withTranslation()
          ->first();

       $products = $producttype
           ->products()
//       ->active()
       ->paginate(8);
//       dd($producttype);
      return view('products.category', compact('products','producttype'));
    }
}
