<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{
    public function index(Request $request)
    {
      
        $cart = Session::get('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $tran_id = "SSLC_" . uniqid();

      
        DB::beginTransaction();

        try {
            
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => Auth::id() ?? 1,
                'total_amount' => $request->amount, 
                'payment_method' => 'ONLINE',
                'status' => 'Pending',
                'payment_status' => 'UNPAID', 
                'transaction_id' => $tran_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

          
            foreach ($cart as $food_id => $details) {
                DB::table('order_items')->insert([
                    'order_id'     => $orderId,
                    'food_item_id' => $food_id,
                    'quantity'     => $details['quantity'],
                    'price'        => $details['price'],
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to initialize order: ' . $e->getMessage());
        }

        
        $post_data = array();
        $post_data['store_id'] = "schoo694f54f91cb2c"; 
        $post_data['store_passwd'] = "schoo694f54f91cb2c@ssl";
        $post_data['total_amount'] = $request->amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $tran_id;

        // Redirect URLs
        $post_data['success_url'] = url('/success');
        $post_data['fail_url'] = url('/fail');
        $post_data['cancel_url'] = url('/cancel');
        $post_data['ipn_url'] = url('/ipn');

        // Customer Mandatory Info
        $post_data['cus_name'] = Auth::user()->name ?? 'Customer';
        $post_data['cus_email'] = Auth::user()->email ?? 'customer@mail.com';
        $post_data['cus_add1'] = 'Dhaka';
        $post_data['cus_city'] = 'Dhaka';
        $post_data['cus_country'] = 'Bangladesh';
        $post_data['cus_phone'] = '01700000000'; 
        $post_data['shipping_method'] = 'NO';
        $post_data['product_name'] = 'Food Items';
        $post_data['product_category'] = 'Food';
        $post_data['product_profile'] = 'general';

        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);

        $content = curl_exec($handle);
        $sslcommerzResponse = json_decode($content, true);
        curl_close($handle);

        if (isset($sslcommerzResponse['status']) && $sslcommerzResponse['status'] == 'SUCCESS') {
           
            return redirect()->away($sslcommerzResponse['GatewayPageURL']);
        } else {
            return "API Error: " . ($sslcommerzResponse['failedreason'] ?? 'Check Internet'); 
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        
       
        DB::table('orders')->where('transaction_id', $tran_id)->update([
            'payment_status' => 'paid', 
            'status' => 'Pending' 
        ]);

        $order = DB::table('orders')->where('transaction_id', $tran_id)->first();

        if ($order) {
           
            Session::forget('cart');

            if (!Auth::check()) {
                Auth::loginUsingId($order->user_id);
            }

            return redirect()->route('customer.orders')->with('success', 'Payment Successful!');
        }

        return redirect()->route('customer.menu')->with('error', 'Order record not found.');
    }

    public function fail(Request $request)
    {
        
        $tran_id = $request->input('tran_id');
        if($tran_id) {
            $order = DB::table('orders')->where('transaction_id', $tran_id)->first();
            if($order) {
                DB::table('order_items')->where('order_id', $order->id)->delete();
                DB::table('orders')->where('id', $order->id)->delete();
            }
        }
        return redirect()->route('customer.menu')->with('error', 'Payment Failed. Items are still in your cart.');
    }

    public function cancel(Request $request)
    {
      
        $tran_id = $request->input('tran_id');
        if($tran_id) {
            $order = DB::table('orders')->where('transaction_id', $tran_id)->first();
            if($order) {
                DB::table('order_items')->where('order_id', $order->id)->delete();
                DB::table('orders')->where('id', $order->id)->delete();
            }
        }
        return redirect()->route('customer.menu')->with('error', 'Payment Cancelled.');
    }
}