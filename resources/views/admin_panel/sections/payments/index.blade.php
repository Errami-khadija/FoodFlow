 <section id="section-payments" class="hidden animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Transaction History</h3>
          <p class="text-sm text-gray-500">All platform payments</p>
         </div>
         <div class="flex flex-wrap gap-3">
          <input type="date" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"> <input type="date" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"> <button onclick="exportCSV()" class="flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition text-sm font-medium">
           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
           </svg> Export CSV </button>
         </div>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Transaction ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Restaurant</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Type</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Commission</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#TXN-89241</td>
           <td class="px-6 py-4 text-sm text-gray-600">Bella Italia</td>
           <td class="px-6 py-4 text-sm text-gray-600">Order Payment</td>
           <td class="px-6 py-4 text-sm font-medium text-emerald-600">+$45.50</td>
           <td class="px-6 py-4 text-sm text-gray-600">$4.55</td>
           <td class="px-6 py-4 text-sm text-gray-500">Dec 15, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Completed</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#TXN-89240</td>
           <td class="px-6 py-4 text-sm text-gray-600">Dragon Wok</td>
           <td class="px-6 py-4 text-sm text-gray-600">Order Payment</td>
           <td class="px-6 py-4 text-sm font-medium text-emerald-600">+$32.80</td>
           <td class="px-6 py-4 text-sm text-gray-600">$3.28</td>
           <td class="px-6 py-4 text-sm text-gray-500">Dec 15, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Completed</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#TXN-89239</td>
           <td class="px-6 py-4 text-sm text-gray-600">Sushi Roll</td>
           <td class="px-6 py-4 text-sm text-gray-600">Payout</td>
           <td class="px-6 py-4 text-sm font-medium text-red-600">-$4,250.00</td>
           <td class="px-6 py-4 text-sm text-gray-600">-</td>
           <td class="px-6 py-4 text-sm text-gray-500">Dec 14, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">Processed</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#TXN-89238</td>
           <td class="px-6 py-4 text-sm text-gray-600">Burger Central</td>
           <td class="px-6 py-4 text-sm text-gray-600">Refund</td>
           <td class="px-6 py-4 text-sm font-medium text-red-600">-$24.50</td>
           <td class="px-6 py-4 text-sm text-gray-600">-$2.45</td>
           <td class="px-6 py-4 text-sm text-gray-500">Dec 14, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Refunded</span></td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </section>