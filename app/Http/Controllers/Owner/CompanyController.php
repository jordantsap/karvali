<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Accommodation;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Image as ImageModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where('user_id', auth()->user()->id)
            ->withTranslation()
            ->paginate();

        return view('auth.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companytypes = CompanyType::withTranslation()->get();

        return view('auth.companies.create', compact('companytypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Company $company)
    {
//        var_dump($request->all());

        $company = new Company();
        $company->active = $request->active;
        $company->company_type = $request->company_type;
//        $company->days = json_encode($request->input('days'));
//        $company->creditcard = json_encode($request->input('creditcard'));
//        $company->morningtime = '$request->morningtime';
//        $company->afternoontime = '$request->afternoontime';
        $company->telephone = $request->telephone;
        $company->website = $request->website;
        $company->twitter = $request->twitter;
        $company->email = $request->email;
        $company->facebook = $request->facebook;
        $company->pos = $request->pos;
        $company->delivery = $request->delivery;
        $company->user_id = auth()->id();
        $company->header = $request->header;
        $company->logo = $request->logo;
        $company->image1 = $request->image1;
        $company->image2 = $request->image2;
        $company->image3 = $request->image3;

        $company->days = json_encode($request->input('days'));
        $company->opening_times = json_encode($request->input('opening_times'));
        $company->closing_times = json_encode($request->input('closing_times'));

        $company->save();

         // // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/accommodations', $imageName); // You can specify a custom directory
                $location = public_path("images/accommodations/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $company->images()->save($upload);

            }
        }

        foreach (config('translatable.locales') as $locale => $lang) {
            $company->translateOrNew($locale)->title = $request->{$locale}['title'];
            $company->translateOrNew($locale)->slug = Str::slug($request->{$locale}['title']);
            $company->translateOrNew($locale)->meta_description = $request->{$locale}['meta_description'];
            $company->translateOrNew($locale)->meta_keywords = $request->{$locale}['meta_keywords'];
            $company->translateOrNew($locale)->manager = $request->{$locale}['manager'];
            $company->translateOrNew($locale)->description = $request->{$locale}['description'];
        }

        $company->save();

        toastr()->addSuccess('Company was saved successfully.');

        return redirect(route('owner.companies.show', $company->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $companytypes = CompanyType::withTranslation()->get();

        return view('auth.companies.company',compact(['company','companytypes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $categories = CompanyType::withTranslation()->get();

        return view('auth.companies.edit', compact(['company','categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return  view('auth.companies.company', array('company' => $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
