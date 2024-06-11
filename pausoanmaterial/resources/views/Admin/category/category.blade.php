@extends('layouts.admin2')
@section('title', 'Category')

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
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                            {{-- <li class="breadcrumb-item active">Tambah Data</li> --}}
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>  
                <div class="d-flex justify-content-between align-items-center mb-1">
               
                </div>
                <div class="normal-table-area">
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="table-wrap">
                                <button class="btn btn-info" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>
                                                    <a class="btn btn-danger notika-btn-danger" href="{{ url('deletecategory', $item->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                          
                            <div class="pagination-area">
                                {{ $data->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('tambah_category') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category">Category Name</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

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
