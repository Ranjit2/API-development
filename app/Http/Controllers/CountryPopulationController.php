<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CountryPopulationResource;

class CountryPopulationController extends Controller
{
    public function index()
    {
        return  CountryPopulationResource::collection(Population::countryWithHighestPopulation()->get());
    }
}
