<?php 

namespace App\Repository;

use App\Models\Population;
use Illuminate\Http\Request;

class UserRespository {

    public $population;
    public function __construct(Population $population)
    {
        $this->population = $population;
    }

    public function add(Request $request)
    {
        $this->population->create($request->all());
    }
}