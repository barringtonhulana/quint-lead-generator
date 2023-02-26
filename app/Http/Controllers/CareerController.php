<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
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
        //
    }

    /**
     * Show the form for creating a new career lead.
     * 
     * @return Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Career/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {

        $addressId = Address::create([
            'country' => $request->validated()['country'],
            'street_address' => $request->validated()['street_address'],
            'city' => $request->validated()['city'],
            'region' => $request->validated()['region'],
            'postal_code' => $request->validated()['postal_code'],
        ])->id;

        Career::create([
            'first_name' => $request->validated()['first_name'],
            'last_name' => $request->validated()['last_name'],
            'email' => $request->validated()['email'],
            'address_id' => $addressId,
            'phone_number' => $request->validated()['phone_number'],
            'referred_via' => $request->validated()['referred_via'],
            'opt_in_marketing' => $request->validated()['opt_in_marketing'],
            'accepted_terms_and_conditions' => $request->validated()['accepted_terms_and_conditions'],
        ]);

        return redirect()->route('career.create');
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
    public function update(UpdateCareerRequest $request, Career $career)
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
