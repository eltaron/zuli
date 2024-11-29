<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // Ensure only authenticated users can access
    }

    // Display all orders for the authenticated user
    public function index()
    {
        $orders = Auth::user()->orders;  // Get all orders for the logged-in user
        return view('web.orders.index', compact('orders'));
    }

    // Display the details of a specific order
    public function show(Order $order)
    {
        // Ensure the order belongs to the logged-in user
        if ($order->user_id !== Auth::id()) {
            abort(403); // Unauthorized access
        }

        $orderDetails = $order->orderdetails;  // Get the details of the order
        return view('web.orders.show', compact('order', 'orderDetails'));
    }
}
