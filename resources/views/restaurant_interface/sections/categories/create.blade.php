
      <!-- Add Category Modal -->
  <div id="add-category-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Add New Category</h3><button onclick="closeModal('add-category-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
   <form id="add-category-form"
      action="{{ route('restaurant.categories.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="p-6 space-y-4">

    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
        <input type="text" name="name" required
            class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
            placeholder="e.g., Appetizers">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
        <input type="file" name="image"
            class="w-full border border-gray-200 rounded-xl px-4 py-3">
    </div>

    <button type="submit"
        class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors">
        Add Category
    </button>
</form>
   </div>
  </div>