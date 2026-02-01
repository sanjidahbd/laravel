<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        /* PDF compatible CSS */
        body {
            font-family: 'DejaVu Sans', sans-serif; /* Currency symbol ৳ er jonno eti bhalo */
            color: #3e5569; /* Apnar dashboard er text color */
            font-size: 13px;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 30px;
        }
        .header {
            border-bottom: 3px solid #7460ee; /* Primary Blue color from dashboard */
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .header table {
            width: 100%;
        }
        .brand-name {
            font-size: 24px;
            font-weight: bold;
            color: #7460ee;
        }
        .invoice-title {
            font-size: 20px;
            text-align: right;
            text-transform: uppercase;
        }
        .info-section {
            width: 100%;
            margin-bottom: 30px;
        }
        .info-section td {
            vertical-align: top;
            width: 50%;
        }
        .section-label {
            font-weight: bold;
            color: #3e5569;
            text-transform: uppercase;
            font-size: 11px;
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
            display: block;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th {
            background-color: #f8f9fa; /* Light header like your dashboard */
            border: 1px solid #e9ecef;
            padding: 12px;
            font-weight: bold;
            text-align: center;
        }
        .table td {
            border: 1px solid #e9ecef;
            padding: 10px;
            text-align: center;
        }
        .text-right {
            text-align: right !important;
        }
        .total-box {
            margin-top: 20px;
            float: right;
            width: 40%;
        }
        .total-box table {
            width: 100%;
        }
        .grand-total {
            font-size: 18px;
            font-weight: bold;
            color: #7460ee;
        }
        .badge {
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            color: #fff;
        }
        .footer {
            margin-top: 100px;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 10px;
            font-size: 11px;
            color: #a1aab2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <table>
                <tr>
                    <td>
                        <div class="brand-name">LARAVEL RMS</div>
                        <p style="margin:0">Quality Food, Delivered Fast</p>
                    </td>
                    <td class="invoice-title">
                        Invoice #{{ $order->id }}<br>
                        <small style="font-size: 12px; color: #777;">Date: {{ $order->created_at->format('d M, Y') }}</small>
                    </td>
                </tr>
            </table>
        </div>

        <table class="info-section">
            <tr>
                <td>
                    <span class="section-label">Billed To:</span>
                    <strong>{{ $order->user->name ?? 'Customer' }}</strong><br>
                    Email: {{ $order->user->email ?? 'N/A' }}<br>
                    Status: <span style="color: {{ $order->status == 'pending' ? '#ffa117' : '#28a745' }}">{{ ucfirst($order->status) }}</span>
                </td>
                <td class="text-right">
                    <span class="section-label">Payment Information:</span>
                    Method: <strong>{{ strtoupper($order->payment_method ?? 'Cash') }}</strong><br>
                    Payment Status: <strong>{{ strtoupper($order->payment_status ?? 'Unpaid') }}</strong><br>
                    @if($order->transaction_id)
                        Trx ID: <span style="font-family: monospace;">{{ $order->transaction_id }}</span>
                    @endif
                </td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: left;">Food Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td style="text-align: left;">{{ $item->foodItem->item_name ?? 'N/A' }}</td>
                    <td>৳{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">৳{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-box">
            <table>
                <tr>
                    <td class="text-right" style="padding: 10px;">Grand Total:</td>
                    <td class="text-right grand-total" style="padding: 10px;">৳{{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </table>
        </div>

        <div style="clear: both;"></div>

        <div class="footer">
            <p>This is a computer-generated invoice. No signature required.</p>
            <p>Thank you for choosing Laravel RMS!</p>
        </div>
    </div>
</body>
</html>