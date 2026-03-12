
<section id="section-restaurants" class="animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">All Restaurants</h3>
          <p class="text-sm text-gray-500">Manage restaurant partners</p>
         </div>
        <form method="GET" action="{{ route('admin.restaurants') }}" class="flex items-center gap-3 mb-4">
    <!-- Search -->
    <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" name="search" placeholder="Search restaurants..."
            value="{{ request('search') }}"
            class="bg-transparent border-none outline-none ml-2 w-40 text-sm">
    </div>

    <!-- Status -->
    <select name="status" onchange="this.form.submit()"
        class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <option value="">All Status</option>
        <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Suspended" {{ request('status') == 'Suspended' ? 'selected' : '' }}>Suspended</option>
    </select>

    
</form>
        </div>
       </div>
       <div class="overflow-x-auto">
        <table class="w-full">
         <thead class="bg-gray-50">
          <tr>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Restaurant</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Owner</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orders</th>
           <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
@foreach($restaurants as $restaurant)
<tr class="table-row">

<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
{{ strtoupper(substr($restaurant->name,0,2)) }}
</div>

<div>
<p class="font-medium text-gray-900">{{ $restaurant->name }}</p>
<p class="text-xs text-gray-500">{{ $restaurant->cuisine_type ?? 'Cuisine' }}</p>
</div>

</div>
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $restaurant->owner->name ?? 'Unknown' }}
</td>

<td class="px-6 py-4">
<span class="px-3 py-1 text-xs font-medium
{{ $restaurant->is_approved
? 'bg-emerald-100 text-emerald-700'
: 'bg-red-100 text-red-700' }}
rounded-full">
{{ $restaurant->is_approved ? 'Active' : 'Suspended' }}
</span>
</td>


<td class="px-6 py-4 text-sm text-gray-600">
{{ $restaurant->orders_count ?? 0 }}
</td>

<td class="px-6 py-4">
<div class="flex gap-2">

<button
onclick="openRestaurantDetails({
id: '{{ $restaurant->id }}',
name: '{{ $restaurant->name }}',
owner: '{{ $restaurant->owner->name ?? '' }}',
status: '{{ $restaurant->is_approved ? 'Active' : 'Suspended' }}',
phone: '{{ $restaurant->phone }}',
rating: '{{ $restaurant->rating ?? 'N/A' }}',
email: '{{ $restaurant->owner->email ?? 'N/A' }}',
address: '{{ $restaurant->address ?? 'N/A' }}',
cuisine: '{{ $restaurant->cuisine_type ?? 'N/A' }}',
joined: '{{ $restaurant->created_at->format('M d, Y') }}'
})"
        class="px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg transition">
        View


</button>
<form action="{{ route('admin.restaurants.approve', $restaurant->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <button type="submit"
        {{ $restaurant->is_approved ? 'disabled' : '' }}
        class="px-3 py-1 text-xs font-medium rounded-lg transition
        {{ $restaurant->is_approved 
            ? 'text-gray-500 bg-gray-200 cursor-not-allowed' 
            : 'text-green-700 bg-green-100 hover:bg-green-200' }}">
        {{ $restaurant->is_approved ? 'Approved' : 'Approve' }}
    </button>
</form>

</div>
</td>

</tr>
@endforeach
</tbody>
        </table>
       </div>
       <div class="p-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-sm text-gray-500">
         Showing {{ $restaurants->count() }} restaurants
        </p>
        <div class="mt-4">
       {{ $restaurants->links('vendor.pagination.tailwind') }}
        </div>
       </div>
      </div>
     </section>
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        showToast("{{ session('success') }}", "success");
    });
</script>
@endif

<!-- Restaurant Details Modal -->
  <div id="details-modal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
   <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white border-b border-gray-100 p-6 flex items-center justify-between">
     <h2 id="details-name" class="text-2xl font-bold text-gray-900">Restaurant Details</h2><button onclick="closeRestaurantDetails()" class="text-gray-400 hover:text-gray-600">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <p id="details-id" class="hidden"></p>
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
     <div class="border-t border-gray-100 pt-6 flex gap-3">
      <button onclick="closeRestaurantDetails()" class="flex-1 px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition font-medium text-gray-700">Close</button> 
   <form id="approve-form" method="POST" class="flex-1">
        @csrf
        @method('PATCH')

        <button id="approve-btn" type="submit"
            class="w-full px-4 py-3 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition font-medium">
            Approve restaurant
        </button>
    </form>
     </div>
    </div>

