<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        $orders = Order::with(['user','restaurant'])
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.orders.index', 
            'orders' => $orders
        ]);
    }
}
