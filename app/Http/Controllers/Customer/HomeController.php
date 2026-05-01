<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\CartItem;

class HomeController extends Controller
{
    public function index()
    {  
        $restaurants = Restaurant::inRandomOrder()->take(4)->get();
        
         $reviews = Review::latest()->take(10)->get();

        $average = Review::avg('rating');
        $total = Review::count();

        return view('customer interface.index', compact('restaurants','reviews', 'average', 'total'));
    }

    public function restaurants(Request $request)
    {  
      $query = Restaurant::where('is_approved', true);

    //  Search by name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by cuisine
    if ($request->filled('cuisine') && $request->cuisine != 'all') {
        $query->where('cuisine_type', $request->cuisine);
    }

    $restaurants = $query->latest()->get();
        return view('customer interface.all-restaurants', compact('restaurants'));
    }

    public function show($id)
    {  
      $cartCount = CartItem::where('session_id', session()->getId())
    ->sum('quantity');
       $restaurant = Restaurant::with('categories.menus')->findOrFail($id);
        return view('customer interface.restaurant-page', compact('restaurant', 'cartCount'));
    }
}
