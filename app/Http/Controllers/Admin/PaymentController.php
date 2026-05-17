<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(Request $request)
    {

    $query = Order::with('restaurant');

    // Date filter
    if ($request->from && $request->to) {
        $query->whereBetween('created_at', [
            Carbon::parse($request->from)->startOfDay(),
            Carbon::parse($request->to)->endOfDay(),
        ]);
    }

    $transactions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin_panel.index', [
            'section' => 'admin_panel.sections.payments.index',
            'transactions' => $transactions,
        ]);
    }

    public function download(Request $request)
    {
        $query = Order::with('restaurant');

        if ($request->from && $request->to) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->from)->startOfDay(),
                Carbon::parse($request->to)->endOfDay(),
            ]);
        }

        $transactions = $query->latest()->get();
        $filename = 'payments-report-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($transactions) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Transaction ID', 'Restaurant', 'Type', 'Amount', 'Commission', 'Date', 'Status']);

            foreach ($transactions as $transaction) {
                fputcsv($file, [
                    "#TXN-{$transaction->id}",
                    $transaction->restaurant?->name ?? 'N/A',
                    ucfirst($transaction->payment_method ?? 'order'),
                    number_format($transaction->total_price, 2, '.', ''),
                    number_format($transaction->total_price * 0.1, 2, '.', ''),
                    $transaction->created_at?->format('M d, Y') ?? '',
                    ucfirst($transaction->status ?? 'pending'),
                ]);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, $filename, $headers);
    }
}
