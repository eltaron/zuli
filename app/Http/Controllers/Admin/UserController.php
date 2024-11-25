<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Users';
        $add_url = 'users/store';
        $edit_url = 'users/update';
        $delete_url = 'users/destroy';
        $data = User::latest()->get();
        $inputs = [];

        return view('admin.user.index', compact('title', 'add_url', 'edit_url', 'delete_url', 'data', 'inputs'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    public function show($id)
    {
        $user = User::with('paymentMethods', 'orders')->findOrFail($id);
        return view('admin.user.show', compact('user'));
    }
}
