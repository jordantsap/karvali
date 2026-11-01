<?php

namespace App\Http\Controllers\Owner;

use App\Enums\HouseListing;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Models\Company;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::query()
            ->whereIn('company_id', $this->rentalCompanyIds())
            ->with(['company', 'bookings'])
            ->withTranslation()
            ->latest()
            ->paginate();

        return view('auth.houses.index', compact('houses'));
    }

    public function create()
    {
        $companies = $this->rentalCompanies();

        return view('auth.houses.create', compact('companies'));
    }

    public function store(StoreHouseRequest $request)
    {
        $house = new House();
        $this->fillHouse($house, $request);
        $this->storeImages($house, $request);
        $house->save();
        $this->saveTranslations($house, $request);

        $this->toast('The house was saved and linked to your rental company.');

        return redirect()->route('owner.houses.show', $house);
    }

    public function show(House $house)
    {
        $this->authorize('view', $house);

        $house->load(['company', 'bookings' => fn ($query) => $query->latest()]);

        return view('auth.houses.show', compact('house'));
    }

    public function edit(House $house)
    {
        $this->authorize('update', $house);
        $companies = $this->rentalCompanies();

        return view('auth.houses.edit', compact('house', 'companies'));
    }

    public function update(UpdateHouseRequest $request, House $house)
    {
        $this->fillHouse($house, $request);
        $this->storeImages($house, $request);
        $house->save();
        $this->saveTranslations($house, $request);

        $this->toast('The house was updated.');

        return redirect()->route('owner.houses.show', $house);
    }

    public function destroy(House $house)
    {
        $this->authorize('delete', $house);
        $house->delete();

        $this->toast('The house was deleted.');

        return redirect()->route('owner.houses.index');
    }

    private function rentalCompanies()
    {
        return Company::query()
            ->where('user_id', auth()->id())
            ->rentalCompanies()
            ->with('category')
            ->withTranslation()
            ->get();
    }

    private function rentalCompanyIds()
    {
        return $this->rentalCompanies()->pluck('id');
    }

    private function fillHouse(House $house, Request $request): void
    {
        $house->company_id = $request->input('company_id');
        $house->listing_type = $request->input('listing_type');
        $house->price = $request->input('price');
        $house->price_period = $house->listing_type === HouseListing::RENT
            ? $request->input('price_period')
            : null;
        $house->bedrooms = $request->input('bedrooms');
        $house->bathrooms = $request->input('bathrooms');
        $house->area_sqm = $request->input('area_sqm');
        $house->address = $request->input('address');
        $house->city = $request->input('city');
        $house->active = $request->boolean('active');

        if (!$house->exists) {
            $house->status = House::STATUS_AVAILABLE;
        }
    }

    private function saveTranslations(House $house, Request $request): void
    {
        $englishTitle = $request->input('en.title');

        foreach (array_keys(config('translatable.locales')) as $locale) {
            $title = $request->input($locale.'.title') ?: $englishTitle;
            $translation = $house->translateOrNew($locale);
            $translation->title = $title;
            $translation->slug = $this->uniqueSlug($title, $locale, $house->id);
            $translation->meta_description = $request->input($locale.'.meta_description')
                ?: $request->input('en.meta_description');
            $translation->meta_keywords = $request->input($locale.'.meta_keywords')
                ?: $request->input('en.meta_keywords');
            $translation->description = $request->input($locale.'.description')
                ?: $request->input('en.description');
        }

        $house->save();
    }

    private function uniqueSlug(string $title, string $locale, ?int $ignoreHouseId = null): string
    {
        $base = Str::slug($title.'-'.$locale) ?: 'house-'.$locale;
        $slug = $base;
        $suffix = 2;

        while (
            \App\Models\Translations\HouseTranslation::query()
                ->where('slug', $slug)
                ->when($ignoreHouseId, fn ($query) => $query->where('house_id', '!=', $ignoreHouseId))
                ->exists()
        ) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function storeImages(House $house, Request $request): void
    {
        $directory = public_path('images/houses');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        foreach (['header', 'image1', 'image2', 'image3'] as $field) {
            if (!$request->hasFile($field)) {
                continue;
            }

            $image = $request->file($field);
            $name = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($directory.'/'.$name);

            $house->{$field} = 'images/houses/'.$name;
        }
    }

    private function toast(string $message): void
    {
        if (function_exists('toastr')) {
            toastr()->addSuccess($message);
        }
    }
}
