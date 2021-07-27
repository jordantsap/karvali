<?php

namespace App\Observers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesObserver
{
    /**
     * Handle the company "creating" event.
     *
     * @param  \App\Company  $company
     * @return void
     */
    public function creating(Company $company)
    {
      return $company->active = 1;
    }

    /**
     * Handle the company "updating" event.
     *
     * @param  \App\Company  $company
     * @return void
     */
    public function updating(Company $company)
    {
        //
    }
}
