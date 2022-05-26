<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use App\Models\Product;
use App\Models\Company;
class SearchController extends Controller
{
    public function getresults(Request $request)
    {

      if (!$request->input('query')) {
        $notification = array(
          'message' => 'Nothing found here, search better this time', 'Notice!',
          'alert-type' => 'danger'
          );
        return redirect()->back()->with($notification);
      } else {
        $query = $request->input('query');
        // return $query;
        Search::new()
        ->add(Product::class, 'title')
        ->add(Company::class, 'title')
        ->get('howto');
          // ->paginate(10)

        return view('searchresults', compact('results'));
      }
      
      
    }
}