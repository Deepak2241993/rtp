<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedPriceRange extends Model
{
    use HasFactory;

    protected $fillable = ['fixed_price_option_id', 'min_qty', 'max_qty', 'price'];

    
    public function fixedPriceOption()
    {
        return $this->belongsTo(FixedPriceOption::class);
    }
}
