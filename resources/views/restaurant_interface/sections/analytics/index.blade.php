<div id="page-analytics" class="page">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6"><!-- Revenue Graph -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="font-bold text-gray-800 text-lg">Revenue Trend</h3>
          <p class="text-sm text-gray-400">Monthly revenue performance</p>
         </div>
        </div>
        <div class="h-64 flex items-end justify-between gap-2">
     <canvas id="revenueChart" height="100"></canvas>
        
      
        </div>
       </div><!-- Orders Per Day -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="font-bold text-gray-800 text-lg">Orders Per Day</h3>
          <p class="text-sm text-gray-400">Daily order distribution</p>
         </div>
        </div>
        <div class="h-64 flex items-end justify-between gap-3">
      <canvas id="ordersChart" height="100"></canvas>

        </div>
       </div>
      </div><!-- Top Selling Items -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
       <div class="flex items-center justify-between mb-6">
        <div>
         <h3 class="font-bold text-gray-800 text-lg">Top Selling Items</h3>
         <p class="text-sm text-gray-400">Best performers this month</p>
        </div>
       </div>
@foreach($topItems as $item)
   <div class="bg-gray-50 p-4 rounded-xl flex items-center gap-4">
         {{-- Image --}}
        <img 
            src="{{ asset('storage/' . $item->menu->image) }}" 
            alt="{{ $item->menu->name }}"
            class="w-16 h-16 object-cover rounded-lg"
        >
        <h4 class="font-semibold text-gray-800">
            {{ $item->menu->name ?? 'Unknown' }}
        </h4>
        <p class="text-sm text-gray-500">
            Sold: {{ $item->total }}
        </p>
    </div>
@endforeach
       </div>
      </div>
     </div>

<script>
    const months = @json($months);
    const revenue = @json($revenue);
    const orders = @json($ordersPerDay);
</script>
<script>
const ctx1 = document.getElementById('revenueChart').getContext('2d');

new Chart(ctx1, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Revenue',
            data: revenue,
            borderColor: '#f97316',
            backgroundColor: 'rgba(249, 115, 22, 0.2)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});
const ctx2 = document.getElementById('ordersChart').getContext('2d');

new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
            label: 'Orders',
            data: orders,
            backgroundColor: '#3b82f6'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});
</script>