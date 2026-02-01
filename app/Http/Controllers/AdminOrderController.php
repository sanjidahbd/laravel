<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Shob order-er list dekhabe
     */
    public function allOrders() 
    {
        // User relation-sho shob order load kora holo
        $orders = Order::with('user')->latest()->get();
        return view('backend.admin.orders.index', compact('orders'));
    }

    /**
     * Order status (Pending, Cooking, Served, Cancel) update korar jonno
     */
    public function updateStatus(Request $request, $id) 
    {
        $request->validate([
            'status' => 'required|in:pending,cooking,served,cancel'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated to ' . ucfirst($request->status));
    }

    /**
     * Payment status (Paid/Unpaid) toggle korar jonno
     * Note: Ekhane Request $request dorkar karon Blade-e Form bebohar kora hoyeche
     */
    public function updatePaymentStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        // Toggle logic: paid thakle unpaid hobe, ar unpaid thakle paid hobe
        $order->payment_status = ($order->payment_status == 'paid') ? 'unpaid' : 'paid';
        $order->save();

        return redirect()->back()->with('success', 'Payment status updated!');
    }

    /**
     * Order-er details (items sho) dekhabe
     */
    public function viewOrder($id)
    {
        // 'orderItems' load kora thakle details page-e khabarer list dekha jabe
        $order = Order::with(['user', 'orderItems.foodItem'])->findOrFail($id);
        return view('backend.admin.orders.details', compact('order'));
    }
}