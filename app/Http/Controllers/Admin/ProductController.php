<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Products';
        $add_url = 'products/store';
        $edit_url = 'products/update';
        $delete_url = 'products/destroy';
        $data = Product::latest()->get();
        $inputs = [
            [
                'type' => 'file',
                'name' => 'image',
                'multible' => '',
                'label' => 'Enter product main image',
                'required' => 'required'
            ],

            [
                'type' => 'text',
                'name' => 'title',
                'label' => 'Enter product title',
                'required' => 'required'
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'label' => 'Enter product description',
                'required' => ''
            ],
            [
                'type' => 'textarea',
                'name' => 'url',
                'label' => 'Enter download url',
                'required' => 'required'
            ],
            [
                'type' => 'number',
                'name' => 'price',
                'label' => 'Enter product price',
                'required' => 'required'
            ],
            [
                'type' => 'radio',
                'name' => 'is_top',
                'label' => 'Is product of top products ?',
                'values' => 'yes,no',
                'required' => 'required'
            ],
            [
                'type' => 'select',
                'name' => 'category_id',
                'label' => 'choose category',
                'required' => 'required',
                'values' => Category::latest()->get()->pluck('title', 'id')
            ]
        ];
        return view('admin.product.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }
    public function top()
    {
        $title = 'Top Products';
        $add_url = 'products/store';
        $edit_url = 'products/update';
        $delete_url = 'products/destroy';
        $data = Product::where('is_top', 'yes')->latest()->get();
        $inputs = [
            [
                'type' => 'file',
                'name' => 'image',
                'multible' => '',
                'label' => 'Enter product main image',
                'required' => 'required'
            ],

            [
                'type' => 'text',
                'name' => 'title',
                'label' => 'Enter product title',
                'required' => 'required'
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'label' => 'Enter product description',
                'required' => ''
            ],
            [
                'type' => 'textarea',
                'name' => 'url',
                'label' => 'Enter download url',
                'required' => 'required'
            ],
            [
                'type' => 'number',
                'name' => 'price',
                'label' => 'Enter product price',
                'required' => 'required'
            ],
            [
                'type' => 'radio',
                'name' => 'is_top',
                'label' => 'Is product of top products ?',
                'values' => 'yes,no',
                'required' => 'required'
            ],
            [
                'type' => 'select',
                'name' => 'category_id',
                'label' => 'choose category',
                'required' => 'required',
                'values' => Category::latest()->get()->pluck('title', 'id')
            ]
        ];
        return view('admin.product.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
            'price' => 'required|numeric|min:0',
            'is_top' => 'required|in:yes,no',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Save the main image
        $mainImagePath = $request->file('image')->store('products', 'public');

        // Create the product
        $product = Product::create([
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'image' => $mainImagePath,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'price' => $request->input('price'),
            'is_top' => $request->input('is_top'),
            'category_id' => $request->input('category_id'),
        ]);

        // Save multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                $product->images()->create([
                    'photo_url' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully!');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
            'price' => 'required|numeric|min:0',
            'is_top' => 'required|in:yes,no',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only(['title', 'description', 'url', 'price', 'is_top', 'category_id']);

        // Update main image
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        // Update multiple images
        if ($request->hasFile('images')) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->photo_url);
                $image->delete();
            }

            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('products', 'public');
                $product->images()->create([
                    'photo_url' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);

        // Delete main image
        Storage::disk('public')->delete($product->image);

        // Delete associated images
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->photo_url);
            $image->delete();
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
