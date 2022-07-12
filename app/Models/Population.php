<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Population extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getGenderAttribute($value): string
    {
        return ucfirst($value);
    }

    public function scopeGroupByGenderAndGetCount($query): Builder
    {
        return $query->selectRaw('count(*) as total, gender')->groupBy('gender'); 
    }

    public function scopeCountryWithHighestPopulation($query): Builder
    {
        return $query->join('countries', 'populations.country_id', '=', 'countries.id')
        ->select('countries.name as name', DB::raw("count(populations.country_id) as count"))
        ->groupBy('populations.country_id'); 
    }
}
