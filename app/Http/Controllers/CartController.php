<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;


class CartController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        // dd(env('STRIPE_SECRET')); // Check the value of the secret key
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }
    
    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product = Product::with('product_images')->find($request->id);
        if (!$product) {
            return $this->jsonResponse(false, 'Product not found.');
        }

        $cartItem = $this->findCartItem($product->id, $request);
        if ($cartItem) {
            return $this->jsonResponse(true, $product->product_name . ' with selected options is already in your cart.');
        }

        // Prepare options array
        $options = $this->prepareCartItemOptions($product, $request);

        // Add product to the cart
        Cart::add([
            'id' => $product->id,
            'product_allows_custom_size' => $product->product_allows_custom_size,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $request->price,
            'options' => $options,
        ]);

        return $this->jsonResponse(true, "<strong>{$product->product_name}</strong> added to your cart successfully.");
    }

    private function findCartItem($productId, Request $request)
    {
        $cartContent = Cart::content();
        foreach ($cartContent as $item) {
            if ($item->id == $productId && $this->itemOptionsMatch($item->options, $request)) {
                return $item;
            }
        }
        return null;
    }

    private function itemOptionsMatch($options, $request)
    {
        $attributes = [
            'size', 'color', 'printSides' ,'printedSides', 'price', 'finishings', 'thickness',
            'wirestakesqtys', 'framesizes', 'displaytypes', 'installations',
            'materials', 'corners', 'applications', 'paperthickness',
            'copiesrequireds', 'pagesinnotepads', 'pickup_option', 'uploadedFileName','uploadTokenFile'
        ];
        foreach ($attributes as $attribute) {
            if ($options->$attribute != $request->$attribute) {
                return false;
            }
        }
        return true;
    }

    private function prepareCartItemOptions(Product $product, Request $request)
    {
        return [
            'productImage' => $product->product_images->first() ? $product->product_images->first()->url : '',
            'size' => $request->size,
            'color' => $request->color,
            'printedSides' => $request->printedSides,
            'pickup_option' => $request->pickup_option,
            'finishings' => $request->finishings,
            'thickness' => $request->thickness,
            'wirestakesqtys' => $request->wirestakesqtys,
            'framesizes' => $request->framesizes,
            'displaytypes' => $request->displaytypes,
            'installations' => $request->installations,
            'materials' => $request->materials,
            'corners' => $request->corners,
            'applications' => $request->applications,
            'paperthickness' => $request->paperthickness,
            'copiesrequireds' => $request->copiesrequireds,
            'pagesinnotepads' => $request->pagesinnotepads,
            'uploadedFileName' => $request->uploadedFileName,
            'uploadTokenFile' => $request->uploadTokenFile,
        ];
    }

    private function jsonResponse($status, $message)
    {
        return response()->json(['status' => $status, 'message' => $message]);
    }

    // public function Cart(){

    //     // dd(Cart::content());
    //     $cartContent = Cart::content();

    //     dd($cartContent); die;
    //     $data['cartContent'] = $cartContent;
    //     return view('front.cart', $data);

    // }

    public function cart() {


        $cartContent = Cart::content();

        // dd($cartContent); die;
        // Accessing size and color for each item in the cart
        foreach ($cartContent as $item) {
            $item->size = $item->options->size ?? null;
            $item->color = $item->options->color ?? null;
            $item->printedSides = $item->options->printedSides ?? null;
            $item->pickup_option = $item->options->pickup_option ?? null;
            $item->finishings = $item->options->finishings ?? null;
            $item->thickness = $item->options->thickness ?? null;
            $item->wirestakesqtys = $item->options->wirestakesqtys ?? null;
            $item->framesizes = $item->options->framesizes ?? null;
            $item->displaytypes = $item->options->displaytypes ?? null;
            $item->installations = $item->options->installations ?? null;
            $item->materials = $item->options->materials ?? null;
            $item->corners = $item->options->corners ?? null;
            $item->applications = $item->options->applications ?? null;
            $item->paperthickness = $item->options->paperthickness ?? null;
            $item->copiesrequireds = $item->options->copiesrequireds ?? null;
            $item->pagesinnotepads = $item->options->pagesinnotepads ?? null;
            $item->uploadedFileName = $item->options->uploadedFileName ?? null;
            // $item->qty = $item->options->qty ?? null;
            $item->product = Product::with('product_images')->find($item->id);
        }

        // Now you have access to size and color for each item in the cart
        // dd($cartContent); // Uncomment this line for debugging purposes

        $data['cartContent'] = $cartContent;

        // dd($data);
        return view('front.cart', $data);
    }

//     public function editCartItem($rowId)
// {
//     // Find the cart item by rowId
//     $cartItem = Cart::get($rowId);

