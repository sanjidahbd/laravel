@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="mdi mdi-check-circle-outline text-success" style="font-size: 80px;"></i>
                        </div>
                        
                        <h2 class="card-title font-weight-bold text-dark">Congratulations!</h2>
                        <h4 class="text-muted mb-4">Your order has been placed successfully.</h4>
                        
                        <div class="alert alert-light border rounded p-3 mb-4 d-inline-block shadow-sm" style="min-width: 300px;">
                            <p class="mb-1 text-muted">Transaction ID</p>
                            <h5 class="font-weight-bold text-primary mb-0">{{ $tran_id }}</h5>
                        </div>

                        <div class="mt-2">
                            <p class="text-secondary">We are processing your food items. You can check the status in your order history.</p>
                        </div>

                        <hr class="my-4">

                      <div class="d-flex justify-content-center gap-2">
    <a href="{{route('customer.orders') }}" class="btn btn-primary px-4 shadow-sm mr-2">
        <i class="mdi mdi-view-list"></i> My Orders
    </a>
    <a href="{{ url('/menu/menu') }}" class="btn btn-outline-secondary px-4 shadow-sm">
        <i class="mdi mdi-silverware"></i> Order More
    </a>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection