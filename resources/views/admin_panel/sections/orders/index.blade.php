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

<option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
Completed
</option>

<option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
Pending
</option>

<option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>
Cancelled
</option>

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
{{ $order->user->name ?? 'Unknown' }}
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $order->restaurant->name ?? 'Unknown' }}
</td>

<td class="px-6 py-4 text-sm font-medium text-gray-900">
${{ $order->total_price }}
</td>

<td class="px-6 py-4">

@if($order->status == 'completed')
<span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
Completed
</span>

@elseif($order->status == 'pending')
<span class="px-3 py-1 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">
Pending
</span>

@elseif($order->status == 'canceled')
<span class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">
Cancelled
</span>
@endif

</td>

<td class="px-6 py-4 text-sm text-gray-500">
{{ $order->created_at->diffForHumans() }}
</td>

</tr>

@endforeach

</tbody>
        </table>
       </div>
      </div>
     </section>