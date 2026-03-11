 <section id="section-orders" class="hidden animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Recent Orders</h3>
          <p class="text-sm text-gray-500">All platform orders</p>
         </div>
         <div class="flex gap-3">
          <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"> <option>All Status</option> <option>Completed</option> <option>Pending</option> <option>Cancelled</option> </select>
         </div>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Restaurant</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#ORD-7841</td>
           <td class="px-6 py-4 text-sm text-gray-600">John Doe</td>
           <td class="px-6 py-4 text-sm text-gray-600">Bella Italia</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$45.50</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Completed</span></td>
           <td class="px-6 py-4 text-sm text-gray-500">Today, 2:34 PM</td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#ORD-7840</td>
           <td class="px-6 py-4 text-sm text-gray-600">Sarah Miller</td>
           <td class="px-6 py-4 text-sm text-gray-600">Dragon Wok</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$32.80</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Pending</span></td>
           <td class="px-6 py-4 text-sm text-gray-500">Today, 1:15 PM</td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#ORD-7839</td>
           <td class="px-6 py-4 text-sm text-gray-600">Mike Johnson</td>
           <td class="px-6 py-4 text-sm text-gray-600">Sushi Roll</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$78.90</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Completed</span></td>
           <td class="px-6 py-4 text-sm text-gray-500">Today, 12:02 PM</td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4 text-sm font-mono text-gray-900">#ORD-7838</td>
           <td class="px-6 py-4 text-sm text-gray-600">Emily Davis</td>
           <td class="px-6 py-4 text-sm text-gray-600">Burger Central</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$24.50</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Cancelled</span></td>
           <td class="px-6 py-4 text-sm text-gray-500">Yesterday</td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </section>