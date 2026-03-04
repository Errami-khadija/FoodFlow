<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;
class RestaurantRegistrationController extends Controller
{
    public function showForm()
    {
        return view('customer interface.restaurant-register'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', 
            'restaurant_name' => 'required|string|max:255',
            'cuisine_type' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'terms_agree' => 'accepted',
        ]);

        // 1 Create user for restaurant owner
        $user = User::create([
            'name' => $request->owner_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'restaurant',
            'is_approved' => false,
        ]);

        // 2 Create restaurant linked to user
        Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->restaurant_name,
            'cuisine_type' => $request->cuisine_type,
            'rating' => $request->rating ?? 0,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'is_approved' => false,
        ]);

        return redirect()->back()->with('success', 'Your restaurant is registered! Waiting for admin approval.');
    }
}
