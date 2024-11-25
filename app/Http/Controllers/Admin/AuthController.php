<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (auth()->check()) {
                $category_count = Category::count();
                $product_count = Product::count();
                $order_count = Order::count();
                $user_count = User::count();
                $last_products = Product::orderBy('created_at', 'desc')->limit(10)->get();
                $currentYear = Carbon::now()->year;
                // Get the current year and the previous year
                $currentYear = Carbon::now()->year;
                $previousYear = $currentYear - 1;
                // Query to get the count of orders per month for the current year
                $currentYearOrders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
                    ->whereYear('created_at', $currentYear)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
                // Query to get the count of orders per month for the previous year
                $previousYearOrders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
                    ->whereYear('created_at', $previousYear)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
                // Initialize arrays for monthly order counts for both years
                $currentYearData = array_fill(0, 12, 0);
                $previousYearData = array_fill(0, 12, 0);
                // Populate arrays with actual data
                foreach ($currentYearOrders as $order) {
                    $currentYearData[$order->month - 1] = $order->order_count;
                }
                foreach ($previousYearOrders as $order) {
                    $previousYearData[$order->month - 1] = $order->order_count;
                }
                return view('admin.home.index', [
                    'category_count' => $category_count,
                    'product_count' => $product_count,
                    'order_count' => $order_count,
                    'user_count' => $user_count,
                    'last_products' => $last_products,
                    'currentYearData' => $currentYearData,
                    'previousYearData' => $previousYearData,
                ]);
            } else {
                return redirect(url('login'));
            }
        } catch (\Exception $e) {
            return back()->with([
                'message' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function tables()
    {
        try {
            $data = '';
            return view('admin.tables.index', [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return back()->with([
                'message' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
