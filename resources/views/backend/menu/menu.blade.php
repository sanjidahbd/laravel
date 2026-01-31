
@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 mt-4">
                
                {{-- Success & Error Messages --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3">
                        <strong>Error!</strong> {{ session('error') }}
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
                                        <th>Stock</th> {{-- নতুন কলাম --}}
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
                                        <td class="font-weight-bold">{{ $item->item_name }}</td>
                                        <td class="text-success font-weight-bold">৳{{ number_format($item->price, 2) }}</td>
                                        
                                        {{-- ধাপে ধাপে পরিবর্তন: ১. স্টক স্ট্যাটাস --}}
                                        <td>
                                            @if($item->quantity > 0)
                                                <span class="badge badge-success">{{ $item->quantity }} Pcs</span>
                                            @else
                                                <span class="badge badge-danger">Out of Stock</span>
                                            @endif
                                        </td>

                                        {{-- Add to Cart Form শুরু --}}
                                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                            @csrf
                                            <td>
                                                {{-- ধাপে ধাপে পরিবর্তন: ২. ইনপুট লিমিট করা --}}
                                                <input type="number" name="quantity" value="1" min="1" max="{{ $item->quantity }}" class="form-control mx-auto shadow-sm" style="width: 80px;" {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                                            </td>
                                            <td>
                                                {{-- ধাপে ধাপে পরিবর্তন: ৩. স্টক না থাকলে বাটন ডিজেবল --}}
                                                @if($item->quantity > 0)
                                                    <button type="submit" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                        <i class="ti-shopping-cart"></i> Add to Cart
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-secondary btn-sm px-3 shadow-sm" disabled>
                                                        Unavailable
                                                    </button>
                                                @endif
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Total Payable Section --}}
                        <div class="card mt-3">
                            <div class="card-body py-3 bg-light text-right border rounded">
                                @php $total = 0; @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                @endif
                                
                                <h4 class="mb-0 text-dark font-medium">
                                    Total Payable: <span class="text-primary font-bold">৳{{ number_format($total, 2) }}</span>
                                </h4>
                                
                                @if($total > 0)
                                    <form action="{{ route('order.place') }}" method="POST" class="mt-3">
                                        @csrf
                                        <button type="submit" class="btn btn-success shadow-sm px-4 font-weight-bold">
                                            <i class="ti-check"></i> Place Order Now
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection