<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  public function approve($id)
{
    $restaurant = User::findOrFail($id);
    $restaurant->is_approved = true;
    $restaurant->save();

    return back()->with('success', 'Restaurant approved successfully.');
}
}
