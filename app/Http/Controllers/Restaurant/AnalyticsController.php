<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Carbon\Carbon;
use DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        //  Monthly Revenue (last 6 months)
        $months = collect([]);
        $revenue = collect([]);

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);

            $monthName = $date->format('M');

            $total = Order::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total_price');

            $months->push($monthName);
            $revenue->push($total);
        }

        //  Orders per Day (current week)
        $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
      $ordersPerDay = [];

$startOfWeek = Carbon::now()->startOfWeek(); // Monday

for ($i = 0; $i < 7; $i++) {
    $date = $startOfWeek->copy()->addDays($i);

    $count = Order::whereDate('created_at', $date)->count();

    $ordersPerDay[] = $count;
}

        //  Top Selling Items
        $topItems = OrderItem::select('menu_id', DB::raw('SUM(quantity) as total'))
            ->groupBy('menu_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('menu')
            ->get();

        return view('restaurant_interface.index',[
            'section' => 'restaurant_interface.sections.analytics.index',
            'months'=>$months,
             'revenue'=>$revenue,
             'ordersPerDay'=>$ordersPerDay,
             'topItems'=>$topItems

        ] 
            
        );
    }
}
