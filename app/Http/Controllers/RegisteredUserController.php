<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;
use App\Http\Requests\StoreUserAndEmployerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAndEmployerRequest $request)
    {
        $userAttributes = Arr::only($request->validated(), ['name', 'email', 'password']);
        $employerAttributes = Arr::only($request->validated(), ['employer', 'logo']);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos');
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
