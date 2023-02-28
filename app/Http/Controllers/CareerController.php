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
        $career = Career::create([
            'first_name' => $request->validated()['first_name'],
            'last_name' => $request->validated()['last_name'],
            'email' => $request->validated()['email'],
            'phone_number' => $request->validated()['phone_number'],
            'referred_via' => $request->validated()['referred_via'],
            'opt_in_marketing' => $request->validated()['opt_in_marketing'],
            'accepted_terms_and_conditions' => $request->validated()['accepted_terms_and_conditions'],
        ]);

        $career->address()->create([
            'country' => $request->validated()['country'],
            'street_address' => $request->validated()['street_address'],
            'city' => $request->validated()['city'],
            'region' => $request->validated()['region'],
            'postal_code' => $request->validated()['postal_code'],
        ]);

        session()->flash('flash.banner', 'Application successful, thank you!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('career.create');
    }
}
