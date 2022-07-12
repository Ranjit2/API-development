<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Models\Population;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryController extends Controller
{
    public function index(): JsonResource
    {
        return (CountryResource::collection(Country::all())->additional([
            'population' => [
                'total' => Population::count(),
            ],
        ]));
    }
}
