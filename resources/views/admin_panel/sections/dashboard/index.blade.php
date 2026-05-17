<!-- Dashboard Section -->
     <section id="section-dashboard" class="animate-fade">
      @php
          $formatMoney = fn($amount) => '$' . number_format($amount, 2);
          $maxRevenue = max($monthlyRevenue->max('revenue'), 1);
          $maxRestaurantQuarter = max($quarterlyRestaurants->max('count'), 1);
          $maxUserQuarter = max($quarterlyUsers->max('count'), 1);
      @endphp

      <div class="mb-6">
        <h2 id="page-title" class="text-xl lg:text-2xl font-bold text-gray-900">Dashboard Overview</h2>
        <p class="text-sm text-gray-500">Welcome back, Super Admin</p>
       </div>
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
         </div><span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">{{ $totalRestaurants > 0 ? '+12%' : 'New' }}</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ number_format($totalRestaurants) }}</h3>
        <p class="text-gray-500 text-sm mt-1">Total Restaurants</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
         </div><span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">{{ $totalUsers > 0 ? '+8%' : 'New' }}</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ number_format($totalUsers) }}</h3>
        <p class="text-gray-500 text-sm mt-1">Total Users</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
         </div><span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">{{ $totalOrders > 0 ? '+24%' : 'New' }}</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ number_format($totalOrders) }}</h3>
        <p class="text-gray-500 text-sm mt-1">Total Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
         </div><span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">{{ $totalRevenue > 0 ? '+18%' : 'New' }}</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $formatMoney($totalRevenue) }}</h3>
        <p class="text-gray-500 text-sm mt-1">Total Revenue</p>
       </div>
      </div><!-- Charts -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
       <!-- Revenue Chart -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Monthly Revenue</h3>
          <p class="text-sm text-gray-500">Revenue trends over the year</p>
         </div><span class="text-sm text-gray-500">{{ now()->year }}</span>
        </div>
        <div class="h-64 flex items-end justify-between gap-2">
         @foreach($monthlyRevenue as $month)
          <div class="flex-1 flex flex-col items-center">
           <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: {{ $month->revenue / $maxRevenue * 100 }}%"></div>
           <span class="text-xs text-gray-500 mt-2">{{ $month->month }}</span>
          </div>
         @endforeach
        </div>
       </div><!-- Platform Growth -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Platform Growth</h3>
          <p class="text-sm text-gray-500">New restaurants & users by quarter</p>
         </div>
         <div class="flex gap-4 text-sm">
          <div class="flex items-center gap-2">
           <div class="w-3 h-3 bg-blue-500 rounded-full"></div><span class="text-gray-600">Restaurants</span>
          </div>
          <div class="flex items-center gap-2">
           <div class="w-3 h-3 bg-purple-500 rounded-full"></div><span class="text-gray-600">Users</span>
          </div>
         </div>
        </div>
        <div class="h-64 flex items-end justify-between gap-3">
         @foreach($quarterlyRestaurants as $index => $quarter)
          <div class="flex-1 flex flex-col items-center gap-1">
           <div class="w-full flex gap-1 items-end justify-center" style="height: 200px">
            <div class="w-5 bg-blue-500 rounded-t" style="height: {{ $quarter->count / $maxRestaurantQuarter * 100 }}%"></div>
            <div class="w-5 bg-purple-500 rounded-t" style="height: {{ $quarterlyUsers[$index]->count / $maxUserQuarter * 100 }}%"></div>
           </div>
           <span class="text-xs text-gray-500">{{ $quarter->quarter }}</span>
          </div>
         @endforeach
        </div>
       </div>
      </div><!-- Recent Activity -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
       <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h3>
       <div class="space-y-4">
        @forelse($recentActivities as $activity)
         @php
             $iconPath = match($activity->type) {
                 'restaurant' => 'M12 6v6m0 0v6m0-6h6m-6 0H6',
                 'user' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                 'order' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
             };
         @endphp
         <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl">
          <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center">
           <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
           </svg>
          </div>
          <div class="flex-1">
           <p class="text-sm font-medium text-gray-900">{{ $activity->title }}</p>
           <p class="text-xs text-gray-500">{{ $activity->description }}</p>
          </div>
          <span class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
         </div>
        @empty
         <div class="text-sm text-gray-500">No recent activity available.</div>
        @endforelse
       </div>
      </div>
     </section>