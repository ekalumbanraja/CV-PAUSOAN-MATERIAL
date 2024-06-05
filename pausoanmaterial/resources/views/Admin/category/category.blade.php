@extends('layouts.admin2')
@section('title', 'Category')

@section('content')
<div class="col-lg-6">
    <div class="d-none d-lg-block">
        <ol class="breadcrumb m-0 float-end">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3"></div>
                        <div class="breadcomb-report">
                            <button data-toggle="tooltip" data-placement="right" title="Tambah category" class="btn btn-primary" onclick="window.location='{{ route('tampil_category') }}'" >
                                <i class="notika-icon notika-sent"></i> Tambah Category
                            </button>
                        </div>
                        <div class="normal-table-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="normal-table-list">
                                            <div class="bsc-tbl">
                                                <table class="table table-sc-ex">
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
                                                                    <a class="btn btn-warning notika-btn-danger" href="{{ url('deletecategory', $item->id) }}">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="pagination-area">
                                            {{ $data->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for adding category -->
                        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addCategoryModalLabel">Tambah Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('tambah_category') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_name">Nama Kategori:</label>
                                                <input type="text" class="form-control" id="category_name" name="category" placeholder="Masukkan nama kategori" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->

                    </div>
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
