<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdated;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = Order::latest('orders.created_at')->select('orders.*','users.name','users.email');
        $orders = $orders->leftjoin('users','users.id','orders.user_id');

        if($request->get('keyword') != "") {
            $orders = $orders->where('users.name','like','%'.$request->keyword.'%');
            $orders = $orders->orwhere('users.email','like','%'.$request->keyword.'%');
            $orders = $orders->orwhere('orders.id','like','%'.$request->keyword.'%');
        }
        $orders = $orders->paginate(10);
        $data['orders'] = $orders;

        // print_r($data); die;
        return view('admin.orders.list', $data);
    }
    public function detail($orderId) {

        $order = Order::where('id', $orderId)->first();
        $orderItems = OrderItem::where('order_id', $orderId)->get();
    
        $products = collect(); // Initialize an empty collection to hold products
    
        foreach ($orderItems as $orderItem) {
            $product = Product::with('product_images')->find($orderItem->product_id);
            if ($product) {
                $products->push($product);
            }
        }

        // print_r($products); die;
        return view('admin.orders.detail', [
            'order' => $order,
            'orderItems' => $orderItems,
            'products' => $products
        ]);
    }

    // public function updateStatus(Request $request, Order $order)
    // {
    //     $request->validate([
    //         'status' => 'required|in:shipped,delivered,cancelled',
    //     ]);

    //     // Load the user relationship
    //     $order->load('user');

    //     if (!$order->user) {
    //         return back()->with('error', 'User not found for the order');
    //     }

    //     // Update order status
    //     $order->status = $request->input('status');
    //     $order->save();

    //     // Send order status update email
    //     Mail::to($order->user->email)->send(new OrderStatusUpdated($order));

    //     // Log email sending
    //     Log::info('Order status update email sent', ['user' => $order->user->email, 'order_id' => $order->id, 'status' => $order->status]);

    //     // Flash message to session
    //     session()->flash('message', 'Order status updated successfully and email sent to ' . $order->user->email);

    //     return back();
    // }
    public function updateStatus(Request $request, Order $order)
    {
        // dd($request->all());
        $request->validate([
            'status' => 'required|in:processed,shipped,delivered,cancelled',
        ]);

        // Load the user relationship
        $order->load('user');

        if (!$order->user) {
            return back()->with('error', 'User not found for the order');
        }

        // Update order status
        $order->status = $request->input('status');
        $order->save();

        // Send order status update email
        Mail::to($order->user->email)->send(new OrderStatusUpdated($order));

        // Log email sending
        Log::info('Order status update email sent', ['user' => $order->user->email, 'order_id' => $order->id, 'status' => $order->status]);

        // Flash message to session
        session()->flash('message', 'Order status updated successfully and email sent to ' . $order->user->email);

        return back();
    }

}
