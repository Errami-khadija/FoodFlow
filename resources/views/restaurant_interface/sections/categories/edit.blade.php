<div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-md">

        <h2 class="text-lg font-semibold mb-4">Edit Category</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <input type="text" name="name" id="edit_name"
                class="w-full px-4 py-3 border rounded-lg"
                placeholder="Category name">

            <!-- Image -->
            <input type="file" name="image" id="edit_image"
                class="w-full mt-3">

            <!-- Preview -->
            <img id="edit_preview"
                class="mt-3 w-20 h-20 object-cover rounded-lg hidden">

            <!-- Buttons -->
            <div class="flex gap-2 mt-4">
                <button type="submit"
                    class="flex-1 text-center py-2 text-sm font-medium text-orange-500 hover:bg-orange-50 rounded-lg transition-colors">
                    Update
                </button>

                <button type="button" id="closeEditModal"
                    class="flex-1 border py-2 rounded-lg">
                    Cancel
                </button>
            </div>
        </form>

    </div>
</div>