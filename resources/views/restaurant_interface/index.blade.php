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
  <style>
    html, body { height: 100%; margin: 0; }
    .chart-bar { transition: height 0.5s ease-out; }
    .nav-item { transition: all 0.2s ease; }
    .card-hover { transition: all 0.3s ease; }
    .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); }
    .fade-in { animation: fadeIn 0.3s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .sidebar-transition { transition: transform 0.3s ease, width 0.3s ease; }
    .overlay { transition: opacity 0.3s ease; }
    .status-badge { transition: all 0.2s ease; }
    .menu-card { transition: all 0.3s ease; }
    .menu-card:hover { transform: scale(1.02); }
  </style>
  <style>body { box-sizing: border-box; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full bg-gray-50 font-dm overflow-hidden">
  <div id="app" class="h-full flex"><!-- Mobile Overlay -->
   <div id="mobile-overlay" class="overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div><!-- Sidebar -->
   <aside id="sidebar" class="sidebar-transition fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white shadow-lg flex flex-col transform -translate-x-full lg:translate-x-0"><!-- Logo -->
    <div class="p-6 border-b border-gray-100">
     <div class="flex items-center gap-3">
      <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-200">
       <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
       </svg>
      </div>
      <div>
       <h1 id="restaurant-name" class="font-bold text-gray-800 text-lg">FoodHub</h1>
       <p id="tagline" class="text-xs text-gray-400">Restaurant Portal</p>
      </div>
     </div>
    </div><!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto"><button onclick="navigate('dashboard')" data-nav="dashboard" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium bg-orange-50 text-orange-600">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg><span>Dashboard</span> </button> <button onclick="navigate('orders')" data-nav="orders" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg><span>Orders</span> <span class="ml-auto bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">12</span> </button> <button onclick="navigate('menu')" data-nav="menu" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
      </svg><span>Menu Management</span> </button> <button onclick="navigate('categories')" data-nav="categories" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
      </svg><span>Categories</span> </button> <button onclick="navigate('reviews')" data-nav="reviews" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
      </svg><span>Reviews</span> </button> <button onclick="navigate('analytics')" data-nav="analytics" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg><span>Analytics</span> </button> <button onclick="navigate('settings')" data-nav="settings" class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg><span>Settings</span> </button>
    </nav><!-- Logout -->
    <div class="p-4 border-t border-gray-100"><button class="nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-red-500 hover:bg-red-50">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg><span>Logout</span> </button>
    </div>
   </aside><!-- Main Content -->
   <main class="flex-1 flex flex-col h-full overflow-hidden"><!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100 px-4 lg:px-8 py-4 flex items-center justify-between flex-shrink-0">
     <div class="flex items-center gap-4"><button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
       <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
       </svg></button>
      <div>
       <h2 id="page-title" class="text-xl lg:text-2xl font-bold text-gray-800">Dashboard</h2>
       <p class="text-sm text-gray-400">Welcome back! Here's what's happening today.</p>
      </div>
     </div>
     <div class="flex items-center gap-3"><button class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors">
       <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
       </svg><span class="absolute top-1 right-1 w-2 h-2 bg-orange-500 rounded-full"></span> </button>
      <div class="hidden sm:flex items-center gap-3 pl-3 border-l border-gray-200">
       <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold">
        JD
       </div>
       <div class="hidden md:block">
        <p class="font-semibold text-gray-800 text-sm">John Doe</p>
        <p class="text-xs text-gray-400">Restaurant Owner</p>
       </div>
      </div>
     </div>
    </header><!-- Page Content -->
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
  <script>
    // Config and Default Config
    const defaultConfig = {
      restaurant_name: 'FoodHub',
      tagline: 'Restaurant Portal',
      background_color: '#f9fafb',
      primary_color: '#f97316',
      text_color: '#1f2937',
      surface_color: '#ffffff',
      accent_color: '#ea580c',
      font_family: 'DM Sans'
    };

    let config = { ...defaultConfig };

    // Sample Data
    const orders = [
      { id: 'ORD-001', customer: 'Sarah Wilson', items: ['Margherita Pizza', 'Caesar Salad'], total: 42.50, status: 'pending' },
      { id: 'ORD-002', customer: 'Mike Johnson', items: ['Grilled Salmon', 'Lemonade'], total: 28.00, status: 'preparing' },
      { id: 'ORD-003', customer: 'Emily Chen', items: ['Beef Burger', 'Fries', 'Milkshake', 'Apple Pie', 'Coffee'], total: 67.80, status: 'delivered' },
      { id: 'ORD-004', customer: 'David Brown', items: ['Chicken Wings'], total: 15.99, status: 'delivered' },
      { id: 'ORD-005', customer: 'Lisa Anderson', items: ['Veggie Wrap', 'Green Tea'], total: 18.50, status: 'pending' },
      { id: 'ORD-006', customer: 'Tom Garcia', items: ['Spaghetti Bolognese', 'Tiramisu'], total: 35.00, status: 'preparing' },
      { id: 'ORD-007', customer: 'Amy White', items: ['Fish & Chips', 'Coleslaw'], total: 22.75, status: 'pending' },
      { id: 'ORD-008', customer: 'James Lee', items: ['Steak Medium Rare', 'Mashed Potatoes', 'Red Wine'], total: 58.00, status: 'preparing' }
    ];

    const menuItems = [
      { id: 1, name: 'Margherita Pizza', description: 'Fresh tomatoes, mozzarella, basil', price: 16.99, category: 'Main Course', emoji: '🍕' },
      { id: 2, name: 'Grilled Salmon', description: 'Atlantic salmon with herbs', price: 24.99, category: 'Main Course', emoji: '🐟' },
      { id: 3, name: 'Caesar Salad', description: 'Romaine, parmesan, croutons', price: 12.99, category: 'Appetizers', emoji: '🥗' },
      { id: 4, name: 'Beef Burger', description: 'Angus beef with cheese', price: 18.99, category: 'Main Course', emoji: '🍔' },
      { id: 5, name: 'Tiramisu', description: 'Classic Italian dessert', price: 8.99, category: 'Desserts', emoji: '🍰' },
      { id: 6, name: 'Chicken Wings', description: 'Crispy with hot sauce', price: 14.99, category: 'Appetizers', emoji: '🍗' },
      { id: 7, name: 'Lemonade', description: 'Fresh squeezed', price: 4.99, category: 'Beverages', emoji: '🍋' },
      { id: 8, name: 'Chocolate Cake', description: 'Rich dark chocolate', price: 7.99, category: 'Desserts', emoji: '🍫' }
    ];

    const categories = [
      { id: 1, name: 'Main Course', icon: '🍽️', itemCount: 12 },
      { id: 2, name: 'Appetizers', icon: '🥗', itemCount: 8 },
      { id: 3, name: 'Desserts', icon: '🍰', itemCount: 6 },
      { id: 4, name: 'Beverages', icon: '🥤', itemCount: 10 },
      { id: 5, name: 'Specials', icon: '⭐', itemCount: 4 }
    ];

    const reviews = [
      { id: 1, customer: 'Alice Martinez', rating: 5, comment: 'Amazing food and quick delivery! The pizza was perfect.', date: '2 hours ago', avatar: 'AM' },
      { id: 2, customer: 'Robert Kim', rating: 4, comment: 'Great taste, but delivery took a bit longer than expected.', date: '5 hours ago', avatar: 'RK' },
      { id: 3, customer: 'Jessica Taylor', rating: 5, comment: 'Best restaurant in town! Love the grilled salmon.', date: '1 day ago', avatar: 'JT' },
      { id: 4, customer: 'Chris Davis', rating: 3, comment: 'Food was good but portions could be bigger.', date: '2 days ago', avatar: 'CD' }
    ];

    const topItems = [
      { name: 'Margherita Pizza', sales: 156, emoji: '🍕' },
      { name: 'Beef Burger', sales: 142, emoji: '🍔' },
      { name: 'Grilled Salmon', sales: 98, emoji: '🐟' },
      { name: 'Caesar Salad', sales: 87, emoji: '🥗' },
      { name: 'Tiramisu', sales: 76, emoji: '🍰' }
    ];

    // Navigation
    function navigate(page) {
      // Hide all pages
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      
      // Show selected page
      const pageEl = document.getElementById(`page-${page}`);
      if (pageEl) {
        pageEl.classList.remove('hidden');
        pageEl.classList.add('fade-in');
      }
      
      // Update nav items
      document.querySelectorAll('[data-nav]').forEach(item => {
        if (item.dataset.nav === page) {
          item.className = 'nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium bg-orange-50 text-orange-600';
        } else {
          item.className = 'nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50';
        }
      });
      
      // Update page title
      const titles = {
        dashboard: 'Dashboard',
        orders: 'Orders',
        menu: 'Menu Management',
        categories: 'Categories',
        reviews: 'Reviews',
        analytics: 'Analytics',
        settings: 'Settings'
      };
      document.getElementById('page-title').textContent = titles[page] || 'Dashboard';
      
      // Close mobile sidebar
      if (window.innerWidth < 1024) {
        closeSidebar();
      }
      
      // Render page-specific content
      if (page === 'orders') renderOrders();
      if (page === 'menu') renderMenuItems();
      if (page === 'categories') renderCategories();
      if (page === 'reviews') renderReviews();
      if (page === 'analytics') renderTopItems();
    }

    // Sidebar Toggle
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('mobile-overlay');
      
      if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
      } else {
        closeSidebar();
      }
    }

    function closeSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('mobile-overlay');
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    }

    // Render Orders Table
    function renderOrders() {
      const tbody = document.getElementById('orders-table-body');
      const statusFilter = document.getElementById('status-filter').value;
      
      const filteredOrders = statusFilter === 'all' 
        ? orders 
        : orders.filter(o => o.status === statusFilter);
      
      tbody.innerHTML = filteredOrders.map(order => `
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 text-sm font-medium text-gray-800">#${order.id}</td>
          <td class="px-6 py-4 text-sm text-gray-600">${order.customer}</td>
          <td class="px-6 py-4 text-sm font-medium text-gray-800">$${order.total.toFixed(2)}</td>
          <td class="px-6 py-4">
            <span class="px-3 py-1 text-xs font-medium rounded-full ${getStatusClass(order.status)}">
              ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
            </span>
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center gap-2">
              <button onclick="viewOrder('${order.id}')" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500 hover:text-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </button>
              <button onclick="updateOrderStatus('${order.id}')" class="p-2 hover:bg-orange-50 rounded-lg text-orange-500 hover:text-orange-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
    }

    function getStatusClass(status) {
      switch(status) {
        case 'pending': return 'bg-yellow-100 text-yellow-700';
        case 'preparing': return 'bg-blue-100 text-blue-700';
        case 'delivered': return 'bg-green-100 text-green-700';
        default: return 'bg-gray-100 text-gray-700';
      }
    }

    function viewOrder(orderId) {
      const order = orders.find(o => o.id === orderId);
      if (!order) return;
      
      const content = document.getElementById('order-detail-content');
      content.innerHTML = `
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Order ID</span>
            <span class="font-medium text-gray-800">#${order.id}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Customer</span>
            <span class="font-medium text-gray-800">${order.customer}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Status</span>
            <span class="px-3 py-1 text-xs font-medium rounded-full ${getStatusClass(order.status)}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span>
          </div>
          <div class="border-t border-gray-100 pt-4">
            <span class="text-gray-500 block mb-2">Items</span>
            <ul class="space-y-2">
              ${order.items.map(item => `<li class="text-gray-800">• ${item}</li>`).join('')}
            </ul>
          </div>
          <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <span class="font-medium text-gray-800">Total</span>
            <span class="text-xl font-bold text-orange-500">$${order.total.toFixed(2)}</span>
          </div>
        </div>
      `;
      
      openModal('order-detail-modal');
    }

    function updateOrderStatus(orderId) {
      const order = orders.find(o => o.id === orderId);
      if (!order) return;
      
      const statusFlow = ['pending', 'preparing', 'delivered'];
      const currentIndex = statusFlow.indexOf(order.status);
      
      if (currentIndex < statusFlow.length - 1) {
        order.status = statusFlow[currentIndex + 1];
        renderOrders();
        showToast(`Order ${orderId} updated to ${order.status}`);
      } else {
        showToast('Order already delivered');
      }
    }

    // Render Menu Items
    function renderMenuItems() {
      const grid = document.getElementById('menu-grid');
      grid.innerHTML = menuItems.map(item => `
        <div class="menu-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
          <div class="h-32 bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center">
            <span class="text-5xl">${item.emoji}</span>
          </div>
          <div class="p-4">
            <div class="flex items-start justify-between mb-2">
              <h4 class="font-semibold text-gray-800">${item.name}</h4>
              <span class="text-orange-500 font-bold">$${item.price}</span>
            </div>
            <p class="text-sm text-gray-400 mb-3">${item.description}</p>
            <div class="flex items-center justify-between">
              <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">${item.category}</span>
              <div class="flex gap-1">
                <button onclick="editMenuItem(${item.id})" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                </button>
                <button onclick="deleteMenuItem(${item.id})" class="p-2 hover:bg-red-50 rounded-lg text-red-500">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      `).join('');
    }

    function editMenuItem(id) {
      showToast('Edit functionality - Item #' + id);
    }

    function deleteMenuItem(id) {
      const index = menuItems.findIndex(i => i.id === id);
      if (index > -1) {
        menuItems.splice(index, 1);
        renderMenuItems();
        showToast('Item deleted successfully');
      }
    }

    // Render Categories
    function renderCategories() {
      const grid = document.getElementById('categories-grid');
      grid.innerHTML = categories.map(cat => `
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center">
              <span class="text-2xl">${cat.icon}</span>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800">${cat.name}</h4>
              <p class="text-sm text-gray-400">${cat.itemCount} items</p>
            </div>
          </div>
          <div class="flex gap-2">
            <button class="flex-1 py-2 text-sm font-medium text-orange-500 hover:bg-orange-50 rounded-lg transition-colors">
              Edit
            </button>
            <button onclick="deleteCategory(${cat.id})" class="flex-1 py-2 text-sm font-medium text-red-500 hover:bg-red-50 rounded-lg transition-colors">
              Delete
            </button>
          </div>
        </div>
      `).join('');
    }

    function deleteCategory(id) {
      const index = categories.findIndex(c => c.id === id);
      if (index > -1) {
        categories.splice(index, 1);
        renderCategories();
        showToast('Category deleted');
      }
    }

    // Render Reviews
    function renderReviews() {
      const list = document.getElementById('reviews-list');
      list.innerHTML = reviews.map(review => `
        <div class="p-6 hover:bg-gray-50">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
              ${review.avatar}
            </div>
            <div class="flex-1">
              <div class="flex items-center justify-between mb-1">
                <h4 class="font-semibold text-gray-800">${review.customer}</h4>
                <span class="text-xs text-gray-400">${review.date}</span>
              </div>
              <div class="flex items-center gap-1 mb-2">
                ${Array(5).fill(0).map((_, i) => `
                  <svg class="w-4 h-4 ${i < review.rating ? 'text-yellow-400' : 'text-gray-200'}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                  </svg>
                `).join('')}
              </div>
              <p class="text-gray-600 text-sm">${review.comment}</p>
              <button class="mt-3 text-sm text-orange-500 font-medium hover:text-orange-600">Reply</button>
            </div>
          </div>
        </div>
      `).join('');
    }

    // Render Top Items
    function renderTopItems() {
      const grid = document.getElementById('top-items-grid');
      grid.innerHTML = topItems.map((item, index) => `
        <div class="bg-gray-50 rounded-xl p-4 text-center">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm">
            <span class="text-2xl">${item.emoji}</span>
          </div>
          <h4 class="font-semibold text-gray-800 text-sm mb-1">${item.name}</h4>
          <p class="text-orange-500 font-bold">${item.sales} sold</p>
          <span class="text-xs text-gray-400">#${index + 1} Best Seller</span>
        </div>
      `).join('');
    }

    // Modal Functions
    function openAddItemModal() {
      openModal('add-item-modal');
    }

    function openAddCategoryModal() {
      openModal('add-category-modal');
    }

    function openModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // Toast
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toast-message');
      toastMessage.textContent = message;
      toast.classList.remove('translate-y-20', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');
      
      setTimeout(() => {
        toast.classList.add('translate-y-20', 'opacity-0');
        toast.classList.remove('translate-y-0', 'opacity-100');
      }, 3000);
    }

    // Toggle Switch
    function toggleSwitch(btn) {
      const isOn = btn.classList.contains('bg-orange-500');
      const dot = btn.querySelector('span');
      
      if (isOn) {
        btn.classList.remove('bg-orange-500');
        btn.classList.add('bg-gray-300');
        dot.classList.remove('right-1');
        dot.classList.add('left-1');
      } else {
        btn.classList.remove('bg-gray-300');
        btn.classList.add('bg-orange-500');
        dot.classList.remove('left-1');
        dot.classList.add('right-1');
      }
    }

    // Form Handlers
    document.getElementById('add-item-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const newItem = {
        id: menuItems.length + 1,
        name: formData.get('name'),
        description: formData.get('description') || '',
        price: parseFloat(formData.get('price')),
        category: formData.get('category'),
        emoji: '🍽️'
      };
      menuItems.push(newItem);
      renderMenuItems();
      closeModal('add-item-modal');
      this.reset();
      showToast('Menu item added successfully');
    });

    document.getElementById('add-category-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const newCategory = {
        id: categories.length + 1,
        name: formData.get('name'),
        icon: formData.get('icon') || '📁',
        itemCount: 0
      };
      categories.push(newCategory);
      renderCategories();
      closeModal('add-category-modal');
      this.reset();
      showToast('Category added successfully');
    });

    // Status Filter
    document.getElementById('status-filter').addEventListener('change', renderOrders);

    // Element SDK Integration
    async function onConfigChange(cfg) {
      document.getElementById('restaurant-name').textContent = cfg.restaurant_name || defaultConfig.restaurant_name;
      document.getElementById('tagline').textContent = cfg.tagline || defaultConfig.tagline;
      
      const fontFamily = cfg.font_family || defaultConfig.font_family;
      document.body.style.fontFamily = `${fontFamily}, sans-serif`;
    }

    // Initialize
    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities: (cfg) => ({
          recolorables: [
            {
              get: () => cfg.background_color || defaultConfig.background_color,
              set: (v) => { cfg.background_color = v; window.elementSdk.setConfig({ background_color: v }); }
            },
            {
              get: () => cfg.surface_color || defaultConfig.surface_color,
              set: (v) => { cfg.surface_color = v; window.elementSdk.setConfig({ surface_color: v }); }
            },
            {
              get: () => cfg.text_color || defaultConfig.text_color,
              set: (v) => { cfg.text_color = v; window.elementSdk.setConfig({ text_color: v }); }
            },
            {
              get: () => cfg.primary_color || defaultConfig.primary_color,
              set: (v) => { cfg.primary_color = v; window.elementSdk.setConfig({ primary_color: v }); }
            },
            {
              get: () => cfg.accent_color || defaultConfig.accent_color,
              set: (v) => { cfg.accent_color = v; window.elementSdk.setConfig({ accent_color: v }); }
            }
          ],
          borderables: [],
          fontEditable: {
            get: () => cfg.font_family || defaultConfig.font_family,
            set: (v) => { cfg.font_family = v; window.elementSdk.setConfig({ font_family: v }); }
          },
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (cfg) => new Map([
          ['restaurant_name', cfg.restaurant_name || defaultConfig.restaurant_name],
          ['tagline', cfg.tagline || defaultConfig.tagline]
        ])
      });
      config = window.elementSdk.config || config;
    }

    // Initial render
    onConfigChange(config);
    navigate('dashboard');
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63c7846197d92d',t:'MTc3MjQ4OTkyOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>