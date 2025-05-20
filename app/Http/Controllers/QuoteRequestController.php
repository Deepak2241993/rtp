<?php

// app/Http/Controllers/QuoteRequestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use App\Mail\AdminQuoteRequestMail;
use App\Mail\UserQuoteRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            // 'type' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'businessname' => 'nullable|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'formBuilder.245588' => 'required|string',
            'file' => 'nullable|file|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        $quoteRequest = QuoteRequest::create([
            'type' => $request->input('requestName'),
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'business_name' => $request->input('businessname'),
            'phone_number' => $request->input('phonenumber'),
            'email' => $request->input('email'),
            'quote_details' => $request->input('formBuilder.245588'),
            'file_path' => $filePath,
        ]);

        // dd('$quoteRequest');
        // Send email to admin
        try {
            Log::info('Attempting to send email to admin');
            Mail::to('shilpadhar84@gmail.com')->send(new AdminQuoteRequestMail($quoteRequest->toArray(), $filePath));
            Log::info('Email sent to admin successfully');
        } catch (\Exception $e) {
            Log::error('Failed to send email to admin: ' . $e->getMessage());
        }
        
        // Send email to user
        $userEmail = $request->input('email');
        try {
            Log::info('Attempting to send email to user: ' . $userEmail);
            Mail::to($userEmail)->send(new UserQuoteRequestMail($quoteRequest->toArray(), $filePath));
            Log::info('Email sent to user successfully');
        } catch (\Exception $e) {
            Log::error('Failed to send email to user: ' . $e->getMessage());
        }

        // Send email to admin
        // Mail::to('8077vishal@gmail.com')->send(new AdminQuoteRequestMail($quoteRequest->toArray(), $filePath));

        // // Send email to user
        // $userEmail = $request->input('email');
        // Mail::to($userEmail)->send(new UserQuoteRequestMail($quoteRequest->toArray(), $filePath));


        return response()->json([
            'success' => 'Form submitted successfully. An email has been sent to ' . $userEmail . '.'
        ]);
    }
}
