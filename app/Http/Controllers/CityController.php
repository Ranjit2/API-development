<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;


class CityController extends Controller
{
    public function index(): JsonResource
    {
        return CityResource::collection(City::all());
    }

    public function cityBasedOnCountryId(Request $request): JsonResource
    {
        return CityResource::collection(City::whereCountryId($request->country_id)->get());
    }
}
