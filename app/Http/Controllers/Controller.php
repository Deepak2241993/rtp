<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\StaticPageContent;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function staticcontent($id)
    {
        $pagesContent = StaticPageContent::find($id);
        return $pagesContent;

    }
}
