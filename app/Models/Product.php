<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'product_sku',
        'price_option',
        'product_description',
        'product_short_description',
        'related_products',
        'product_rating_review',
        'product_image',
        'product_price',
        'product_discounted_price',
        'category_id',
        'subcategory_id',
        'product_slug',
        'product_meta_title',
        'product_meta_keyword',
        'product_meta_desp',
        'product_status',
        'product_tag',
        'product_feature',
        'product_is_selected',
        'product_date',
        'product_comment',
        'product_color',
        'product_quantity',
        'product_size',
        'product_answer',
        'product_question',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function product_ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
    public function product_attribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function product_prices()
    {
        return $this->hasMany(ProductPrice::class);
    }
    public function price_ranges()
    {
        return $this->hasMany(PriceRange::class);
    }
    public function fixed_price_options()
    {
        return $this->hasMany(FixedPriceOption::class);
    }
    public function rigidMedia()
    {
        return $this->hasMany(RigidMedia::class);
    }
}
