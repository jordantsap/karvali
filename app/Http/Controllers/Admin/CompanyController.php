<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{

    /**
     * Display a listing of Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('view-companies', 'App\Company');
      $companies = Company::orderBy('id', 'DESC')->paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating new Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create-companies', 'App\Company');
      $companytypes = CompanyType::all();
      return view('admin.companies.create', compact('companytypes'));
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
        'user_id' => 'integer|Auth::user()->id',
        'title' => 'required|min:5|max:100',
        'slug' => 'unique:companies,title',
        'meta_description' =>'max:160',
        'meta_keywords' =>'',
        'active' => 'nullable',
        'company_type' => 'required',
        'delivery' => '',
        'manager' => 'required',
        'header' => 'sometimes|image',
        'logo' => 'sometimes|image',
        'image1' => 'sometimes|image',
        'image2' => 'sometimes|image',
        'image3' => 'sometimes|image',
        'days' => 'array',
        'morningtime' => 'required',
        'afternoontime' => 'required',
        'telephone' => 'required',
        'website' => '',
        'email' => 'required|email',
        'facebook' => '',
        'twitter' => '',
        'pos' => 'required',
        'creditcard' => 'array',
        'delivery' => 'required',
        'description' => 'required|min:5',
    ));
         $company = new Company;

         $company->user_id = Auth::user()->id;
         $company->title = $request->title;
         $company->active = $request->active;
         $company->slug = Str::slug($request->title, '-');
         $company->meta_description = $request->input('meta_description');
         $company->meta_keywords = $request->input('meta_keywords');
         $company->company_type = $request->company_type;
         $company->delivery = $request->delivery;
         $company->manager = $request->manager;
         $company->header = $request->header;
         $company->logo = $request->logo;
         $company->image1 = $request->image1;
         $company->image2 = $request->image2;
         $company->image3 = $request->image3;
         $company->days = implode(" ",(array)$request->days);
         $company->morningtime = $request->morningtime;
         $company->afternoontime = $request->afternoontime;
         $company->telephone = $request->telephone;
         $company->website = $request->website;
         $company->email = $request->email;
         $company->facebook = strtolower($request->facebook);
         $company->twitter = strtolower($request->twitter);
         $company->pos = $request->pos;
         $company->creditcard = implode(" ",(array)$request->creditcard);
         $company->delivery = $request->input('delivery');
         $company->description = $request->description;

         if ($request->hasFile('header')) {
             $header = $request->file('header');
             $filename = time() . '.' . $header->getClientOriginalExtension();
             $location = public_path("images/companies/" . $filename);
             Image::make($header)->resize(800, 400)->save($location);
             $company->header = $filename;
           } else {
             $company->header = 'noimage.jpg';
           }

      if ($request->hasFile('logo')) {
          $logo = $request->file('logo');
          $filename = time() . '.' . $logo->getClientOriginalExtension();
          $location = public_path("images/companies/" . $filename);
          Image::make($logo)->resize(800, 400)->save($location);
          $company->logo = $filename;
        } else {
          $company->logo = 'noimage.jpg';
        }

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename = time() . '.' . $image1->getClientOriginalExtension();
            $location = public_path("images/companies/" . $filename);
            Image::make($image1)->resize(800, 400)->save($location);
            $company->image1 = $filename;
          } else {
            $company->image1 = 'noimage.jpg';
          }

          if ($request->hasFile('image2')) {
              $image2 = $request->file('image2');
              $filename = time() . '.' . $image2->getClientOriginalExtension();
              $location = public_path("images/companies/" . $filename);
              Image::make($image2)->resize(800, 400)->save($location);
              $company->image2 = $filename;
            } else {
              $company->image2 = 'noimage.jpg';
            }

            if ($request->hasFile('image3')) {
                $image3 = $request->file('image3');
                $filename = time() . '.' . $image3->getClientOriginalExtension();
                $location = public_path("images/companies/" . $filename);
                Image::make($image3)->resize(800, 400)->save($location);
                $company->image3 = $filename;
              } else {
                $company->image3 = 'noimage.jpg';
              }

      $company->save();
      $notification = array(
      'message' => 'Company added successfully',
      'alert-type' => 'info'
      );
      return redirect(route('admin.companies.show',$company->id))->with($notification);
    }


    /**
     * Show the form for editing Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update-companies', 'App\Company');
      $categories = CompanyType::all();
      $company = Company::find($id);

      return view('admin.companies.edit', compact('company', 'categories'));
    }

    /**
     * Update Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->authorize('update-companies', 'App\Company');
      $this->validate($request, array(
        'user_id' => 'integer|Auth::user()->id',
        'title' => 'required|min:5|max:100',
        'meta_description' =>'max:160',
        'meta_keywords' =>'',
        'active' => '',
        'slug' => 'unique:companies,title',
        'company_type' => 'required|integer',
        'delivery' => '',
        'manager' => 'required',
        'header' => 'image',
        'logo' => 'image',
        'image1' => 'image',
        'image2' => 'image',
        'image3' => 'image',
        'days' => 'nullable|array',
        'morningtime' => 'required',
        'afternoontime' => 'required',
        'telephone' => 'required',
        'website' => '',
        'email' => 'required|email',
        'facebook' => '',
        'twitter' => '',
        // 'address' => 'required_without:lat, lng',
        'pos' => 'sometimes',
        'creditcard' => 'sometimes|array',
        'delivery' => 'sometimes',
        'description' => 'required|min:5',
    ));
         $company = Company::find($id);

         $company->user_id = Auth::user()->id;
         $company->title = $request->input('title');
         $company->slug = Str::slug($request->input('title'), '-');
         $company->meta_description = $request->input('meta_description');
         $company->meta_keywords = $request->input('meta_keywords');
         $company->active = $request->active;
         $company->company_type = $request->input('company_type');
         $company->delivery = $request->input('delivery');
         $company->manager = $request->manager;
         $company->header = $request->header;
         $company->image1 = $request->image1;
         $company->image2 = $request->image2;
         $company->image3 = $request->image3;
         $company->days = implode(',', (array)$request->days);
         $company->morningtime = $request->morningtime;
         $company->afternoontime = $request->afternoontime;
         $company->telephone = $request->telephone;
         $company->website = strtolower($request->website);
         $company->email = strtolower($request->email);
         $company->facebook = strtolower($request->facebook);
         $company->twitter = strtolower($request->twitter);
         $company->pos = $request->pos;
         $company->creditcard = implode(',', (array)$request->creditcard);
         $company->delivery = $request->input('delivery');
         $company->description = $request->description;

         if ($request->hasFile('header')) {
           //add new logo
             $header = $request->file('header');
             $filename = time() . '.' . $header->getClientOriginalExtension();
             $location = public_path("images/companies/" . $filename);
             $oldfile = public_path("images/companies/" . $company->header);
             // dd($oldfile);
             if(File::exists($oldfile))
             {
                File::delete($oldfile);
              }
              Image::make($header)->resize(800, 400)->save($location);
              $company->header = $filename;
           }

     if ($request->hasFile('logo')) {
       //add new logo
         $logo = $request->file('logo');
         $filename = time() . '.' . $logo->getClientOriginalExtension();
         $location = public_path("images/companies/" . $filename);
         $oldfile = public_path("images/companies/" . $company->logo);
         // dd($oldfile);
         if(File::exists($oldfile))
         {
            File::delete($oldfile);
          }
          Image::make($logo)->resize(800, 400)->save($location);
          $company->logo = $filename;
       }

       if ($request->hasFile('image1')) {
         //add new image1
           $image1 = $request->file('image1');
           $filename = time() . '.' . $image1->getClientOriginalExtension();
           $location = public_path("images/companies/" . $filename);
           $oldfile1 = public_path("images/companies/" . $company->image1);
           // dd($oldfile);
           if(File::exists($oldfile1))
           {
              File::delete($oldfile1);
            }
            Image::make($image1)->resize(800, 400)->save($location);
            $company->image1 = $filename;
         }

         if ($request->hasFile('image2')) {
           //add new image2
             $image2 = $request->file('image2');
             $filename = time() . '.' . $image2->getClientOriginalExtension();
             $location = public_path("images/companies/" . $filename);
             $oldfile2 = public_path("images/companies/" . $company->image2);
             // dd($oldfile);
             if(File::exists($oldfile2))
             {
                File::delete($oldfile2);
              }
              Image::make($image2)->resize(800, 400)->save($location);
              $company->image2 = $filename;
           }

           if ($request->hasFile('image3')) {
             //add new image3
               $image3 = $request->file('image3');
               $filename = time() . '.' . $image3->getClientOriginalExtension();
               $location = public_path("images/companies/" . $filename);
               $oldfile3 = public_path("images/companies/" . $company->image3);
               // dd($oldfile);
               if(File::exists($oldfile3))
               {
                  File::delete($oldfile3);
                }
                Image::make($image3)->resize(800, 400)->save($location);
                $company->image3 = $filename;
             }
     $company->save();

     $notification = array(
     'message' => 'Company updated successfully',
     'alert-type' => 'info'
     );
     return redirect(route('admin.companies.show', $company->id))->with($notification);
    }

    /**
     * Display Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view-companies', 'App\Company');
      $company = Company::find($id);
      return view('admin.companies.company', compact('company'));
    }

    /**
     * Remove Company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('delete-companies', 'App\Company');
      $company = Company::find($id);
       $company->delete();
       $notification = array(
       'message' => 'Company deleted successfully',
       'alert-type' => 'info'
       );
       return back()->with($notification);
    }

}
