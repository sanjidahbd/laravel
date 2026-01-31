@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row no-print mt-3">
            <div class="col-12 text-right">
                <button onclick="window.print()" class="btn btn-danger"><i class="fa fa-print"></i> Print Invoice</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-2 shadow-sm border-0">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Order Details: #{{ $order->id }}</h4>
                        <a href="{{ route('admin.orders.all') }}" class="btn btn-sm btn-dark no-print">Back to List</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Customer Information</h5>
                                <p class="mb-1"><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                                <p class="mb-1"><strong>Status:</strong> 
                                    <span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <h5 class="font-weight-bold">Order Summary</h5>
                                <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                                <p class="mb-1"><strong>Total Amount:</strong> ৳{{ number_format($order->total_amount, 2) }}</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Food Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
<tr>
    <td>
        <img src="{{ asset($item->foodItem->image ?? 'uploads/no-image.png') }}" width="60" class="rounded shadow-sm">
    </td>
    <td>
        {{ $item->foodItem->item_name ?? 'Product Not Found' }}
    </td>
    <td>৳{{ number_format($item->price, 2) }}</td>
    <td>{{ $item->quantity }}</td>
    <td class="font-weight-bold">
        ৳{{ number_format($item->price * $item->quantity, 2) }}
    </td>
</tr>
@endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right font-weight-bold text-dark">Grand Total:</th>
                                        <th class="text-primary font-weight-bold" style="font-size: 1.2rem;">৳{{ number_format($order->total_amount, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .no-print, .left-sidebar, .header, .footer {
        display: none !important;
    }
    .page-wrapper {
        margin-left: 0 !important;
        padding-top: 0 !important;
    }
}
</style>
@endsection