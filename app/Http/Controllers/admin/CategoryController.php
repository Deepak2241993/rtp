<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TempImage;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest();

        if (!empty($request->get('keyword'))) {
            $categories = $categories->where('cat_name', 'like', '%' . $request->get('keyword') . '%')->latest();
        }

        $categories = $categories->paginate(10);

        return view('admin.category.list', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories',
            // 'cat_image' => 'nullable|string|max:255',
            'cat_description' => 'required',
            'cat_orderby' => 'required',
            'is_selected' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keyword' => 'required',
        ]);

        if ($validator->passes()) {

            $category = new Category();
            $category->cat_name = $request->cat_name;
            $category->cat_slug = $request->cat_slug;
            $category->cat_image = $request->cat_image;
            $category->cat_description = $request->cat_description;
            $category->cat_status = $request->cat_status;
            $category->cat_orderby = $request->cat_orderby;
            $category->is_selected = $request->is_selected;
            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;
            $category->meta_keyword = $request->meta_keyword;
            $category->save();

            // save image here

            if (!empty($request->image_id)) {
                // Initialize ImageManager
                $manager = new ImageManager(new Driver());
            
                // Find the temporary image record
                $tempImage = TempImage::find($request->image_id);
            
                // Extract file extension
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
            
                // Define paths
                $sPath = public_path('/temp/' . $tempImage->name);
                $newImageName = $category->id . '-' . time() . '.' . $ext;
                $dPath = public_path('/uploads/category/' . $newImageName);
            
                // Read and resize the image
                $img = $manager->read($sPath);
                $img = $img->resize(133, 133);

                // dd($img);
            
                // Save the resized image to the new location
                $img->save($dPath);
            
                // Update the category with the new image name
                $category->cat_image = $newImageName;
                $category->save();
            }
            
            




            $request->session()->flash('success', 'Category added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($categoryId, Request $request)
    {
        $category = Category::find($categoryId);
        if (empty($category)) {
            return redirect()->route('categories.index');
        }

        return view('admin.category.edit', compact('category'));
    }
    public function update($categoryId, Request $request)
    {

        $category = Category::find($categoryId);

        if (empty($category)) {

            $request->session()->flash('error', 'Category Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Category not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories,cat_slug,' . $category->id . ',id',
            // 'cat_image' => 'nullable|string|max:255',
            'cat_description' => 'required',
            'cat_orderby' => 'required',
            'is_selected' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keyword' => 'required',
        ]);

        if ($validator->passes()) {

            $category->cat_name = $request->cat_name;
            $category->cat_slug = $request->cat_slug;
            // $category->cat_image = $request->cat_image;
            $category->cat_description = $request->cat_description;
            $category->cat_status = $request->cat_status;
            $category->cat_orderby = $request->cat_orderby;
            $category->is_selected = $request->is_selected;
            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;
            $category->meta_keyword = $request->meta_keyword;
            $category->save();

            $oldImage = $category->cat_image;

            // save image here

            // if (!empty($request->image_id)) {

            //     $tempImage = TempImage::find($request->image_id);
            //     $extArray = explode('.', $tempImage->name);
            //     $ext = last($extArray);

            //     $newImageName = $category->id . '-' . time() . '.' . $ext;
            //     $sPath = public_path() . '/temp/' . $tempImage->name;
            //     $dPath = public_path() . '/uploads/category/' . $newImageName;

            //     File::copy($sPath, $dPath);

            //     $category->cat_image = $newImageName;
            //     $category->save();

            //     // delete old image
            //     File::delete(public_path() . 'uploads/category/' . $oldImage);
            //     // File::delete(public_path().'uploads/category'.$oldImage);




            // }
            if (!empty($request->image_id)) {
                // Initialize ImageManager
                $manager = new ImageManager(new Driver());
            
                // Find the temporary image record
                $tempImage = TempImage::find($request->image_id);
            
                if (!$tempImage) {
                    return response()->json(['error' => 'Temporary image not found'], 404);
                }
            
                // Extract file extension
                $extArray = explode('.', $tempImage->name);
                $ext = end($extArray); // Use end() for better readability
            
                // Define paths
                $sPath = public_path('/temp/' . $tempImage->name);
                $newImageName = $category->id . '-' . time() . '.' . $ext;
                $dPath = public_path('/uploads/category/' . $newImageName);
            
                // Read and resize the image
                $img = $manager->read($sPath);
                $img = $img->resize(133, 133);
            
                // Save the resized image to the new location
                $img->save($dPath);
            
                // Update the category with the new image name
                $category->cat_image = $newImageName;
                $category->save();
            
                // Delete the old image if it exists
                if (isset($oldImage) && File::exists(public_path('/uploads/category/' . $oldImage))) {
                    File::delete(public_path('/uploads/category/' . $oldImage));
                }
            }


            $request->session()->flash('success', 'Category Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function destroy($categoryId, Request $request)
    {
        $category = Category::find($categoryId);

        if (empty($category)) {
            // return redirect()->route('categories.index');
            $request->session()->flash('error', 'Category Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Category NotFound Successfully'
            ]);
        }
        File::delete(public_path() . 'uploads/category/' . $category->cat_image);

        $category->delete();

        $request->session()->flash('success', 'Category Deleted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'Category Deleted Successfully'
        ]);
    }
}
