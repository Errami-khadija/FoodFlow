<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {  

        return view('customer interface.index');
    }

    public function restaurants()
    {  
        $restaurants = Restaurant::where('is_approved', true)->get();
        return view('customer interface.all-restaurants', compact('restaurants'));
    }

    public function show($id)
    {  
        
        $restaurant = Restaurant::with('menus')->findOrFail($id);
        return view('customer interface.restaurant-page', compact('restaurant'));
    }
}
