<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductImageController extends Controller
{
    public function update(Request $request)
    {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $tempImageLocation = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'NULL';
        $productImage->save();

        $imageName = $request->product_id . '-' . $productImage->id . '-' . time() . '.' . $ext;

        $productImage->image = $imageName;
        $productImage->save();

        $sPath = $tempImageLocation;
        $dPath = public_path() . '/uploads/product/' . $imageName;

        File::copy($sPath, $dPath);

        $productImage->product_image = $imageName;
        $productImage->save();

        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            'ImagePath' => asset('/uploads/product/'. $productImage->image),
            'message' => 'Image Save Successfully'
        ]);

    }
    public function destroy(Request $request){
        $productImage = ProductImage::find($request->id);

        if(empty($productImage)) {
            return response()->json([
                'status' => false,
                'message' => 'Image Not Found'
            ]);

        }

        // Delete images form  folder

        File::delete(public_path('/uploads/product/'.$productImage->image));

        $productImage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image Deleted Successfully'
        ]);
    }
}
