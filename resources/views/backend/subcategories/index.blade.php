@extends('backend.admin_dashboard')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                
           
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Subcategory List</h5>
                            <a href="{{ route('subcategories.create') }}" class="btn btn-primary btn-sm px-3">
                                <i class="mdi mdi-plus-circle"></i> Add Subcategory
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center align-middle">
                                <thead class="bg-light">
                                    <tr class="text-dark">
                                        <th width="10%">SL</th>
                                        <th>Main Category</th>
                                        <th>Subcategory Name</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        
                                    
                                        <td class="text-dark">{{ $item->category->name }}</td>
                                        
                                        <td class="font-weight-bold text-dark">{{ $item->subcategory_name }}</td>
                                        <td>
                                            <a href="{{ route('subcategories.edit', $item->id) }}" class="btn btn-xs btn-info text-white">Edit</a>
                                            
                                            <form action="{{ route('subcategories.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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