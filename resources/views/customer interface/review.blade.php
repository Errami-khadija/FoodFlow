
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
           <button type="button" class="star-btn w-10 h-10 flex items-center justify-center  rounded-lg bg-gray-100 text-yellow-500  hover:bg-yellow-100 transition-colors text-xl" data-rating="1"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg></button> 
        <button type="button" class="star-btn w-10 h-10 flex items-center justify-center  rounded-lg bg-gray-100 text-yellow-500 hover:bg-yellow-100 transition-colors text-xl" data-rating="2"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg></button> 
        <button type="button" class="star-btn w-10 h-10 flex items-center justify-center  rounded-lg bg-gray-100 text-yellow-500 hover:bg-yellow-100 transition-colors text-xl" data-rating="3"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg></button> 
        <button type="button" class="star-btn w-10 h-10 flex items-center justify-center  rounded-lg bg-gray-100 text-yellow-500 hover:bg-yellow-100 transition-colors text-xl" data-rating="4"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg></button> 
        <button type="button" class="star-btn w-10 h-10 flex items-center justify-center  rounded-lg  text-yellow-500 bg-gradient-to-r from-primary to-secondary transition-colors text-xl" data-rating="5"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg></button>
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
            {{ number_format($average, 1) }}
           </div>
           <div class="ml-3">
            <div class="flex text-yellow-500 text-sm">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= round($average))
            <!-- Filled Star -->
            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
            </svg>
        @else
            <!-- Empty Star -->
           <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M288.1-32c9 0 17.3 5.1 21.4 13.1L383 125.3 542.9 150.7c8.9 1.4 16.3 7.7 19.1 16.3s.5 18-5.8 24.4L441.7 305.9 467 465.8c1.4 8.9-2.3 17.9-9.6 23.2s-17 6.1-25 2L288.1 417.6 143.8 491c-8 4.1-17.7 3.3-25-2s-11-14.2-9.6-23.2L134.4 305.9 20 191.4c-6.4-6.4-8.6-15.8-5.8-24.4s10.1-14.9 19.1-16.3l159.9-25.4 73.6-144.2c4.1-8 12.4-13.1 21.4-13.1zm0 76.8L230.3 158c-3.5 6.8-10 11.6-17.6 12.8l-125.5 20 89.8 89.9c5.4 5.4 7.9 13.1 6.7 20.7l-19.8 125.5 113.3-57.6c6.8-3.5 14.9-3.5 21.8 0l113.3 57.6-19.8-125.5c-1.2-7.6 1.3-15.3 6.7-20.7l89.8-89.9-125.5-20c-7.6-1.2-14.1-6-17.6-12.8L288.1 44.8z"/></svg>
        @endif
    @endfor
</div>
            <div class="text-xs text-gray-500 mt-1">
             Based on <span id="total-reviews"><span id="total-reviews">{{ $total }}</span></span> reviews
            </div>
           </div>
          </div>
         </div>
        <div id="reviews-container" class="space-y-4 max-h-96 overflow-y-auto hide-scrollbar">
@foreach($reviews as $review)
<div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between mb-2">
        <div>
            <h4 class="font-semibold text-dark">{{ $review->name }}</h4>
            <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
        </div>

       <span class="flex gap-1 text-yellow-500">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $review->rating)
            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
            </svg>
        @else
                        <!-- Empty Star -->
           <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M288.1-32c9 0 17.3 5.1 21.4 13.1L383 125.3 542.9 150.7c8.9 1.4 16.3 7.7 19.1 16.3s.5 18-5.8 24.4L441.7 305.9 467 465.8c1.4 8.9-2.3 17.9-9.6 23.2s-17 6.1-25 2L288.1 417.6 143.8 491c-8 4.1-17.7 3.3-25-2s-11-14.2-9.6-23.2L134.4 305.9 20 191.4c-6.4-6.4-8.6-15.8-5.8-24.4s10.1-14.9 19.1-16.3l159.9-25.4 73.6-144.2c4.1-8 12.4-13.1 21.4-13.1zm0 76.8L230.3 158c-3.5 6.8-10 11.6-17.6 12.8l-125.5 20 89.8 89.9c5.4 5.4 7.9 13.1 6.7 20.7l-19.8 125.5 113.3-57.6c6.8-3.5 14.9-3.5 21.8 0l113.3 57.6-19.8-125.5c-1.2-7.6 1.3-15.3 6.7-20.7l89.8-89.9-125.5-20c-7.6-1.2-14.1-6-17.6-12.8L288.1 44.8z"/></svg>
      
        @endif
    @endfor
</span>
    </div>

    <p class="text-gray-600 text-sm">"{{ $review->comment }}"</p>
</div>
@endforeach
</div>
    </section>
