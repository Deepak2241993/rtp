<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'email', 'address', 'notee',
        'subtotal', 'shipping', 'grand_total', 'status'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
     // Define the relationship to the User model
     public function user()
     {
         return $this->belongsTo(User::class);
     }

}
