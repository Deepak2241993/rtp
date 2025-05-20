<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $clintCount = Order::count();
        $usersCount = User::where('role', 1)->count();
        $productCount = Product::count();
        $transactionCount = transaction::count();

        $data['clintCount'] = $clintCount;
        $data['usersCount'] = $usersCount;
        $data['productCount'] = $productCount;
        $data['transactionCount'] = $transactionCount;
        return view('admin.dashboard',$data);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
