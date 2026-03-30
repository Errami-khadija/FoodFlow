    // Config and Default Config
    const defaultConfig = {
      restaurant_name: 'FoodHub',
      tagline: 'Restaurant Portal',
      background_color: '#f9fafb',
      primary_color: '#f97316',
      text_color: '#1f2937',
      surface_color: '#ffffff',
      accent_color: '#ea580c',
      font_family: 'DM Sans'
    };

    let config = { ...defaultConfig };

    // Sample Data
    const orders = [
      { id: 'ORD-001', customer: 'Sarah Wilson', items: ['Margherita Pizza', 'Caesar Salad'], total: 42.50, status: 'pending' },
      { id: 'ORD-002', customer: 'Mike Johnson', items: ['Grilled Salmon', 'Lemonade'], total: 28.00, status: 'preparing' },
      { id: 'ORD-003', customer: 'Emily Chen', items: ['Beef Burger', 'Fries', 'Milkshake', 'Apple Pie', 'Coffee'], total: 67.80, status: 'delivered' },
      { id: 'ORD-004', customer: 'David Brown', items: ['Chicken Wings'], total: 15.99, status: 'delivered' },
      { id: 'ORD-005', customer: 'Lisa Anderson', items: ['Veggie Wrap', 'Green Tea'], total: 18.50, status: 'pending' },
      { id: 'ORD-006', customer: 'Tom Garcia', items: ['Spaghetti Bolognese', 'Tiramisu'], total: 35.00, status: 'preparing' },
      { id: 'ORD-007', customer: 'Amy White', items: ['Fish & Chips', 'Coleslaw'], total: 22.75, status: 'pending' },
      { id: 'ORD-008', customer: 'James Lee', items: ['Steak Medium Rare', 'Mashed Potatoes', 'Red Wine'], total: 58.00, status: 'preparing' }
    ];

    const menuItems = [
      { id: 1, name: 'Margherita Pizza', description: 'Fresh tomatoes, mozzarella, basil', price: 16.99, category: 'Main Course', emoji: '🍕' },
      { id: 2, name: 'Grilled Salmon', description: 'Atlantic salmon with herbs', price: 24.99, category: 'Main Course', emoji: '🐟' },
      { id: 3, name: 'Caesar Salad', description: 'Romaine, parmesan, croutons', price: 12.99, category: 'Appetizers', emoji: '🥗' },
      { id: 4, name: 'Beef Burger', description: 'Angus beef with cheese', price: 18.99, category: 'Main Course', emoji: '🍔' },
      { id: 5, name: 'Tiramisu', description: 'Classic Italian dessert', price: 8.99, category: 'Desserts', emoji: '🍰' },
      { id: 6, name: 'Chicken Wings', description: 'Crispy with hot sauce', price: 14.99, category: 'Appetizers', emoji: '🍗' },
      { id: 7, name: 'Lemonade', description: 'Fresh squeezed', price: 4.99, category: 'Beverages', emoji: '🍋' },
      { id: 8, name: 'Chocolate Cake', description: 'Rich dark chocolate', price: 7.99, category: 'Desserts', emoji: '🍫' }
    ];

    const categories = [
      { id: 1, name: 'Main Course', icon: '🍽️', itemCount: 12 },
      { id: 2, name: 'Appetizers', icon: '🥗', itemCount: 8 },
      { id: 3, name: 'Desserts', icon: '🍰', itemCount: 6 },
      { id: 4, name: 'Beverages', icon: '🥤', itemCount: 10 },
      { id: 5, name: 'Specials', icon: '⭐', itemCount: 4 }
    ];

    const reviews = [
      { id: 1, customer: 'Alice Martinez', rating: 5, comment: 'Amazing food and quick delivery! The pizza was perfect.', date: '2 hours ago', avatar: 'AM' },
      { id: 2, customer: 'Robert Kim', rating: 4, comment: 'Great taste, but delivery took a bit longer than expected.', date: '5 hours ago', avatar: 'RK' },
      { id: 3, customer: 'Jessica Taylor', rating: 5, comment: 'Best restaurant in town! Love the grilled salmon.', date: '1 day ago', avatar: 'JT' },
      { id: 4, customer: 'Chris Davis', rating: 3, comment: 'Food was good but portions could be bigger.', date: '2 days ago', avatar: 'CD' }
    ];

    const topItems = [
      { name: 'Margherita Pizza', sales: 156, emoji: '🍕' },
      { name: 'Beef Burger', sales: 142, emoji: '🍔' },
      { name: 'Grilled Salmon', sales: 98, emoji: '🐟' },
      { name: 'Caesar Salad', sales: 87, emoji: '🥗' },
      { name: 'Tiramisu', sales: 76, emoji: '🍰' }
    ];

    // Navigation
    function navigate(page) {
      // Hide all pages
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      
      // Show selected page
      const pageEl = document.getElementById(`page-${page}`);
      if (pageEl) {
        pageEl.classList.remove('hidden');
        pageEl.classList.add('fade-in');
      }
      
      // Update nav items
      document.querySelectorAll('[data-nav]').forEach(item => {
        if (item.dataset.nav === page) {
          item.className = 'nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium bg-orange-50 text-orange-600';
        } else {
          item.className = 'nav-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left font-medium text-gray-600 hover:bg-gray-50';
        }
      });
      
      // Update page title
      const titles = {
        dashboard: 'Dashboard',
        orders: 'Orders',
        menu: 'Menu Management',
        categories: 'Categories',
        reviews: 'Reviews',
        analytics: 'Analytics',
        settings: 'Settings'
      };
      document.getElementById('page-title').textContent = titles[page] || 'Dashboard';
      
      // Close mobile sidebar
      if (window.innerWidth < 1024) {
        closeSidebar();
      }
      
      // Render page-specific content
      if (page === 'orders') renderOrders();
      if (page === 'menu') renderMenuItems();
      if (page === 'categories') renderCategories();
      if (page === 'reviews') renderReviews();
      if (page === 'analytics') renderTopItems();
    }

    // Sidebar Toggle
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('mobile-overlay');
      
      if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
      } else {
        closeSidebar();
      }
    }

    function closeSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('mobile-overlay');
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    }


document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
        let form = this.closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});


const editModal = document.getElementById('editModal');

document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function () {

        let id = this.dataset.id;
        let name = this.dataset.name;
        let image = this.dataset.image;

        // Set form action
        document.getElementById('editForm').action = `/restaurant/categories/${id}`;

        // Fill data
        document.getElementById('edit_name').value = name;

        // Image preview
        let preview = document.getElementById('edit_preview');
        preview.src = image;
        preview.classList.remove('hidden');

        // Show modal
        editModal.classList.remove('hidden');
        editModal.classList.add('flex');
    });
});

// Close modal
document.getElementById('closeEditModal').addEventListener('click', () => {
    editModal.classList.add('hidden');
});

document.getElementById('edit_image').addEventListener('change', function(e) {
    let preview = document.getElementById('edit_preview');
    preview.src = URL.createObjectURL(e.target.files[0]);
    preview.classList.remove('hidden');
});


    // Render Orders Table
    function renderOrders() {
      const tbody = document.getElementById('orders-table-body');
      const statusFilter = document.getElementById('status-filter').value;
      
      const filteredOrders = statusFilter === 'all' 
        ? orders 
        : orders.filter(o => o.status === statusFilter);
      
      tbody.innerHTML = filteredOrders.map(order => `
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 text-sm font-medium text-gray-800">#${order.id}</td>
          <td class="px-6 py-4 text-sm text-gray-600">${order.customer}</td>
          <td class="px-6 py-4 text-sm font-medium text-gray-800">$${order.total.toFixed(2)}</td>
          <td class="px-6 py-4">
            <span class="px-3 py-1 text-xs font-medium rounded-full ${getStatusClass(order.status)}">
              ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
            </span>
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center gap-2">
              <button onclick="viewOrder('${order.id}')" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500 hover:text-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </button>
              <button onclick="updateOrderStatus('${order.id}')" class="p-2 hover:bg-orange-50 rounded-lg text-orange-500 hover:text-orange-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
    }

    function getStatusClass(status) {
      switch(status) {
        case 'pending': return 'bg-yellow-100 text-yellow-700';
        case 'preparing': return 'bg-blue-100 text-blue-700';
        case 'delivered': return 'bg-green-100 text-green-700';
        default: return 'bg-gray-100 text-gray-700';
      }
    }

    function viewOrder(orderId) {
      const order = orders.find(o => o.id === orderId);
      if (!order) return;
      
      const content = document.getElementById('order-detail-content');
      content.innerHTML = `
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Order ID</span>
            <span class="font-medium text-gray-800">#${order.id}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Customer</span>
            <span class="font-medium text-gray-800">${order.customer}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Status</span>
            <span class="px-3 py-1 text-xs font-medium rounded-full ${getStatusClass(order.status)}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span>
          </div>
          <div class="border-t border-gray-100 pt-4">
            <span class="text-gray-500 block mb-2">Items</span>
            <ul class="space-y-2">
              ${order.items.map(item => `<li class="text-gray-800">• ${item}</li>`).join('')}
            </ul>
          </div>
          <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <span class="font-medium text-gray-800">Total</span>
            <span class="text-xl font-bold text-orange-500">$${order.total.toFixed(2)}</span>
          </div>
        </div>
      `;
      
      openModal('order-detail-modal');
    }

    function updateOrderStatus(orderId) {
      const order = orders.find(o => o.id === orderId);
      if (!order) return;
      
      const statusFlow = ['pending', 'preparing', 'delivered'];
      const currentIndex = statusFlow.indexOf(order.status);
      
      if (currentIndex < statusFlow.length - 1) {
        order.status = statusFlow[currentIndex + 1];
        renderOrders();
        showToast(`Order ${orderId} updated to ${order.status}`);
      } else {
        showToast('Order already delivered');
      }
    }

    // Render Menu Items
    function renderMenuItems() {
      const grid = document.getElementById('menu-grid');
      grid.innerHTML = menuItems.map(item => `
        <div class="menu-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
          <div class="h-32 bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center">
            <span class="text-5xl">${item.emoji}</span>
          </div>
          <div class="p-4">
            <div class="flex items-start justify-between mb-2">
              <h4 class="font-semibold text-gray-800">${item.name}</h4>
              <span class="text-orange-500 font-bold">$${item.price}</span>
            </div>
            <p class="text-sm text-gray-400 mb-3">${item.description}</p>
            <div class="flex items-center justify-between">
              <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">${item.category}</span>
              <div class="flex gap-1">
                <button onclick="editMenuItem(${item.id})" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                </button>
                <button onclick="deleteMenuItem(${item.id})" class="p-2 hover:bg-red-50 rounded-lg text-red-500">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      `).join('');
    }

    function editMenuItem(id) {
      showToast('Edit functionality - Item #' + id);
    }

    function deleteMenuItem(id) {
      const index = menuItems.findIndex(i => i.id === id);
      if (index > -1) {
        menuItems.splice(index, 1);
        renderMenuItems();
        showToast('Item deleted successfully');
      }
    }

    // Render Categories
    function renderCategories() {
      const grid = document.getElementById('categories-grid');
      grid.innerHTML = categories.map(cat => `
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center">
              <span class="text-2xl">${cat.icon}</span>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800">${cat.name}</h4>
              <p class="text-sm text-gray-400">${cat.itemCount} items</p>
            </div>
          </div>
          <div class="flex gap-2">
            <button class="flex-1 py-2 text-sm font-medium text-orange-500 hover:bg-orange-50 rounded-lg transition-colors">
              Edit
            </button>
            <button onclick="deleteCategory(${cat.id})" class="flex-1 py-2 text-sm font-medium text-red-500 hover:bg-red-50 rounded-lg transition-colors">
              Delete
            </button>
          </div>
        </div>
      `).join('');
    }

    function deleteCategory(id) {
      const index = categories.findIndex(c => c.id === id);
      if (index > -1) {
        categories.splice(index, 1);
        renderCategories();
        showToast('Category deleted');
      }
    }

    // Render Reviews
    function renderReviews() {
      const list = document.getElementById('reviews-list');
      list.innerHTML = reviews.map(review => `
        <div class="p-6 hover:bg-gray-50">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
              ${review.avatar}
            </div>
            <div class="flex-1">
              <div class="flex items-center justify-between mb-1">
                <h4 class="font-semibold text-gray-800">${review.customer}</h4>
                <span class="text-xs text-gray-400">${review.date}</span>
              </div>
              <div class="flex items-center gap-1 mb-2">
                ${Array(5).fill(0).map((_, i) => `
                  <svg class="w-4 h-4 ${i < review.rating ? 'text-yellow-400' : 'text-gray-200'}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                  </svg>
                `).join('')}
              </div>
              <p class="text-gray-600 text-sm">${review.comment}</p>
              <button class="mt-3 text-sm text-orange-500 font-medium hover:text-orange-600">Reply</button>
            </div>
          </div>
        </div>
      `).join('');
    }

    // Render Top Items
    function renderTopItems() {
      const grid = document.getElementById('top-items-grid');
      grid.innerHTML = topItems.map((item, index) => `
        <div class="bg-gray-50 rounded-xl p-4 text-center">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm">
            <span class="text-2xl">${item.emoji}</span>
          </div>
          <h4 class="font-semibold text-gray-800 text-sm mb-1">${item.name}</h4>
          <p class="text-orange-500 font-bold">${item.sales} sold</p>
          <span class="text-xs text-gray-400">#${index + 1} Best Seller</span>
        </div>
      `).join('');
    }

    // Modal Functions
    function openAddItemModal() {
      openModal('add-item-modal');
    }

    function openAddCategoryModal() {
      openModal('add-category-modal');
    }

    function openModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // Toast
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toast-message');
      toastMessage.textContent = message;
      toast.classList.remove('translate-y-20', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');
      
      setTimeout(() => {
        toast.classList.add('translate-y-20', 'opacity-0');
        toast.classList.remove('translate-y-0', 'opacity-100');
      }, 3000);
    }

    // Toggle Switch
    function toggleSwitch(btn) {
      const isOn = btn.classList.contains('bg-orange-500');
      const dot = btn.querySelector('span');
      
      if (isOn) {
        btn.classList.remove('bg-orange-500');
        btn.classList.add('bg-gray-300');
        dot.classList.remove('right-1');
        dot.classList.add('left-1');
      } else {
        btn.classList.remove('bg-gray-300');
        btn.classList.add('bg-orange-500');
        dot.classList.remove('left-1');
        dot.classList.add('right-1');
      }
    }

    // Form Handlers
    document.getElementById('add-item-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const newItem = {
        id: menuItems.length + 1,
        name: formData.get('name'),
        description: formData.get('description') || '',
        price: parseFloat(formData.get('price')),
        category: formData.get('category'),
        emoji: '🍽️'
      };
      menuItems.push(newItem);
      renderMenuItems();
      closeModal('add-item-modal');
      this.reset();
      showToast('Menu item added successfully');
    });

  

    // Status Filter
    document.getElementById('status-filter').addEventListener('change', renderOrders);

    // Element SDK Integration
    async function onConfigChange(cfg) {
      document.getElementById('restaurant-name').textContent = cfg.restaurant_name || defaultConfig.restaurant_name;
      document.getElementById('tagline').textContent = cfg.tagline || defaultConfig.tagline;
      
      const fontFamily = cfg.font_family || defaultConfig.font_family;
      document.body.style.fontFamily = `${fontFamily}, sans-serif`;
    }

    // Initialize
    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities: (cfg) => ({
          recolorables: [
            {
              get: () => cfg.background_color || defaultConfig.background_color,
              set: (v) => { cfg.background_color = v; window.elementSdk.setConfig({ background_color: v }); }
            },
            {
              get: () => cfg.surface_color || defaultConfig.surface_color,
              set: (v) => { cfg.surface_color = v; window.elementSdk.setConfig({ surface_color: v }); }
            },
            {
              get: () => cfg.text_color || defaultConfig.text_color,
              set: (v) => { cfg.text_color = v; window.elementSdk.setConfig({ text_color: v }); }
            },
            {
              get: () => cfg.primary_color || defaultConfig.primary_color,
              set: (v) => { cfg.primary_color = v; window.elementSdk.setConfig({ primary_color: v }); }
            },
            {
              get: () => cfg.accent_color || defaultConfig.accent_color,
              set: (v) => { cfg.accent_color = v; window.elementSdk.setConfig({ accent_color: v }); }
            }
          ],
          borderables: [],
          fontEditable: {
            get: () => cfg.font_family || defaultConfig.font_family,
            set: (v) => { cfg.font_family = v; window.elementSdk.setConfig({ font_family: v }); }
          },
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (cfg) => new Map([
          ['restaurant_name', cfg.restaurant_name || defaultConfig.restaurant_name],
          ['tagline', cfg.tagline || defaultConfig.tagline]
        ])
      });
      config = window.elementSdk.config || config;
    }

    // Initial render
    onConfigChange(config);
    navigate('dashboard');
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63c7846197d92d',t:'MTc3MjQ4OTkyOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();