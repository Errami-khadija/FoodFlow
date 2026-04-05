<section id="reviews-section" class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
       <span class="inline-block px-4 py-2 bg-white text-primary font-semibold rounded-full text-sm mb-4">Your Feedback</span>
       <h2 class="text-3xl sm:text-4xl font-extrabold text-dark mb-4">Share Your Experience</h2>
       <p class="text-gray-600 max-w-2xl mx-auto">Your feedback helps us improve. Rate the platform and share what you think!</p>
      </div>
      <div class="grid lg:grid-cols-3 gap-8">
       <!-- Leave a Review -->
       <div class="lg:col-span-1 bg-white rounded-3xl p-8 shadow-xl h-fit">
        <h3 class="text-xl font-bold text-dark mb-6">Leave a Review</h3>
        <form id="review-form" onsubmit="submitReview(event)" class="space-y-4">
         <!-- Name -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-name">Your Name</label> <input type="text" id="reviewer-name" placeholder="John Doe" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" required>
         </div><!-- Email -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-email">Email</label> <input type="email" id="reviewer-email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" required>
         </div><!-- Rating -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-3">Rate FoodFlow</label>
          <div class="flex gap-2" id="rating-selector">
           <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="1">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="2">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="3">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="4">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gradient-to-r from-primary to-secondary transition-colors text-xl" data-rating="5">⭐</button>
          </div><input type="hidden" id="review-rating" value="5">
         </div><!-- Comment -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-comment">Your Comment</label> <textarea id="reviewer-comment" placeholder="Share your experience with FoodFlow..." rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none resize-none" required></textarea>
         </div><button type="submit" class="w-full py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> Submit Review </button>
        </form>
       </div><!-- Reviews Display -->
       <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl p-8 shadow-xl">
         <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-dark">Recent Reviews</h3>
          <div class="flex items-center">
           <div class="text-3xl font-extrabold gradient-text">
            4.8
           </div>
           <div class="ml-3">
            <div class="text-yellow-500 text-sm">
             ⭐⭐⭐⭐⭐
            </div>
            <div class="text-xs text-gray-500 mt-1">
             Based on <span id="total-reviews">3</span> reviews
            </div>
           </div>
          </div>
         </div>
         <div id="reviews-container" class="space-y-4 max-h-96 overflow-y-auto hide-scrollbar">
          <!-- Default reviews -->
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Alex Rodriguez</h4>
             <p class="text-xs text-gray-500">2 days ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"Amazing app! The delivery speed is unbeatable and customer service is always helpful. Highly recommend!"</p>
          </div>
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Jessica Chen</h4>
             <p class="text-xs text-gray-500">1 week ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"Great selection of restaurants and reasonable delivery fees. Would love to see more payment options."</p>
          </div>
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Marcus Williams</h4>
             <p class="text-xs text-gray-500">2 weeks ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"The live tracking feature is incredible! I can see exactly where my food is at all times. Best ordering experience!"</p>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>