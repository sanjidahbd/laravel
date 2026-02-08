@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4">
                            <i class="mdi mdi-star text-warning"></i> Customer Reviews Management
                        </h4>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center align-middle">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>#SL</th>
                                        <th>Customer</th>
                                        <th>Food Item</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reviews as $key => $review)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="font-weight-bold text-dark">{{ $review->user->name ?? 'Guest' }}</td>
                                        <td>{{ $review->foodItem->item_name ?? 'N/A' }}</td>
                                        <td>
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="mdi mdi-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                            <span class="badge badge-light ml-1">{{ $review->rating }}/5</span>
                                        </td>
                                        <td class="text-muted small" style="max-width: 200px;">
                                            {{ Str::limit($review->comment, 50) ?? 'No comment' }}
                                        </td>
                                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.review.delete', $review->id) }}" 
                                               class="btn btn-sm btn-danger shadow-sm" 
                                               onclick="return confirm('Are you sure you want to delete this review?')">
                                                <i class="ti-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="py-4 text-muted">No reviews found!</td>
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