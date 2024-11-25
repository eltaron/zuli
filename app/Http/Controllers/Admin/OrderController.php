<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Orders';
        $add_url = 'orders/store';
        $edit_url = 'orders/update';
        $delete_url = 'orders/destroy';
        $data = Order::latest()->get();
        $inputs = [
            [
                'type' => 'select',
                'name' => 'status',
                'label' => 'Edit Status',
                'required' => 'required',
                'values' => [
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'cancelled' => 'Cancelled',
                    'completed' => 'Completed'
                ]
            ]
        ];

        return view('admin.order.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'status' => 'required|in:pending,processing,cancelled,completed',
        ]);

        // Find the order and update the status
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
        ]);
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;

        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
    public function show($id)
    {
        $order = Order::with('user', 'payment_method', 'orderdetails.product')->findOrFail($id);

        return view('admin.order.show', compact('order'));
    }
}
