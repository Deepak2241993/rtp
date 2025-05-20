<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TempImage;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subcategories = SubCategory::select('sub_categories.*','categories.cat_name as categoryName')
            ->latest('id')
            ->leftjoin('categories','categories.id','sub_categories.category_id');
    
    // dd($subcategories); // Output the results

        // Retrieve subcategories
        // $subcategories = SubCategory::query();

        // Apply keyword filter if provided
        if (!empty($request->get('keyword'))) {
            $subcategories->where('cat_name', 'like', '%' . $request->get('keyword') . '%');
        }

        // Order subcategories by latest and paginate
        $subcategories = $subcategories->latest()->paginate(10);

        // Pass data to the view
        return view('admin.subcategory.list', compact('subcategories'));
    }
    public function create()
    {
        $categories = Category::orderBy('cat_name')->get();
        $data['category'] = $categories;

        // dd($data['category']);

        return view('admin.subcategory.create', $data);
    }
    public function store(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'cat_sub_name' => 'required',
            'cat_sub_slug' => 'required|unique:sub_categories,cat_sub_slug', // Ensure cat_sub_slug is unique in subcategories table
            // 'cat_image' => 'nullable|string|max:255',
            'cat_sub_description' => 'required',
            'cat_sub_orderby' => 'required',
            'is_selected' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keyword' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->passes()) {

            $subcategory = new SubCategory();
            $subcategory->cat_sub_name = $request->cat_sub_name;
            $subcategory->cat_sub_slug = $request->cat_sub_slug;
            // $category->cat_image = $request->cat_image;
            $subcategory->cat_sub_description = $request->cat_sub_description;
            $subcategory->cat_sub_status = $request->cat_sub_status;
            $subcategory->cat_sub_orderby = $request->cat_sub_orderby;
            $subcategory->is_selected = $request->is_selected;
            $subcategory->meta_title = $request->meta_title;
            $subcategory->meta_desc = $request->meta_desc;
            $subcategory->meta_keyword = $request->meta_keyword;
            $subcategory->category_id = $request->category_id;
            $subcategory->save();

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $subcategory->id . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/subcategory/' . $newImageName;

                File::copy($sPath, $dPath);

                $subcategory->cat_sub_image = $newImageName;
                $subcategory->save();
            }


            $request->session()->flash('success', 'Sub Category added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Sub Category added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function edit($subcategoryId, Request $request)
    {
        $subcategory = SubCategory::select('sub_categories.*', 'categories.cat_name as categoryName')
            ->leftJoin('categories', 'categories.id', 'sub_categories.category_id')
            ->where('sub_categories.id', $subcategoryId)
            ->first();
    
        if (empty($subcategory)) {
            $request->session()->flash('error', 'Record Not Found');
            return redirect()->route('sub-categories.index');
        }
    
        $categories = Category::orderBy('cat_name', 'ASC')->get();
    
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    
    public function update($subcategoryId, Request $request)
    {

        $subcategory = SubCategory::find($subcategoryId);

        // dd($subcategory);

        if (empty($subcategory)) {

            $request->session()->flash('error', 'Sub Category Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Sub Category not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'cat_sub_name' => 'required',
            'cat_sub_slug' => 'required|unique:sub_categories,cat_sub_slug,' . $subcategory->id . ',id',
            // 'cat_image' => 'nullable|string|max:255',
            'cat_sub_description' => 'required',
            'cat_sub_orderby' => 'required',
            'is_selected' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keyword' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->passes()) {

            $subcategory->cat_sub_name = $request->cat_sub_name;
            $subcategory->cat_sub_slug = $request->cat_sub_slug;
            // $category->cat_image = $request->cat_image;
            $subcategory->cat_sub_description = $request->cat_sub_description;
            $subcategory->cat_sub_status = $request->cat_sub_status;
            $subcategory->cat_sub_orderby = $request->cat_sub_orderby;
            $subcategory->is_selected = $request->is_selected;
            $subcategory->meta_title = $request->meta_title;
            $subcategory->meta_desc = $request->meta_desc;
            $subcategory->meta_keyword = $request->meta_keyword;
            $subcategory->category_id = $request->category_id;
            $subcategory->save();

            $oldImage = $subcategory->cat_image;

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $subcategory->id . '-' . time() . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/subcategory/' . $newImageName;

                File::copy($sPath, $dPath);

                $subcategory->cat_sub_image = $newImageName;
                $subcategory->save();

                // delete old image
                File::delete(public_path() . 'uploads/subcategory/' . $oldImage);
                // File::delete(public_path().'uploads/subcategory'.$oldImage);

            }


            $request->session()->flash('success', 'Sub Category Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Sub Category Updated Successfully'
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
        $subcategory = SubCategory::find($categoryId);

        if (empty($subcategory)) {
            // return redirect()->route('categories.index');
            $request->session()->flash('error', 'Category Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Sub Category NotFound Successfully'
            ]);
        }
        File::delete(public_path() . 'uploads/category/' . $subcategory->cat_image);

        $subcategory->delete();

        $request->session()->flash('success', 'Sub Category Deleted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'Sub Category Deleted Successfully'
        ]);
    }
}
