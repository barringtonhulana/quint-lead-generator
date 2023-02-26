<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address_id',
        'phone_number',
        'referred_via',
        'opt_in_marketing',
        'accepted_terms_and_conditions',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'created_at' => 'datetime:d F Y - H:m:s',
        'updated_at' => 'datetime:d F Y - H:m:s',
    ];
}
