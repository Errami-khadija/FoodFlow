
<section id="section-restaurants" class="animate-fade">
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
{{ $restaurant->is_approved ? 'Active' : 'Inactive' }}
</span>
</td>


<td class="px-6 py-4 text-sm text-gray-600">
{{ $restaurant->orders_count ?? 0 }}
</td>

<td class="px-6 py-4">
<div class="flex gap-2">

<button
onclick="openRestaurantDetails({
name: '{{ $restaurant->name }}',
owner: '{{ $restaurant->user->name ?? '' }}',
status: '{{ $restaurant->status }}',
phone: '{{ $restaurant->phone }}',
email: '{{ $restaurant->email }}'
})"
class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">

<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
9.542 7-1.274 4.057-5.064 7-9.542 7-4.477
0-8.268-2.943-9.542-7z"/>
</svg>

</button>
<button
onclick="toggleRestaurantStatus({{ $restaurant->id }}, {{ $restaurant->is_approved ? 'false' : 'true' }})"
class="p-2 {{ $restaurant->is_approved ? 'text-red-600 hover:bg-red-50' : 'text-green-600 hover:bg-green-50' }} rounded-lg transition">

<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>

</button>

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
        <div class="flex gap-2">
         <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">Previous</button> <button class="px-4 py-2 text-sm bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">1</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">2</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">3</button> <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition">Next</button>
        </div>
       </div>
      </div>
     </section>

