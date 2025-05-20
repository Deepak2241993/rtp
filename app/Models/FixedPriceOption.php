<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedPriceOption extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'price_option', 'width', 'height', 'min_qty', 'max_qty', 'price'];

    
    public function fixed_price_ranges()
    {
        return $this->hasMany(FixedPriceRange::class); // Use the hasMany method correctly
    }

    // Belongs to Product relationship
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
