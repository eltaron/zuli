<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Services';
        $add_url = 'services/store';
        $edit_url = 'services/update';
        $delete_url = 'services/destroy';
        $settings = HomePageDetail::first();
        $inputs = [
            [
                'type' => 'file',
                'name' => 'logo',
                'label' => 'Enter service logo',
                'required' => true
            ],
            [
                'type' => 'text',
                'name' => 'title',
                'label' => 'Enter service title',
                'required' => true
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'label' => 'Enter service description',
                'required' => false
            ]
        ];

        return view('admin.setting.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'settings', 'inputs'));
    }

    public function update(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'slogan' => 'nullable|string|max:1000',  // validate slogan as a text
            'facebook' => 'nullable|url',
            'instgram' => 'nullable|url',
            'behance' => 'nullable|url',
        ]);

        // Fetch or create the settings record
        $settings = HomePageDetail::first() ?? new HomePageDetail();

        $settings->slogan = $request->input('slogan');


        // Update other fields
        $settings->facebook = $request->input('facebook');
        $settings->instgram = $request->input('instgram');
        $settings->behance = $request->input('behance');

        // Save the settings to the database
        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
