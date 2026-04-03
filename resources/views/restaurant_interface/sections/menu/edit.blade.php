<div id="edit-item-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">

    <div class="bg-white rounded-2xl w-full max-w-md">

        <form id="edit-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="p-6 space-y-4">

                <h3 class="text-lg font-bold">Edit Menu Item</h3>

                <input type="text" name="name" id="edit-name" class="w-full border rounded-lg p-2">

                <input type="number" name="price" id="edit-price" class="w-full border rounded-lg p-2">

                <textarea name="description" id="edit-description" class="w-full border rounded-lg p-2"></textarea>

                <select name="category_id" id="edit-category" class="w-full border rounded-lg p-2">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                 
                <div class="space-y-2">

    <label class="text-sm text-gray-600">Current Image</label>

    <div class="w-full h-40 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden">
        <img id="edit-image-preview" class="h-full w-full object-cover hidden">
        <span id="edit-image-placeholder" class="text-3xl">🍽️</span>
    </div>

</div>
              <div class="space-y-2">

    <label class="text-sm text-gray-600">Upload New Image</label>

    <div class="flex items-center gap-3">

        <!-- Hidden input -->
        <input 
            type="file" 
            name="image" 
            id="edit-image-input" 
            class="hidden"
        >

        <!-- Custom button -->
        <label for="edit-image-input"
            class="cursor-pointer inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">

           
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M256 109.3L256 320c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-210.7-41.4 41.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l96-96c12.5-12.5 32.8-12.5 45.3 0l96 96c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 109.3zM224 400c44.2 0 80-35.8 80-80l80 0c35.3 0 64 28.7 64 64l0 32c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64l0-32c0-35.3 28.7-64 64-64l80 0c0 44.2 35.8 80 80 80zm144 24a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>

            Choose Image
        </label>

        <!-- File name -->
        <span id="file-name" class="text-sm text-gray-500 truncate">
            No file chosen
        </span>

    </div>

</div>      
         <div class="flex gap-2 mt-4">

                <button class="flex-1 bg-orange-500 text-white py-2 rounded-lg">
                    Update Item
                </button>

                 <button type="button" onclick="closeModal('edit-item-modal')"
                    class="flex-1 border py-2 rounded-lg">
                    Cancel
                </button>
         </div>

            </div>
        </form>

    </div>
</div>