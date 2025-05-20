<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'first_name',
        'last_name',
        'business_name',
        'phone_number',
        'email',
        'quote_details',
        'file_path',
    ];
}
