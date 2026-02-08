@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 text-primary"><i class="mdi mdi-star"></i> Review Order #{{ $order->id }}</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">

                            <div class="form-group mb-4 text-center">
                                <label class="h5 d-block mb-3">How was your experience?</label>
                                <select name="rating" class="form-control form-control-lg text-center mx-auto" style="max-width: 300px; border-radius: 10px;" required>
                                    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                                    <option value="4">⭐⭐⭐⭐ Very Good</option>
                                    <option value="3">⭐⭐⭐ Good</option>
                                    <option value="2">⭐⭐ Average</option>
                                    <option value="1">⭐ Poor</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Share your thoughts (Optional)</label>
                                <textarea name="comment" class="form-control" rows="5" style="border-radius: 10px;" placeholder="Tell us about the food quality and service..."></textarea>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <a href="{{ route('customer.orders') }}" class="btn btn-light px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary px-5 shadow">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection