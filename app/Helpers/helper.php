<?php

use App\Models\Category;
use App\Models\StaticPageContent;
use App\Models\WebsiteSettings;

function getCategories(){
    return Category::orderBy('cat_name', 'ASC')
    ->with('sub_categories')
    ->with('product')
    ->where('cat_status', 'active')
    ->get();
}


if (!function_exists('staticcontent')) {
    function staticcontent($id)
    {
        $content = StaticPageContent::find($id);
        return $content ? $content : '';
    }
}


// For Web Settings
if (!function_exists('websettings')) {
    function websettings($id)
    {
        $web = WebsiteSettings::find($id);
        return $web ? $web : '';
    }
}

?>
