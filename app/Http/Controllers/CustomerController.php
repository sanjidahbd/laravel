<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Order;       
use App\Models\OrderItem;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * 1. View Menu: Khabarer list dekhano
     */
    public function index()
    {
        $fooditems = FoodItem::with(['category', 'subcategory'])->get();
        return view('backend.menu.menu', compact('fooditems'));
    }

    /**
     * 2. Add to Cart: Session-e khabar joma kora (Fixed Logic)
     */
    public function addToCart(Request $request, $id)
    {
        $food = FoodItem::findOrFail($id);
        $cart = session()->get('cart', []);

        // Logic fix: Proti bar add korle quantity double hobe na, 
        // borong user input field-e ja dibe tai set hobe.
        $cart[$id] = [
            "name"     => $food->item_name,
            "quantity" => (int)$request->quantity, // Overwrite quantity
            "price"    => (float)$food->price,
            "image"    => $food->image
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food added to cart successfully!');
    }

    /**
     * 3. Place Order: Order confirm kora
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'transaction_id' => 'required_if:payment_method,bkash',
        ]);

        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        DB::beginTransaction();

        try {
            $order = new Order();
            $order->user_id = Auth::id();
            
            $total = 0;
            foreach($cart as $item) {
                $total += (float)$item['price'] * (int)$item['quantity'];
            }
            
            $order->total_amount   = $total;
            $order->status         = 'pending';
            $order->payment_method = $request->payment_method; 
            $order->transaction_id = $request->transaction_id; 
            $order->payment_status = 'unpaid';
            $order->save();

            foreach($cart as $id => $details) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'food_item_id' => $id,
                    'quantity'     => $details['quantity'],
                    'price'        => $details['price'],
                ]);

                // Stock update
                $food = FoodItem::find($id);
                if($food) {
                    $food->decrement('quantity', $details['quantity']); 
                }
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('customer.orders')->with('success', 'Order placed successfully! Order ID: #' . $order->id);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * 4. My Orders: Customer history
     */
    public function myOrders()
    {
        // User login thaka badhyotamulok
    if (!Auth::check()) {
        return redirect()->route('login');
    }
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('backend.orders.my_orders', compact('orders'));
    }

    /**
     * 5. Order Details
     */
    public function orderDetails($id)
    {
        $order = Order::with('orderItems.foodItem')
                      ->where('user_id', Auth::id())
                      ->findOrFail($id);
                      
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