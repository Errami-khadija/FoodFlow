<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Mail\RestaurantApproved;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{


public function restaurants(Request $request)
{
    $query = Restaurant::with('owner');

    // Filter by status if provided
    if ($request->status) {
        if ($request->status === 'Active') {
            $query->where('is_approved', true);
        } elseif ($request->status === 'Suspended') {
            $query->where('is_approved', false);
        }
    }

     // Search by name
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $restaurants = $query->paginate(10)->withQueryString(); 

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

    // Send email
    Mail::to($restaurant->owner->email)
    ->send(new RestaurantApproved($restaurant));
    return redirect()->back()->with('success', 'Restaurant approved and notified!');
}
}
