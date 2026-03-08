<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class RestaurantRegistrationController extends Controller

{
    public function showForm()
    {
        return view('customer interface.restaurant-register'); 
    }

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'owner_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'restaurant_name' => 'required|string|max:255',
        'cuisine_type' => 'required|string|max:255',
        'rating' => 'nullable|numeric|min:0|max:5',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'terms_agree' => 'accepted',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    try {

        DB::beginTransaction();

        $user = User::create([
            'name' => $request->owner_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'restaurant',
            'is_approved' => false,
        ]);

        Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->restaurant_name,
            'cuisine_type' => $request->cuisine_type,
            'rating' => $request->rating ?? 0,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'is_approved' => false,
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Restaurant registered successfully! Your account is awaiting admin approval. You will receive a confirmation email once approved.'
        ]);

    } catch (\Exception $e) {

        DB::rollBack();

        return response()->json([
            'error' => 'Registration failed'
        ], 500);
    }
}
}
