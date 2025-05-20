<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TemImagesController extends Controller
{
    public function create(Request $request){

        $image = $request->image;

        if (!empty($image)) {
            $ext = $image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $tempImage = new TempImage();
            $tempImage->name = $newName;
            $tempImage->save();

            if ($image->move(public_path().'/temp/', $newName)) {
                return response()->json([
                    'status' => true,
                    'image_id' => $tempImage->id,
                    'ImagePath' => asset('/temp/'.$newName),
                    'message' => 'Image Uploaded Successfully'
                ]);
            } else {
                // Handle error if image move operation fails
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to move the image to the destination directory'
                ]);
            }
        } else {
            // Handle error if no image is provided
            return response()->json([
                'status' => false,
                'message' => 'No image provided'
            ]);
        }

    }
}
