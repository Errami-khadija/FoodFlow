 <section id="section-payments" class="animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Transaction History</h3>
          <p class="text-sm text-gray-500">All platform payments</p>
         </div>
         <form method="GET" action="{{ route('admin.payments') }}" class="flex flex-wrap gap-3">
          <input name="from" type="date" value="{{ request('from') }}" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
          <input name="to" type="date" value="{{ request('to') }}" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
          <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition text-sm font-medium">
           Filter
          </button>
          <a href="{{ route('admin.payments.download') }}?{{ http_build_query(request()->only('from', 'to')) }}" class="flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition text-sm font-medium">
           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
           </svg> Export CSV
          </a>
         </form>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Transaction ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Restaurant</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Payment Method</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Commission</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Payment Status</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          @forelse ($transactions as $transaction)
           @php
               $paymentMethod = strtolower($transaction->payment_method ?? 'order');
               $paymentStatus = match ($paymentMethod) {
                   'refund' => 'Refund',
                   'payout' => 'Payout',
                   'card', 'cash' => 'Paid',
                   'order' => 'Order Payment',
                   default => ucfirst($paymentMethod),
               };
               $statusClasses = match (strtolower($paymentStatus)) {
                   'paid' => 'bg-emerald-100 text-emerald-700',
                   'refund' => 'bg-red-100 text-red-700',
                   'payout' => 'bg-blue-100 text-blue-700',
                   default => 'bg-slate-100 text-slate-700',
               };
               $commission = number_format($transaction->total_price * 0.1, 2);
           @endphp
           <tr class="table-row">
            <td class="px-6 py-4 text-sm font-mono text-gray-900">#TXN-{{ $transaction->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction->restaurant?->name ?? 'N/A' }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ ucfirst($paymentMethod) }}</td>
            <td class="px-6 py-4 text-sm font-medium text-emerald-600">${{ number_format($transaction->total_price, 2) }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">${{ $commission }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->created_at?->format('M d, Y') ?? 'N/A' }}</td>
            <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusClasses }}">{{ $paymentStatus }}</span></td>
           </tr>
          @empty
           <tr>
            <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-500">No transactions found.</td>
           </tr>
          @endforelse
         </tbody>
        </table>
       </div>
      </div>
     </section>