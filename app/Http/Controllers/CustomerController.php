<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Order;       
use App\Models\OrderItem;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * 1. View Menu
     */
    public function index()
    {
        $fooditems = FoodItem::with(['category', 'subcategory'])->get();
        return view('backend.menu.menu', compact('fooditems'));
    }

    /**
     * 2. Add to Cart
     */
    public function addToCart(Request $request, $id)
    {
        $food = FoodItem::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                "name" => $food->item_name,
                "quantity" => $request->quantity,
                "price" => $food->price,
                "image" => $food->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food added to cart successfully!');
    }

    /**
     * 3. Place Order (With Stock Update)
     */
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        $order = new Order();
        $order->user_id = Auth::id();
        
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $order->total_amount = $total;
        $order->status = 'pending';
        $order->save();

        foreach($cart as $id => $details) {
            // ১. অর্ডার আইটেম টেবিল এ ডাটা সেভ
            OrderItem::create([
                'order_id'     => $order->id,
                'food_item_id' => $id,
                'quantity'     => $details['quantity'],
                'price'        => $details['price'],
            ]);

            // ২. ফুড আইটেম টেবিল থেকে স্টক কমিয়ে দেওয়া
            $food = FoodItem::find($id);
            if($food) {
                // decrement ফাংশনটি স্বয়ংক্রিয়ভাবে স্টক বিয়োগ করে সেভ করে দেয়
                $food->decrement('quantity', $details['quantity']); 
            }
        }

        session()->forget('cart');

        return redirect()->back()->with('success', 'Order placed successfully! Order ID: #' . $order->id);
    }

    /**
     * 4. My Orders
     */
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('backend.orders.my_orders', compact('orders'));
    }

    /**
     * 5. Order Details (FIXED RELATION)
     */
    public function orderDetails($id)
    {
        $order = Order::with('orderItems.foodItem')->where('user_id', Auth::id())->findOrFail($id);
        return view('backend.orders.order_details', compact('order'));
    }

    /**
     * 6. Clear Cart
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }
}