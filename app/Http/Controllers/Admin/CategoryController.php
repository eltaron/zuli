<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Categories';
        $add_url = 'categories/store';
        $edit_url = 'categories/update';
        $delete_url = 'categories/destroy';
        $data = Category::latest()->get();
        $inputs = [
            [
                'type' => 'file',
                'name' => 'logo',
                'multible' => '',
                'label' => 'Enter Category logo',
                'required' => 'required'
            ],
            [
                'type' => 'text',
                'name' => 'title',
                'label' => 'Enter Category title',
                'required' => 'required'
            ],
            [
                'type' => 'radio',
                'name' => 'status',
                'label' => 'Active , Inactive',
                'values' => 'active,inactive',
                'required' => ''
            ]
        ];
        return view('admin.category.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    // Store function
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $logoPath = $request->file('logo')->store('categories', 'public');
        Category::create([
            'logo' => $logoPath,
            'title' => $request->input('title'),
            'status' => $request->input('status'),
        ]);
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    // Update function
    public function update(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $request->validate([
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->only(['title', 'status']);
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($category->logo) {
                Storage::disk('public')->delete($category->logo);
            }
            $data['logo'] = $request->file('logo')->store('categories', 'public');
        }
        $category->update($data);
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    // Delete function
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        if ($category->logo) {
            Storage::disk('public')->delete($category->logo);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category created successfully!');
    }
}