//     // Check if the cart item exists
//     if (!$cartItem) {
//         return $this->jsonResponse(false, 'Item not found in cart.');
//     }

//     // Find the product associated with the cart item
//     $product = Product::with('product_images')->find($cartItem->id);

//     // Check if the product exists
//     if (!$product) {
//         return $this->jsonResponse(false, 'Product not found.');
//     }

//     // Output cart item details for debugging
//     // dd($cartItem);

//     // Assuming you have some other data related to the cart item or product
//     $additionalData = [
//         'someKey' => 'someValue',
//         // Add more data here if needed
//     ];
//     $selectedSize = $cartItem->size;
//     $selectedPaperThickness = $cartItem->options->paperthickness;

// // dd($selectedPaperThickness);



//     // Return the 'front.edit' view with the cart item, product, and additional data
//     return view('front.edit', [
//         'cartItem' => $cartItem,
//         'product' => $product,
//         'additionalData' => $additionalData,
//         'selectedSize' => $selectedSize,
//         'selectedPaperThickness' => $selectedPaperThickness,
//     ]);
// }

        public function editCartItem($rowId)
    {
        // Find the cart item by rowId
        $cartItem = Cart::get($rowId);
        $quantity = $cartItem->qty;
        // dd($cartItem);

        // Check if the cart item exists
        if (!$cartItem) {
            return $this->jsonResponse(false, 'Item not found in cart.');
        }

        // Find the product associated with the cart item
        $product = Product::with('product_images')->find($cartItem->id);
        
        if (!$product) {
            return $this->jsonResponse(false, 'Product not found.');
        }
        // Initialize variables
        $customWidth = $customHeight = null;

       
        $selectedSize = $cartItem->size;

       
        if ($product->product_allows_custom_size == 1 && $selectedSize) {
            preg_match('/(\d+(?:,\d+)?)(?:mm)? x (\d+(?:,\d+)?)(?:mm)?/', $selectedSize, $matches);
            $customWidth = isset($matches[1]) ? str_replace(',', '', $matches[1]) : null;
            $customHeight = isset($matches[2]) ? str_replace(',', '', $matches[2]) : null;
        }

        
        $additionalData = [
            'someKey' => 'someValue',
            // Add more data here if needed
        ];
        $selectedSize = $cartItem->size;
        $selectedPaperThickness = $cartItem->options->paperthickness;
        $selectedfinishings = $cartItem->options->finishings;
        $selectedprintSides = $cartItem->options->printSides;

    
        return view('front.edit', [
            'cartItem' => $cartItem,
            'product' => $product,
            'additionalData' => $additionalData,
            'selectedSize' => $selectedSize,
            'customWidth' => $customWidth,
            'customHeight' => $customHeight,
            'selectedPaperThickness' => $selectedPaperThickness,
            'quantity' => $quantity,
            'selectedfinishings' => $selectedfinishings,
            'selectedprintSides' => $selectedprintSides,
        ]);
    }





    public function updateCart(Request $request) {
        $rowId = $request->row_id;
        $qty = $request->qty;

        // Update the quantity in the cart
        $result = Cart::update($rowId, $qty);

        // If update is successful, proceed
        if ($result) {
            $message = "Cart Updated Successfully";
            session()->flash('success', $message);

            return response()->json([
                'status' => true,
                'message' => $message,
            ]);
        } else {
            // If update fails, return error response
            return response()->json([
                'status' => false,
                'message' => "Failed to update cart",
            ]);
        }
    }

    public function deleteItem(Request $request) {

            $itemInfo = Cart::get($request->rowId);

            if ($itemInfo == null) {
                $errorMessage = 'Item is not found';
                session()->flash('error', $errorMessage);

                return response()->json([
                    'status' => false,
                    'message' => $errorMessage
                ]);
            }

            Cart::remove($request->rowId);

            $message = 'Item removed from cart successfully';

            session()->flash('error', $message);
            return response()->json([
                'status' => true,
                'message' => $message
            ]);

            return response()->json([
                'status' => true,
                'message' => $message
            ]);

    }
    public function checkout(Request $request) {

        if (Cart::count() == 0) {
            return redirect()->route('front.cart');
        }
        if (Auth::check() == false) {
            if(!session()->has('url.intended')) {

                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('account.login');
        }
        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->first();
        session()->forget('url.intended');

        return view('front.checkout',['customerAddress' => $customerAddress]);

    }

    public function processCheckout(Request $request) 
{
    // dd($request->all());
    // Apply Validation
    $validator = Validator::make($request->all(), [
        'firstname' => 'required',
        'lastname' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'paymentmethod' => 'required',
        // 'payment_method_id' => 'required' // Uncomment if needed
    ]);

    if ($validator->fails()) {
        // Log errors for debugging
        Log::error('Validation failed', ['errors' => $validator->errors()->toArray()]);

        return response()->json([
            'message' => 'Please fix the errors',
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    // Save or update user address
    $user = Auth::user();

    CustomerAddress::updateOrCreate(
        ['user_id' => $user->id],
        [
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'alternateaddress' => $request->alternateaddress,
            'note' => $request->note
        ]
    );

    // Handle Stripe payment
    if ($request->paymentmethod === 'stripe') {
        return redirect()->route('stripe.checkout')
            ->with([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'note' => $request->note,
                'amount' => $request->amount,
                'color' => $request->color,
                'size' => $request->size,
                'qty' => $request->qty,
                'name' => $request->name,
                'sides' => $request->sides,
                'paymentmethod' => $request->paymentmethod,
                'price' => $request->price,
                'product' => $request->product,
            ]);
    }

    // Handle other payment methods
    $shipping = 0;
    $discount = 0;
    $subTotal = Cart::subtotal(2, '.', '');
    $grandTotal = $subTotal + $shipping;

    $order = new Order;
    $order->subtotal = $subTotal;
    $order->shipping = $shipping;
    $order->grand_total = $grandTotal;
    $order->user_id = $user->id;

    $order->firstname = $request->firstname;
    $order->lastname = $request->lastname;
    $order->phone = $request->phone;
    $order->email = $request->email;
    $order->address = $request->address;
    $order->notee = $request->note;
    $order->status = 'processed'; // Fixed typo 'proccesed'
    $order->save();

    try {
        // Save order items
        foreach (Cart::content() as $item) {
            $orderItem = new OrderItem;
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->name = $item->name;
            $orderItem->qty = $item->qty;
            $orderItem->size = $request->size;
            $orderItem->color = $request->color;
            $orderItem->print_side = $request->printSide;
            $orderItem->pickup_option = $item->pickup_option ?? 'Not Required';
            $orderItem->document = $request->document;
            $orderItem->price = $item->price;
            $orderItem->total = $item->price * $item->qty;
            $orderItem->save();
        }

        return response()->json([
            'message' => 'Order processed successfully',
            'status' => true
        ]);
    } catch (\Exception $e) {
        // Log exception
        Log::error('Order processing failed', ['error' => $e->getMessage()]);

        return response()->json([
            'message' => 'Order processing failed',
            'status' => false
        ]);
    }
}


    public function thankyou($id) {


        return view('front.thanks',[
            'id' => $id
        ]);
    }

    public function buyNow(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:product,id',
            'color' => 'required|string',
            'size' => 'required|string',
            'printedSides' => 'required|string',
            'qty' => 'required|integer|min:1'
        ]);

        $product = Product::with('product_images')->find($request->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found',
            ]);
        }

        // Check if the cart is not empty
        if (Cart::count() > 0) {
            $cartContent = Cart::content();

            // dd($cartContent); die;
            $productAlreadyExist = false;

            // Loop through each item in the cart
            foreach ($cartContent as $item) {
                // Check if the product id and its variant attributes match with any item in the cart
                if ($item->id == $product->id && $item->options->size == $request->size && $item->options->color == $request->color && $item->options->printedSides == $request->printedSides && $item->options->pickup_option == $request->pickup_option  && $item->options->price == $request->price) {
                    $productAlreadyExist = true;
                    break; // No need to continue if the product already exists
                }
            }

            if ($productAlreadyExist == false) {
                // Add the product with its variant attributes to the cart
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => $request->qty, // Adjusted here to use the quantity from the request
                    'price' => $request->price,
                    'options' => [
                        'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                        'size' => $request->size,
                        'color' => $request->color,
                        'printedSides' => $request->printedSides,
                        'pickup_option' => $request->pickup_option,
                    ],
                ]);
                $status = true;
                $message = '<strong>' . $product->product_name . '</strong> Added to Your Cart Successfully';
                session()->flash('error', $message);
            } else {
                // Product with the same variant attributes already exists in the cart
                $status = true;
                $message = $product->product_name . ' with selected size and color is already added to your cart';
            }
        } else {
            // Cart is empty, directly add the product with its variant attributes
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $request->qty, // Adjusted here to use the quantity from the request
                'price' => $request->price,
                'options' => [
                    'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                    'size' => $request->size,
                    'color' => $request->color,
                    'printedSides' => $request->printedSides,
                    'pickup_option' => $request->pickup_option,
                ],
            ]);
            $status = true;
            $message = '<strong>' . $product->product_name . '</strong> Product added to cart successfully. Redirecting to checkout...';
            session()->flash('success', $message);
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
}
