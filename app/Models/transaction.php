<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'paid_amount',
        'generated_date_time',
        'payment_status',
        'description',
        'transaction_id'
    ];

   
}
