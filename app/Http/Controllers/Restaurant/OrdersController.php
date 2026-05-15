<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
{
    $query = Order::query();

    if ($request->status && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    if ($request->search) {
       $query->where(function ($q) use ($request) {
    $q->where('full_name', 'like', '%' . $request->search . '%')
      ->orWhere('phone', 'like', '%' . $request->search . '%');
});
    }

    $orders = $query->latest()->get();

     return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.orders.index',
        'orders' => $orders,
         'pageTitle' => 'Orders',
    'pageSubtitle' => "Manage your restaurant orders"
    ]);
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

    return view('restaurant_interface.sections.orders.show', compact('order'));
}

public function destroy($id)
{
    $order = Order::findOrFail($id);

    $order->items()->detach(); // delete pivot
    $order->delete();

    return back();
}
}
