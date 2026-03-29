<!doctype html>
<html lang="en" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Dashboard</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'dm': ['DM Sans', 'sans-serif']
          },
          colors: {
            orange: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12'
            }
          }
        }
      }
    }
  </script>
<link rel="stylesheet" href="/css/restaurant_interface.css">
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full bg-gray-50 font-dm overflow-hidden">
  <div id="app" class="h-full flex"><!-- Mobile Overlay -->
   <div id="mobile-overlay" class="overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div><!-- Sidebar -->
  <!-- Include Sidebar -->
    @include('partials.restaurant_aside')
   <!-- Main Content -->
   <main class="flex-1 flex flex-col h-full overflow-hidden"><!-- Header -->
   <!-- Include Header -->
    @include('partials.restaurant_header') 
   <!-- Page Content -->
    <div id="page-content" class="flex-1 overflow-y-auto p-4 lg:p-8"><!-- Dashboard Page -->
     <div id="page-dashboard" class="page fade-in"><!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
         </div><span class="text-xs font-medium text-green-500 bg-green-50 px-2 py-1 rounded-full">+12%</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">47</h3>
        <p class="text-sm text-gray-400 mt-1">Today's Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
         </div><span class="text-xs font-medium text-green-500 bg-green-50 px-2 py-1 rounded-full">+8%</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">$1,284</h3>
        <p class="text-sm text-gray-400 mt-1">Today's Revenue</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
         </div><span class="text-xs font-medium text-blue-500 bg-blue-50 px-2 py-1 rounded-full">All time</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">2,847</h3>
        <p class="text-sm text-gray-400 mt-1">Total Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
         </div><span class="text-xs font-medium text-purple-500 bg-purple-50 px-2 py-1 rounded-full">All time</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">$84,562</h3>
        <p class="text-sm text-gray-400 mt-1">Total Revenue</p>
       </div>
      </div><!-- Charts Row -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8"><!-- Revenue Chart -->
       <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="font-bold text-gray-800 text-lg">Revenue Overview</h3>
          <p class="text-sm text-gray-400">Last 7 days performance</p>
         </div><select class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"> <option>Last 7 days</option> <option>Last 30 days</option> <option>Last 90 days</option> </select>
        </div>
        <div class="h-64 flex items-end justify-between gap-2 px-4">
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 60%"></div><span class="text-xs text-gray-400 mt-2">Mon</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 80%"></div><span class="text-xs text-gray-400 mt-2">Tue</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 45%"></div><span class="text-xs text-gray-400 mt-2">Wed</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 90%"></div><span class="text-xs text-gray-400 mt-2">Thu</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 70%"></div><span class="text-xs text-gray-400 mt-2">Fri</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 100%"></div><span class="text-xs text-gray-400 mt-2">Sat</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg" style="height: 85%"></div><span class="text-xs text-gray-400 mt-2">Sun</span>
         </div>
        </div>
       </div><!-- Order Status -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 text-lg mb-6">Order Status</h3>
        <div class="space-y-4">
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-yellow-400 rounded-full"></div><span class="text-gray-600">Pending</span>
          </div><span class="font-bold text-gray-800">8</span>
         </div>
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-blue-400 rounded-full"></div><span class="text-gray-600">Preparing</span>
          </div><span class="font-bold text-gray-800">12</span>
         </div>
         <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
           <div class="w-3 h-3 bg-green-400 rounded-full"></div><span class="text-gray-600">Delivered</span>
          </div><span class="font-bold text-gray-800">27</span>
         </div>
        </div><!-- Donut Chart Visual -->
        <div class="mt-6 flex justify-center">
         <div class="relative w-32 h-32">
          <svg class="w-full h-full transform -rotate-90" viewbox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="#e5e7eb" stroke-width="12" /> <circle cx="50" cy="50" r="40" fill="none" stroke="#22c55e" stroke-width="12" stroke-dasharray="138 251" stroke-dashoffset="0" /> <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="12" stroke-dasharray="63 251" stroke-dashoffset="-138" /> <circle cx="50" cy="50" r="40" fill="none" stroke="#facc15" stroke-width="12" stroke-dasharray="50 251" stroke-dashoffset="-201" />
          </svg>
          <div class="absolute inset-0 flex items-center justify-center">
           <div class="text-center"><span class="text-2xl font-bold text-gray-800">47</span>
            <p class="text-xs text-gray-400">Total</p>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div><!-- Recent Orders -->
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-between">
         <h3 class="font-bold text-gray-800 text-lg">Recent Orders</h3><button onclick="navigate('orders')" class="text-orange-500 text-sm font-medium hover:text-orange-600">View All →</button>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Items</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="hover:bg-gray-50">
           <td class="px-6 py-4 text-sm font-medium text-gray-800">#ORD-001</td>
           <td class="px-6 py-4 text-sm text-gray-600">Sarah Wilson</td>
           <td class="px-6 py-4 text-sm text-gray-600">3 items</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-800">$42.50</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 rounded-full">Pending</span></td>
          </tr>
          <tr class="hover:bg-gray-50">
           <td class="px-6 py-4 text-sm font-medium text-gray-800">#ORD-002</td>
           <td class="px-6 py-4 text-sm text-gray-600">Mike Johnson</td>
           <td class="px-6 py-4 text-sm text-gray-600">2 items</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-800">$28.00</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">Preparing</span></td>
          </tr>
          <tr class="hover:bg-gray-50">
           <td class="px-6 py-4 text-sm font-medium text-gray-800">#ORD-003</td>
           <td class="px-6 py-4 text-sm text-gray-600">Emily Chen</td>
           <td class="px-6 py-4 text-sm text-gray-600">5 items</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-800">$67.80</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Delivered</span></td>
          </tr>
          <tr class="hover:bg-gray-50">
           <td class="px-6 py-4 text-sm font-medium text-gray-800">#ORD-004</td>
           <td class="px-6 py-4 text-sm text-gray-600">David Brown</td>
           <td class="px-6 py-4 text-sm text-gray-600">1 item</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-800">$15.99</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Delivered</span></td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </div><!-- Orders Page -->
     <div id="page-orders" class="page hidden">
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
         <tbody id="orders-table-body" class="divide-y divide-gray-100">
         </tbody>
        </table>
       </div>
      </div>
     </div><!-- Menu Management Page -->
     <div id="page-menu" class="page hidden">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
       <h3 class="font-bold text-gray-800 text-lg">Menu Items</h3><button onclick="openAddItemModal()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg> Add New Item </button>
      </div>
      <div id="menu-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      </div>
     </div><!-- Categories Page -->
     <div id="page-categories" class="page hidden">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
       <h3 class="font-bold text-gray-800 text-lg">Categories</h3><button onclick="openAddCategoryModal()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg> Add Category </button>
      </div>
      <div id="categories-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      </div>
     </div><!-- Reviews Page -->
     <div id="page-reviews" class="page hidden">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewbox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">4.8</h3>
          <p class="text-sm text-gray-400">Average Rating</p>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">284</h3>
          <p class="text-sm text-gray-400">Total Reviews</p>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">12</h3>
          <p class="text-sm text-gray-400">Pending Replies</p>
         </div>
        </div>
       </div>
      </div>
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <h3 class="font-bold text-gray-800 text-lg">Recent Reviews</h3>
       </div>
       <div id="reviews-list" class="divide-y divide-gray-100">
       </div>
      </div>
     </div><!-- Analytics Page -->
     <div id="page-analytics" class="page hidden">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6"><!-- Revenue Graph -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="font-bold text-gray-800 text-lg">Revenue Trend</h3>
          <p class="text-sm text-gray-400">Monthly revenue performance</p>
         </div>
        </div>
        <div class="h-64 flex items-end justify-between gap-2">
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 40%"></div><span class="text-xs text-gray-400 mt-2">Jan</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 55%"></div><span class="text-xs text-gray-400 mt-2">Feb</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 45%"></div><span class="text-xs text-gray-400 mt-2">Mar</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 70%"></div><span class="text-xs text-gray-400 mt-2">Apr</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 85%"></div><span class="text-xs text-gray-400 mt-2">May</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-orange-500 to-orange-300 rounded-t-lg" style="height: 100%"></div><span class="text-xs text-gray-400 mt-2">Jun</span>
         </div>
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
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 50%"></div><span class="text-xs text-gray-400 mt-2">Mon</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 65%"></div><span class="text-xs text-gray-400 mt-2">Tue</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 55%"></div><span class="text-xs text-gray-400 mt-2">Wed</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 75%"></div><span class="text-xs text-gray-400 mt-2">Thu</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 90%"></div><span class="text-xs text-gray-400 mt-2">Fri</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 100%"></div><span class="text-xs text-gray-400 mt-2">Sat</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg" style="height: 80%"></div><span class="text-xs text-gray-400 mt-2">Sun</span>
         </div>
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
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" id="top-items-grid">
       </div>
      </div>
     </div><!-- Settings Page -->
     <div id="page-settings" class="page hidden">
      <div class="max-w-2xl">
       <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="p-6 border-b border-gray-100">
         <h3 class="font-bold text-gray-800 text-lg">Restaurant Profile</h3>
        </div>
        <div class="p-6 space-y-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Restaurant Name</label> <input type="text" value="FoodHub Restaurant" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label> <input type="email" value="contact@foodhub.com" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label> <input type="tel" value="+1 (555) 123-4567" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Address</label> <textarea rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">123 Food Street, Culinary District, FC 12345</textarea>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="p-6 border-b border-gray-100">
         <h3 class="font-bold text-gray-800 text-lg">Notifications</h3>
        </div>
        <div class="p-6 space-y-4">
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">New Order Alerts</p>
           <p class="text-sm text-gray-400">Get notified when new orders arrive</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-orange-500 rounded-full relative transition-colors"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">Review Notifications</p>
           <p class="text-sm text-gray-400">Get notified when customers leave reviews</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-orange-500 rounded-full relative transition-colors"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">Daily Summary</p>
           <p class="text-sm text-gray-400">Receive daily sales summary</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-gray-300 rounded-full relative transition-colors"> <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
        </div>
       </div><button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200"> Save Changes </button>
      </div>
     </div>
    </div>
   </main>
  </div><!-- Add Item Modal -->
  <div id="add-item-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md max-h-[90%] overflow-y-auto">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Add New Menu Item</h3><button onclick="closeModal('add-item-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <form id="add-item-form" class="p-6 space-y-4">
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Item Name</label> <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="e.g., Margherita Pizza">
     </div>
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> <textarea name="description" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Brief description of the item"></textarea>
     </div>
     <div class="grid grid-cols-2 gap-4">
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label> <input type="number" name="price" step="0.01" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="12.99">
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Category</label> <select name="category" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"> <option>Main Course</option> <option>Appetizers</option> <option>Desserts</option> <option>Beverages</option> </select>
      </div>
     </div>
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
      <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-orange-300 transition-colors cursor-pointer">
       <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
       </svg>
       <p class="text-sm text-gray-400">Click to upload image</p>
      </div>
     </div><button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors"> Add Item </button>
    </form>
   </div>
  </div><!-- Add Category Modal -->
  <div id="add-category-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Add New Category</h3><button onclick="closeModal('add-category-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <form id="add-category-form" class="p-6 space-y-4">
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label> <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="e.g., Appetizers">
     </div>
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Icon Emoji</label> <input type="text" name="icon" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="🍕">
     </div><button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors"> Add Category </button>
    </form>
   </div>
  </div><!-- Order Detail Modal -->
  <div id="order-detail-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Order Details</h3><button onclick="closeModal('order-detail-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <div id="order-detail-content" class="p-6">
    </div>
   </div>
  </div><!-- Toast Notification -->
  <div id="toast" class="fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-xl shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-50"><span id="toast-message">Action completed</span>
  </div>
  <script src="{{ asset('js/restaurant_interface.js') }}"></script>
  </body>
</html>