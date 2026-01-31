@extends('backend.admin_dashboard')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0">Edit Food Item</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('fooditems.update', $fooditem->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label class="font-weight-bold">Main Category</label>
                                    <select name="category_id" class="form-control" required>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $fooditem->category_id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6 form-group mb-3">
                                    <label class="font-weight-bold">Subcategory</label>
                                    <select name="subcategory_id" class="form-control" required>
                                        @foreach($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $fooditem->subcategory_id ? 'selected' : '' }}>
                                                {{ $subcat->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 form-group mb-3">
                                    <label class="font-weight-bold">Food Name</label>
                                    <input type="text" name="item_name" class="form-control" value="{{ $fooditem->item_name }}" required>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label class="font-weight-bold">Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $fooditem->price }}" required>
                                </div>
                            </div>

                            {{-- Fix: Changed $item to $fooditem --}}
                            <div class="form-group mb-3">
                                <label for="quantity" class="font-weight-bold">Food Stock (Quantity)</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $fooditem->quantity }}" min="0" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $fooditem->description }}</textarea>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-md-8 form-group">
                                    <label class="font-weight-bold">Update Image (Leave blank to keep current)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-4 text-center">
                                    <label class="d-block font-weight-bold">Current Image</label>
                                    <img src="{{ asset($fooditem->image) }}" class="rounded shadow-sm border" style="width: 100px; height: 80px; object-fit: cover;">
                                </div>
                            </div>

                            <div class="text-center border-top pt-3">
                                <button type="submit" class="btn btn-info text-white px-5 shadow">Update Food Item</button>
                                <a href="{{ route('fooditems.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection