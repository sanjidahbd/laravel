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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">All Food Items</h5>
                            <a href="{{ route('fooditems.create') }}" class="btn btn-primary btn-sm">Add New Food</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Food Name</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
                                        <th>Stock</th> 
                                        <th>Status</th>
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
                                        <td>{{ $item->category->name ?? 'N/A' }}</td>
                                        <td>{{ $item->subcategory->subcategory_name ?? 'N/A' }}</td>
                                        <td class="text-success font-weight-bold">৳{{ number_format($item->price, 2) }}</td>
                                        
                                        {{-- Stock Column Fix --}}
                                        <td>
                                            @if($item->quantity !== null && $item->quantity > 0)
                                                <span class="badge badge-info">{{ $item->quantity }} Pcs</span>
                                            @else
                                                <span class="badge badge-danger">Out of Stock</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('fooditems.edit', $item->id) }}" class="btn btn-xs btn-info">Edit</a>
                                            <form action="{{ route('fooditems.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                                            </form>
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