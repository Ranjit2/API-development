<?php

namespace App\Http\Resources;

use App\Models\Population;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryPopulationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return parent::toArray($request);;
    }
}
