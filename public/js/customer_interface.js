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

    window.startOrderTracking = function () {
    console.log("Tracking started");

    const orderId = document.getElementById('order-number').textContent;

    const titles = [
        "Order Pending ⏳",
        "Order Confirmed ✅",
        "Preparing 👨‍🍳",
        "Out for Delivery 🚗",
        "Delivered 📦"
    ];

    const statusMap = {
        pending: 0,
        confirmed: 1,
        preparing: 2,
        delivery: 3,
        delivered: 4
    };

    const progressHeights = ['20%', '40%', '60%', '80%', '100%'];

    const circles = [
        'pending-circle',
        'confirmed-circle',
        'preparing-circle',
        'delivery-circle',
        'delivered-circle'
    ];

    async function updateTracking() {
        const res = await fetch(`/order/${orderId}/status`);
        const data = await res.json();

        const stage = statusMap[data.status];

        // ✅ Title
        const titleEl = document.getElementById('status-title');
        if (titleEl) {
            titleEl.textContent = titles[stage];
        }

        // Progress
        document.getElementById('progress-line').style.height = progressHeights[stage];

        // Reset circles
        circles.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('bg-green-500', 'shadow-lg');
                el.classList.add('bg-gray-200');
            }
        });

        // Activate circles
        for (let i = 0; i <= stage; i++) {
            const el = document.getElementById(circles[i]);
            if (el) {
                el.classList.remove('bg-gray-200');
                el.classList.add('bg-green-500', 'shadow-lg');
            }
        }

        // ETA
        const etas = ['30-40', '25-35', '15-25', '5-10', '0'];
        document.getElementById('eta-time').textContent = etas[stage];
    }

    //  run immediately
    updateTracking();

    //  run every 5 sec
    setInterval(updateTracking, 5000);
};

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


async function loadCart() {
    const res = await fetch('/cart');
    const data = await res.json();

    const container = document.getElementById('cart-items');
    if (!container) return; 

    container.innerHTML = '';

    data.items.forEach(item => {
        container.innerHTML += `
        <div class="flex justify-between items-center bg-white p-3 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <img src="/storage/${item.menu.image}" 
                     class="w-16 h-16 rounded-lg object-cover" />

                <div>
                    <h4 class="font-bold">${item.menu.name}</h4>
                    <p class="text-sm text-gray-500">$${item.menu.price}</p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button onclick="updateQuantity(${item.id}, -1)" 
                    class="px-2 bg-gray-200 rounded">-</button>

                <span>${item.quantity}</span>

                <button onclick="updateQuantity(${item.id}, 1)" 
                    class="px-2 bg-gray-200 rounded">+</button>

                <button onclick="removeItem(${item.id})" 
                    class="text-red-500 ml-3">✕</button>
            </div>
        </div>
        `;
    });

    
    const subtotalEl = document.getElementById('cart-subtotal');
    if (subtotalEl) subtotalEl.innerText = `$${data.subtotal}`;

    const totalEl = document.getElementById('cart-total');
    if (totalEl) totalEl.innerText = `$${data.total}`;

    const countEl = document.getElementById('floating-cart-count');
    if (countEl) countEl.innerText = data.count;

    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) checkoutBtn.disabled = data.count === 0;
}

//  Add to cart
async function addToCart(menuId, restaurantId) {

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

 const res = await fetch('/cart', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token
    },
        body: JSON.stringify({
            menu_id: menuId,
            restaurant_id: restaurantId
        })
    });

    const data = await res.json();

    if (data.error === 'different_restaurant') {
        if (confirm("Cart has another restaurant. Clear it?")) {
            await fetch('/cart', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            addToCart(menuId, restaurantId);
        }
        return;
    }

    loadCart();

}

//  Update quantity
async function updateQuantity(id, change) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    await fetch(`/cart/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ change: change })
    });

    loadCart();
}async function updateQuantity(id, change) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    await fetch(`/cart/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ change: change })
    });

    loadCart();
}

