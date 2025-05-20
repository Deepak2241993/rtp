<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Exception\ApiErrorException;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class StripePaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'paymentmethod' => 'required',
        ]);

        if ($validator->fails()) {
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
                'note' => $request->note
            ]
        );

        // dd(Cart::)
        $shipping = 0;
        $price = $request->price;
        $gst = $price*0.10;
        $subTotal = $price - $gst ;
        $grandTotal = $price;

        // dd($grandTotal);
        // Create an order with a status of 'pending'
        $order = Order::create([
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'notee' => $request->note,
            'subtotal' => $subTotal,
            'shipping' => $shipping,
            'grand_total' => $grandTotal,
            'status' => 'pending',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'aud',
                        'product_data' => [
                            'name' => 'Order #' . $order->id,
                        ],
                        'unit_amount' => $grandTotal * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('front.checkout'),
            ]);

            return response()->json(['sessionId' => $session->id]);
        } catch (ApiErrorException $e) {
            Log::error('Stripe Checkout Session creation failed', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to create checkout session'], 500);
        }
    }

    public function stripeSuccess(Request $request)
    {
        // dd($request->all());
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return view('checkout.failed')->with('message', 'Invalid session ID');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = StripeSession::retrieve($sessionId);

            if ($session->payment_status === 'paid') {

                // Find the order by metadata
                $order = Order::where('user_id', Auth::id())->where('status', 'pending')->first();
                
                // dd($order);
                
                if (!$order) {
                    return view('checkout.failed')->with('message', 'Order not found');
                }

                // Update the order status to 'processed'
                $order->update(['status' => 'processed']);

                // dd(Cart::content());
                foreach(Cart::content() as $item) {

                    $orderItem = new OrderItem;
                    $orderItem->product_id = $item->id;
                    $orderItem->order_id = $order->id;
                    $orderItem->name = $item->name;
                    $orderItem->qty = $item->qty;
                    $orderItem->size = $request->size;
                    $orderItem->color = $request->color;
                    $orderItem->print_side = $request->printSide;
                    $orderItem->pickup_option = $item->pickup_option ?? 'Not Required';
                    $orderItem->document = $item->options->uploadedFileName;
                    $orderItem->finishings = $item->options->finishings;
                    $orderItem->thickness = $item->options->thickness;
                    $orderItem->wirestakesqtys = $item->options->wirestakesqtys;
                    $orderItem->framesizes = $item->options->framesizes;
                    $orderItem->displaytypes = $item->options->displaytypes;
                    $orderItem->installations = $item->options->installations;
                    $orderItem->materials = $item->options->materials;
                    $orderItem->corners = $item->options->corners;
                    $orderItem->applications = $item->options->applications;
                    $orderItem->paperthickness = $item->options->paperthickness;
                    $orderItem->copiesrequireds = $item->options->copiesrequireds;
                    $orderItem->pagesinnotepads = $item->options->pagesinnotepads;
                    $orderItem->price = $item->price;
                    $orderItem->total = $item->price;
                    $orderItem->save();
                }

                
                // Create a transaction record
                transaction::create([
                    'user_id' => Auth::id(),
                    'paid_amount' => $order->grand_total,
                    'generated_date_time' => now(),
                    'payment_status' => $session->payment_status,
                    'description' => 'Payment for Order #' . $order->id,
                    'transaction_id' => $session->payment_intent
                ]);

                // dd($orderItem);
                // Send order confirmation email
                Log::info('Preparing to send order confirmation email', ['user' => Auth::user()->email, 'order_id' => $order->id]);

                Mail::to(Auth::user()->email)->send(new OrderConfirmation($order));

                Log::info('Order confirmation email sent', ['user' => Auth::user()->email, 'order_id' => $order->id]);


                // Clear the cart
                Cart::destroy();
                // Add success message to session
                // Add success message to session
                session()->flash('message', 'Order processed successfully and email sent to ' . Auth::user()->email);

                // Pass the order ID to the view
                return view('checkout.success', ['orderId' => $order->id]);
            } else {
                return view('checkout.failed')->with('message', 'Payment not successful');
            }
        } catch (\Exception $e) {
            Log::error('Stripe checkout failed', ['error' => $e->getMessage()]);
            return view('checkout.failed')->with('message', 'Failed to retrieve checkout session');
        }
    }
}
