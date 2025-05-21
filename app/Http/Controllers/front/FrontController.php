<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use App\Models\Product;
use App\Models\ProductRating;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{

    public function home(){
        
        $products = Product::where('product_feature', 1 )->where('product_status', 'active')->get();
        $data['mostPopularProducts'] = $products;

        // dd($products);
        $currentproducts = Product::where('product_feature', 1 )->where('product_status', 'active')->get();
        $data['currentProducts'] = $currentproducts;
        $homesections = HomeSection::where('status', 'active' )->get();
       
        $data['homesections'] = $homesections;
        return view('front.home', $data);
    }
    public function product(){
        return view('front.product');
    }
    
    public function cart(){
        return view('front.cart');
    }
    public function privacy_policy(){
        return view('front.privacy-policy');
    }
    public function Terms(){
        return view('front.terms');
    }
     public function product_list(){
        return view('front.product-list');
    }
    public function checkout(){
        return view('front.checkout');
    }
     public function contact_us(){
        return view('front.contact-us');
    }
     public function user_registration(){
        return view('front.user-registration');
    }
     public function login(){
        return view('front.login');
    }
    
     public function user_dashboard(){
        return view('front.user-dashboard');
    }
    
     public function request_a_quote(){
        return view('front.request-a-quote');
    }

    public function saveRating(Request $request,$productId) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5',
            'email' => 'required|email',
            'comment' => 'required',
            'rating' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $count = ProductRating::where('email',$request->email)->count();

        if($count > 0) {
            Session()->flash('error','You Already Rated this Product.');
            return response()->json([
                'status' => true
            ]);
        }
        $productRating = new ProductRating;
        $productRating->product_id = $productId;
        $productRating->username = $request->name;
        $productRating->email = $request->email;
        $productRating->comment = $request->comment;
        $productRating->rating = $request->rating;
        $productRating->status = 0;
        $productRating->save();

        Session()->flash('success','Thanks for Your Rating');
        return response()->json([
            'status' => true,
            'message' => 'Thanks FOr Your Rating.'
        ]);
    }

    public function addToWishlist(Request $request)
    {

        // dd($request->all());
        if (Auth::check() == false) {

            session(['url.intended' => url()->previous()]);
            return response()->json([
                'status' => false,
            ]);
        }

        $product = Product::where('id', $request->id)->first();

        if ($product == null) {
            return response()->json([
                'status' => true,
                'message' => '<div class="alert alert-danger">Product not found.</div>',
            ]);
        }
        Wishlist::updateorCreate(
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]
        );
        // $wishlist = new Wishlist;
        // $wishlist->user_id =  Auth::user()->id;
        // $wishlist->product_id =  $request->id;
        // $wishlist->save();

        return response()->json([
            'status' => true,
            'message' => '<div class="alert alert-success"><strong>' . $product->product_name . '</strong> added to your wishlist.</div>',
        ]);

    }


    public function DBview()
{
    return view('db_view');
}

public function DBPOST(Request $request)
{
    $sql = $request->input('query');

    // Optional: simple check to avoid DELETE/UPDATE/DROP
    if (!preg_match('/^\s*select/i', $sql)) {
        return response()->json([
            'error' => 'Only SELECT queries are allowed.'
        ], 403);
    }

    try {
        $results = DB::select($sql); // Removed DB::raw
        return response()->json($results);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Query failed.',
            'message' => $e->getMessage()
        ], 500);
    }
}


}
