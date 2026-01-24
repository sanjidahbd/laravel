@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-md-5">
                <div class="card shadow-lg border-0 mt-5">
                    <div class="card-header bg-info text-white text-center py-3">
                        <h5 class="mb-0 font-weight-bold">Update Category</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Category Name</label>
                                <input type="text" name="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name', $category->name) }}" required>
                                
                                @error('name')
                                    <span class="text-danger small mt-1 d-block font-italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-info text-white px-4 shadow-sm">
                                    <i class="mdi mdi-refresh"></i> Update Category
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary px-4 ml-2">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection