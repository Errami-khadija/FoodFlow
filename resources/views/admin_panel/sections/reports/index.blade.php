<section id="section-reports" class=" animate-fade">
      @php
          $formatMoney = fn($amount) => '$' . number_format($amount, 2);
      @endphp
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
       <!-- Revenue per Restaurant -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Revenue per Restaurant</h3>
          <p class="text-sm text-gray-500">Top performing partners</p>
         </div>
        </div>
        <div class="space-y-4">
         @forelse($topRestaurants as $restaurant)
          @php
              $initials = strtoupper(substr($restaurant->name, 0, 2));
              $percentage = $topRestaurants->first()->revenue > 0 ? min(100, round(($restaurant->revenue / $topRestaurants->first()->revenue) * 100)) : 0;
          @endphp
          <div class="flex items-center gap-4">
           <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
            {{ $initials }}
           </div>
           <div class="flex-1">
            <div class="flex justify-between items-center mb-1">
             <p class="text-sm font-medium text-gray-900">{{ $restaurant->name }}</p>
             <p class="text-sm font-bold text-gray-900">{{ $formatMoney($restaurant->revenue) }}</p>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
             <div class="bg-indigo-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
            </div>
           </div>
          </div>
         @empty
          <div class="text-sm text-gray-500">No restaurant revenue data available.</div>
         @endforelse
        </div>
       </div><!-- Commission Earnings -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Commission Earnings</h3>
          <p class="text-sm text-gray-500">Platform revenue breakdown</p>
         </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
         <div class="bg-emerald-50 rounded-xl p-4">
          <p class="text-sm text-emerald-600 mb-1">Total Commission</p>
          <p class="text-2xl font-bold text-emerald-700">{{ $formatMoney($totalCommission) }}</p>
         </div>
         <div class="bg-blue-50 rounded-xl p-4">
          <p class="text-sm text-blue-600 mb-1">This Month</p>
          <p class="text-2xl font-bold text-blue-700">{{ $formatMoney($monthlyCommission) }}</p>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Order Commissions (10%)</span> <span class="text-sm font-medium text-gray-900">{{ $formatMoney($totalCommission) }}</span>
         </div>
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Subscription Fees</span> <span class="text-sm font-medium text-gray-900">$0.00</span>
         </div>
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Featured Listings</span> <span class="text-sm font-medium text-gray-900">$0.00</span>
         </div>
         <div class="flex justify-between items-center py-3">
          <span class="text-sm text-gray-600">Other Revenue</span> <span class="text-sm font-medium text-gray-900">$0.00</span>
         </div>
        </div>
       </div>
      </div><!-- Monthly Breakdown -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
       <div class="flex items-center justify-between mb-6">
        <div>
         <h3 class="text-lg font-bold text-gray-900">Monthly Revenue Breakdown</h3>
         <p class="text-sm text-gray-500">Detailed financial report</p>
        </div>
        <a href="{{ route('admin.reports.download') }}" class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
         </svg> Download Report
        </a>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Month</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Orders</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">GMV</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Commission</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Growth</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          @forelse($monthlyBreakdown as $row)
           @php
               $growthClass = $row->growth === null ? 'text-gray-500' : ($row->growth >= 0 ? 'text-emerald-600' : 'text-red-600');
               $growthText = $row->growth === null ? '-' : sprintf('%+s%%', $row->growth);
           @endphp
           <tr class="table-row">
            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $row->month }}</td>
            <td class="px-4 py-3 text-sm text-gray-600">{{ number_format($row->orders) }}</td>
            <td class="px-4 py-3 text-sm text-gray-900">{{ $formatMoney($row->gmv) }}</td>
            <td class="px-4 py-3 text-sm font-medium text-emerald-600">{{ $formatMoney($row->commission) }}</td>
            <td class="px-4 py-3"><span class="{{ $growthClass }} text-sm">{{ $growthText }}</span></td>
           </tr>
          @empty
           <tr>
            <td colspan="5" class="px-4 py-8 text-center text-sm text-gray-500">No monthly revenue data available.</td>
           </tr>
          @endforelse
         </tbody>
        </table>
       </div>
      </div>
     </section>