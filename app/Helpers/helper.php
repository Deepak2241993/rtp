<?php

use App\Models\Category;

function getCategories(){
    return Category::orderBy('cat_name', 'ASC')
    ->with('sub_categories')
    ->with('product')
    ->where('cat_status', 'active')
    ->get();
}



?>
