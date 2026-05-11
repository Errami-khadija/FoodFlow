<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;

class SettingController extends Controller
{

   public function index()
    {
        $restaurant = auth()->user()->restaurant;
        return view('restaurant_interface.index', [
            'section' => 'restaurant_interface.sections.settings.index',
            'restaurant' => $restaurant
        ]);
    }
    public function update(Request $request)
{
    $restaurant = auth()->user()->restaurant;

    $request->validate([
        'name' => 'required|string|max:255',
        'cuisine_type' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'deliveryFee' => 'nullable|numeric',
        'deliveryTime' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('restaurants', 'public');
        $restaurant->image = $imagePath;
    }

    //  Update fields
    $restaurant->name = $request->name;
    $restaurant->cuisine_type = $request->cuisine_type;
    $restaurant->address = $request->address;
    $restaurant->deliveryFee = $request->deliveryFee;
    $restaurant->deliveryTime = $request->deliveryTime;

    // Open / Close logic
    $restaurant->open_orClose = $request->has('open_orClose');

    $restaurant->save();

    return back()->with('success', 'Settings updated successfully!');
}
}
