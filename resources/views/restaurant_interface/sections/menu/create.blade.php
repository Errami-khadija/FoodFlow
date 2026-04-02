<!-- Add Item Modal -->
<div id="add-item-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    
    <div class="bg-white rounded-2xl w-full max-w-md max-h-[90%] overflow-y-auto">
        
        <!-- Header -->
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-800 text-lg">Add New Menu Item</h3>

            <button onclick="closeModal('add-item-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Form -->
        <form 
            action="{{ route('restaurant.menus.store') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="p-6 space-y-4"
        >
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Item Name</label>
                <input 
                    type="text" 
                    name="name" 
                    required 
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                    placeholder="e.g., Margherita Pizza"
                >
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea 
                    name="description" 
                    rows="2" 
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                    placeholder="Brief description of the item"
                ></textarea>
            </div>

            <!-- Price + Category -->
            <div class="grid grid-cols-2 gap-4">

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                    <input 
                        type="number" 
                        name="price" 
                        step="0.01" 
                        required 
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                        placeholder="12.99"
                    >
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select 
                        name="category_id" 
                        required 
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>

                <!-- Hidden Input -->
                <input type="file" name="image" id="imageInput" class="hidden"  onchange="previewImage(event)">

                <!-- Clickable Upload Box -->
                <div 
                    onclick="document.getElementById('imageInput').click()" 
                    class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-orange-300 transition-colors cursor-pointer"
                >
                    <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-sm text-gray-400">Click to upload image</p>
                </div>
            </div>
            <!-- Image Preview -->
<div id="imagePreviewContainer" class="mt-3 hidden">
    <img id="imagePreview" class="w-full h-40 object-cover rounded-xl border">
</div>

            <!-- Submit -->
            <button 
                type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors"
            >
                Add Item
            </button>

        </form>
    </div>

</div>

<script>
function previewImage(event) {
    const input = event.target;
    const file = input.files[0];

    if (!file) return;

    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imagePreviewContainer');

    const reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result;
        container.classList.remove('hidden');
    };

    reader.readAsDataURL(file);
}
</script>