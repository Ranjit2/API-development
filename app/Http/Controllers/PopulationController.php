<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Support\Str;
use App\Http\Requests\PopulationRequest;
use Illuminate\Database\Eloquent\Collection;

class PopulationController extends Controller
{
    public function index(): Collection
    {
        return Population::groupByGenderAndGetCount()->get();
    }

    public function genderBasedOnCountriesCity(PopulationRequest $request): Collection
    {
        return Population::groupByGenderAndGetCount('country_id', $request->country_id)
            ->where('city_id', $request->city_id)
            ->get();
    }

    public function genderBasedcategory(PopulationRequest $request): Collection
    {
        return Population::where('country_id', $request->country_id)
            ->where('city_id', $request->city_id)
            ->where('gender', Str::lower($request->gender))
            ->get();
    }
}
