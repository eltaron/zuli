<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Top Clients';
        $add_url = 'clients/store';
        $edit_url = 'clients/update';
        $delete_url = 'clients/destroy';
        $data = Client::latest()->get();
        $inputs = [
            [
                'type' => 'file',
                'name' => 'logo',
                'multible' => '',
                'label' => 'Enter client logo',
                'required' => 'required'
            ],
            [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Enter client name',
                'required' => 'required'
            ]
        ];
        return view('admin.client.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    // Store function
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'Category' => 'required|string|max:255',
        ]);
        $logoPath = $request->file('logo')->store('clients', 'public');
        Client::create([
            'logo' => $logoPath,
            'name' => $request->input('name'),
        ]);
        return redirect()->back()->with('success', 'Client created successfully!');
    }

    // Update function
    public function update(Request $request)
    {
        $id = $request->id;
        $client = Client::findOrFail($id);
        $request->validate([
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);
        $data = $request->only(['name', 'status']);
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }
        $client->update($data);
        return redirect()->back()->with('success', 'Client created successfully!');
    }

    // Delete function
    public function destroy(Request $request)
    {
        $id = $request->id;
        $client = Client::findOrFail($id);
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }
        $client->delete();
        return redirect()->back()->with('success', 'Client created successfully!');
    }
}
