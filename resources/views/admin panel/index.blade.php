<!doctype html>
<html lang="en" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodFlow Admin Panel</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'jakarta': ['Plus Jakarta Sans', 'sans-serif']
          }
        }
      }
    }
  </script>
  <style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    .sidebar-item { transition: all 0.2s ease; }
    .sidebar-item:hover { background: rgba(255,255,255,0.1); }
    .sidebar-item.active { background: rgba(255,255,255,0.15); border-left: 3px solid #ff6b35; }
    .card-hover { transition: all 0.3s ease; }
    .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 40px rgba(0,0,0,0.1); }
    .table-row { transition: background 0.2s ease; }
    .table-row:hover { background: #f9fafb; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade { animation: fadeIn 0.4s ease forwards; }
    .chart-bar { transition: height 0.5s ease; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #a1a1a1; }
  </style>
  <style>body { box-sizing: border-box; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full bg-gray-50">
  <div class="flex h-full overflow-hidden">
   <!-- Sidebar -->
   <aside id="sidebar" class="w-64 bg-slate-900 flex-shrink-0 flex flex-col hidden lg:flex">
    <!-- Logo -->
    <div class="p-6 border-b border-slate-700">
     <div class="flex items-center gap-3">
      <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center">
       <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
       </svg>
      </div>
      <div>
       <h1 id="platform-name" class="text-white font-bold text-lg">FoodFlow</h1>
       <p class="text-slate-400 text-xs">Super Admin</p>
      </div>
     </div>
    </div><!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
     <button onclick="showSection('dashboard')" class="sidebar-item active w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white" data-section="dashboard">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg><span class="font-medium">Dashboard</span> </button> <button onclick="showSection('restaurants')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="restaurants">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
      </svg><span class="font-medium">Restaurants</span> </button> <button onclick="showSection('users')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="users">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg><span class="font-medium">Users</span> </button> <button onclick="showSection('orders')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="orders">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg><span class="font-medium">Orders</span> </button> <button onclick="showSection('payments')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="payments">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg><span class="font-medium">Payments</span> </button> <button onclick="showSection('reports')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="reports">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg><span class="font-medium">Reports</span> </button> <button onclick="showSection('settings')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="settings">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg><span class="font-medium">Settings</span> </button>
    </nav><!-- Logout -->
    <div class="p-4 border-t border-slate-700">
     <button class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-red-400">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg><span class="font-medium">Logout</span> </button>
    </div>
   </aside><!-- Main Content -->
   <main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Top Header -->
    <header class="bg-white border-b border-gray-200 px-4 lg:px-8 py-4 flex-shrink-0">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4">
       <!-- Mobile Menu Button --> <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg></button>
       <div>
        <h2 id="page-title" class="text-xl lg:text-2xl font-bold text-gray-900">Dashboard Overview</h2>
        <p class="text-sm text-gray-500">Welcome back, Super Admin</p>
       </div>
      </div>
      <div class="flex items-center gap-3 lg:gap-4">
       <!-- Search (hidden on mobile) -->
       <div class="hidden md:flex items-center bg-gray-100 rounded-xl px-4 py-2">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg><input type="text" placeholder="Search..." class="bg-transparent border-none outline-none ml-2 w-48 text-sm">
       </div><!-- Notifications --> <button class="relative p-2 rounded-xl hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg><span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span> </button> <!-- Profile -->
       <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold">
         SA
        </div>
        <div class="hidden lg:block">
         <p class="text-sm font-semibold text-gray-900">Admin User</p>
         <p class="text-xs text-gray-500">Super Admin</p>
        </div>
       </div>
      </div>
     </div>
    </header><!-- Content Area -->
    <div class="flex-1 overflow-y-auto p-4 lg:p-8">
     <!-- Dashboard Section -->
     <section id="section-dashboard" class="animate-fade">
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
         </div><span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">+12%</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">1,284</h3>
        <p class="text-gray-500 text-sm mt-1">Total Restaurants</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
         </div><span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">+8%</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">48,392</h3>
        <p class="text-gray-500 text-sm mt-1">Total Users</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
         </div><span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">+24%</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">156,847</h3>
        <p class="text-gray-500 text-sm mt-1">Total Orders</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
         </div><span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">+18%</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">$2.4M</h3>
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
         </div><select class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"> <option>2024</option> <option>2023</option> </select>
        </div>
        <div class="h-64 flex items-end justify-between gap-2">
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 45%"></div><span class="text-xs text-gray-500 mt-2">Jan</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 60%"></div><span class="text-xs text-gray-500 mt-2">Feb</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 55%"></div><span class="text-xs text-gray-500 mt-2">Mar</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 70%"></div><span class="text-xs text-gray-500 mt-2">Apr</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 65%"></div><span class="text-xs text-gray-500 mt-2">May</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 80%"></div><span class="text-xs text-gray-500 mt-2">Jun</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 75%"></div><span class="text-xs text-gray-500 mt-2">Jul</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 85%"></div><span class="text-xs text-gray-500 mt-2">Aug</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 90%"></div><span class="text-xs text-gray-500 mt-2">Sep</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-orange-500 rounded-t-lg" style="height: 82%"></div><span class="text-xs text-gray-500 mt-2">Oct</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-emerald-500 rounded-t-lg" style="height: 95%"></div><span class="text-xs text-gray-500 mt-2">Nov</span>
         </div>
         <div class="flex-1 flex flex-col items-center">
          <div class="chart-bar w-full bg-emerald-400 rounded-t-lg" style="height: 100%"></div><span class="text-xs text-gray-500 mt-2">Dec</span>
         </div>
        </div>
       </div><!-- Platform Growth -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Platform Growth</h3>
          <p class="text-sm text-gray-500">New restaurants &amp; users</p>
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
         <div class="flex-1 flex flex-col items-center gap-1">
          <div class="w-full flex gap-1 items-end justify-center" style="height: 200px">
           <div class="w-5 bg-blue-500 rounded-t" style="height: 30%"></div>
           <div class="w-5 bg-purple-500 rounded-t" style="height: 45%"></div>
          </div><span class="text-xs text-gray-500">Q1</span>
         </div>
         <div class="flex-1 flex flex-col items-center gap-1">
          <div class="w-full flex gap-1 items-end justify-center" style="height: 200px">
           <div class="w-5 bg-blue-500 rounded-t" style="height: 45%"></div>
           <div class="w-5 bg-purple-500 rounded-t" style="height: 60%"></div>
          </div><span class="text-xs text-gray-500">Q2</span>
         </div>
         <div class="flex-1 flex flex-col items-center gap-1">
          <div class="w-full flex gap-1 items-end justify-center" style="height: 200px">
           <div class="w-5 bg-blue-500 rounded-t" style="height: 60%"></div>
           <div class="w-5 bg-purple-500 rounded-t" style="height: 75%"></div>
          </div><span class="text-xs text-gray-500">Q3</span>
         </div>
         <div class="flex-1 flex flex-col items-center gap-1">
          <div class="w-full flex gap-1 items-end justify-center" style="height: 200px">
           <div class="w-5 bg-blue-500 rounded-t" style="height: 80%"></div>
           <div class="w-5 bg-purple-500 rounded-t" style="height: 90%"></div>
          </div><span class="text-xs text-gray-500">Q4</span>
         </div>
        </div>
       </div>
      </div><!-- Recent Activity -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
       <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h3>
       <div class="space-y-4">
        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl">
         <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
          <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
         </div>
         <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">New restaurant registered</p>
          <p class="text-xs text-gray-500">Bella Italia - New York</p>
         </div><span class="text-xs text-gray-400">2 min ago</span>
        </div>
        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl">
         <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
          <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
         </div>
         <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">New user signed up</p>
          <p class="text-xs text-gray-500">john.doe@email.com</p>
         </div><span class="text-xs text-gray-400">15 min ago</span>
        </div>
        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl">
         <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
          <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
         </div>
         <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">Payment received</p>
          <p class="text-xs text-gray-500">$1,250.00 from Dragon Wok</p>
         </div><span class="text-xs text-gray-400">1 hour ago</span>
        </div>
       </div>
      </div>
     </section><!-- Restaurants Section -->
     <section id="section-restaurants" class="hidden animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">All Restaurants</h3>
          <p class="text-sm text-gray-500">Manage restaurant partners</p>
         </div>
         <div class="flex gap-3">
          <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
           <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
           </svg><input type="text" placeholder="Search restaurants..." class="bg-transparent border-none outline-none ml-2 w-40 text-sm">
          </div><select class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"> <option>All Status</option> <option>Active</option> <option>Suspended</option> </select>
         </div>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Restaurant</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Owner</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Revenue</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orders</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
              BI
             </div>
             <div>
              <p class="font-medium text-gray-900">Bella Italia</p>
              <p class="text-xs text-gray-500">Italian Cuisine</p>
             </div>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">Marco Rossi</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$45,230</td>
           <td class="px-6 py-4 text-sm text-gray-600">1,234</td>
           <td class="px-6 py-4">
            <div class="flex gap-2">
             <button onclick="openRestaurantDetails({name: 'Bella Italia', owner: 'Marco Rossi', cuisine: 'Italian Cuisine', status: 'Active', revenue: '$45,230', orders: '1,234', rating: 4.8, avgDelivery: '28 min', commission: '10%', phone: '+1 (555) 123-4567', email: 'marco@bellaitalia.com', joined: 'Jan 15, 2023', address: '123 Main St, New York, NY 10001'})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg></button> <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
              </svg></button>
            </div></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
              DW
             </div>
             <div>
              <p class="font-medium text-gray-900">Dragon Wok</p>
              <p class="text-xs text-gray-500">Chinese Cuisine</p>
             </div>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">Wei Chen</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$38,450</td>
           <td class="px-6 py-4 text-sm text-gray-600">987</td>
           <td class="px-6 py-4">
            <div class="flex gap-2">
             <button onclick="openRestaurantDetails({name: 'Bella Italia', owner: 'Marco Rossi', cuisine: 'Italian Cuisine', status: 'Active', revenue: '$45,230', orders: '1,234', rating: 4.8, avgDelivery: '28 min', commission: '10%', phone: '+1 (555) 123-4567', email: 'marco@bellaitalia.com', joined: 'Jan 15, 2023', address: '123 Main St, New York, NY 10001'})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg></button> <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
              </svg></button>
            </div></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
              TG
             </div>
             <div>
              <p class="font-medium text-gray-900">Taco Garden</p>
              <p class="text-xs text-gray-500">Mexican Cuisine</p>
             </div>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">Carlos Martinez</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Suspended</span></td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$12,800</td>
           <td class="px-6 py-4 text-sm text-gray-600">456</td>
           <td class="px-6 py-4">
            <div class="flex gap-2">
             <button onclick="openRestaurantDetails({name: 'Taco Garden', owner: 'Carlos Martinez', cuisine: 'Mexican Cuisine', status: 'Suspended', revenue: '$12,800', orders: '456', rating: 4.3, avgDelivery: '25 min', commission: '10%', phone: '+1 (555) 345-6789', email: 'carlos@tacogarden.com', joined: 'May 10, 2023', address: '789 Pine St, New York, NY 10003'})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg></button> <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg></button>
            </div></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
              SR
             </div>
             <div>
              <p class="font-medium text-gray-900">Sushi Roll</p>
              <p class="text-xs text-gray-500">Japanese Cuisine</p>
             </div>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">Yuki Tanaka</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$52,100</td>
           <td class="px-6 py-4 text-sm text-gray-600">1,567</td>
           <td class="px-6 py-4">
            <div class="flex gap-2">
             <button onclick="openRestaurantDetails({name: 'Bella Italia', owner: 'Marco Rossi', cuisine: 'Italian Cuisine', status: 'Active', revenue: '$45,230', orders: '1,234', rating: 4.8, avgDelivery: '28 min', commission: '10%', phone: '+1 (555) 123-4567', email: 'marco@bellaitalia.com', joined: 'Jan 15, 2023', address: '123 Main St, New York, NY 10001'})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg></button> <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
              </svg></button>
            </div></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
              BC
             </div>
             <div>
              <p class="font-medium text-gray-900">Burger Central</p>
              <p class="text-xs text-gray-500">American Cuisine</p>
             </div>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">Mike Johnson</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$67,890</td>
           <td class="px-6 py-4 text-sm text-gray-600">2,345</td>
           <td class="px-6 py-4">
            <div class="flex gap-2">
             <button onclick="openRestaurantDetails({name: 'Bella Italia', owner: 'Marco Rossi', cuisine: 'Italian Cuisine', status: 'Active', revenue: '$45,230', orders: '1,234', rating: 4.8, avgDelivery: '28 min', commission: '10%', phone: '+1 (555) 123-4567', email: 'marco@bellaitalia.com', joined: 'Jan 15, 2023', address: '123 Main St, New York, NY 10001'})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg></button> <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
              </svg></button>
            </div></td>
          </tr>
         </tbody>
        </table>
       </div>
       <div class="p-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-sm text-gray-500">Showing 1-5 of 1,284 restaurants</p>
        <div class="flex gap-2">
         <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">Previous</button> <button class="px-4 py-2 text-sm bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">1</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">2</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">3</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">Next</button>
        </div>
       </div>
      </div>
     </section><!-- Users Section -->
     <section id="section-users" class="hidden animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Platform Users</h3>
          <p class="text-sm text-gray-500">Manage customer accounts</p>
         </div>
         <div class="flex gap-3">
          <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
           <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
           </svg><input type="text" placeholder="Search users..." class="bg-transparent border-none outline-none ml-2 w-40 text-sm">
          </div>
         </div>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">User</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orders</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Spent</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Joined</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
              JD
             </div>
             <p class="font-medium text-gray-900">John Doe</p>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">john.doe@email.com</td>
           <td class="px-6 py-4 text-sm text-gray-600">47</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$1,234</td>
           <td class="px-6 py-4 text-sm text-gray-500">Jan 15, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
              SM
             </div>
             <p class="font-medium text-gray-900">Sarah Miller</p>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">sarah.m@email.com</td>
           <td class="px-6 py-4 text-sm text-gray-600">89</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$2,567</td>
           <td class="px-6 py-4 text-sm text-gray-500">Dec 3, 2023</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Active</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-6 py-4">
            <div class="flex items-center gap-3">
             <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
              RW
             </div>
             <p class="font-medium text-gray-900">Robert Wilson</p>
            </div></td>
           <td class="px-6 py-4 text-sm text-gray-600">r.wilson@email.com</td>
           <td class="px-6 py-4 text-sm text-gray-600">12</td>
           <td class="px-6 py-4 text-sm font-medium text-gray-900">$345</td>
           <td class="px-6 py-4 text-sm text-gray-500">Mar 22, 2024</td>
           <td class="px-6 py-4"><span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">Inactive</span></td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </section><!-- Orders Section -->
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
     </section><!-- Payments Section -->
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
     </section><!-- Reports Section -->
     <section id="section-reports" class="hidden animate-fade">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
       <!-- Revenue per Restaurant -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Revenue per Restaurant</h3>
          <p class="text-sm text-gray-500">Top performing partners</p>
         </div>
        </div>
        <div class="space-y-4">
         <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
           BC
          </div>
          <div class="flex-1">
           <div class="flex justify-between items-center mb-1">
            <p class="text-sm font-medium text-gray-900">Burger Central</p>
            <p class="text-sm font-bold text-gray-900">$67,890</p>
           </div>
           <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-indigo-500 h-2 rounded-full" style="width: 100%"></div>
           </div>
          </div>
         </div>
         <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
           SR
          </div>
          <div class="flex-1">
           <div class="flex justify-between items-center mb-1">
            <p class="text-sm font-medium text-gray-900">Sushi Roll</p>
            <p class="text-sm font-bold text-gray-900">$52,100</p>
           </div>
           <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-pink-500 h-2 rounded-full" style="width: 77%"></div>
           </div>
          </div>
         </div>
         <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
           BI
          </div>
          <div class="flex-1">
           <div class="flex justify-between items-center mb-1">
            <p class="text-sm font-medium text-gray-900">Bella Italia</p>
            <p class="text-sm font-bold text-gray-900">$45,230</p>
           </div>
           <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-red-500 h-2 rounded-full" style="width: 67%"></div>
           </div>
          </div>
         </div>
         <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
           DW
          </div>
          <div class="flex-1">
           <div class="flex justify-between items-center mb-1">
            <p class="text-sm font-medium text-gray-900">Dragon Wok</p>
            <p class="text-sm font-bold text-gray-900">$38,450</p>
           </div>
           <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-amber-500 h-2 rounded-full" style="width: 57%"></div>
           </div>
          </div>
         </div>
        </div>
       </div><!-- Commission Earnings -->
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Commission Earnings</h3>
          <p class="text-sm text-gray-500">Platform revenue breakdown</p>
         </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
         <div class="bg-emerald-50 rounded-xl p-4">
          <p class="text-sm text-emerald-600 mb-1">Total Commission</p>
          <p class="text-2xl font-bold text-emerald-700">$240,560</p>
         </div>
         <div class="bg-blue-50 rounded-xl p-4">
          <p class="text-sm text-blue-600 mb-1">This Month</p>
          <p class="text-2xl font-bold text-blue-700">$28,340</p>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Order Commissions (10%)</span> <span class="text-sm font-medium text-gray-900">$198,450</span>
         </div>
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Subscription Fees</span> <span class="text-sm font-medium text-gray-900">$25,680</span>
         </div>
         <div class="flex justify-between items-center py-3 border-b border-gray-100">
          <span class="text-sm text-gray-600">Featured Listings</span> <span class="text-sm font-medium text-gray-900">$12,430</span>
         </div>
         <div class="flex justify-between items-center py-3">
          <span class="text-sm text-gray-600">Other Revenue</span> <span class="text-sm font-medium text-gray-900">$4,000</span>
         </div>
        </div>
       </div>
      </div><!-- Monthly Breakdown -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
       <div class="flex items-center justify-between mb-6">
        <div>
         <h3 class="text-lg font-bold text-gray-900">Monthly Revenue Breakdown</h3>
         <p class="text-sm text-gray-500">Detailed financial report</p>
        </div><button class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
         </svg> Download Report </button>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Month</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Orders</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">GMV</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Commission</th>
           <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Growth</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
          <tr class="table-row">
           <td class="px-4 py-3 text-sm font-medium text-gray-900">December 2024</td>
           <td class="px-4 py-3 text-sm text-gray-600">18,456</td>
           <td class="px-4 py-3 text-sm text-gray-900">$312,450</td>
           <td class="px-4 py-3 text-sm font-medium text-emerald-600">$31,245</td>
           <td class="px-4 py-3"><span class="text-emerald-600 text-sm">+12.4%</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-4 py-3 text-sm font-medium text-gray-900">November 2024</td>
           <td class="px-4 py-3 text-sm text-gray-600">16,234</td>
           <td class="px-4 py-3 text-sm text-gray-900">$278,120</td>
           <td class="px-4 py-3 text-sm font-medium text-emerald-600">$27,812</td>
           <td class="px-4 py-3"><span class="text-emerald-600 text-sm">+8.7%</span></td>
          </tr>
          <tr class="table-row">
           <td class="px-4 py-3 text-sm font-medium text-gray-900">October 2024</td>
           <td class="px-4 py-3 text-sm text-gray-600">14,890</td>
           <td class="px-4 py-3 text-sm text-gray-900">$255,670</td>
           <td class="px-4 py-3 text-sm font-medium text-emerald-600">$25,567</td>
           <td class="px-4 py-3"><span class="text-emerald-600 text-sm">+15.2%</span></td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </section><!-- Settings Section -->
     <section id="section-settings" class="hidden animate-fade">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Platform Settings</h3>
        <div class="space-y-4">
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Platform Name</label> <input type="text" value="FoodFlow" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
         </div>
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Commission Rate (%)</label> <input type="number" value="10" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
         </div>
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Support Email</label> <input type="email" value="support@foodflow.com" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
         </div><button class="w-full py-3 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition font-medium"> Save Changes </button>
        </div>
       </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Notification Settings</h3>
        <div class="space-y-4">
         <div class="flex items-center justify-between py-3 border-b border-gray-100">
          <div>
           <p class="text-sm font-medium text-gray-900">New Restaurant Alerts</p>
           <p class="text-xs text-gray-500">Get notified when a new restaurant registers</p>
          </div><button class="w-12 h-6 bg-emerald-500 rounded-full relative"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></span> </button>
         </div>
         <div class="flex items-center justify-between py-3 border-b border-gray-100">
          <div>
           <p class="text-sm font-medium text-gray-900">Payment Notifications</p>
           <p class="text-xs text-gray-500">Receive alerts for large transactions</p>
          </div><button class="w-12 h-6 bg-emerald-500 rounded-full relative"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></span> </button>
         </div>
         <div class="flex items-center justify-between py-3 border-b border-gray-100">
          <div>
           <p class="text-sm font-medium text-gray-900">Daily Reports</p>
           <p class="text-xs text-gray-500">Receive daily summary emails</p>
          </div><button class="w-12 h-6 bg-gray-300 rounded-full relative"> <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full"></span> </button>
         </div>
         <div class="flex items-center justify-between py-3">
          <div>
           <p class="text-sm font-medium text-gray-900">System Alerts</p>
           <p class="text-xs text-gray-500">Critical system notifications</p>
          </div><button class="w-12 h-6 bg-emerald-500 rounded-full relative"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></span> </button>
         </div>
        </div>
       </div>
      </div>
     </section>
    </div>
   </main><!-- Mobile Menu Overlay -->
   <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleMobileMenu()"></div><!-- Mobile Sidebar -->
   <aside id="mobile-sidebar" class="fixed left-0 top-0 bottom-0 w-64 bg-slate-900 z-50 transform -translate-x-full transition-transform duration-300 lg:hidden">
    <!-- Same content as desktop sidebar -->
    <div class="p-6 border-b border-slate-700">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-3">
       <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
       </div>
       <div>
        <h1 class="text-white font-bold text-lg">FoodFlow</h1>
        <p class="text-slate-400 text-xs">Super Admin</p>
       </div>
      </div><button onclick="toggleMobileMenu()" class="text-slate-400 hover:text-white">
       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
       </svg></button>
     </div>
    </div>
    <nav class="p-4 space-y-1">
     <button onclick="showSection('dashboard'); toggleMobileMenu();" class="sidebar-item active w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white" data-section="dashboard">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg><span class="font-medium">Dashboard</span> </button> <button onclick="showSection('restaurants'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="restaurants">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
      </svg><span class="font-medium">Restaurants</span> </button> <button onclick="showSection('users'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="users">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg><span class="font-medium">Users</span> </button> <button onclick="showSection('orders'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="orders">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg><span class="font-medium">Orders</span> </button> <button onclick="showSection('payments'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="payments">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg><span class="font-medium">Payments</span> </button> <button onclick="showSection('reports'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="reports">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg><span class="font-medium">Reports</span> </button> <button onclick="showSection('settings'); toggleMobileMenu();" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300" data-section="settings">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg><span class="font-medium">Settings</span> </button>
    </nav>
   </aside>
  </div><!-- Restaurant Details Modal -->
  <div id="details-modal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
   <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white border-b border-gray-100 p-6 flex items-center justify-between">
     <h2 id="details-name" class="text-2xl font-bold text-gray-900">Restaurant Details</h2><button onclick="closeRestaurantDetails()" class="text-gray-400 hover:text-gray-600">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <div class="p-6 space-y-6"><!-- Status & Rating -->
     <div class="grid grid-cols-2 gap-4">
      <div class="bg-gray-50 rounded-xl p-4">
       <p class="text-sm text-gray-600 mb-1">Status</p>
       <p id="details-status" class="text-lg font-bold text-gray-900">Active</p>
      </div>
      <div class="bg-gray-50 rounded-xl p-4">
       <p class="text-sm text-gray-600 mb-1">Rating</p>
       <div class="flex items-center gap-2">
        <div class="flex gap-0.5">
         <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewbox="0 0 24 24">
          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
         </svg>
        </div><span id="details-rating" class="font-semibold text-gray-900">4.8</span>
       </div>
      </div>
     </div><!-- Contact Information -->
     <div class="border-t border-gray-100 pt-6">
      <h3 class="font-semibold text-gray-900 mb-4">Contact Information</h3>
      <div class="space-y-3">
       <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
         <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
         </svg>
        </div>
        <div>
         <p class="text-xs text-gray-500">Email</p>
         <p id="details-email" class="text-sm font-medium text-gray-900">contact@restaurant.com</p>
        </div>
       </div>
       <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
         <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.04 1.084a15.045 15.045 0 01-2.117 3.912 15.028 15.028 0 003.8 2.939l-2.04 1.084a1 1 0 00-.502.756l-1.498 4.493a1 1 0 00-.948.684H5a2 2 0 01-2-2V5z" />
         </svg>
        </div>
        <div>
         <p class="text-xs text-gray-500">Phone</p>
         <p id="details-phone" class="text-sm font-medium text-gray-900">+1 (555) 123-4567</p>
        </div>
       </div>
       <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
         <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
         </svg>
        </div>
        <div>
         <p class="text-xs text-gray-500">Address</p>
         <p id="details-address" class="text-sm font-medium text-gray-900">123 Main St, New York</p>
        </div>
       </div>
      </div>
     </div><!-- Performance Metrics -->
     <div class="border-t border-gray-100 pt-6">
      <h3 class="font-semibold text-gray-900 mb-4">Performance Metrics</h3>
      <div class="grid grid-cols-2 gap-4">
       <div class="bg-emerald-50 rounded-xl p-4">
        <p class="text-xs text-emerald-600 mb-1">Total Revenue</p>
        <p id="details-revenue" class="text-xl font-bold text-emerald-700">$45,230</p>
       </div>
       <div class="bg-blue-50 rounded-xl p-4">
        <p class="text-xs text-blue-600 mb-1">Total Orders</p>
        <p id="details-orders" class="text-xl font-bold text-blue-700">1,234</p>
       </div>
       <div class="bg-amber-50 rounded-xl p-4">
        <p class="text-xs text-amber-600 mb-1">Avg. Delivery Time</p>
        <p id="details-delivery" class="text-xl font-bold text-amber-700">28 min</p>
       </div>
       <div class="bg-purple-50 rounded-xl p-4">
        <p class="text-xs text-purple-600 mb-1">Commission Rate</p>
        <p id="details-commission" class="text-xl font-bold text-purple-700">10%</p>
       </div>
      </div>
     </div><!-- Additional Information -->
     <div class="border-t border-gray-100 pt-6">
      <h3 class="font-semibold text-gray-900 mb-4">Additional Information</h3>
      <div class="space-y-3">
       <div class="flex justify-between items-center"><span class="text-sm text-gray-600">Owner Name</span> <span id="details-owner" class="text-sm font-medium text-gray-900">Marco Rossi</span>
       </div>
       <div class="flex justify-between items-center"><span class="text-sm text-gray-600">Cuisine Type</span> <span id="details-cuisine" class="text-sm font-medium text-gray-900">Italian Cuisine</span>
       </div>
       <div class="flex justify-between items-center"><span class="text-sm text-gray-600">Member Since</span> <span id="details-joined" class="text-sm font-medium text-gray-900">Jan 15, 2023</span>
       </div>
      </div>
     </div><!-- Action Buttons -->
     <div class="border-t border-gray-100 pt-6 flex gap-3"><button onclick="closeRestaurantDetails()" class="flex-1 px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition font-medium text-gray-700">Close</button> <button onclick="showToast('Restaurant settings updated successfully.')" class="flex-1 px-4 py-3 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition font-medium">Edit Details</button>
     </div>
    </div>
   </div>
  </div>
  <div id="toast" class="fixed bottom-4 right-4 bg-emerald-600 text-white px-6 py-3 rounded-xl shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-50">
   <div class="flex items-center gap-3">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg><span id="toast-message">Action completed successfully</span>
   </div>
  </div>
  <script>
    const defaultConfig = {
      platform_name: 'FoodFlow',
      dashboard_title: 'Dashboard Overview'
    };
    
    const sectionTitles = {
      dashboard: 'Dashboard Overview',
      restaurants: 'Restaurant Management',
      users: 'User Management',
      orders: 'Order Management',
      payments: 'Payment Transactions',
      reports: 'Analytics & Reports',
      settings: 'Platform Settings'
    };
    
    function showSection(sectionId) {
      // Hide all sections
      document.querySelectorAll('section[id^="section-"]').forEach(section => {
        section.classList.add('hidden');
      });
      
      // Show selected section
      const targetSection = document.getElementById(`section-${sectionId}`);
      if (targetSection) {
        targetSection.classList.remove('hidden');
      }
      
      // Update sidebar active state (desktop)
      document.querySelectorAll('#sidebar .sidebar-item').forEach(item => {
        item.classList.remove('active');
        item.classList.remove('text-white');
        item.classList.add('text-slate-300');
      });
      
      const activeItem = document.querySelector(`#sidebar .sidebar-item[data-section="${sectionId}"]`);
      if (activeItem) {
        activeItem.classList.add('active');
        activeItem.classList.remove('text-slate-300');
        activeItem.classList.add('text-white');
      }
      
      // Update sidebar active state (mobile)
      document.querySelectorAll('#mobile-sidebar .sidebar-item').forEach(item => {
        item.classList.remove('active');
        item.classList.remove('text-white');
        item.classList.add('text-slate-300');
      });
      
      const mobileActiveItem = document.querySelector(`#mobile-sidebar .sidebar-item[data-section="${sectionId}"]`);
      if (mobileActiveItem) {
        mobileActiveItem.classList.add('active');
        mobileActiveItem.classList.remove('text-slate-300');
        mobileActiveItem.classList.add('text-white');
      }
      
      // Update page title
      const pageTitle = document.getElementById('page-title');
      if (pageTitle && sectionTitles[sectionId]) {
        pageTitle.textContent = sectionTitles[sectionId];
      }
    }
    
    function toggleMobileMenu() {
      const overlay = document.getElementById('mobile-menu-overlay');
      const sidebar = document.getElementById('mobile-sidebar');
      
      if (sidebar.classList.contains('-translate-x-full')) {
        overlay.classList.remove('hidden');
        sidebar.classList.remove('-translate-x-full');
      } else {
        overlay.classList.add('hidden');
        sidebar.classList.add('-translate-x-full');
      }
    }
    
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toast-message');
      
      toastMessage.textContent = message;
      toast.classList.remove('translate-y-20', 'opacity-0');
      
      setTimeout(() => {
        toast.classList.add('translate-y-20', 'opacity-0');
      }, 3000);
    }
    
    function exportCSV() {
      showToast('CSV export started. Download will begin shortly.');
    }
    
    function openRestaurantDetails(details) {
      const modal = document.getElementById('details-modal');
      
      document.getElementById('details-name').textContent = details.name;
      document.getElementById('details-status').textContent = details.status;
      document.getElementById('details-rating').textContent = details.rating;
      document.getElementById('details-email').textContent = details.email;
      document.getElementById('details-phone').textContent = details.phone;
      document.getElementById('details-address').textContent = details.address;
      document.getElementById('details-revenue').textContent = details.revenue;
      document.getElementById('details-orders').textContent = details.orders;
      document.getElementById('details-delivery').textContent = details.avgDelivery;
      document.getElementById('details-commission').textContent = details.commission;
      document.getElementById('details-owner').textContent = details.owner;
      document.getElementById('details-cuisine').textContent = details.cuisine;
      document.getElementById('details-joined').textContent = details.joined;
      
      modal.classList.remove('hidden');
    }
    
    function closeRestaurantDetails() {
      const modal = document.getElementById('details-modal');
      modal.classList.add('hidden');
    }
    
    // Initialize Element SDK
    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (config) => {
          const platformName = config.platform_name || defaultConfig.platform_name;
          const dashboardTitle = config.dashboard_title || defaultConfig.dashboard_title;
          
          // Update platform name
          const platformNameEl = document.getElementById('platform-name');
          if (platformNameEl) {
            platformNameEl.textContent = platformName;
          }
          
          // Update dashboard title
          sectionTitles.dashboard = dashboardTitle;
          const pageTitle = document.getElementById('page-title');
          if (pageTitle && document.getElementById('section-dashboard') && !document.getElementById('section-dashboard').classList.contains('hidden')) {
            pageTitle.textContent = dashboardTitle;
          }
        },
        mapToCapabilities: (config) => ({
          recolorables: [],
          borderables: [],
          fontEditable: undefined,
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (config) => new Map([
          ['platform_name', config.platform_name || defaultConfig.platform_name],
          ['dashboard_title', config.dashboard_title || defaultConfig.dashboard_title]
        ])
      });
    }
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63d511f6b2691a',t:'MTc3MjQ5MDQ4My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>