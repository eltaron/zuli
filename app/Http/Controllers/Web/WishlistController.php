<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $whishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('web.wishlist.index', compact('whishlists'));
    }
    public function add(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Check if the product already exists in the wishlist for this user
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $validated['product_id'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Product is already in your wishlist'], 200);
        }

        // Add the product to the wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $validated['product_id'],
        ]);

        return response()->json(['message' => 'Product added to wishlist successfully'], 201);
    }
    public function remove(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Check if the product already exists in the wishlist for this user
        $exists = Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id', $validated['product_id'])
            ->first();
        if ($exists) {
            $exists->delete();
            return response()->json(['message' => 'Product deleted from your wishlist successfully'], 200);
        }

        return response()->json(['message' => 'Product not found in wishlist '], 201);
    }
}
