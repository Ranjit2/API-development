<?php

namespace App\Http\Resources;

use App\Models\Population;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'country';

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => ucfirst($this->name),
            'total' => Population::where('country_id', $this->id)->count(),
        ];
    }
}
