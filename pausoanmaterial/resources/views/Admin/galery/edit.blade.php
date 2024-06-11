@extends('layouts.admin2')

@section('content')
<br><br>
<div class="container">
    <div class="col-lg-7 mb-4">
        <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-end">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item active">Edit Galery</li>
            </ol>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br><br>

    <div class="col-lg-8 mx-auto">
        <div class="card shadow-lg p-4 mb-5 bg-body rounded">
            <div class="card-header">
                <h4 class="text-center">Edit Galery</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ $galeri->deskripsi }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
