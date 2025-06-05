<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuttingOption extends Model
{
    use HasFactory;
    protected $table = 'cutting_options';
    protected $fillable = [
        'product_id',
        'cutting_type',
        'min_qty',
        'max_qty',
        'price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2);
    }
}
