<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new review.
     */
    public function create($id)
    {
    
        $order = Order::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();
        
        
        if ($order->review) {
            return redirect()->route('customer.orders')->with('error', 'You have already reviewed this order.');
        }

        return view('backend.review.review_page', compact('order'));
    }

    /**
     * Store a newly created review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating'   => 'required|integer|min:1|max:5',
            'comment'  => 'nullable|string|max:500',
        ]);

    
        $exists = Review::where('order_id', $request->order_id)
                        ->where('user_id', Auth::id())
                        ->exists();

        if ($exists) {
            return redirect()->route('customer.orders')->with('error', 'Duplicate review attempt blocked!');
        }

    
        Review::create([
            'user_id'  => Auth::id(),
            'order_id' => $request->order_id,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
        ]);

        return redirect()->route('customer.orders')->with('success', 'Thank you for your valuable feedback!');
    }

    /**
     * Display listing for admin - Fixing double display issue
     */
    public function adminReviews()
    {
    
        $allReviews = Review::with(['user', 'order'])->latest()->get();
        
        
        return view('backend.review.admin_index', compact('allReviews'));
    }

    /**
     * Delete review
     */
    public function deleteReview($id)
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
            return redirect()->back()->with('success', 'Review deleted successfully!');
        }

        return redirect()->back()->with('error', 'Review not found!');
    }
}