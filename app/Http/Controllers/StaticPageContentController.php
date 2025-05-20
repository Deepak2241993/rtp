<?php

namespace App\Http\Controllers;

use App\Models\StaticPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class StaticPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StaticPageContent::OrderBy('id', 'desc')->paginate(10);    
        return view('admin.pages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'page_name' => 'required|string|max:255',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'status' => 'required|in:active,inactive',
            ]);
        
            $data = new StaticPageContent();
            $data->page_name = $request->page_name;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->status = $request->status;
        
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/pages'), $filename);
                $data->image = url('/uploads/pages').'/'.$filename;
            }
        
            $data->save();
        
            return redirect()->route('pages.index')->with('success', 'Page created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StaticPageContent $staticPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaticPageContent $staticPageContent,$id)
    {
        $data = StaticPageContent::find($id);
        return view('admin.pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaticPageContent $staticPageContent,$id)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);
    
        $data = StaticPageContent::findOrFail($id);
        $data->page_name = $request->page_name;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = public_path('uploads/pages/'.$data->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
    
            // Save new image
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/pages'), $filename);
            $data->image = url('/uploads/pages').'/'.$filename;
        }
    
        $data->save();
    
        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticPageContent $staticPageContent)
    {
        //
    }
}
