@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card mt-4 shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title mb-4"><i class="mdi mdi-information"></i> Order Details - #{{ $order->id }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-light">
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
                                    @if($item->foodItem)
                                        <img src="{{ asset($item->foodItem->image) }}" width="50" class="rounded shadow-sm">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    {{ $item->foodItem->item_name ?? 'Product Not Found' }}
                                </td>
                                <td class="align-middle">৳{{ number_format($item->price, 2) }}</td>
                                <td class="align-middle">{{ $item->quantity }}</td>
                                <td class="align-middle font-weight-bold">
                                    ৳{{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right mt-3">
                    <h4>Grand Total: <span class="text-primary">৳{{ number_format($order->total_amount, 2) }}</span></h4>
                    <a href="{{ route('customer.orders') }}" class="btn btn-secondary mt-2">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection