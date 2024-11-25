<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Offers';
        $add_url = 'offers/store';
        $edit_url = 'offers/update';
        $delete_url = 'offers/destroy';
        $data = Offer::latest()->get();
        $inputs = [
            [
                'type' => 'select',
                'name' => 'product_id',
                'label' => 'choose product',
                'required' => 'required',
                'values' => Product::latest()->get()->pluck('title', 'id')
            ],
            [
                'type' => 'number',
                'name' => 'new_price',
                'label' => 'Enter New Price',
                'required' => 'required'
            ],
            [
                'type' => 'datetime-local',
                'name' => 'end_at',
                'label' => 'end at time',
                'required' => 'required'
            ]
        ];
        return view('admin.offer.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'new_price' => 'required|numeric|min:0',
            'end_at' => 'required|date|after:now',
        ]);

        Offer::create([
            'product_id' => $request->input('product_id'),
            'new_price' => $request->input('new_price'),
            'end_at' => $request->input('end_at'),
        ]);

        return redirect()->back()->with('success', 'Offer created successfully!');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $offer = Offer::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'new_price' => 'required|numeric|min:0',
            'end_at' => 'required|date|after:now',
        ]);

        $offer->update([
            'product_id' => $request->input('product_id'),
            'new_price' => $request->input('new_price'),
            'end_at' => $request->input('end_at'),
        ]);

        return redirect()->back()->with('success', 'Offer updated successfully!');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->back()->with('success', 'Offer deleted successfully!');
    }
}
