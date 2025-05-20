<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebsiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteSettings $websiteSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteSettings $websiteSettings)
    {
        $websiteSettings = WebsiteSettings::first();
        return view('admin.website-settings.index', compact('websiteSettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteSettings $websiteSettings)
{
    // Get the existing settings
    $websiteSettings = WebsiteSettings::first();

    // Save old image names for deletion
    $oldLogo = $websiteSettings->logo;
    $oldFavicon = $websiteSettings->favicon;

    // Handle logo upload
    if ($request->hasFile('logo')) {
        $logoFile = $request->file('logo');
        $logoExt = $logoFile->getClientOriginalExtension();
        $newLogoName = $websiteSettings->id . '-logo-' . time() . '.' . $logoExt;

        $logoFile->move(public_path('uploads/logo'), $newLogoName);

        // Delete old logo
        if (!empty($oldLogo)) {
            File::delete(public_path('uploads/logo/' . $oldLogo));
        }

        $websiteSettings->logo = url('/uploads/logo/'.$newLogoName);
    }

    // Handle favicon upload
    if ($request->hasFile('favicon')) {
        $faviconFile = $request->file('favicon');
        $faviconExt = $faviconFile->getClientOriginalExtension();
        $newFaviconName = $websiteSettings->id . '-favicon-' . time() . '.' . $faviconExt;

        $faviconFile->move(public_path('uploads/favicon'), $newFaviconName);

        // Delete old favicon
        if (!empty($oldFavicon)) {
            File::delete(public_path('uploads/favicon/' . $oldFavicon));
        }

        $websiteSettings->favicon = url('/uploads/favicon/'.$newFaviconName);
    }
// dd($websiteSettings);
    // Update other fields
    $websiteSettings->email = $request->email;
    $websiteSettings->phone = $request->phone;
    $websiteSettings->address = $request->address;
    $websiteSettings->facebook = $request->facebook;
    $websiteSettings->twitter = $request->twitter;
    $websiteSettings->instagram = $request->instagram;
    $websiteSettings->linkedin = $request->linkedin;
    $websiteSettings->youtube = $request->youtube;
    $websiteSettings->whatsapp = $request->whatsapp;
    $websiteSettings->telegram = $request->telegram;

    // Save all changes
    $websiteSettings->save();

    return redirect()->back()->with('success', 'Website settings updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteSettings $websiteSettings)
    {
        //
    }

    public function christmas_gift_card(){
         $coupon_code = GiftCoupon::select('gift_coupons.*')
        ->orderBy('id', 'DESC')->where('gift_coupons.status',1)
        ->get();
        $occassion = EmailTemplate::where('status',1)->get();
        return view('pages_for_occasion.christmas',compact('coupon_code','occassion'));
    } 

    
}
