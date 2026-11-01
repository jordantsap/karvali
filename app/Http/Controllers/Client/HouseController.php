<?php

namespace App\Http\Controllers\Client;

use App\Enums\HouseListing;
use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $listing = $request->query('listing');
        if (!in_array($listing, [HouseListing::RENT, HouseListing::SALE], true)) {
            $listing = null;
        }

        $houses = House::query()
            ->active()
            ->available()
            ->with('company')
            ->when($listing, fn ($query) => $query->where('listing_type', $listing))
            ->when($request->filled('city'), function ($query) use ($request) {
                $query->where('city', 'like', '%'.$request->query('city').'%');
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('houses.index', compact('houses', 'listing'));
    }

    public function show(string $slug)
    {
        $house = House::query()
            ->whereTranslation('slug', $slug)
            ->with(['company', 'bookings' => function ($query) {
                $query->whereIn('status', [\App\Enums\Status::PENDING, \App\Enums\Status::COMPLETED])
                    ->orderBy('check_in_date');
            }])
            ->firstOrFail();

        if (!$house->active) {
            abort(404);
        }

        return view('houses.show', compact('house'));
    }
}
