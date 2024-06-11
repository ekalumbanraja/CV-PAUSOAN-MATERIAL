@extends('layouts.admin2')

@section('title', 'Gallery')
@section('css')
<style>
.sheila {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
}
.table-wrap .table tbody tr td {
    vertical-align: middle;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-6">
        <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-end">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </div>
    </div>
    
<br>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="normal-table-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-wrap">
                        <a href="{{ route('galeri.create') }}" class="btn btn-info mb-3">Add image</a>
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    {{-- <th>Deskripsi</th> --}}
                                    {{-- <th>Gambar</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galeris as $index => $galeri)
                                <tr>
                                    <td>{{ ($galeris->currentPage() - 1) * $galeris->perPage() + $index + 1 }}</td>
                                    <td>{{ $galeri->judul }}</td>
                                    {{-- <td>{{ $galeri->deskripsi }}</td> --}}
                                    {{-- <td><img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" style="max-width: 100px; max-height: 90px;"></td> --}}
                                    <td class="sheila">
                                        <a class="btn btn-dark" data-toggle="modal" data-target="#viewGaleriModal{{ $galeri->id }}"><span class="mdi mdi-eye-circle-outline"></span></a>
                                        <a class="btn btn-warning" href="{{ route('galeri.edit', $galeri->id) }}">
                                            <span class="mdi mdi-file-edit-outline"></span>
                                        </a>
                                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $galeris->links() }}
                    </div>
                </div>
            </div>
        </div>

        @foreach($galeris as $galeri)
        <div class="modal fade" id="viewGaleriModal{{ $galeri->id }}" tabindex="-1" role="dialog" aria-labelledby="viewGaleriModalLabel{{ $galeri->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewGaleriModalLabel{{ $galeri->id }}">View Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gallery Image" class="img-fluid mb-3">
                        </div>
                        <p><strong>Description:</strong> {{ $galeri->deskripsi }}</p>
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
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
