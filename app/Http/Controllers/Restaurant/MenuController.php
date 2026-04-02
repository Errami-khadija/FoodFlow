<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
         $menus = Menu::with('category')->latest()->get();
         $categories = Category::all();

         return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.menu.index',
        'menus' => $menus,
        'categories' => $categories
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Upload image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('menus', 'public');
    }

    Menu::create($data);

    return redirect()->back()->with('success', 'Menu item added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
