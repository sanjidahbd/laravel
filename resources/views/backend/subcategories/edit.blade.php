@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 mt-5">
                    <div class="card-header bg-info text-white text-center py-3">
                        <h5 class="mb-0 font-weight-bold">Update Subcategory</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                        
                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-dark">Select Main Category</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark">Subcategory Name</label>
                                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" value="{{ old('subcategory_name', $subcategory->subcategory_name) }}" required>
                                @error('subcategory_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info text-white px-4 shadow-sm">Update Now</button>
                                <a href="{{ route('subcategories.index') }}" class="btn btn-secondary px-4 ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection