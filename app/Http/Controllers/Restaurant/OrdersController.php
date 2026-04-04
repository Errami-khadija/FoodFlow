<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
{
    $orders = Order::with('menus')->latest()->get();

     return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.orders.index',
        'orders' => $orders,
    ]);
}

public function store(Request $request)
{
    $order = Order::create([
        'customer_name' => $request->customer_name,
        'status' => 'pending',
        'total_price' => 0
    ]);

    $total = 0;

    foreach ($request->items as $item) {
        $menuItem = Item::find($item['id']);

        $order->items()->attach($menuItem->id, [
            'quantity' => $item['quantity'],
            'price' => $menuItem->price
        ]);

        $total += $menuItem->price * $item['quantity'];
    }

    $order->update(['total_price' => $total]);

    return redirect()->back();
}

public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->update([
        'status' => $request->status
    ]);

    return back();
}

public function show($id)
{
    $order = Order::with('menus')->findOrFail($id);

     return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.orders.show',
        'order' => $order,
    ]);
}

public function destroy($id)
{
    $order = Order::findOrFail($id);

    $order->items()->detach(); // delete pivot
    $order->delete();

    return back();
}
}
