<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

      // Today stats
    $todayOrders = Order::whereDate('created_at', today())->count();

    $todayRevenue = Order::whereDate('created_at', today())
        ->where('status', 'delivered')
        ->sum('total_price');

    $totalOrders = Order::count();

    $totalRevenue = Order::where('status', 'delivered')->sum('total_price');

    // Order status counts
$today = today();

$pending = Order::whereDate('created_at', $today)
    ->where('status', 'pending')
    ->count();

$preparing = Order::whereDate('created_at', $today)
    ->where('status', 'preparing')
    ->count();

$delivered = Order::whereDate('created_at', $today)
    ->where('status', 'delivered')
    ->count();

$pendingPercent = $todayOrders ? ($pending / $todayOrders) * 100 : 0;
$preparingPercent = $todayOrders ? ($preparing / $todayOrders) * 100 : 0;
$deliveredPercent = $todayOrders ? ($delivered / $todayOrders) * 100 : 0;

$pendingStroke = ($pendingPercent / 100) * 251;
$preparingStroke = ($preparingPercent / 100) * 251;
$deliveredStroke = ($deliveredPercent / 100) * 251;

    // Recent orders
    $recentOrders = Order::latest()->take(5)->get();

    // Revenue last 7 days (simple version)
    $last7Days = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
        ->where('created_at', '>=', Carbon::now()->subDays(6))
        ->where('status', 'delivered')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

$labels = $last7Days->map(function ($day) {
    return \Carbon\Carbon::parse($day->date)->format('D');
});

$data = $last7Days->pluck('total');

       return view('restaurant_interface.index', [
        'section' => 'restaurant_interface.sections.dashboard.index',
         'todayOrders' => $todayOrders,
        'todayRevenue' => $todayRevenue,
        'totalOrders' => $totalOrders,
        'totalRevenue' => $totalRevenue,
        'pending' => $pending,
        'preparing' => $preparing,
        'delivered' => $delivered,
        'recentOrders' => $recentOrders,
        'last7Days' => $last7Days,
            'labels' => $labels,
            'data' => $data,
        'pendingPercent' => $pendingPercent,
        'preparingPercent' => $preparingPercent,
        'deliveredPercent' => $deliveredPercent,
        'pendingStroke' => $pendingStroke,
        'preparingStroke' => $preparingStroke,
        'deliveredStroke' => $deliveredStroke,
    ]);
    }
}
