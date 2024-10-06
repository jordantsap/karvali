<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyType;

class CompanyTypeController extends Controller
{
    public function index()
    {
        $companyTypes = CompanyType::withTranslation()

        // ->where('user_id', auth()->user()->id)

            ->orderBy('created_at', 'desc')->get();

        return view('admin.company-types.index',compact('companyTypes'));

    }

    public function create()
    {
        return view('admin.company-types.create');
    }
    public function store(Request $request)
    {
        $companyType = new CompanyType();

        foreach (config('translatable.locales') as $locale => $lang) {
            $companyType->translateOrNew($locale)->title = $request->{$locale}['title'];
        }

        $companyType->save();

        toastr()->addSuccess('CompanyType was saved successfully.');

        return redirect(route('admin.company-types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   $ this->authorize('delete-products', 'App\Product');
        CompanyType::where('id',$id)->delete();
        $notification = array(
            'message' => 'CompanyType deleted successfully',
            'alert-type' => 'success'
        );
        return redirect(route('admin.company-types.index'))->with($notification);
    }
}
