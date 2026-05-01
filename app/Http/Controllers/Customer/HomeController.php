<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;

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

    public function restaurants()
    {  
        $restaurants = Restaurant::where('is_approved', true)->get();
        return view('customer interface.all-restaurants', compact('restaurants'));
    }

    public function show($id)
    {  
        
       $restaurant = Restaurant::with('categories.menus')->findOrFail($id);
        return view('customer interface.restaurant-page', compact('restaurant'));
    }
}
