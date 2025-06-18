<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;
use App\Http\Resources\EmployerResource;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function index()
    {
        return EmployerResource::collection(Employer::all());
    }

    public function store(EmployerRequest $request)
    {
        return new EmployerResource(Employer::create($request->validated()));
    }

    public function show(Employer $employer)
    {
        return new EmployerResource($employer);
    }

    public function update(EmployerRequest $request, Employer $employer)
    {
        $employer->update($request->validated());

        return new EmployerResource($employer);
    }

    public function destroy(Employer $employer)
    {
        $employer->delete();

        return response()->json();
    }
}
