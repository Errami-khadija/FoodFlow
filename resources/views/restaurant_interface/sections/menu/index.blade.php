 <div id="page-menu" class="page">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
       <h3 class="font-bold text-gray-800 text-lg">Menu Items</h3><button onclick="openAddItemModal()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg> Add New Item </button>
      </div>



     
        <div id="menu-grid" class="grid grid-cols-1 md:grid-cols-3 gap-4">
@forelse ($menus as $menu)
    <div class="menu-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        {{-- Image --}}
        <div class="h-52 bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center">
            @if($menu->image)
                <img src="{{ asset('storage/' . $menu->image) }}" class="h-full w-full object-cover">
            @else
                <span class="text-5xl">🍽️</span>
            @endif
        </div>

        <div class="p-4">
            
            {{-- Name + Price --}}
            <div class="flex items-start justify-between mb-2">
                <h4 class="font-semibold text-gray-800">{{ $menu->name }}</h4>
                <span class="text-orange-500 font-bold">${{ $menu->price }}</span>
            </div>

            {{-- Description --}}
            <p class="text-sm text-gray-400 mb-3">
                {{ $menu->description }}
            </p>

            {{-- Category + Actions --}}
            <div class="flex items-center justify-between">
                
                {{-- Category --}}
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                    {{ $menu->category->name ?? 'No Category' }}
                </span>

                {{-- Actions --}}
                <div class="flex gap-1">
                    
                    {{-- Edit --}}
                    <button 
    onclick="openEditModal(this)"
    data-id="{{ $menu->id }}"
    data-name="{{ $menu->name }}"
    data-price="{{ $menu->price }}"
    data-description="{{ $menu->description }}"
    data-category="{{ $menu->category_id }}"
     data-image="{{ $menu->image ? asset('storage/' . $menu->image) : '' }}"
    class="p-2 hover:bg-gray-100 rounded-lg text-gray-500"
>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>

                    {{-- Delete --}}
                    <form action="{{ route('restaurant.menus.destroy', $menu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button 
                            type="button"
                            onclick="confirmDelete(this)"
                            class="p-2 hover:bg-red-50 rounded-lg text-red-500"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@empty

    <!-- Empty State -->
    <div class="col-span-full text-center py-12">
        
        <div class="flex flex-col items-center gap-3">
            
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                <span class="text-3xl">🍽️</span>
            </div>

            <h3 class="text-lg font-semibold text-gray-700">
                No menu items yet
            </h3>

            <p class="text-sm text-gray-400">
                Start by adding your first menu item
            </p>



        </div>

    </div>

@endforelse
</div>
     </div>
    </div>

  @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif

@include('restaurant_interface.sections.menu.create')
@include('restaurant_interface.sections.menu.edit')

