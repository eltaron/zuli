<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->quantity * ($cart->product->offer ? $cart->product->offer->new_price : $cart->product->price); // Assuming 'quantity' and 'price' are fields in the Cart model
        });
        return view('web.carts.index', compact('carts', 'totalPrice'));
    }
    public function add(Request $request)
    {
        $validated = $request->validate(['product_id' => 'required|exists:products,id']);

        $exists = Cart::where('user_id', Auth::id())
            ->where('product_id', $validated['product_id'])
            ->first();
        if ($exists) {
            return response()->json(['message' => 'Product already exists in your cart']);
        }
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $validated['product_id'],
        ]);

        return response()->json(['message' => 'Product added to cart successfully']);
    }
    public function remove(Request $request)
    {
        $validated = $request->validate(['product_id' => 'required|exists:products,id']);

        $exists = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $validated['product_id'])
            ->first();
        if ($exists) {
            $exists->delete();
            return response()->json(['message' => 'Product deleted from your cart successfully']);
        }

        return response()->json(['message' => 'Product not found in cart']);
    }
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();

            return response()->json(['message' => 'Quantity updated']);
        }

        return response()->json(['message' => 'Product not found in cart'], 404);
    }

    public function checkout(Request $request)
    {
        // Retrieve the cart items for the current user
        $carts = Cart::where('user_id', Auth::id())->get();

        // Check if the cart is empty
        if ($carts->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        // Initialize variables for total price calculation
        $totalAmount = 0;
        $taxAmount = 0;
        $coupon = $request->coupon ?? null;

        // Apply tax and coupon calculations here
        foreach ($carts as $cart) {
            $productPrice = $cart->product->offer ? $cart->product->offer->new_price : $cart->product->price;
            $totalAmount += $productPrice * $cart->quantity;
        }

        // Example: Tax rate is 10% of the total
        $taxAmount = $totalAmount * 0;  // 10% tax rate

        // Calculate the final total (including tax)
        $finalTotal = $totalAmount + $taxAmount;

        // Create the order
        $order = Order::create([
            'id' => (string) Str::uuid(), // Generate a unique UUID for the order
            'user_id' => Auth::id(),
            'payment_method_id' => $request->payment_method_id ?? null, // From the request
            'tax' => $taxAmount,
            'total' => $finalTotal,
            'coupon' => $coupon,
            'status' => 'pending', // Set the order status to 'pending'
        ]);

        // Create the order details (items in the cart)
        foreach ($carts as $cart) {
            $productPrice = $cart->product->offer ? $cart->product->offer->new_price : $cart->product->price;

            // Save each cart item as an order detail
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $productPrice,
            ]);

            // Clear the cart after checkout
            $cart->delete();
        }

        // Return a success response with order details (can include total price and order ID)
        return response()->json(['message' => 'Checkout successful', 'order_id' => $order->id, 'total' => $finalTotal]);
    }
}
