<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    
    public function allOrders() 
    {
        
        $orders = Order::with('user')->latest()->get();

        return view('backend.admin.orders.index', compact('orders'));
    }

    
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


    public function viewOrder($id)
    {
        $order = Order::with(['user', 'orderItems'])->findOrFail($id);
        return view('backend.admin.orders.details', compact('order'));
    }
}