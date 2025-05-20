<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomeSliderController extends Controller
{
    // Display all sliders
    public function index(Request $request)
    {
        $query = HomeSlider::query();

        if (!empty($request->get('keyword'))) {
            $query->where('cat_name', 'like', '%' . $request->get('keyword') . '%');
        }

        $homeSliders = $query->latest()->paginate();

        return view('admin.homeslider.list', compact('homeSliders'));
    }


    // Show the form for creating a new slider
    public function create()
    {
        return view('admin.homeslider.create');
    }

    // Store a newly created slider in the database
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $homeslider = new HomeSlider();
            $homeslider->title = $request->title;
            $homeslider->description = $request->description;
            $homeslider->homesliders_status = $request->homesliders_status;
            $homeslider->save();

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $homeslider->id . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/homeslider/' . $newImageName;

                File::copy($sPath, $dPath);

                $homeslider->image = $newImageName;
                $homeslider->save();
            }


            $request->session()->flash('success', 'Home Slider added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Home Slider added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Show the form for editing the specified slider
    public function edit($homeSliderId, Request $request)
    {
        $homeslider = HomeSlider::find($homeSliderId);
        if (empty($homeslider)) {
            return redirect()->route('home-slider.index');
        }

        return view('admin.homeslider.edit', compact('homeslider'));
    }

    public function update($homeSliderId, Request $request)
    {

        $homeslider = HomeSlider::find($homeSliderId);

        if (empty($homeslider)) {

            $request->session()->flash('error', 'Home Slider Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Home Slider not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $homeslider->title = $request->title;
            $homeslider->description = $request->description;
            $homeslider->homesliders_status = $request->homesliders_status;
            $homeslider->save();

            $oldImage = $homeslider->image;

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $homeslider->id . '-' . time() . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/homeslider/' . $newImageName;

                File::copy($sPath, $dPath);

                $homeslider->image = $newImageName;
                $homeslider->save();

                // delete old image
                File::delete(public_path() . 'uploads/homeslider/' . $oldImage);
                // File::delete(public_path().'uploads/category'.$oldImage);
            }


            $request->session()->flash('success', 'Home Slider Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Home Slider Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function destroy($homeSliderId, Request $request)
    {
        $homeslider = HomeSlider::find($homeSliderId);

        if (empty($homeslider)) {
            // return redirect()->route('categories.index');
            $request->session()->flash('error', 'Home Slider Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Home Slider NotFound Successfully'
            ]);
        }
        File::delete(public_path() . 'uploads/homeslider/' . $homeslider->image);

        $homeslider->delete();

        $request->session()->flash('success', 'Home slider Deleted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'Home Slider Deleted Successfully'
        ]);
    }

    // Home Section

    public function indexSection(Request $request)
    {
        $query = HomeSection::query();

        if (!empty($request->get('keyword'))) {
            $query->where('heading', 'like', '%' . $request->get('keyword') . '%');
        }

        $homesections = $query->latest()->paginate();

        return view('admin.homesection.list', compact('homesections'));
    }
    public function createSection()
    {
        return view('admin.homesection.create');
    }
    public function storeSection(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'description' => 'required',
        ]);
        if ($validator->passes()) {
            $homesection = new HomeSection();
            $homesection->heading = $request->heading;
            $homesection->sub_heading = $request->sub_heading;
            $homesection->description = $request->description;
            $homesection->status = $request->status;
            $homesection->save();

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $homesection->id . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/homesection/' . $newImageName;

                File::copy($sPath, $dPath);

                $homesection->image = $newImageName;
                $homesection->save();
            }
            $request->session()->flash('success', 'Home Section Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Home Section added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function editSection($homeSectionId, Request $request)
    {
        $homesection = HomeSection::find($homeSectionId);
        if (empty($homesection)) {
            return redirect()->route('home-section.index');
        }
        return view('admin.homesection.edit', compact('homesection'));
    }
    public function updateSection($homeSectionId, Request $request)
    {
        $homesection = HomeSection::find($homeSectionId);

        if (empty($homesection)) {
            $request->session()->flash('error', 'Home Section Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Home Section not found'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'description' => 'required',
        ]);
        if ($validator->passes()) {

            $homesection->heading = $request->heading;
            $homesection->sub_heading = $request->sub_heading;
            $homesection->description = $request->description;
            $homesection->status = $request->status;
            $homesection->save();

            $oldImage = $homesection->image;

            // save image here

            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $homesection->id . '-' . time() . '.' . $ext;
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/homesection/' . $newImageName;

                File::copy($sPath, $dPath);

                $homesection->image = $newImageName;
                $homesection->save();

                // delete old image
                File::delete(public_path() . 'uploads/homesection/' . $oldImage);
            }
            $request->session()->flash('success', 'Home Section Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Home Section Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function destroySection($homeSectionId, Request $request)
    {
        $homesection = HomeSection::find($homeSectionId);

        if (empty($homesection)) {
            // return redirect()->route('categories.index');
            $request->session()->flash('error', 'Home Section Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Home Section Not Found Successfully'
            ]);
        }
        File::delete(public_path() . 'uploads/homesection/' . $homesection->image);
        $homesection->delete();
        $request->session()->flash('success', 'Home Section Deleted Successfully');
        return response()->json([
            'status' => true,
            'message' => 'Home Section Deleted Successfully'
        ]);
    }
}
