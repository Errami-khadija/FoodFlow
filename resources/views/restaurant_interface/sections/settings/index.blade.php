  <div id="page-settings" class="page">
      <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

    <h2 class="text-xl font-bold text-gray-800 mb-6">Restaurant Settings</h2>

    <form method="POST" action="{{ route('restaurant.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            

            {{-- Restaurant Image --}}

            @if($restaurant->image)
    <img src="{{ asset('storage/' . $restaurant->image) }}"
         class="w-24 h-24 rounded-xl mt-2 object-cover">
@endif
            <div class="md:col-span-2">
                <label class="text-sm text-gray-600">Restaurant Image</label>
                <input type="file" name="image"
                    class="w-full mt-2 border rounded-lg p-2">
            </div>

            {{-- Name --}}
            <div>
                <label class="text-sm text-gray-600">Restaurant Name</label>
                <input type="text" name="name"
                    value="{{ $restaurant->name }}"
                    class="w-full mt-2 border rounded-lg p-3 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Cuisine Type --}}
          <div>
    <label class="text-sm text-gray-600">Cuisine Type</label>

    <select name="cuisine_type"
        class="w-full mt-2 border rounded-lg p-3 focus:ring-2 focus:ring-orange-400 bg-white">

        <option value="" disabled {{ !$restaurant->cuisine_type ? 'selected' : '' }}>
            Select Cuisine Type *
        </option>

        <option value="Moroccan" {{ $restaurant->cuisine_type == 'Moroccan' ? 'selected' : '' }}>
            Moroccan
        </option>

        <option value="Italian" {{ $restaurant->cuisine_type == 'Italian' ? 'selected' : '' }}>
            Italian
        </option>

        <option value="French" {{ $restaurant->cuisine_type == 'French' ? 'selected' : '' }}>
            French
        </option>

        <option value="Chinese" {{ $restaurant->cuisine_type == 'Chinese' ? 'selected' : '' }}>
            Chinese
        </option>

        <option value="Japanese" {{ $restaurant->cuisine_type == 'Japanese' ? 'selected' : '' }}>
            Japanese
        </option>

        <option value="Indian" {{ $restaurant->cuisine_type == 'Indian' ? 'selected' : '' }}>
            Indian
        </option>

        <option value="Fast Food" {{ $restaurant->cuisine_type == 'Fast Food' ? 'selected' : '' }}>
            Fast Food
        </option>

        <option value="Seafood" {{ $restaurant->cuisine_type == 'Seafood' ? 'selected' : '' }}>
            Seafood
        </option>

        <option value="Cafe" {{ $restaurant->cuisine_type == 'Cafe' ? 'selected' : '' }}>
            Cafe
        </option>

        <option value="Other" {{ $restaurant->cuisine_type == 'Other' ? 'selected' : '' }}>
            Other
        </option>

    </select>
</div>

            {{-- Address --}}
            <div class="md:col-span-2">
                <label class="text-sm text-gray-600">Address</label>
                <input type="text" name="address"
                    value="{{ $restaurant->address }}"
                    class="w-full mt-2 border rounded-lg p-3 focus:ring-2 focus:ring-orange-400">
            </div>

            {{-- Delivery Fee --}}
            <div>
                <label class="text-sm text-gray-600">Delivery Fee (MAD)</label>
                <input type="number" name="deliveryFee"
                    value="{{ $restaurant->deliveryFee }}"
                    class="w-full mt-2 border rounded-lg p-3">
            </div>

            {{-- Delivery Time --}}
            <div>
                <label class="text-sm text-gray-600">Delivery Time (min)</label>
                <input type="number" name="deliveryTime"
                    value="{{ $restaurant->deliveryTime }}"
                    class="w-full mt-2 border rounded-lg p-3">
            </div>

            {{-- Open / Close --}}
            <div class="md:col-span-2 flex items-center gap-3 mt-2">
                <input type="checkbox" name="open_orClose"
                    {{ $restaurant->open_orClose ? 'checked' : '' }}
                    class="w-5 h-5 text-orange-500">

                <label class="text-gray-700 font-medium">
                    Restaurant is Open
                </label>
            </div>

        </div>

        {{-- Submit --}}
        <div class="mt-6 flex justify-end">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                Save Changes
            </button>
        </div>

    </form>
</div>
    </div>