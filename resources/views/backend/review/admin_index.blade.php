@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class="mdi mdi-star text-warning"></i> Customer Feedback List</h4>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allReviews as $review)
                                    <tr>
                                        <td class="font-weight-bold">#{{ $review->order_id }}</td>
                                        <td>{{ $review->user->name }}</td>
                                        <td>
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="mdi mdi-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </td>
                                        <td class="text-muted italic">"{{ $review->comment ?? 'No comment provided' }}"</td>
                                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.review.delete', $review->id) }}" 
                                               class="btn btn-sm btn-danger" 
                                               onclick="return confirm('Are you sure you want to delete this review?')">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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