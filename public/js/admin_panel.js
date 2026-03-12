    const defaultConfig = {
      platform_name: 'FoodFlow',
      dashboard_title: 'Dashboard Overview'
    };
    
    const sectionTitles = {
      dashboard: 'Dashboard Overview',
      restaurants: 'Restaurant Management',
      users: 'User Management',
      orders: 'Order Management',
      payments: 'Payment Transactions',
      reports: 'Analytics & Reports',
      settings: 'Platform Settings'
    };
    
    function showSection(sectionId) {
      // Hide all sections
      document.querySelectorAll('section[id^="section-"]').forEach(section => {
        section.classList.add('hidden');
      });
      
      // Show selected section
      const targetSection = document.getElementById(`section-${sectionId}`);
      if (targetSection) {
        targetSection.classList.remove('hidden');
      }
      
      // Update sidebar active state (desktop)
      document.querySelectorAll('#sidebar .sidebar-item').forEach(item => {
        item.classList.remove('active');
        item.classList.remove('text-white');
        item.classList.add('text-slate-300');
      });
      
      const activeItem = document.querySelector(`#sidebar .sidebar-item[data-section="${sectionId}"]`);
      if (activeItem) {
        activeItem.classList.add('active');
        activeItem.classList.remove('text-slate-300');
        activeItem.classList.add('text-white');
      }
      
      // Update sidebar active state (mobile)
      document.querySelectorAll('#mobile-sidebar .sidebar-item').forEach(item => {
        item.classList.remove('active');
        item.classList.remove('text-white');
        item.classList.add('text-slate-300');
      });
      
      const mobileActiveItem = document.querySelector(`#mobile-sidebar .sidebar-item[data-section="${sectionId}"]`);
      if (mobileActiveItem) {
        mobileActiveItem.classList.add('active');
        mobileActiveItem.classList.remove('text-slate-300');
        mobileActiveItem.classList.add('text-white');
      }
      
      // Update page title
      const pageTitle = document.getElementById('page-title');
      if (pageTitle && sectionTitles[sectionId]) {
        pageTitle.textContent = sectionTitles[sectionId];
      }
    }
    
    function toggleMobileMenu() {
      const overlay = document.getElementById('mobile-menu-overlay');
      const sidebar = document.getElementById('mobile-sidebar');
      
      if (sidebar.classList.contains('-translate-x-full')) {
        overlay.classList.remove('hidden');
        sidebar.classList.remove('-translate-x-full');
      } else {
        overlay.classList.add('hidden');
        sidebar.classList.add('-translate-x-full');
      }
    }
    
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toast-message');
      
      toastMessage.textContent = message;
      toast.classList.remove('translate-y-20', 'opacity-0');
      
      setTimeout(() => {
        toast.classList.add('translate-y-20', 'opacity-0');
      }, 3000);
    }
    
    function exportCSV() {
      showToast('CSV export started. Download will begin shortly.');
    }
    
    function openRestaurantDetails(details) {
      const modal = document.getElementById('details-modal');
      
      document.getElementById('details-id').textContent = details.id;
      document.getElementById('details-name').textContent = details.name;
      document.getElementById('details-status').textContent = details.status;
      document.getElementById('details-rating').textContent = details.rating;
      document.getElementById('details-email').textContent = details.email;
      document.getElementById('details-phone').textContent = details.phone;
      document.getElementById('details-address').textContent = details.address;
      document.getElementById('details-revenue').textContent = details.revenue;
      document.getElementById('details-orders').textContent = details.orders;
      document.getElementById('details-delivery').textContent = details.avgDelivery;
      document.getElementById('details-commission').textContent = details.commission;
      document.getElementById('details-owner').textContent = details.owner;
      document.getElementById('details-cuisine').textContent = details.cuisine;
      document.getElementById('details-joined').textContent = details.joined;

        
    document.getElementById('approve-form').action =
        `/admin/restaurants/${details.id}/approve`;

        const approveBtn = document.getElementById('approve-btn');

    if (details.status === 'Active') {
        approveBtn.disabled = true;
        approveBtn.textContent = "Already Approved";
        approveBtn.classList.remove("bg-emerald-500","hover:bg-emerald-600");
        approveBtn.classList.add("bg-gray-300","cursor-not-allowed");
    } else {
        approveBtn.disabled = false;
        approveBtn.textContent = "Approve restaurant";
        approveBtn.classList.add("bg-emerald-500","hover:bg-emerald-600");
        approveBtn.classList.remove("bg-gray-300","cursor-not-allowed");
    }

      
      modal.classList.remove('hidden');
    }
    
    function closeRestaurantDetails() {
      const modal = document.getElementById('details-modal');
      modal.classList.add('hidden');
    }
    
    // Initialize Element SDK
    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (config) => {
          const platformName = config.platform_name || defaultConfig.platform_name;
          const dashboardTitle = config.dashboard_title || defaultConfig.dashboard_title;
          
          // Update platform name
          const platformNameEl = document.getElementById('platform-name');
          if (platformNameEl) {
            platformNameEl.textContent = platformName;
          }
          
          // Update dashboard title
          sectionTitles.dashboard = dashboardTitle;
          const pageTitle = document.getElementById('page-title');
          if (pageTitle && document.getElementById('section-dashboard') && !document.getElementById('section-dashboard').classList.contains('hidden')) {
            pageTitle.textContent = dashboardTitle;
          }
        },
        mapToCapabilities: (config) => ({
          recolorables: [],
          borderables: [],
          fontEditable: undefined,
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (config) => new Map([
          ['platform_name', config.platform_name || defaultConfig.platform_name],
          ['dashboard_title', config.dashboard_title || defaultConfig.dashboard_title]
        ])
      });
    }
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9d63d511f6b2691a',t:'MTc3MjQ5MDQ4My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
