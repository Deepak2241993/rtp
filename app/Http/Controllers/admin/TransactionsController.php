<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\User;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query
        $transactions = transaction::latest('transactions.created_at')
            ->select('transactions.*', 'users.name', 'users.email')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id');

        // Apply search filters if keyword is present
        if ($request->get('keyword') != "") {
            $keyword = $request->get('keyword');
            $transactions = $transactions->where(function ($query) use ($keyword) {
                $query->where('users.name', 'like', '%' . $keyword . '%')
                    ->orWhere('users.email', 'like', '%' . $keyword . '%')
                    ->orWhere('transactions.id', 'like', '%' . $keyword . '%');
            });
        }

        // Paginate the results
        $transactions = $transactions->paginate(10);
        $data['transactions'] = $transactions;

        return view('admin.transaction.list', $data);
    }

    public function customer(Request $request)
    {
        $query = User::query();

        // Apply search filters if a keyword is present
        if ($request->get('keyword') != "") {
            $keyword = $request->get('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }

        // Filter by role
        $query->where('role', 1);

        // Order by created_at in descending order
        $query->orderBy('created_at', 'desc');
        
        $users = $query->paginate(10);

        $data['users'] = $users;

        return view('admin.transaction.customer', $data);
    }



    public function customerdetail()
    {
    }
}
