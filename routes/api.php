<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\CountryPopulationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('countries', [CountryController::class, 'index']);
Route::get('cities', [CityController::class, 'index']);

Route::get('country/cities', [CityController::class, 'cityBasedOnCountryId']);
Route::get('gender', [PopulationController::class,'index']);
Route::get('country/city/gender', [PopulationController::class,'genderBasedOnCountriesCity']);
Route::get('country/city/genderbased/category', [PopulationController::class,'genderBasedcategory']);

Route::get('country/population', [CountryPopulationController::class,'index']);
