@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card mt-4 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-cart-outline text-primary"></i> Manage Customer Orders
                    </h4>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="bg-light text-dark font-weight-bold">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total Bill</th>
                                <th>Payment</th> <th>Payment Status</th> <th>Current Status</th>
                                <th>Change Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td><span class="font-weight-bold">#{{ $order->id }}</span></td>
                                <td>{{ $order->user->name ?? 'Unknown' }}</td>
                                <td class="text-dark font-weight-bold text-nowrap">
                                    ৳{{ number_format($order->total_amount, 2) }}
                                </td>

                                {{-- ১. Payment Method (COD/Online) --}}
                                <td>
                                    <span class="text-uppercase font-weight-bold small">
                                        {{ $order->payment_method ?? 'COD' }}
                                    </span>
                                </td>

                                {{-- ২. Payment Status (Paid/Unpaid Button) --}}
                                <td>
                                    <form action="{{ route('admin.order.payment_update', $order->id) }}" method="POST">
                                        @csrf
                                        @if($order->payment_status == 'paid')
                                            <button type="submit" class="btn btn-xs badge badge-success border-0">PAID</button>
                                        @else
                                            <button type="submit" class="btn btn-xs badge badge-danger border-0">UNPAID</button>
                                        @endif
                                    </form>
                                </td>

                                <td>
                                    @php
                                        $badge = [
                                            'pending' => 'badge-warning text-dark',
                                            'cooking' => 'badge-info',
                                            'served'  => 'badge-success',
                                            'cancel'  => 'badge-danger'
                                        ][$order->status] ?? 'badge-secondary';
                                    @endphp
                                    <span class="badge badge-pill {{ $badge }} px-3 py-2 text-uppercase" style="font-size: 11px;">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td style="width: 150px;">
                                    <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="form-control form-control-sm border-primary">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="cooking" {{ $order->status == 'cooking' ? 'selected' : '' }}>Cooking</option>
                                            <option value="served" {{ $order->status == 'served' ? 'selected' : '' }}>Served</option>
                                            <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                        </select>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ route('admin.order.view', $order->id) }}" class="btn btn-sm btn-primary shadow-sm" title="View Details">
                                        <i class="fa fa-eye"></i> Details
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($orders->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted">No orders found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection