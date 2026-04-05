    // Default config
    const defaultConfig = {
      hero_headline: 'Order Your Favorite Meals Online',
      hero_subtext: 'Fast delivery. Secure payments. Real-time tracking. Experience the future of food ordering.',
      cta_primary: 'Browse Restaurants',
      cta_secondary: 'Start Your Restaurant',
      background_color: '#ffffff',
      surface_color: '#f9fafb',
      text_color: '#1f2937',
      primary_action_color: '#f97316',
      secondary_action_color: '#ef4444',
      font_family: 'Inter',
      font_size: 16
    };

    // Restaurant data
    const restaurants = [
      {
        id: 1,
        name: 'Pizza Paradise',
        rating: 4.8,
        reviews: 324,
        deliveryTime: '20-30',
        deliveryFee: 2.99,
        emoji: '🍕',
        gradient: 'from-red-400 to-red-600',
        categories: ['Pizza', 'Drinks', 'Desserts'],
        menu: {
          Pizza: [
            { id: 1, name: 'Margherita', desc: 'Fresh tomatoes, mozzarella, basil', price: 12.99, emoji: '🍕' },
            { id: 2, name: 'Pepperoni', desc: 'Classic pepperoni with extra cheese', price: 14.99, emoji: '🍕' },
            { id: 3, name: 'BBQ Chicken', desc: 'Grilled chicken, BBQ sauce, onions', price: 15.99, emoji: '🍗' },
            { id: 4, name: 'Veggie Supreme', desc: 'Bell peppers, mushrooms, olives', price: 13.99, emoji: '🥬' }
          ],
          Drinks: [
            { id: 5, name: 'Cola', desc: 'Refreshing cola drink', price: 2.49, emoji: '🥤' },
            { id: 6, name: 'Lemonade', desc: 'Fresh squeezed lemonade', price: 3.49, emoji: '🍋' },
            { id: 7, name: 'Iced Tea', desc: 'Sweet or unsweetened', price: 2.99, emoji: '🧊' }
          ],
          Desserts: [
            { id: 8, name: 'Tiramisu', desc: 'Classic Italian dessert', price: 6.99, emoji: '🍰' },
            { id: 9, name: 'Gelato', desc: 'Choice of flavors', price: 4.99, emoji: '🍨' }
          ]
        }
      },
      {
        id: 2,
        name: 'Burger Barn',
        rating: 4.6,
        reviews: 512,
        deliveryTime: '15-25',
        deliveryFee: 1.99,
        emoji: '🍔',
        gradient: 'from-amber-400 to-orange-500',
        categories: ['Burgers', 'Sides', 'Drinks'],
        menu: {
          Burgers: [
            { id: 10, name: 'Classic Cheeseburger', desc: 'Beef patty, cheese, pickles, onions', price: 9.99, emoji: '🍔' },
            { id: 11, name: 'Bacon Deluxe', desc: 'Double bacon, cheddar, special sauce', price: 12.99, emoji: '🥓' },
            { id: 12, name: 'Mushroom Swiss', desc: 'Sautéed mushrooms, Swiss cheese', price: 11.99, emoji: '🍄' },
            { id: 13, name: 'Veggie Burger', desc: 'Plant-based patty, fresh veggies', price: 10.99, emoji: '🥗' }
          ],
          Sides: [
            { id: 14, name: 'French Fries', desc: 'Crispy golden fries', price: 3.99, emoji: '🍟' },
            { id: 15, name: 'Onion Rings', desc: 'Beer-battered onion rings', price: 4.99, emoji: '🧅' },
            { id: 16, name: 'Coleslaw', desc: 'Creamy homemade coleslaw', price: 2.99, emoji: '🥬' }
          ],
          Drinks: [
            { id: 17, name: 'Milkshake', desc: 'Vanilla, chocolate, or strawberry', price: 5.99, emoji: '🥛' },
            { id: 18, name: 'Root Beer', desc: 'Classic root beer float', price: 3.99, emoji: '🍺' }
          ]
        }
      },
      {
        id: 3,
        name: 'Sushi Supreme',
        rating: 4.9,
        reviews: 289,
        deliveryTime: '25-35',
        deliveryFee: 3.99,
        emoji: '🍣',
        gradient: 'from-pink-400 to-rose-500',
        categories: ['Sushi', 'Ramen', 'Drinks'],
        menu: {
          Sushi: [
            { id: 19, name: 'California Roll', desc: 'Crab, avocado, cucumber', price: 8.99, emoji: '🍣' },
            { id: 20, name: 'Salmon Nigiri', desc: 'Fresh Atlantic salmon, 4 pcs', price: 10.99, emoji: '🐟' },
            { id: 21, name: 'Dragon Roll', desc: 'Eel, avocado, special sauce', price: 14.99, emoji: '🐉' },
            { id: 22, name: 'Tuna Sashimi', desc: 'Premium bluefin tuna', price: 16.99, emoji: '🐠' }
          ],
          Ramen: [
            { id: 23, name: 'Tonkotsu Ramen', desc: 'Rich pork broth, chashu, egg', price: 13.99, emoji: '🍜' },
            { id: 24, name: 'Miso Ramen', desc: 'Miso broth, corn, butter', price: 12.99, emoji: '🍲' }
          ],
          Drinks: [
            { id: 25, name: 'Green Tea', desc: 'Hot or iced matcha', price: 3.49, emoji: '🍵' },
            { id: 26, name: 'Sake', desc: 'Premium Japanese sake', price: 8.99, emoji: '🍶' }
          ]
        }
      },
      {
        id: 4,
        name: 'Green Garden',
        rating: 4.7,
        reviews: 198,
        deliveryTime: '15-20',
        deliveryFee: 2.49,
        emoji: '🥗',
        gradient: 'from-green-400 to-emerald-500',
        categories: ['Salads', 'Bowls', 'Smoothies'],
        menu: {
          Salads: [
            { id: 27, name: 'Caesar Salad', desc: 'Romaine, parmesan, croutons', price: 10.99, emoji: '🥗' },
            { id: 28, name: 'Greek Salad', desc: 'Feta, olives, tomatoes, cucumber', price: 11.99, emoji: '🇬🇷' },
            { id: 29, name: 'Cobb Salad', desc: 'Chicken, bacon, egg, avocado', price: 13.99, emoji: '🥑' }
          ],
          Bowls: [
            { id: 30, name: 'Quinoa Power Bowl', desc: 'Quinoa, chickpeas, roasted veggies', price: 12.99, emoji: '🍚' },
            { id: 31, name: 'Açaí Bowl', desc: 'Açaí, granola, fresh fruits', price: 10.99, emoji: '🫐' }
          ],
          Smoothies: [
            { id: 32, name: 'Green Detox', desc: 'Spinach, apple, ginger', price: 6.99, emoji: '🥬' },
            { id: 33, name: 'Berry Blast', desc: 'Mixed berries, banana, honey', price: 6.99, emoji: '🍓' }
          ]
        }
      }
    ];

    // Cart state
    let cart = [];
    let currentRestaurant = null;
    let currentPage = 'landing';
    let navigationHistory = ['landing'];

    // Initialize
    function init() {
      if (window.elementSdk) {
        window.elementSdk.init({
          defaultConfig,
          onConfigChange,
          mapToCapabilities,
          mapToEditPanelValues
        });
      }
      renderRestaurantsList();
    }

    async function onConfigChange(config) {
      const c = { ...defaultConfig, ...config };
      
      // Update hero content
      const headline = document.getElementById('hero-headline');
      if (headline) {
        headline.innerHTML = c.hero_headline.replace('Favorite Meals', '<span class="gradient-text">Favorite Meals</span>');
      }
      
      const subtext = document.getElementById('hero-subtext');
      if (subtext) subtext.textContent = c.hero_subtext;
      
      const ctaPrimary = document.getElementById('cta-primary-btn');
      if (ctaPrimary) ctaPrimary.textContent = c.cta_primary;
      
      const ctaSecondary = document.getElementById('cta-secondary-btn');
      if (ctaSecondary) ctaSecondary.textContent = c.cta_secondary;
      
      // Update font
      document.body.style.fontFamily = `${c.font_family}, Inter, sans-serif`;
    }

    function mapToCapabilities(config) {
      const c = window.elementSdk?.config || defaultConfig;
      return {
        recolorables: [
          {
            get: () => c.background_color || defaultConfig.background_color,
            set: (v) => window.elementSdk.setConfig({ background_color: v })
          },
          {
            get: () => c.surface_color || defaultConfig.surface_color,
            set: (v) => window.elementSdk.setConfig({ surface_color: v })
          },
          {
            get: () => c.text_color || defaultConfig.text_color,
            set: (v) => window.elementSdk.setConfig({ text_color: v })
          },
          {
            get: () => c.primary_action_color || defaultConfig.primary_action_color,
            set: (v) => window.elementSdk.setConfig({ primary_action_color: v })
          },
          {
            get: () => c.secondary_action_color || defaultConfig.secondary_action_color,
            set: (v) => window.elementSdk.setConfig({ secondary_action_color: v })
          }
        ],
        borderables: [],
        fontEditable: {
          get: () => c.font_family || defaultConfig.font_family,
          set: (v) => window.elementSdk.setConfig({ font_family: v })
        },
        fontSizeable: {
          get: () => c.font_size || defaultConfig.font_size,
          set: (v) => window.elementSdk.setConfig({ font_size: v })
        }
      };
    }

    function mapToEditPanelValues(config) {
      const c = { ...defaultConfig, ...config };
      return new Map([
        ['hero_headline', c.hero_headline],
        ['hero_subtext', c.hero_subtext],
        ['cta_primary', c.cta_primary],
        ['cta_secondary', c.cta_secondary]
      ]);
    }

    // Navigation
    function navigateTo(page, id = null) {
      // Hide all pages
      document.getElementById('landing-page').classList.add('hidden');
      document.getElementById('restaurants-list-page').classList.add('hidden');
      document.getElementById('restaurant-page').classList.add('hidden');
      document.getElementById('checkout-page').classList.add('hidden');
      document.getElementById('tracking-page').classList.add('hidden');
      
      // Update navigation history
      if (page !== currentPage) {
        navigationHistory.push(currentPage);
      }
      currentPage = page;
      
      // Show selected page
      if (page === 'landing') {
        document.getElementById('landing-page').classList.remove('hidden');
        document.getElementById('floating-cart').classList.add('hidden');
      } else if (page === 'restaurants-list') {
        document.getElementById('restaurants-list-page').classList.remove('hidden');
        document.getElementById('floating-cart').classList.remove('hidden');
      } else if (page === 'restaurant') {
        document.getElementById('restaurant-page').classList.remove('hidden');
        document.getElementById('floating-cart').classList.remove('hidden');
        if (id) renderRestaurantPage(id);
      } else if (page === 'checkout') {
        document.getElementById('checkout-page').classList.remove('hidden');
        document.getElementById('floating-cart').classList.add('hidden');
        renderCheckout();
      } else if (page === 'tracking') {
        document.getElementById('tracking-page').classList.remove('hidden');
        document.getElementById('floating-cart').classList.add('hidden');
        startOrderTracking();
      }
      
      // Scroll to top
      window.scrollTo(0, 0);
    }

    function goBack() {
      if (navigationHistory.length > 0) {
        const previousPage = navigationHistory.pop();
        navigateTo(previousPage);
      } else {
        navigateTo('landing');
      }
    }

    // Mobile menu
    function toggleMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }

   


    function scrollToCategory(cat) {
      document.getElementById(`category-${cat}`)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // Cart functions
    function addToCart(restaurantId, itemId) {
      const restaurant = restaurants.find(r => r.id === restaurantId);
      if (!restaurant) return;
      
      let item;
      for (const cat of restaurant.categories) {
        const found = restaurant.menu[cat].find(i => i.id === itemId);
        if (found) {
          item = found;
          break;
        }
      }
      if (!item) return;
      
      const existing = cart.find(c => c.itemId === itemId && c.restaurantId === restaurantId);
      if (existing) {
        existing.quantity++;
      } else {
        cart.push({
          restaurantId,
          itemId,
          name: item.name,
          price: item.price,
          emoji: item.emoji,
          quantity: 1
        });
      }
      
      updateCartUI();
      showAddedNotification(item.name);
    }

    function removeFromCart(itemId, restaurantId) {
      const index = cart.findIndex(c => c.itemId === itemId && c.restaurantId === restaurantId);
      if (index > -1) {
        if (cart[index].quantity > 1) {
          cart[index].quantity--;
        } else {
          cart.splice(index, 1);
        }
        updateCartUI();
      }
    }

    function updateCartUI() {
      const cartItems = document.getElementById('cart-items');
      const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
      const total = subtotal + 2.99;
      
      // Update cart count badges
      const floatingCount = document.getElementById('floating-cart-count');
      const headerCount = document.getElementById('header-cart-count');
      const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
      
      if (floatingCount) floatingCount.textContent = totalItems;
      if (headerCount) headerCount.textContent = totalItems;
      
      // Update cart items
      if (cart.length === 0) {
        cartItems.innerHTML = `
          <div class="text-center py-12">
            <div class="text-6xl mb-4">🛒</div>
            <p class="text-gray-500">Your cart is empty</p>
            <p class="text-sm text-gray-400 mt-1">Add some delicious items!</p>
          </div>
        `;
      } else {
        cartItems.innerHTML = cart.map(item => `
          <div class="flex items-center bg-gray-50 rounded-xl p-3">
            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-2xl shadow-sm">${item.emoji}</div>
            <div class="ml-3 flex-1">
              <h4 class="font-semibold text-dark text-sm">${item.name}</h4>
              <p class="text-primary font-medium">$${(item.price * item.quantity).toFixed(2)}</p>
            </div>
            <div class="flex items-center space-x-2">
              <button onclick="removeFromCart(${item.itemId}, ${item.restaurantId})" class="w-7 h-7 bg-white rounded-full flex items-center justify-center shadow hover:bg-gray-100 transition-colors">
                <span class="text-gray-600">−</span>
              </button>
              <span class="font-semibold w-6 text-center">${item.quantity}</span>
              <button onclick="addToCart(${item.restaurantId}, ${item.itemId})" class="w-7 h-7 bg-gradient-to-r from-primary to-secondary text-white rounded-full flex items-center justify-center shadow hover:scale-110 transition-transform">
                <span>+</span>
              </button>
            </div>
          </div>
        `).join('');
      }
      
      // Update totals
      document.getElementById('cart-subtotal').textContent = `$${subtotal.toFixed(2)}`;
      document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
      
      // Update checkout button
      const checkoutBtn = document.getElementById('checkout-btn');
      if (cart.length > 0) {
        checkoutBtn.disabled = false;
      } else {
        checkoutBtn.disabled = true;
      }
    }

    function showAddedNotification(name) {
      const notification = document.createElement('div');
      notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-xl z-50 animate-slide-in';
      notification.innerHTML = `<span class="mr-2">✓</span> ${name} added to cart`;
      document.body.appendChild(notification);
      setTimeout(() => notification.remove(), 2000);
    }

    function toggleCartSidebar() {
      const sidebar = document.getElementById('cart-sidebar');
      const overlay = document.getElementById('cart-overlay');
      
      if (sidebar.classList.contains('translate-x-full')) {
        sidebar.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      } else {
        sidebar.classList.add('translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
      }
    }

    function goToCheckout() {
      if (cart.length === 0) return;
      toggleCartSidebar();
      navigateTo('checkout');
    }

    // Checkout
    function renderCheckout() {
      const checkoutItems = document.getElementById('checkout-items');
      const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
      const total = subtotal + 2.99 + 1.50;
      
      checkoutItems.innerHTML = cart.map(item => `
        <div class="flex items-center justify-between py-2">
          <div class="flex items-center">
            <span class="text-xl mr-2">${item.emoji}</span>
            <span class="text-gray-700">${item.name} x${item.quantity}</span>
          </div>
          <span class="font-semibold">$${(item.price * item.quantity).toFixed(2)}</span>
        </div>
      `).join('');
      
      document.getElementById('checkout-subtotal').textContent = `$${subtotal.toFixed(2)}`;
      document.getElementById('checkout-total').textContent = `$${total.toFixed(2)}`;
    }

    function placeOrder() {
      // Generate random order number
      const orderNum = Math.floor(100000 + Math.random() * 900000);
      document.getElementById('order-number').textContent = orderNum;
      
      // Clear cart
      cart = [];
      updateCartUI();
      
      // Navigate to tracking
      navigateTo('tracking');
    }

    // Order tracking simulation
    function startOrderTracking() {
      let stage = 1;
      const stages = ['pending', 'preparing', 'delivery', 'delivered'];
      const progressHeights = ['25%', '50%', '75%', '100%'];
      const circles = ['preparing-circle', 'delivery-circle', 'delivered-circle'];
      
      const interval = setInterval(() => {
        if (stage < stages.length) {
          // Update progress line
          document.getElementById('progress-line').style.height = progressHeights[stage];
          
          // Update circle color
          if (circles[stage - 1]) {
            document.getElementById(circles[stage - 1]).classList.remove('bg-gray-200');
            document.getElementById(circles[stage - 1]).classList.add('bg-green-500', 'shadow-lg');
          }
          
          // Update ETA
          const etas = ['25-35', '15-25', '5-10', '0'];
          document.getElementById('eta-time').textContent = etas[stage];
          
          stage++;
        } else {
          clearInterval(interval);
        }
      }, 3000);
    }

    // Review management
    let reviews = [
      { name: 'Alex Rodriguez', rating: 5, comment: 'Amazing app! The delivery speed is unbeatable and customer service is always helpful. Highly recommend!', date: '2 days ago' },
      { name: 'Jessica Chen', rating: 4, comment: 'Great selection of restaurants and reasonable delivery fees. Would love to see more payment options.', date: '1 week ago' },
      { name: 'Marcus Williams', rating: 5, comment: 'The live tracking feature is incredible! I can see exactly where my food is at all times. Best ordering experience!', date: '2 weeks ago' }
    ];

    function setupStarRating() {
      const ratingInput = document.getElementById('review-rating');
      const starBtns = document.querySelectorAll('.star-btn');
      
      starBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const rating = btn.dataset.rating;
          ratingInput.value = rating;
          
          // Update visual state
          starBtns.forEach((b, idx) => {
            if (idx < rating) {
              b.classList.remove('bg-gray-100', 'hover:bg-yellow-100');
              b.classList.add('bg-gradient-to-r', 'from-primary', 'to-secondary');
            } else {
              b.classList.remove('bg-gradient-to-r', 'from-primary', 'to-secondary');
              b.classList.add('bg-gray-100', 'hover:bg-yellow-100');
            }
          });
        });
      });
    }

    function submitReview(e) {
      e.preventDefault();
      
      const name = document.getElementById('reviewer-name').value;
      const email = document.getElementById('reviewer-email').value;
      const rating = parseInt(document.getElementById('review-rating').value);
      const comment = document.getElementById('reviewer-comment').value;
      
      if (!name || !comment) return;
      
      // Add new review
      reviews.unshift({
        name,
        rating,
        comment,
        date: 'Just now'
      });
      
      // Update UI
      updateReviewsDisplay();
      
      // Reset form
      document.getElementById('review-form').reset();
      document.getElementById('review-rating').value = '5';
      
      // Reset star buttons to 5 stars
      setupStarRating();
      
      // Show success message
      showSuccessNotification('Thank you for your review!');
    }

    function updateReviewsDisplay() {
      const container = document.getElementById('reviews-container');
      const totalReviews = document.getElementById('total-reviews');
      
      // Calculate average rating
      const avgRating = (reviews.reduce((sum, r) => sum + r.rating, 0) / reviews.length).toFixed(1);
      
      // Update total
      totalReviews.textContent = reviews.length;
      
      // Generate star display
      function getStars(rating) {
        return '⭐'.repeat(rating) + (rating < 5 ? '☆'.repeat(5 - rating) : '');
      }
      
      // Render reviews
      container.innerHTML = reviews.map((review, idx) => `
        <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow animate-fade-in" style="animation-delay: ${idx * 50}ms;">
          <div class="flex items-start justify-between mb-2">
            <div>
              <h4 class="font-semibold text-dark">${review.name}</h4>
              <p class="text-xs text-gray-500">${review.date}</p>
            </div>
            <span class="text-yellow-500 text-sm">${getStars(review.rating)}</span>
          </div>
          <p class="text-gray-600 text-sm">"${review.comment}"</p>
        </div>
      `).join('');
      
      // Update average rating display
      const ratingDisplay = document.querySelector('.text-3xl.font-extrabold.gradient-text');
      if (ratingDisplay) {
        ratingDisplay.textContent = avgRating;
      }
    }

    function showSuccessNotification(message) {
      const notification = document.createElement('div');
      notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-4 rounded-xl shadow-xl z-50 animate-slide-in';
      notification.innerHTML = `<span class="mr-2">✓</span> ${message}`;
      document.body.appendChild(notification);
      setTimeout(() => notification.remove(), 3000);
    }

    // Initialize on load
    init();
    updateCartUI();
    setupStarRating();
    updateReviewsDisplay();

    // Restaurant registration functions

window.openRestaurantRegister = function() {
    document.getElementById('register-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

window.closeRestaurantRegister = function() {
    document.getElementById('register-modal').classList.add('hidden');
    document.body.style.overflow = '';
    document.getElementById('restaurant-register-form').reset();
}


  document.getElementById("restaurant-register-form").addEventListener("submit", function(e){

    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    // clear previous errors
    document.querySelectorAll(".error-message").forEach(el=>{
        el.innerText = "";
    });

    fetch("/restaurant/register", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })

    .then(async response => {

        if(response.status === 422){

            let data = await response.json();

            Object.keys(data.errors).forEach(field => {

                let errorElement = document.getElementById(field + "_error");

                if(errorElement){
                    errorElement.innerText = data.errors[field][0];
                }

            });

            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please fix the errors in the form"
            });

        }

        return response.json();

    })

    .then(data => {

        if(data.success){

            Swal.fire({
                icon: "success",
                title: "Success",
                text: data.message
            });

            form.reset();
        }

    })

    .catch(error => {

        Swal.fire({
            icon: "error",
            title: "Server Error",
            text: "Something went wrong"
        });

    });

});
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63c070652de27d',t:'MTc3MjQ4OTYzOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
