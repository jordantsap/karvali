<?php

namespace App\Http\Controllers;

use App\Models\Translations\CompanyTranslation;
use App\Models\Translations\ProductTranslation;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

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
