@extends('backend.admin_dashboard')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        
    
        @if(session('success'))
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <strong>Great!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{-- টেবিল সেকশন --}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Category List</h4>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm px-4">
                                <i class="mdi mdi-plus-circle"></i> Add Category
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th width="10%">SL</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="font-weight-bold">{{ $item->name }}</td>
                                        <td><span class="badge badge-light">{{ $item->slug }}</span></td>
                                        <td>
                                            <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
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