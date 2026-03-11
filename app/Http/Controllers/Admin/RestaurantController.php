<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{

public function restaurants()
{
$restaurants = Restaurant::with('owner')->get();
    return view('admin_panel.index', [
        'section' => 'admin_panel.sections.restaurants.index', 
        'restaurants' => $restaurants
    ]);
}
  public function approve($id)
{
    $restaurant = Restaurant::findOrFail($id);
    $restaurant->is_approved = true;
    $restaurant->save();

    return back()->with('success', 'Restaurant approved successfully.');
}
}
