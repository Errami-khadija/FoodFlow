 <section id="section-orders" class="animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Recent Orders</h3>
          <p class="text-sm text-gray-500">All platform orders</p>
         </div>
         <div class="flex gap-3">
          <form method="GET" action="{{ route('admin.orders') }}">
<select name="status"
onchange="this.form.submit()"
class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">

<option value="">All Status</option>

 <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
        <option value="preparing" {{ request('status') == 'preparing' ? 'selected' : '' }}>Preparing</option>
        <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>

</select>
</form>
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

@foreach($orders as $order)

<tr class="table-row">

<td class="px-6 py-4 text-sm font-mono text-gray-900">
#ORD-{{ $order->id }}
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $order->full_name ?? 'Unknown' }}
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $order->restaurant->name ?? 'Unknown' }}
</td>

<td class="px-6 py-4 text-sm font-medium text-gray-900">
${{ $order->total_price }}
</td>

<td class="px-6 py-4">

@if($order->status == 'delivered')
<span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
Delivered
</span>

@elseif($order->status == 'pending')
<span class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">
Pending
</span>
@elseif($order->status == 'paid')
<span class="px-3 py-1 text-xs font-medium bg-purple-100 text-purple-700 rounded-full">
Paid
</span>
@elseif($order->status == 'preparing')
<span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">
Preparing
</span>
@elseif($order->status == 'confirmed')
<span class="px-3 py-1 text-xs font-medium bg-orange-100 text-orange-700 rounded-full">
Confirmed
</span>
@endif

</td>

<td class="px-6 py-4 text-sm text-gray-500">
{{ $order->created_at->format('M d, Y') }}
</td>

</tr>

@endforeach

</tbody>
        </table>
       </div>
      </div>
     </section>