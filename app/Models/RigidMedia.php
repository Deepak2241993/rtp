<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RigidMedia extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's plural convention
    protected $table = 'rigid_media';

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'media_type', 
        'min_range', 
        'max_range', 
        'price', 
        'product_id', 
        'product_price_id'
    ];

    // Define relationships

    /**
     * Get the product associated with the rigid media.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product price associated with the rigid media.
     */
    public function productPrice()
    {
        return $this->belongsTo(ProductPrice::class);
    }
}