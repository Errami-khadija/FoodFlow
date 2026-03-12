<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   // Show all customers with optional search
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::where('role', 'customer')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Keep search query in pagination links
        $users->appends($request->only('search'));

        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.users.index',
            'users' => $users
        ]);
    }
}
