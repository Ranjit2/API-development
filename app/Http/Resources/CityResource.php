<?php

namespace App\Http\Resources;

use App\Models\Population;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => Str::upper($this->name),
            'country_id' => $this->country_id,
            'total' => Population::where('city_id', $this->id)->count()
        ];
    }
}
