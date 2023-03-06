<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use App\Models\Product;
use App\Models\Event;
use App\Models\Company;
use App\Translations\CompanyTranslation;
use App\Translations\ProductTranslation;

class SearchController extends Controller
{
    public function getresults(Request $request)
    {

      $query = $request->input('query');

      if (!$request->input('query')) {
        $notification = array(
          'message' => 'Notice! <br><hr>Nothing found here, search better this time',
          'alert-type' => 'danger'
          );
        return redirect()->back()->with($notification);
      } else {
        // return $query;
        $results = Search::new()
        ->add(ProductTranslation::class, 'title')
        ->add(CompanyTranslation::class, 'title')
        ->includeModelType()
        ->paginate(10)
        ->search($query);

        return view('searchresults', compact('results', 'query'));
      }
    }
}
