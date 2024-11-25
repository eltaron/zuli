<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Messages';
        $add_url = 'messages/store';
        $edit_url = 'messages/update';
        $delete_url = 'messages/destroy';
        $data = Message::latest()->get();
        $inputs = [];

        return view('admin.message.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
