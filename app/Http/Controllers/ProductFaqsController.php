<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductFaq;
use App\Models\Product;

class ProductFaqsController extends Controller
{
   // Display all sliders
   public function index(Request $request)
   {
       $query = ProductFaq::get();

    //    dd($query);
       return view('admin.faq.list', compact('query'));
   }


   // Show the form for creating a new slider
   public function create()
   {
        $products = Product::orderBy('product_name')->get();
        $data['products'] = $products;

          return view('admin.faq.create', $data);
   }

   // Store a newly created slider in the database
   public function store(Request $request)
   {
       // dd($request->all());

       $validator = Validator::make($request->all(), [
           'question' => 'required',
           'answer' => 'required',
       ]);

       if ($validator->passes()) {

           $productFaq = new ProductFaq();
           $productFaq->product_id = $request->product_id;
           $productFaq->question = $request->question;
           $productFaq->answer = $request->answer;
           $productFaq->save();         

           $request->session()->flash('success', 'Product FAQs added Successfully');

           return response()->json([
               'status' => true,
               'message' => 'Product FAQs added Successfully'
           ]);
       } else {
           return response()->json([
               'status' => false,
               'errors' => $validator->errors()
           ]);
       }
   }

   // Show the form for editing the specified slider
   public function edit($productFaqId, Request $request)
   {
       $productfaq = ProductFaq::find($productFaqId);
       if (!$productfaq) {
           return redirect()->route('product-faqs.index');
       }

       $products = Product::orderBy('product_name', 'ASC')->get();

       return view('admin.faq.edit', compact('productfaq', 'products'));
   }

   public function update($productFaqId, Request $request)
   {

       $productfaq = ProductFaq::find($productFaqId);

       if (empty($productfaq)) {

           $request->session()->flash('error', 'Product FAQs Not Found');
           return response()->json([
               'status' => false,
               'notFound' => true,
               'message' => 'Product FAQs not found'
           ]);
       }

       $validator = Validator::make($request->all(), [
           'title' => 'required',
           'description' => 'required',
       ]);

       if ($validator->passes()) {

           $productfaq->title = $request->title;
           $productfaq->description = $request->description;
           $productfaq->save();

         
           $request->session()->flash('success', 'Product FAQs Updated Successfully');

           return response()->json([
               'status' => true,
               'message' => 'Product FAQs Updated Successfully'
           ]);
       } else {
           return response()->json([
               'status' => false,
               'errors' => $validator->errors()
           ]);
       }
   }
   public function destroy($productFaqId, Request $request)
   {
       $Productfaq = ProductFaq::find($productFaqId);

       if (empty($Productfaq)) {
           // return redirect()->route('categories.index');
           $request->session()->flash('error', 'Product FAQs Not Found');
           return response()->json([
               'status' => true,
               'message' => 'Product FAQs NotFound Successfully'
           ]);
       }
     

       $Productfaq->delete();

       $request->session()->flash('success', 'Product FAQs Deleted Successfully');

       return response()->json([
           'status' => true,
           'message' => 'Product FAQs Deleted Successfully'
       ]);
   }
}
