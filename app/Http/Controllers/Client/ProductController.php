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

  public function show($slug)
  {
    $product = Product::whereTranslation('slug', $slug)
    ->with(['company','category','likes','comments'])->first();

      return view('products.show', compact('product'));
  }
  public function category(ProductType $slug)
    {
      $producttype = ProductType::whereTranslation('slug', $slug)->get();

//       $products = $producttype
//       ->products()
//       ->with(['company','category','likes','comments'])
//       ->active()
//       ->get();
//       return $producttype;
//      return view('products.category', compact('producttype'));
    }
}
