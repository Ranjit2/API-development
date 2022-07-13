<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryPopulationResource;

class CountryPopulationController extends Controller
{
    public function index(): JsonResource
    {
        return CountryPopulationResource::collection(
            Population::countryWithHighestPopulation()
                ->get()
        );
    }
}
