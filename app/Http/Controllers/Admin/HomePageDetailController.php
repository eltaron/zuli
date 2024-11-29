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
                'required' => 'required'
            ],
            [
                'type' => 'text',
                'name' => 'title',
                'label' => 'Enter service title',
                'required' => 'required'
            ],
            [
                'type' => 'number',
                'name' => 'title',
                'label' => 'Enter service title',
                'required' => ''
            ],
            [
                'type' => 'number',
                'name' => 'title',
                'label' => 'Enter service title',
                'required' => ''
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'label' => 'Enter service description',
                'required' => ''
            ]
        ];

        return view('admin.setting.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'settings', 'inputs'));
    }

    public function update(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'slogan' => 'nullable|string|max:1000',  // validate slogan as a text
            'facebook' => 'nullable',
            'instgram' => 'nullable',
            'behance' => 'nullable',
            'days_of_offer' => 'nullable',
            'descount' => 'nullable',
        ]);

        // Fetch or create the settings record
        $settings = HomePageDetail::first() ?? new HomePageDetail();

        $settings->slogan = $request->input('slogan');


        // Update other fields
        $settings->facebook = $request->input('facebook');
        $settings->instgram = $request->input('instgram');
        $settings->behance = $request->input('behance');
        $settings->days_of_offer = $request->input('days_of_offer');
        $settings->descount = $request->input('descount');
        // Save the settings to the database
        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
