@extends('backend.admin_dashboard')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h5 class="mb-0 font-weight-bold">Add Subcategory</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('subcategories.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Select Main Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Subcategory Name</label>
                                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Enter Subcategory Name (e.g. Burgers, Pizza, Juices)" required>
                                @error('subcategory_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 shadow-sm">Save Subcategory</button>
                                <a href="{{ route('subcategories.index') }}" class="btn btn-secondary px-4 ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection