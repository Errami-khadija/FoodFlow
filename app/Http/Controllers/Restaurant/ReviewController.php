<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
      public function index()
    {
        $restaurantId = Auth::user()->restaurant->id;

        //  Average rating
        $averageRating = round(
            Review::where('restaurant_id', $restaurantId)->avg('rating'),
            1
        );

        //  Total reviews
        $totalReviews = Review::where('restaurant_id', $restaurantId)->count();

        //  Pending replies
        $pendingReplies = Review::where('restaurant_id', $restaurantId)
            ->whereNull('reply')
            ->count();

        // Latest reviews
        $reviews = Review::where('restaurant_id', $restaurantId)
            ->latest()
            ->get();

        return view('restaurant_interface.index', [
            'section' => 'restaurant_interface.sections.reviews.index',
            'averageRating' => $averageRating ?? 0,
            'totalReviews' => $totalReviews,
            'pendingReplies' => $pendingReplies,
            'reviews' => $reviews
        ]);
    }

    /**
     * Reply to a review (restaurant owner)
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:500'
        ]);

        $restaurantId = Auth::user()->restaurant->id;

        $review = Review::where('restaurant_id', $restaurantId)
            ->where('id', $id)
            ->firstOrFail();

        $review->reply = $request->reply;
        $review->save();

        return redirect()->back()->with('success', 'Reply added successfully!');
    }
}
