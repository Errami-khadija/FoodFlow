
<div id="page-dashboard" class="page fade-in"><!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
         </div><span class="text-xs font-medium text-green-500 bg-green-50 px-2 py-1 rounded-full">+12%</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">   {{ $todayOrders }}</h3>
        <p class="text-sm text-gray-400 mt-1">Today's Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
         </div><span class="text-xs font-medium text-green-500 bg-green-50 px-2 py-1 rounded-full">+8%</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">   {{ $todayRevenue }}</h3>
        <p class="text-sm text-gray-400 mt-1">Today's Revenue</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
         </div><span class="text-xs font-medium text-blue-500 bg-blue-50 px-2 py-1 rounded-full">All time</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">   {{ $totalOrders }}</h3>
        <p class="text-sm text-gray-400 mt-1">Total Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
         </div><span class="text-xs font-medium text-purple-500 bg-purple-50 px-2 py-1 rounded-full">All time</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">   {{ $totalRevenue }}</h3>
        <p class="text-sm text-gray-400 mt-1">Total Revenue</p>
       </div>
      </div><!-- Charts Row -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Revenue Chart -->
       <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="font-bold text-gray-800 text-lg">Revenue Overview</h3>
          <p class="text-sm text-gray-400">Last 7 days performance</p>
         </div>
        </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

    <canvas id="revenueChart" height="120"></canvas>
</div>
       </div><!-- Order Status -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 text-lg mb-6">Today's Order Status</h3>
        <div class="space-y-4">
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-yellow-400 rounded-full"></div><span class="text-gray-600">Pending</span>
          </div><span class="font-bold text-gray-800">{{ $pending }}</span>
         </div>
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-blue-400 rounded-full"></div><span class="text-gray-600">Preparing</span>
          </div><span class="font-bold text-gray-800">{{ $preparing }}</span>
         </div>
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-green-400 rounded-full"></div><span class="text-gray-600">Delivered</span>
          </div><span class="font-bold text-gray-800">{{ $delivered }}</span>
         </div>
        </div><!-- Donut Chart Visual -->
        <div class="mt-6 flex justify-center">
         <div class="relative w-32 h-32">
         <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">

    <!-- background -->
    <circle cx="50" cy="50" r="40"
        fill="none" stroke="#e5e7eb" stroke-width="12" />

    <!-- delivered -->
    <circle cx="50" cy="50" r="40"
        fill="none" stroke="#22c55e" stroke-width="12"
        stroke-dasharray="{{ $deliveredStroke }} 251"
        stroke-dashoffset="0" />

    <!-- preparing -->
    <circle cx="50" cy="50" r="40"
        fill="none" stroke="#3b82f6" stroke-width="12"
        stroke-dasharray="{{ $preparingStroke }} 251"
        stroke-dashoffset="-{{ $deliveredStroke }}" />

    <!-- pending -->
    <circle cx="50" cy="50" r="40"
        fill="none" stroke="#facc15" stroke-width="12"
        stroke-dasharray="{{ $pendingStroke }} 251"
        stroke-dashoffset="-{{ $deliveredStroke + $preparingStroke }}" />

</svg>
          <div class="absolute inset-0 flex items-center justify-center">
           <div class="text-center"><span class="text-2xl font-bold text-gray-800">{{ $todayOrders }}</span>
            <p class="text-xs text-gray-400">total</p>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div><!-- Recent Orders -->
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-between">
         <h3 class="font-bold text-gray-800 text-lg">Recent Orders</h3><a href="{{ route('restaurant.orders') }}" class="text-orange-500 text-sm font-medium hover:text-orange-600">View All →</a>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
         @foreach($recentOrders as $order)
<tr class="hover:bg-gray-50">
    <td class="px-6 py-4 text-sm font-medium text-gray-800">
        #ORD-{{ $order->id }}
    </td>

    <td class="px-6 py-4 text-sm text-gray-600">
        {{ $order->full_name }}
    </td>

    <td class="px-6 py-4 text-sm font-medium text-gray-800">
        ${{ number_format($order->total_price, 2) }}
    </td>

    <td class="px-6 py-4">
        <span class="px-3 py-1 text-xs font-medium rounded-full
            @if($order->status == 'pending') bg-yellow-100 text-yellow-700
            @elseif ($order->status == 'paid') bg-purple-100 text-purple-700
            @elseif($order->status =='confirmed') bg-orange-100 text-orange-700
            @elseif($order->status == 'preparing') bg-blue-100 text-blue-700
            @else bg-green-100 text-green-700
            @endif">
            {{ ucfirst($order->status) }}
        </span>
    </td>
</tr>
@endforeach
      
         </tbody>
        </table>
       </div>
      </div>
     </div>

<script>
const ctx = document.getElementById('revenueChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'Revenue',
            data: @json($data),
            backgroundColor: '#f97316',
            borderRadius: 8,
            barThickness: 30
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#f3f4f6'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>