<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getresults()
    {
      // return redirect()->back();
      return response('search results page')
      ->header("Refresh", "2;url=/");

    }
}
