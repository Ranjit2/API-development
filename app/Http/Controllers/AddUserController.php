<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Repository\UserRespository;
use App\Http\Requests\AddUserRequest;

class AddUserController extends Controller
{
    protected $user;

    public function __construct(UserRespository $user)
    {
        $this->user = $user;
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(AddUserRequest $request)
    {
        $this->user->add($request);

        return back()->with('message', 'User added!');
    }
}
