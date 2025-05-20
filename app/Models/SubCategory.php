<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_sub_name',
        'cat_sub_slug',
        'cat_sub_description',
        'cat_sub_image',
        'cat_sub_status',
        'cat_sub_orderby',
        'is_selected',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'category_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Assuming 'category_id' is the foreign key
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id'); // Assuming 'category_id' is the foreign key
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'subcategory_id'); // Assuming 'category_id' is the foreign key
    }

}
