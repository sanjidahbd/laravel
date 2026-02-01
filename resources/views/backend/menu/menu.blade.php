@extends('backend.admin_dashboard') 

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 mt-4">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4 class="card-title"><i class="mdi mdi-silverware"></i> Select Your Food & Order</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Food Name</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fooditems as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" style="width: 60px; height: 50px; object-fit: cover;" class="rounded border shadow-sm">
                                        </td>
                                        <td class="font-weight-bold text-dark">{{ $item->item_name }}</td>
                                        <td class="text-success font-weight-bold">৳{{ number_format($item->price, 2) }}</td>
                                        <td>
                                            @if($item->quantity > 0)
                                                <span class="badge badge-success px-2">{{ $item->quantity }} Pcs</span>
                                            @else
                                                <span class="badge badge-danger px-2">Out of Stock</span>
                                            @endif
                                        </td>
                                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                            @csrf
                                            <td>
                                                <input type="number" name="quantity" value="1" min="1" max="{{ $item->quantity }}" class="form-control mx-auto shadow-sm" style="width: 80px;" {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                                            </td>
                                            <td>
                                                @if($item->quantity > 0)
                                                    <button type="submit" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                        <i class="ti-shopping-cart"></i> Add to Cart
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-secondary btn-sm px-3 shadow-sm" disabled>Unavailable</button>
                                                @endif
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Final Checkout Section --}}
                        <div class="card mt-4 shadow-sm">
                            <div class="card-body py-4 bg-light text-right border rounded">
                                @php 
                                    $total = 0;
                                    $cart = session('cart', []); 
                                @endphp
                                
                                @if(count($cart) > 0)
                                    @foreach($cart as $id => $details)
                                        {{-- Sothik vabe price o quantity gun kora --}}
                                        @php $total += (float)$details['price'] * (int)$details['quantity']; @endphp
                                    @endforeach

                                    <h3 class="mb-3 text-dark font-medium">
                                        Total Payable: <span class="text-primary font-bold" id="grandTotal">৳{{ number_format($total, 2) }}</span>
                                    </h3>
                                    
                                    <hr>
                                    <form id="orderForm" action="{{ route('pay') }}" method="POST" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="amount" value="{{ $total }}">

                                        <div class="d-inline-block text-left p-3 mb-3 border rounded bg-white shadow-sm" style="min-width: 350px;">
                                            <h5 class="font-weight-bold border-bottom pb-2 mb-3"><i class="ti-wallet"></i> Payment Method</h5>
                                            
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" id="ssl" name="payment_method" value="online" class="custom-control-input" checked onchange="togglePaymentMethod()">
                                                <label class="custom-control-label font-weight-bold text-primary" for="ssl">Pay Online (SSLCommerz)</label>
                                            </div>

                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" id="cod" name="payment_method" value="cod" class="custom-control-input" onchange="togglePaymentMethod()">
                                                <label class="custom-control-label font-weight-bold" for="cod">Cash on Delivery (COD)</label>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <button type="submit" id="submitBtn" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold mt-2">
                                            <i class="ti-check"></i> <span id="btnText">Pay with SSLCommerz</span>
                                        </button>
                                    </form>
                                @else
                                    <div class="text-center py-3">
                                        <p class="text-muted mb-0"><i class="mdi mdi-cart-outline"></i> Your cart is empty.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePaymentMethod() {
        var isOnline = document.getElementById('ssl').checked;
        var form = document.getElementById('orderForm');
        var btnText = document.getElementById('btnText');

        if (isOnline) {
            form.action = "{{ route('pay') }}";
            btnText.innerText = "Pay with SSLCommerz";
        } else {
            form.action = "{{ route('order.place') }}";
            btnText.innerText = "Place Order Now";
        }
    }
    window.onload = togglePaymentMethod;
</script>
@endsection