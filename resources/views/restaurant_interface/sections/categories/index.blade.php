<!-- Categories Page -->
     <div id="page-categories" class="page">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
       <h3 class="font-bold text-gray-800 text-lg">Categories</h3>
       <button onclick="openAddCategoryModal()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg> Add Category </button>
      </div>
      <div id="categories-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      </div>


      <div id="categories-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($categories as $cat)
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            
            <div class="flex items-center gap-4 mb-4">
                <div class="w-14 h-14 rounded-xl overflow-hidden bg-gray-100">
    <img src="{{ $cat->image ? asset('storage/' . $cat->image) : asset('images/default.png') }}"
         alt="{{ $cat->name }}"
         class="w-full h-full object-cover">
</div>
                <div>
                    <h4 class="font-semibold text-gray-800">{{ $cat->name }}</h4>
                    <p class="text-sm text-gray-400">
                        {{ $cat->items_count ?? 0 }} items
                    </p>
                </div>
            </div>

            <div class="flex gap-2">
               
                <button 
    data-id="{{ $cat->id }}"
    data-name="{{ $cat->name }}"
    data-image="{{ asset('storage/' . $cat->image) }}"
     class=" edit-btn flex-1 text-center py-2 text-sm font-medium text-orange-500 hover:bg-orange-50 rounded-lg transition-colors">
    Edit
</button>

                <!-- Delete -->
                <form action="{{ route('restaurant.categories.destroy', $cat->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')

                    <button type="button"
                      class="w-full py-2 text-sm font-medium text-red-500 hover:bg-red-50 rounded-lg transition-colors delete-btn">
                      Delete
                  </button>
                </form>
            </div>

        </div>
    @endforeach
</div>




  @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif

@include('restaurant_interface.sections.categories.create')
@include('restaurant_interface.sections.categories.edit')