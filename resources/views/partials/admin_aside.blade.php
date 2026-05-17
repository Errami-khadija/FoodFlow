 <!-- Sidebar -->
   <aside id="sidebar" class="w-64 bg-slate-900 flex-shrink-0 flex flex-col hidden lg:flex">
    <!-- Logo -->
    <div class="p-6 border-b border-slate-700">
     <div class="flex items-center gap-3">
      <div class="w-10 h-10 bg-orange-500 text-white rounded-xl flex items-center justify-center">
       <svg class=" w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M112 448C103.2 448 96 455.2 96 464C96 508.2 131.8 544 176 544L464 544C508.2 544 544 508.2 544 464C544 455.2 536.8 448 528 448L112 448zM96 266C96 278.2 105.9 288 118 288L522 288C534.2 288 544 278.1 544 266C544 248.8 541.4 231.6 533.2 216.5C511 175.7 450.9 96 320 96C189.1 96 129 175.6 106.8 216.5C98.6 231.6 96 248.8 96 266zM64 368C64 385.7 78.3 400 96 400L544 400C561.7 400 576 385.7 576 368C576 350.3 561.7 336 544 336L96 336C78.3 336 64 350.3 64 368zM320 136C333.3 136 344 146.7 344 160C344 173.3 333.3 184 320 184C306.7 184 296 173.3 296 160C296 146.7 306.7 136 320 136zM184 192C184 178.7 194.7 168 208 168C221.3 168 232 178.7 232 192C232 205.3 221.3 216 208 216C194.7 216 184 205.3 184 192zM432 168C445.3 168 456 178.7 456 192C456 205.3 445.3 216 432 216C418.7 216 408 205.3 408 192C408 178.7 418.7 168 432 168z"/></svg>
      </div>
      <div>
       <h1 id="platform-name" class="text-white font-bold text-lg">FoodFlow</h1>
       <p class="text-slate-400 text-xs">Super Admin</p>
      </div>
     </div>
    </div><!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
     @php $currentRoute = request()->route()?->getName(); @endphp
     <a href="{{ route('admin.dashboard') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.dashboard' ? 'active text-white' : 'text-slate-300' }}" data-section="dashboard">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg><span class="font-medium">Dashboard</span> </a> 
      <a href="{{ route('admin.restaurants') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.restaurants' ? 'active text-white' : 'text-slate-300' }}" data-section="restaurants">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
      </svg><span class="font-medium">Restaurants</span> </a> 
      <a href="{{ route('admin.users') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.users' ? 'active text-white' : 'text-slate-300' }}" data-section="users">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg><span class="font-medium">Users</span> </a> 
      <a href="{{ route('admin.orders') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.orders' ? 'active text-white' : 'text-slate-300' }}" data-section="orders">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg><span class="font-medium">Orders</span> </a> 
      <a href="{{ route('admin.payments') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.payments' ? 'active text-white' : 'text-slate-300' }}" data-section="payments">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg><span class="font-medium">Payments</span> </a> 
      <a href="{{ route('admin.reports') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.reports' ? 'active text-white' : 'text-slate-300' }}" data-section="reports">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg><span class="font-medium">Reports</span> </a> 
      <a href="{{ route('admin.profile') }}" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg {{ $currentRoute === 'admin.profile' ? 'active text-white' : 'text-slate-300' }}"   data-section="settings">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg><span class="font-medium">Settings</span> </a>
    </nav><!-- Logout -->
    <div class="p-4 border-t border-slate-700">
       <form method="POST" action="{{ route('logout') }}">
        @csrf
     <a class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-red-400">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg><span class="font-medium">Logout</span> </a>
        </form>
    </div>
   </aside>