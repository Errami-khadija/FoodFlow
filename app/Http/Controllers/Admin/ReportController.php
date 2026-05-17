<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $topRestaurants = Order::join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
            ->select('restaurants.id', 'restaurants.name', DB::raw('SUM(orders.total_price) as revenue'))
            ->whereNotNull('orders.restaurant_id')
            ->groupBy('restaurants.id', 'restaurants.name')
            ->orderByDesc('revenue')
            ->limit(4)
            ->get();

        $monthlyBreakdown = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%M %Y') as month"),
                DB::raw('COUNT(*) as orders'),
                DB::raw('SUM(total_price) as gmv'),
                DB::raw('SUM(total_price) * 0.1 as commission')
            )
            ->groupBy('month')
            ->orderByRaw('MIN(created_at) desc')
            ->limit(6)
            ->get();

        $monthlyBreakdown = $monthlyBreakdown->map(function ($item, $index) use ($monthlyBreakdown) {
            $previous = $monthlyBreakdown->get($index + 1);
            $growth = null;

            if ($previous && $previous->gmv > 0) {
                $growth = round((($item->gmv - $previous->gmv) / $previous->gmv) * 100, 1);
            }

            return (object) [
                'month' => $item->month,
                'orders' => $item->orders,
                'gmv' => $item->gmv,
                'commission' => $item->commission,
                'growth' => $growth,
            ];
        });

        $totalCommission = Order::sum(DB::raw('total_price * 0.1'));
        $monthlyCommission = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->sum(DB::raw('total_price * 0.1'));

        $totalOrders = Order::count();
        $monthlyOrders = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $monthlyRevenue = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total_price');

        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.reports.index',
            'topRestaurants' => $topRestaurants,
            'monthlyBreakdown' => $monthlyBreakdown,
            'totalCommission' => $totalCommission,
            'monthlyCommission' => $monthlyCommission,
            'monthlyRevenue' => $monthlyRevenue,
            'totalOrders' => $totalOrders,
            'monthlyOrders' => $monthlyOrders,
        ]);
    }

    public function download(Request $request)
    {
        $monthlyBreakdown = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%M %Y') as month"),
                DB::raw('COUNT(*) as orders'),
                DB::raw('SUM(total_price) as gmv'),
                DB::raw('SUM(total_price) * 0.1 as commission')
            )
            ->groupBy('month')
            ->orderByRaw('MIN(created_at) desc')
            ->limit(6)
            ->get();

        $monthlyBreakdown = $monthlyBreakdown->map(function ($item, $index) use ($monthlyBreakdown) {
            $previous = $monthlyBreakdown->get($index + 1);
            $growth = null;

            if ($previous && $previous->gmv > 0) {
                $growth = round((($item->gmv - $previous->gmv) / $previous->gmv) * 100, 1);
            }

            return (object) [
                'month' => $item->month,
                'orders' => $item->orders,
                'gmv' => $item->gmv,
                'commission' => $item->commission,
                'growth' => $growth,
            ];
        });

        $filename = 'admin-report-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($monthlyBreakdown) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Month', 'Orders', 'GMV', 'Commission', 'Growth (%)']);

            foreach ($monthlyBreakdown as $row) {
                fputcsv($file, [
                    $row->month,
                    $row->orders,
                    number_format($row->gmv, 2, '.', ''),
                    number_format($row->commission, 2, '.', ''),
                    $row->growth === null ? '' : $row->growth,
                ]);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, $filename, $headers);
    }
}
