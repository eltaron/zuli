<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Message;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topProducts = Product::where('is_top', 'yes')
        ->whereHas('category', function ($query) {
            $query->where('status', 'active');
        })
        ->latest()
        ->take(6) // Fetch only 6 initially
        ->get();
        $offer = Offer::where('end_at', '>', now())->whereHas('product.category', function ($query) {
            $query->where('status', 'active');
        })->latest()->get();
        $poroduct = Product::whereNotNull('category_id')
        ->whereHas('category', function ($query) {
            $query->where('status', 'active');
        })->latest()->take(6)
        ->get();
        $category = Category::where('status', 'active')->latest()->take(5)->get();
        $client = Client::latest()->get();
        return view('web.home.index',
    [
        'topproducts' => $topProducts,
        'offers' => $offer,
        'poroducts' => $poroduct,
        'categories' => $category,
        'clients' => $client
    ]);
    }

    public function contact(Request $request)
    {   
        $validatedData = $request->validate([
            'message' => 'required|string'
        ]);
            $masseg = new Message();
            $masseg->name = $request->name;
            $masseg->email = $request->email;
            $masseg->phone = $request->phone;
            $masseg->message = $validatedData['message'];
            $masseg->save();
        return back()->with('success', 'Message sent successfully');
    }
}
