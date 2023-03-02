<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use App\Mail\Careers\Welcome;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        try {
            DB::transaction(function () use ($request) {
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
        
                // QueueWelcomeMail::dispatch($career);
                $message = (new Welcome($career->first_name))
                    ->onQueue('emails');

                Mail::to($career->email)
                    ->queue($message);
                    });
            
    
            session()->flash('flash.banner', 'Application successful, thank you!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('flash.banner', 'Sorry, something went wrong');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('career.create');
    }
}
