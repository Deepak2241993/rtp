<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributte extends Model
{
    use HasFactory;
    protected $table = 'products_attributes';
    protected $fillable = [
        'product_id',
        'product_sku',
        'product_price',
        'size',
        'color',
        'print_side',
        'status'
    ];

}
