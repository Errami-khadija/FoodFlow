<!-- Restaurant Registration Modal -->
<div id="register-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/50" onclick="closeRestaurantRegister()"></div>

    <!-- Modal Card -->
    <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto relative">
        
        <!-- Header -->
        <div class="sticky top-0 bg-white flex items-center justify-between p-6 border-b">
            <h2 class="text-2xl font-bold text-dark">Register Your Restaurant</h2>
            <button onclick="closeRestaurantRegister()" 
                class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                ✕
            </button>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mx-6 mt-4 bg-green-500 text-white p-4 rounded-xl text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('restaurant.register.store') }}" 
              method="POST" 
              class="p-6 space-y-6">
            @csrf

            <!-- Section 1 -->
            <div>
                <h3 class="text-lg font-bold text-dark mb-4 flex items-center">
                    <span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm font-bold">
                        1
                    </span>
                    Restaurant Information
                </h3>

                <div class="space-y-4">

                    <input type="text" name="restaurant_name" 
                        placeholder="Restaurant Name *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                        required>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="text" name="cuisine_type"
                            placeholder="Cuisine Type *"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                            required>

                        <input type="number" step="0.1" name="rating"
                            placeholder="Rating (1-5)"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
                    </div>

                    <textarea name="description" rows="3"
                        placeholder="Restaurant Description *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none resize-none"
                        required></textarea>

                </div>
            </div>

            <!-- Section 2 -->
            <div>
                <h3 class="text-lg font-bold text-dark mb-4 flex items-center">
                    <span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm font-bold">
                        2
                    </span>
                    Owner Information
                </h3>

                <div class="space-y-4">

                    <input type="text" name="owner_name"
                        placeholder="Owner Name *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                        required>

                    <input type="email" name="email"
                        placeholder="Email *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                        required>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="password" name="password"
                            placeholder="Password *"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                            required>

                        <input type="password" name="password_confirmation"
                            placeholder="Confirm Password *"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                            required>
                    </div>

                    <input type="text" name="phone"
                        placeholder="Phone *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                        required>

                    <input type="text" name="address"
                        placeholder="Address *"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
                        required>

                </div>
            </div>

            <!-- Terms -->
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="terms_agree" required>
                I agree to the terms and conditions
            </label>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300">
                Register Restaurant
            </button>

        </form>
    </div>
</div>