//  Remove item
async function removeItem(id) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    await fetch(`/cart/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    loadCart();
}

// Load cart on page load
document.addEventListener('DOMContentLoaded', loadCart);

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

  async function placeOrder() {
    const payment = document.querySelector('input[name="payment"]:checked').value;

    const data = {
        full_name: document.getElementById('full-name').value,
        phone: document.getElementById('phone').value,
        address: document.getElementById('address').value,
        city: document.getElementById('city').value,
        zip: document.getElementById('zip').value,
        payment_method: payment,
    };

    // CARD
    if (payment === 'card') {
        const res = await fetch('/pay', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        });

        const text = await res.text();
        console.log(text);

       if (!res.ok) {
    console.error("Server response:", text); 
    alert("Payment error");
    return;
}

        let result;
        try {
            result = JSON.parse(text);
        } catch (e) {
            console.error("Invalid JSON:", text);
            alert("Server error");
            return;
        }

       if (!result.url) {
    console.error("Missing Stripe URL:", result);
    alert("Payment setup error");
    return;
}

window.location.href = result.url;
        return;
    }

    // CASH
    const res = await fetch('/place-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(data)
    });

    const text = await res.text();
    console.log(text);

  const result = JSON.parse(text);

if (res.ok) {
   window.location.href = `/order/${result.order_id}`;
} else {
    console.error(text);
    alert("Error placing order");
}
    
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

    async function submitReview(e) {
    e.preventDefault();

    const data = {
        name: document.getElementById('reviewer-name').value,
        email: document.getElementById('reviewer-email').value,
        rating: document.getElementById('review-rating').value,
        comment: document.getElementById('reviewer-comment').value,
    };

    const res = await fetch('/reviews', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(data)
    });

    const result = await res.json();

    if (result.success) {
        alert('Review submitted!');
        location.reload(); 
    }
}

    // function updateReviewsDisplay() {
    //   const container = document.getElementById('reviews-container');
    //   const totalReviews = document.getElementById('total-reviews');
      
    //   // Calculate average rating
    //   const avgRating = (reviews.reduce((sum, r) => sum + r.rating, 0) / reviews.length).toFixed(1);
      
    //   // Update total
    //   totalReviews.textContent = reviews.length;
      
    //   // Generate star display
    //   function getStars(rating) {
    //     return '⭐'.repeat(rating) + (rating < 5 ? '☆'.repeat(5 - rating) : '');
    //   }
      
    //   // Render reviews
    //   container.innerHTML = reviews.map((review, idx) => `
    //     <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow animate-fade-in" style="animation-delay: ${idx * 50}ms;">
    //       <div class="flex items-start justify-between mb-2">
    //         <div>
    //           <h4 class="font-semibold text-dark">${review.name}</h4>
    //           <p class="text-xs text-gray-500">${review.date}</p>
    //         </div>
    //         <span class="text-yellow-500 text-sm">${getStars(review.rating)}</span>
    //       </div>
    //       <p class="text-gray-600 text-sm">"${review.comment}"</p>
    //     </div>
    //   `).join('');
      
    //   // Update average rating display
    //   const ratingDisplay = document.querySelector('.text-3xl.font-extrabold.gradient-text');
    //   if (ratingDisplay) {
    //     ratingDisplay.textContent = avgRating;
    //   }
    // }

    function showSuccessNotification(message) {
      const notification = document.createElement('div');
      notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-4 rounded-xl shadow-xl z-50 animate-slide-in';
      notification.innerHTML = `<span class="mr-2">✓</span> ${message}`;
      document.body.appendChild(notification);
      setTimeout(() => notification.remove(), 3000);
    }

    // Initialize on load
    init();
    setupStarRating();
    // updateReviewsDisplay();

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

document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById('tracking-page')) {
        startOrderTracking();
    }
});
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63c070652de27d',t:'MTc3MjQ4OTYzOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
