<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SslCommerzPaymentController extends Controller
{
    public function index(Request $request)
    {
        $tran_id = "SSLC_" . uniqid();

        // Orders table-e data insert
        DB::table('orders')->insert([
            'user_id' => auth()->id() ?? 1,
            'total_amount' => $request->amount, 
            'payment_method' => 'ONLINE',
            'status' => 'Pending',
            'payment_status' => 'UNPAID', 
            'transaction_id' => $tran_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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
        $post_data['cus_name'] = auth()->user()->name ?? 'Customer';
        $post_data['cus_email'] = auth()->user()->email ?? 'customer@mail.com';
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
        
        // Localhost SSL bypass
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);

        $content = curl_exec($handle);
        $sslcommerzResponse = json_decode($content, true);
        curl_close($handle);

        if (isset($sslcommerzResponse['status']) && $sslcommerzResponse['status'] == 'SUCCESS') {
            Session::forget('cart');
            return redirect()->away($sslcommerzResponse['GatewayPageURL']);
        } else {
            return "API Error: " . ($sslcommerzResponse['failedreason'] ?? 'Check Internet'); 
        }
    }

// Success Function
    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        
        // 1. Database update kora
        DB::table('orders')->where('transaction_id', $tran_id)->update([
            'payment_status' => 'paid', 
            'status' => 'Pending' // Order place hole prothome Pending thaka bhalo
        ]);

        // 2. Database theke user_id ber kora jate login nishchit kora jay
        $order = DB::table('orders')->where('transaction_id', $tran_id)->first();

        if ($order) {
            // Jodi SSLCommerz redirect-er somoy session logout hoye jay, tobe auto-login
            if (!auth()->check()) {
                auth()->loginUsingId($order->user_id);
            }

            // 3. Sorasori My Orders page-e redirect kora (Kono view charai)
            return redirect()->route('customer.orders')->with('success', 'Payment Successful! Your order ID: #' . $order->id);
        }

        return redirect()->route('customer.menu')->with('error', 'Order not found.');
    }
    // Fail Function
    public function fail(Request $request)
    {
        return view('payment_fail');
    }

    // Cancel Function
    public function cancel(Request $request)
    {
        return view('payment_fail');
    }
}