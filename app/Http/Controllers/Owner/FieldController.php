<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Field;
use App\Models\ProductType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.fields.index', [
            'fields'=> Field::withTranslation()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $productTypes = ProductType::withTranslation()->get();

        return view('auth.fields.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFieldRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $option = new Field();
        $option->product_type_id = $request->product_type_id;

        foreach (config('translatable.locales') as $locale => $lang) {
            $option->translateOrNew($locale)->title = $request->{$locale}['title'];
            $option->translateOrNew($locale)->slug = Str::slug($request->{$locale}['title']);
        }

        $option->save();

        toastr()->addSuccess('Option was saved successfully.');

        return redirect(route('owner.fields.show', $option->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Field $field
     * @return Response
     */
    public function show(Field $field)
    {
//        return $option;
//        $option = Option::with('productType')
//            ->whereTranslation('slug',$option->slug)
//            ->first();

        return view('auth.fields.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Field $field
     * @return Response
     */
    public function edit(Field $field)
    {
        $productTypes = ProductType::withTranslation()->get();

        return view('auth.fields.edit', compact('field','productTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFieldRequest $request
     * @param Field $field
     * @return Response
     */
    public function update(Request $request, Field $field)
    {
//        dd($request->all());
        $field->update($request->all());

        toastr()->addSuccess('Field updated successfully.');

        return view('auth.fields.show', array('field' => $field));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Field $field
     * @return Response
     */
    public function destroy(Field $field)
    {
        Field::where('id',$field->id)->delete();
        toastr()->addSuccess('Field was deleted successfully.');

        return redirect(route('owner.fields.index'));
    }
}
