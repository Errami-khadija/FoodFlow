@extends('layouts.adminLayout')

@section('content')
<div class="flex h-full overflow-hidden">
   <!-- Include Sidebar -->
    @include('partials.admin_aside')
 <!-- Main Content -->
   <main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Top Header -->
      @include('partials.admin_header')
   <!-- Content Area -->
    <div class="flex-1 overflow-y-auto p-4 lg:p-8">
    

    {{-- Load the section dynamically --}}
    @include($section)


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
 @endsection