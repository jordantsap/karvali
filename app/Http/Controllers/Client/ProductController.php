<?php

namespace App\Http\Controllers\Client;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductType;
use App\Company;
use App\Comment;
class ProductController extends Controller
{
  public function index()
  {
    // $producttypes = ProductType::all();
    $products = Product::with(['category','company','likes','comments'])
    ->withTranslation()
    ->active()
    ->paginate(8);
      return view('products.index', compact('products'));
  }

  public function show($slug)
  {
    $product = Product::whereTranslation('slug', $slug)
    ->with(['company','category','likes','comments'])->firstOrFail();

      return view('products.show', compact('product'));
  }
  public function category($slug)
    {
      $producttype = ProductType::whereTranslation('slug', $slug)->first();

      $products = $producttype
      ->products()
      ->with(['company','category','likes','comments'])
      ->active()->paginate(8);
      // dd($producttype);
      return view('products.category', compact('products', 'producttype'));
    }
}
