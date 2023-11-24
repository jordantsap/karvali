<?php

namespace App\Http\Controllers\Owner;

use App\Helpers\GetInputs;
use App\Helpers\GetInputsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Image as ImageModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\OpeningHours\Day;

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
        $days = Day::days();
//        $sessions = Session::all();

        return view('auth.companies.create', compact('companytypes', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreCompanyRequest $request, Company $company)
    {
        $company = new Company();
        $company->active = $request->active;
        $company->company_type = $request->company_type;
//        $company->days = json_encode($request->input('days'));
//        $company->morningtime = '$request->morningtime';
//        $company->afternoontime = '$request->afternoontime';
//        $company->openhours = json_encode($openingHours->forWeek());
//        $company->creditcard = json_encode($request->input('creditcard'));
        $company->telephone = $request->telephone;
        $company->website = $request->website;
        $company->twitter = $request->twitter;
        $company->email = $request->email;
        $company->facebook = $request->facebook;
        $company->delivery = $request->delivery;
        $company->user_id = auth()->id();
        $company->header = $request->header;


        $imageFields = GetInputsHelper::imageFields();

        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/companies', $imageName);
                $location = public_path("images/companies/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $company->{$fieldName} = $imagePath;
            }
        }

//        $company->days = json_encode($request->input('days'));
//        $company->opening_times = json_encode($request->input('opening_times'));
//        $company->closing_times = json_encode($request->input('closing_times'));

        $company->save();
        $this->createShifts($company, $request);

        // // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/companies', $imageName); // You can specify a custom directory
                $location = public_path("images/companies/" . $imageName);
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
     * Store Company Shifts
     * @param $company
     * @param $request
     * @return void
     */
    private function createShifts($company, $request) {
        if(isset($request->days) and count($request->days)) {
            foreach ($request->days as $day) {

                /**
                 * Day Morning Shift
                 */
                $morning_opening = $day.'_morning_opening_time';
                $morning_closing = $day.'_morning_closing_time';
                if(isset($request->{$morning_opening}) and isset($request->{$morning_closing})) {
                    $shift['morning_opening_time'] = $request->{$morning_opening};
                    $shift['morning_closing_time'] = $request->{$morning_closing};
                }
                /**
                 * Day Afternoon Shift
                 */
                $afternoon_opening = $day.'_afternoon_opening_time';
                $afternoon_closing = $day.'_afternoon_closing_time';
                if(isset($request->{$afternoon_opening}) and isset($request->{$afternoon_closing})) {
                    $shift['afternoon_opening_time'] = $request->{$afternoon_opening};
                    $shift['afternoon_closing_time'] = $request->{$afternoon_closing};
                }

                /**
                 * Day Evening Shift
                 */
                $evening_opening = $day.'_evening_opening_time';
                $evening_closing = $day.'_evening_closing_time';
                if(isset($request->{$evening_opening}) and isset($request->{$evening_closing})) {
                    $shift['evening_opening_time'] = $request->{$evening_opening};
                    $shift['evening_closing_time'] = $request->{$evening_closing};
                }


                /**
                 * If any shift exist create the Shift
                 */
                if(isset($shift)) {

                    /**
                     * Create Through Relationship
                     */
                    $company->shifts()->create([...$shift, 'day' => $day]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function show(Company $company)
    {
        $companytypes = CompanyType::withTranslation()->first();

        $days = Day::days();

        return view('auth.companies.company', compact(['company', 'companytypes', 'days']));
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

        return view('auth.companies.edit', compact(['company', 'categories']));

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
        $imageFields = GetInputsHelper::imageFields();

        $company->update($request->except($imageFields));


        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);

                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/companies', $imageName);
                $location = public_path("images/companies/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);

                $company->{$fieldName} = $imagePath;
            }
        }
        // Handle multiple image uploads with polymorphic relationship
        if ($request->hasFile('imgfile')) {
            $company->images()->delete();
            $images = $request->file('imgfile');
            foreach ($images as $image) {
//                return $image;
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/companies', $imageName); // You can specify a custom directory
                $location = public_path("images/companies/" . $imageName);
                Image::make($image)->resize(800, 400)->save($location);
                // Save the image path to the database with polymorphic relationship
                $upload = new ImageModel(['path' => $imagePath]);
                $company->images()->save($upload);
//                $image->sync([$upload]);

            }
        }

        $company->save();

        toastr()->addSuccess('Company updated successfully.');

        return view('auth.companies.company', array('company' => $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        Company::where('id', $company->id)->delete();
        toastr()->addSuccess('Company was deleted successfully.');
        return redirect(route('owner.companies.index'));
    }
}
