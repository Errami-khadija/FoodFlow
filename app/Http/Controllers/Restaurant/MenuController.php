<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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

public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ]);

    // Handle image update
    if ($request->hasFile('image')) {

        // delete old image
        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        $data['image'] = $request->file('image')->store('menus', 'public');
    }

    $menu->update($data);

    return back()->with('success', 'Menu updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $menu = Menu::findOrFail($id);

    if ($menu->image && Storage::disk('public')->exists($menu->image)) {
        Storage::disk('public')->delete($menu->image);
    }

    $menu->delete();

    return redirect()->back()->with('success', 'Menu item deleted');
}
}
