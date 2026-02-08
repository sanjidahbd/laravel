
@extends('backend.admin_dashboard') 

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card mt-4 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-information text-primary"></i> Order Details - #{{ $order->id }}
                    </h4>
                    {{-- Order Status Badge with Dynamic Color --}}
                    @php 
                        $status = strtolower($order->status); 
                        $badgeClass = 'primary';
                        if($status == 'pending') $badgeClass = 'warning';
                        elseif($status == 'processing' || $status == 'cooking') $badgeClass = 'info';
                        elseif($status == 'served' || $status == 'completed') $badgeClass = 'success';
                    @endphp
                    <span class="badge badge-pill badge-{{ $badgeClass }} px-3 py-2 text-uppercase">{{ $order->status }}</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="bg-light text-dark">
                            <tr>
                                <th>Food Image</th>
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
                                    @if($item->foodItem && $item->foodItem->image)
                                        <img src="{{ asset($item->foodItem->image) }}" width="50" height="50" class="rounded shadow-sm" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-inline-block p-2 text-muted small">No Image</div>
                                    @endif
                                </td>
                                <td class="align-middle text-dark font-weight-medium">
                                    {{ $item->foodItem->item_name ?? 'Product Not Found' }}
                                </td>
                                <td class="align-middle">৳{{ number_format($item->price, 2) }}</td>
                                <td class="align-middle text-info font-weight-bold">{{ $item->quantity }}</td>
                                <td class="align-middle font-weight-bold text-dark">
                                    ৳{{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Payment & Summary Section --}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="border p-3 rounded bg-light">
                            <h5 class="border-bottom pb-2 mb-3"><i class="ti-wallet text-info"></i> Payment Information</h5>
                            <p class="mb-1 text-dark"><strong>Method:</strong> <span class="text-uppercase">{{ $order->payment_method ?? 'Online Payment' }}</span></p>
                            
                            {{-- Case Insensitive Payment Status Check --}}
                            <p class="mb-1 text-dark"><strong>Payment Status:</strong> 
                                @if(strtolower($order->payment_status) == 'paid')
                                    <span class="badge badge-success ml-1 px-2">PAID</span>
                                @else
                                    <span class="badge badge-danger ml-1 px-2">UNPAID</span>
                                @endif
                            </p>

                            @if($order->transaction_id)
                                <p class="mb-0 text-dark"><strong>Transaction ID:</strong> <span class="text-primary font-weight-bold">{{ $order->transaction_id }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pr-3">
                            <h3 class="mb-1">Grand Total: <span class="text-primary">৳{{ number_format($order->total_amount, 2) }}</span></h3>
                            <p class="text-muted">Ordered on: {{ $order->created_at->format('d M, Y | h:i A') }}</p>
                            <a href="{{ route('customer.orders') }}" class="btn btn-secondary shadow-sm mt-2">
                                <i class="ti-arrow-left"></i> Back to History
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection