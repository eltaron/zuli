<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function showTopProducts()
    {
        $products = Product::where('is_top', 'yes')->whereHas('category', function ($query) {
            $query->where('status', 'active');
        })
            ->latest()
            ->get();
        $clients = Client::latest()->get();
        $title = 'Top Products';
        return view('web.products.index', compact('products', 'clients', 'title'));
    }
    public function showProductsInCategories($id)
    {
        $products = Product::where('category_id', $id)->whereHas('category', function ($query) {
            $query->where('status', 'active');
        })
            ->latest()
            ->get();
        $clients = Client::latest()->get();
        $category = Category::findOrFail($id);
        $title = $category->title;
        return view('web.products.index', compact('products', 'clients', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $products = Product::whereHas('category', function ($query) {
            $query->where('status', 'active');
        })
            ->latest()
            ->get();
        $clients = Client::latest()->get();
        $title = 'All Products';
        return view('web.products.index', compact('products', 'clients', 'title'));
    }
    public function categories()
    {
        $clients = Client::latest()->get();
        $categories = Category::where('status', 'active')->latest()->get();
        $title = 'Categories';
        return view('web.categories.index', compact('categories', 'clients', 'title'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function offers()
    {
        $offers = Offer::where('end_at', '>', now())->whereHas('product.category', function ($query) {
            $query->where('status', 'active');
        })->latest()->get();
        $clients = Client::latest()->get();
        $title = 'Offers';
        return view('web.offers.index', compact('offers', 'clients', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $clients = Client::latest()->get();
        $title = $product->title;
        return view('web.products.show', compact('product', 'clients', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
