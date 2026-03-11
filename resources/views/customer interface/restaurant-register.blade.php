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
              id="restaurant-register-form"
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
<p class="text-red-500 text-sm error-message" id="restaurant_name_error"></p>
<div class="grid sm:grid-cols-2 gap-4">
    <div>
<select name="cuisine_type"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>

    <option value="" disabled selected>Select Cuisine Type *</option>

    <option value="Moroccan">Moroccan</option>
    <option value="Italian">Italian</option>
    <option value="French">French</option>
    <option value="Chinese">Chinese</option>
    <option value="Japanese">Japanese</option>
    <option value="Indian">Indian</option>
    <option value="Fast Food">Fast Food</option>
    <option value="Seafood">Seafood</option>
    <option value="Cafe">Cafe</option>
    <option value="Other">Other</option>

</select>

<p class="text-red-500 text-sm error-message" id="cuisine_type_error"></p>
</div>
<div>
                       <input type="number" step="0.1" name="rating"
    placeholder="Rating (1-5)"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
<p class="text-red-500 text-sm error-message" id="rating_error"></p>
</div>
                    </div>

                   <textarea name="description" rows="3"
    placeholder="Restaurant Description *"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none resize-none"
    required></textarea>
<p class="text-red-500 text-sm error-message" id="description_error"></p>
<p class="text-red-500 text-sm error-message" id="description_error"></p>

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
                    <p class="text-red-500 text-sm error-message" id="owner_name_error"></p>
                    <input type="email" name="email"
    placeholder="Email *"
    autocomplete="email"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="email_error"></p>
                    <div class="grid sm:grid-cols-2 gap-4">
                       <div><input type="password" name="password"
    placeholder="Password *"
    autocomplete="new-password"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="password_error"></p>
</div>
<div>
<input type="password" name="password_confirmation"
    placeholder="Confirm Password *"
    autocomplete="new-password"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="password_confirmation_error"></p>
</div>                    
</div>

                    <input type="text" name="phone"
    placeholder="Phone *"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="phone_error"></p>
                 <input type="text" name="city"
    placeholder="City *"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="city_error"></p>

                  <input type="text" name="address"
    placeholder="Address *"
    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none"
    required>
<p class="text-red-500 text-sm error-message" id="address_error"></p>
                   
                    

                </div>
            </div>

            <!-- Terms -->
          <label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="terms_agree">
    I agree to the terms and conditions
</label>
<p class="text-red-500 text-sm error-message" id="terms_agree_error"></p>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300">
                Register Restaurant
            </button>

        </form>
    </div>
</div>