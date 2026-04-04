<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
   $categories = Category::withCount('menus')->get();

   return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.categories.index', 
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
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('categories', 'public');
    }

    Category::create([
        'name' => $request->name,
        'image' => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Category added successfully');
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
    $category = Category::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'image' => 'nullable|image'
    ]);

    $category->name = $request->name;

    if ($request->hasFile('image')) {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->image = $request->file('image')->store('categories', 'public');
    }

    $category->save();

    return back()->with('success', 'Updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $category = Category::findOrFail($id);

    // Delete image if exists
    if ($category->image && Storage::disk('public')->exists($category->image)) {
        Storage::disk('public')->delete($category->image);
    }

    // Delete category
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully');
}
}
