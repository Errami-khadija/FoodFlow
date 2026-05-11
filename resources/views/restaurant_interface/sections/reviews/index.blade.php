<!-- Reviews Page -->
     <div id="page-reviews" class="page">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewbox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">{{ $averageRating }}</h3>
          <p class="text-sm text-gray-400">Average Rating</p>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">{{ $totalReviews }}</h3>
          <p class="text-sm text-gray-400">Total Reviews</p>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center gap-4">
         <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center">
          <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
         </div>
         <div>
          <h3 class="text-3xl font-bold text-gray-800">{{ $pendingReplies }}</h3>
          <p class="text-sm text-gray-400">Pending Replies</p>
         </div>
        </div>
       </div>
      </div>
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-100">
        <h3 class="font-bold text-gray-800 text-lg">Recent Reviews</h3>
       </div>
       <div id="reviews-list" class="divide-y divide-gray-100">
        @foreach ($reviews as $review)
         <div class="p-6">
          <div class="flex items-start gap-4">
           <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
           </div>
           <div>
            <h4 class="font-bold text-gray-800">{{ $review->name }}</h4>
            <p class="text-sm text-gray-500">{{ $review->created_at->format('F j, Y') }}</p>
            <p class="text-gray-600 mt-2">{{ $review->comment }}</p>

            @if(!$review->reply)
    <button 
        onclick="openReplyModal({{ $review->id }})"
        class="mt-3 text-sm bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded-lg transition"
    >
        Reply
    </button>
@endif
            @if ($review->reply)
             <div class="mt-4 p-4 bg-blue-100 rounded-lg">
              <p class="text-blue-800 font-medium">Reply:</p>
              <p class="text-blue-600">{{ $review->reply }}</p>
             </div>
            @endif
           </div>
          </div>
         </div>
        @endforeach
       </div>
      </div>
     </div>

<div id="replyModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
    
    <div class="bg-white w-full max-w-md rounded-xl p-6">
        <h2 class="text-lg font-bold mb-4">Write Reply</h2>

        <form id="replyForm" method="POST">
            @csrf

            <textarea 
                name="reply"
                class="w-full border rounded-lg p-3"
                rows="4"
                placeholder="Write your reply..."
                required
            ></textarea>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeReplyModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let currentReviewId = null;

function openReplyModal(reviewId) {
    currentReviewId = reviewId;

    const form = document.getElementById('replyForm');
    form.action = `/restaurant/reviews/${reviewId}/reply`;

    document.getElementById('replyModal').classList.remove('hidden');
}

function closeReplyModal() {
    document.getElementById('replyModal').classList.add('hidden');
}
</script>