<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Career;
use Inertia\Inertia;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Career/Index', [
            'careers' => Career::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $carrer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        //
    }
}
