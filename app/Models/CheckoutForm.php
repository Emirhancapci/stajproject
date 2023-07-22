<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutForm extends Model
{
    use HasFactory;

    protected $table = 'checkout_form';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'country',
        'note',
    ];

}

