<section id="section-users" class=" animate-fade">
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
          <h3 class="text-lg font-bold text-gray-900">Platform Users</h3>
          <p class="text-sm text-gray-500">Manage customer accounts</p>
         </div>
         <div class="flex gap-3">
          <form method="GET" action="{{ route('admin.users') }}">
<div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">

<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
</svg>

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search users..."
class="bg-transparent border-none outline-none ml-2 w-40 text-sm"
onkeyup="this.form.submit()"
>

</div>
</form>
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

@foreach($users as $user)

<tr class="table-row">

<td class="px-6 py-4">
<div class="flex items-center gap-3">

<div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
{{ strtoupper(substr($user->name,0,1)) }}
</div>

<p class="font-medium text-gray-900">
{{ $user->name }}
</p>

</div>
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $user->email }}
</td>

<td class="px-6 py-4 text-sm text-gray-600">
{{ $user->orders_count ?? 0 }}
</td>

<td class="px-6 py-4 text-sm font-medium text-gray-900">
$0
</td>

<td class="px-6 py-4 text-sm text-gray-500">
{{ $user->created_at->format('M d, Y') }}
</td>

<td class="px-6 py-4">

@if($user->status == 'active')
<span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">
Active
</span>
@else
<span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
Inactive
</span>
@endif

</td>

</tr>

@endforeach

</tbody>
        </table>
       </div>
      </div>
     </section>