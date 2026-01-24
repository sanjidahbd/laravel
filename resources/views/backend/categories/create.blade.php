@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper"> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-md-5">
                <div class="card shadow-lg border-0 mt-5">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h5 class="mb-0 font-weight-bold">Add New Category</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Category Name</label>
                                <input type="text" name="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter Category Name" 
                                    value="{{ old('name') }}" required>
                                
                                @error('name') 
                                    <span class="text-danger small mt-1 d-block font-italic">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                    <i class="mdi mdi-check"></i> Save Category
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary px-4 ml-2">
                                    <i class="mdi mdi-arrow-left"></i> Back
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