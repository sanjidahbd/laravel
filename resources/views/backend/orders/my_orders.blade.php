@extends('backend.admin_dashboard') 

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                {{-- Success or Error Messages --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0"><i class="mdi mdi-history text-primary"></i> My Order History</h4>
                            <a href="{{ route('customer.menu') }}" class="btn btn-primary btn-sm shadow-sm"><i class="ti-plus"></i> New Order</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Payment Details</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    @php $status = strtolower($order->status); @endphp
                                    <tr>
                                        <td class="font-weight-bold text-dark">#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M, Y | h:i A') }}</td>
                                        <td class="font-weight-bold text-success">৳{{ number_format($order->total_amount, 2) }}</td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <span class="text-uppercase small font-weight-bold text-muted mb-1">{{ $order->payment_method ?? 'ONLINE' }}</span>
                                                @if(strtolower($order->payment_status) == 'paid')
                                                    <span class="badge badge-pill badge-success" style="font-size: 10px; padding: 5px 10px;"><i class="mdi mdi-check"></i> PAID</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger" style="font-size: 10px; padding: 5px 10px;"><i class="mdi mdi-alert-circle"></i> UNPAID</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($status == 'pending') 
                                                <span class="badge badge-warning text-dark px-3 py-2">Pending</span>
                                            @elseif($status == 'served' || $status == 'completed') 
                                                <span class="badge badge-success px-3 py-2">Served</span>
                                            @else 
                                                <span class="badge badge-info px-3 py-2 text-capitalize">{{ $order->status }}</span> 
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                {{-- Action: Details Button --}}
                                                <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-info px-3 shadow-sm mb-1 text-white">
                                                    <i class="ti-eye"></i> Details
                                                </a>
                                                
                                                {{-- Review Button Logic: Linked to separate page based on your web.php --}}
                                                @if($order->review)
                                                    <span class="text-success small mt-1"><i class="fa fa-check-circle"></i> Reviewed ✅</span>
                                                @else
                                                    {{-- এখানে আপনার web.php এর 'order.review.create' রাউটটি ব্যবহার করা হয়েছে --}}
                                                    <a href="{{ route('order.review.create', $order->id) }}" class="btn btn-sm btn-primary px-3 shadow-sm">
                                                        <i class="ti-star"></i> Review
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="py-5 text-muted">No orders found in your history!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection