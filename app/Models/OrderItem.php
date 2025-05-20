<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'orders_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'qty',
        'size',
        'color',
        'print_side',
        'pickup_option',
        'document',
        'price',
        'total'
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
