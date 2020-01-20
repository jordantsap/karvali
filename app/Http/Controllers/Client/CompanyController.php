<?php

namespace App\Http\Controllers\Client;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyType;

class CompanyController extends Controller
{
  public function index()
  {
    $companies = Company::with(['category','likes','comments'])
    ->withTranslation()
    ->active()->paginate(8);

      return view('companies.index', compact('companies'));
  }

  public function show($slug)
  {
    $company = Company::whereTranslation('slug', $slug)
    ->with(['products','category','likes','comments'])->first();

    return view('companies.show', compact('company'));
  }
  public function category($slug)
    {
      $companytype = Companytype::with('companies')
      ->whereTranslation('slug', $slug)
      ->withTranslation()
      ->first();

      $companies = $companytype->companies()
      ->with(['category','likes','comments'])
      ->active()
      ->paginate(8);

      return view('companies.category', compact('companies', 'companytype'));
    }
}
