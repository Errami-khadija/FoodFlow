<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = Carbon::now()->year;

        $totalRestaurants = Restaurant::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');

        $monthlyRevenueByMonth = Order::whereYear('created_at', $currentYear)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as revenue'))
            ->groupBy('month')
            ->pluck('revenue', 'month');

        $monthlyRevenue = collect(range(1, 12))->map(function ($month) use ($currentYear, $monthlyRevenueByMonth) {
            return (object) [
                'month' => Carbon::create($currentYear, $month, 1)->format('M'),
                'revenue' => $monthlyRevenueByMonth->get($month, 0),
            ];
        });

        $restaurantQuarterlyCounts = Restaurant::whereYear('created_at', $currentYear)
            ->select(DB::raw('QUARTER(created_at) as quarter'), DB::raw('COUNT(*) as count'))
            ->groupBy('quarter')
            ->pluck('count', 'quarter');

        $userQuarterlyCounts = User::whereYear('created_at', $currentYear)
            ->select(DB::raw('QUARTER(created_at) as quarter'), DB::raw('COUNT(*) as count'))
            ->groupBy('quarter')
            ->pluck('count', 'quarter');

        $quarterlyRestaurants = collect(range(1, 4))->map(function ($quarter) use ($restaurantQuarterlyCounts) {
            return (object) [
                'quarter' => "Q{$quarter}",
                'count' => $restaurantQuarterlyCounts->get($quarter, 0),
            ];
        });

        $quarterlyUsers = collect(range(1, 4))->map(function ($quarter) use ($userQuarterlyCounts) {
            return (object) [
                'quarter' => "Q{$quarter}",
                'count' => $userQuarterlyCounts->get($quarter, 0),
            ];
        });

        $recentActivities = collect();

        foreach (Restaurant::latest('created_at')->limit(2)->get() as $restaurant) {
            $recentActivities->push((object) [
                'type' => 'restaurant',
                'title' => 'New restaurant registered',
                'description' => $restaurant->name,
                'meta' => $restaurant->city ?? 'No location',
                'created_at' => $restaurant->created_at,
            ]);
        }

        foreach (User::latest('created_at')->limit(2)->get() as $user) {
            $recentActivities->push((object) [
                'type' => 'user',
                'title' => 'New user signed up',
                'description' => $user->email,
                'meta' => $user->name ?? 'Guest',
                'created_at' => $user->created_at,
            ]);
        }

        foreach (Order::with('restaurant')->latest('created_at')->limit(2)->get() as $order) {
            $recentActivities->push((object) [
                'type' => 'order',
                'title' => 'Payment received',
                'description' => '$' . number_format($order->total_price, 2) . ' from ' . ($order->restaurant?->name ?? 'Unknown'),
                'meta' => 'Order #' . $order->id,
                'created_at' => $order->created_at,
            ]);
        }

        $recentActivities = $recentActivities->sortByDesc('created_at')->take(5);

        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.dashboard.index',
            'totalRestaurants' => $totalRestaurants,
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'quarterlyRestaurants' => $quarterlyRestaurants,
            'quarterlyUsers' => $quarterlyUsers,
            'recentActivities' => $recentActivities,
        ]);
    }
}
