<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Accommodation;
use App\Models\Company;
use App\Models\CompanyOpeningHours;
use App\Models\CompanyType;
use App\Models\Day;
use App\Models\Image as ImageModel;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $companytypes = CompanyType::withTranslation()->get();
//        $days = Day::get();
//        $sessions = Session::all();

        return view('auth.companies.create', compact('companytypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreCompanyRequest $request, Company $company)
    {
//        dd($request->all());

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
//        $company->image1 = $request->image1;
//        $company->image2 = $request->image2;
//        $company->image3 = $request->image3;
        $imageFields = ['header', 'logo', 'image1', 'image2', 'image3'];

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/accommodations', $imageName);
                $location = public_path("images/accommodations/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $company->{$fieldName} = $imagePath;
            }
        }

//        $company->days = json_encode($request->input('days'));
//        $company->opening_times = json_encode($request->input('opening_times'));
//        $company->closing_times = json_encode($request->input('closing_times'));

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
     * @param Company $company
     * @return Response
     */
    public function show(Company $company)
    {
        $companytypes = CompanyType::withTranslation()->first();
//        $sessions = $company->sessions();
//        $days = $company->openingHours->day();

        return view('auth.companies.company',compact(['company','companytypes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        $categories = CompanyType::withTranslation()->get();

        return view('auth.companies.edit', compact(['company','categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function update(Request $request, Company $company)
    {
//        return $request->all();

        $company->update($request->all());

        toastr()->addSuccess('Company updated successfully.');

        return  view('auth.companies.company', array('company' => $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
