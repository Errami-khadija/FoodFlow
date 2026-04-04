<div id="page-orders" class="page">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <h3 class="font-bold text-gray-800 text-lg">All Orders</h3>
         <div class="flex items-center gap-3"><select id="status-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"> <option value="all">All Status</option> <option value="pending">Pending</option> <option value="preparing">Preparing</option> <option value="delivered">Delivered</option> </select> <input type="text" placeholder="Search orders..." class="text-sm border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 w-48">
         </div>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer Name</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
         </thead>
        <tbody id="orders-table-body">
    @foreach($orders as $order)
        <tr class="hover:bg-gray-50">
            
            <!-- ID -->
            <td class="px-6 py-4 text-sm font-medium text-gray-800">
                #ORD-{{ $order->id }}
            </td>

            <!-- Customer -->
            <td class="px-6 py-4 text-sm text-gray-600">
                {{ $order->user->name ?? $order->customer_name ?? 'Guest' }}
            </td>

            <!-- Total -->
            <td class="px-6 py-4 text-sm font-medium text-gray-800">
                ${{ number_format($order->total_price, 2) }}
            </td>

            <!-- Status -->
            <td class="px-6 py-4">
                <span class="px-3 py-1 text-xs font-medium rounded-full 
                    @if($order->status == 'pending')
                        bg-yellow-100 text-yellow-700
                    @elseif($order->status == 'preparing')
                        bg-blue-100 text-blue-700
                    @elseif($order->status == 'delivered')
                        bg-green-100 text-green-700
                    @else
                        bg-gray-100 text-gray-700
                    @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </td>

            <!-- Actions -->
            <td class="px-6 py-4">
                <div class="flex items-center gap-2">

                    <!-- View -->
                    <button onclick="openModal('order-detail-modal')" data-id="{{ $order->id }}"
                        class="p-2 hover:bg-gray-100 rounded-lg text-gray-500 hover:text-gray-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
</button>

                    <!-- Update -->
                    <form action="{{ route('restaurant.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="status" value="preparing">

                        <button type="submit"
                            class="p-2 hover:bg-orange-50 rounded-lg text-orange-500 hover:text-orange-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </button>
                    </form>

                </div>
            </td>

        </tr>
    @endforeach
</tbody>
        </table>
       </div>
      </div>
     </div>

@include('restaurant_interface.sections.orders.show')