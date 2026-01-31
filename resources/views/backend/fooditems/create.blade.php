@extends('backend.admin_dashboard')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white py-3 text-center">
                        <h5 class="mb-0 font-weight-bold">Add New Food Item</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('fooditems.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
@endif
                            <div class="row">
                                {{-- Category --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label class="font-weight-bold">Main Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Choose Main Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Subcategory --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label class="font-weight-bold">Subcategory <span class="text-danger">*</span></label>
                                    <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Choose Subcategory</option>
                                        @foreach($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Food Name --}}
                                <div class="col-md-8 form-group mb-3">
                                    <label class="font-weight-bold">Food Name <span class="text-danger">*</span></label>
                                    {{-- Placeholder change kora hoyeche --}}
                                    <input type="text" name="item_name" class="form-control" placeholder="Enter food name" required>
                                </div>

                             
                                <div class="col-md-4 form-group mb-3">
                                    <label class="font-weight-bold">Price (BDT) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        
                                            <span class="input-group-text">৳</span>
                                        </div>
                                        <input type="number" step="0.01" name="price" class="form-control" placeholder="00.00" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
    <label for="quantity">Food Stock (Quantity)</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $item->quantity ?? 0 }}" min="0">
</div>

                            {{-- Description --}}
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Description (Short Details)</label>
                                <textarea name="description" rows="3" class="form-control" placeholder="Write a short description about this food (e.g. Spicy, Healthy, Serves 1)"></textarea>
                            </div>

                            {{-- Image --}}
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Food Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required id="imageInput">
                                <small class="text-muted">Max size: 2MB (JPG, PNG, WEBP)</small>
                                
                                <div class="mt-2 text-center">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="preview" style="width: 120px; height: 100px; border: 1px solid #ddd; object-fit: cover;">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5 shadow-sm font-weight-bold">Save Food Item</button>
                                <a href="{{ route('fooditems.index') }}" class="btn btn-secondary px-5 ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById('imageInput').onchange = evt => {
        const [file] = document.getElementById('imageInput').files
        if (file) {
            document.getElementById('showImage').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection