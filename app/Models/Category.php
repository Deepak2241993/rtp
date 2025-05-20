<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
        'cat_slug',
        'cat_description',
        'cat_image',
        'cat_status',
        'cat_orderby',
        'is_selected',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
