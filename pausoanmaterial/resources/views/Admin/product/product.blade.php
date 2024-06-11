@extends('layouts.admin2')
@section('title', 'Product')
@section('css')
<style>
.sheila {
    display: flex;
    gap: 10px;
    justify-content: center;
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-1">
                </div>
                <div class="normal-table-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="table-wrap">
                                    <a href="{{ route('tampil_product') }}" class="btn btn-info mb-3">Add Product</a>
                                    <form action="{{ route('admin.Product') }}" method="GET" class="form-inline mb-3">
                                        <div class="form-group mr-2">
                                            <label for="category_id" class="mr-2">Filter Category:</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">All Categories</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>

                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $index => $item)
                                            <tr>
                                                <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->category->category_name }}</td>
                                                <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                                <td class="sheila">
                                                    <a class="btn btn-dark" data-toggle="modal" data-target="#viewProductModal{{ $item->id }}"><span class="mdi mdi-eye-circle-outline"></span></a>
                                                    <a class="btn btn-warning" href="{{ route('edit_product', ['id' => $item->id]) }}">
                                                        <span class="mdi mdi-file-edit-outline"></span>
                                                    </a>
                                                    <a class="btn btn-danger" href="{{ route('delete_product', ['id' => $item->id]) }}">
                                                        <span class="mdi mdi-delete"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-area">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($products as $item)
                    <div class="modal fade" id="viewProductModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewProductModalLabel{{ $item->id }}">View Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/' . $item->image) }}" alt="Product Image" class="img-fluid mb-3">
                                    </div>
                                    <p><strong>Description:</strong> {{ $item->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
