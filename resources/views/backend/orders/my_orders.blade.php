@extends('backend.admin_dashboard') 

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                
                {{-- Success/Error Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">
                                <i class="mdi mdi-history text-primary"></i> My Order History
                            </h4>
                            <a href="{{ route('customer.menu') }}" class="btn btn-primary btn-sm shadow-sm">
                                <i class="ti-plus"></i> New Order
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td class="font-weight-bold text-dark">#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M, Y | h:i A') }}</td>
                                        <td class="font-weight-bold text-success">
                                            ৳{{ number_format($order->total_amount, 2) }}
                                        </td>
                                        <td>
                                            @if($order->status == 'pending')
                                                <span class="badge badge-warning text-dark px-3 py-2">Pending</span>
                                            @elseif($order->status == 'cooking')
                                                <span class="badge badge-info px-3 py-2">Cooking</span>
                                            @elseif($order->status == 'served')
                                                <span class="badge badge-success px-3 py-2">Served</span>
                                            @else
                                                <span class="badge badge-danger px-3 py-2 text-capitalize">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Details Button --}}
                                            <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-info px-3 shadow-sm">
                                                <i class="ti-eye"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-5">
                                            <div class="text-center text-muted">
                                                <i class="mdi mdi-basket-badge mdi-48px"></i>
                                                <p class="mt-2">You haven't placed any orders yet!</p>
                                                <a href="{{ route('customer.menu') }}" class="btn btn-outline-primary btn-sm">Order Now</a>
                                            </div>
                                        </td>
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