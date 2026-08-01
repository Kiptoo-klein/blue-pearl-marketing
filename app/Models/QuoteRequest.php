<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'service',
        'cargo_type',
        'origin',
        'destination',
        'message',
        'status',
    ];
}
