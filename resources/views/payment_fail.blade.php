@extends('backend.admin_dashboard') 
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="mdi mdi-close-circle-outline text-danger" style="font-size: 80px;"></i>
                        </div>
                        
                        <h2 class="card-title font-weight-bold text-dark">Payment Failed!</h2>
                        <h4 class="text-muted mb-4">Something went wrong during the transaction.</h4>
                        
                        <div class="p-3 mb-4 border rounded bg-light shadow-sm d-inline-block" style="min-width: 300px;">
                            <p class="mb-0 text-danger font-weight-bold">
                                <i class="mdi mdi-alert"></i> Your payment was not processed.
                            </p>
                        </div>

                        <div class="mt-2">
                            <p class="text-secondary">Please check your internet connection or card details and try again.</p>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('/menu') }}" class="btn btn-danger px-4 shadow-sm mr-2">
                                <i class="mdi mdi-refresh"></i> Try Again
                            </a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                                <i class="mdi mdi-headset"></i> Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection