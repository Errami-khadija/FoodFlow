<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   // Show all customers with optional search
    public function index(Request $request)
    {
        $search = $request->search;

    $guests = Order::whereNull('user_id')
    ->select(
        'phone',
        'full_name',
        \DB::raw('COUNT(*) as orders_count'),
        \DB::raw('SUM(total_price) as total_spent'),
        \DB::raw('MIN(created_at) as first_order_date'),
        \DB::raw("(
    SELECT payment_method
    FROM orders o2
    WHERE o2.phone = orders.phone
    AND o2.user_id IS NULL
    GROUP BY payment_method
    ORDER BY COUNT(*) DESC
    LIMIT 1
) as most_payment_method")
     
    )
    ->when($search, function ($query) use ($search) {
        $query->where('full_name', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");
    })
    ->groupBy( 'phone','full_name')
    ->paginate(10)->withQueryString();


   $guests = $guests->map(function ($guest) {
    $guest->first_order_date = \Carbon\Carbon::parse($guest->created_at)->format('M d, Y');
    return $guest;
});



        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.users.index',
            'users' => $guests,

        ]);
    }
}
