@extends('layouts.admin2')

@section('content')
<div class="col-lg-7 mb-4">
    <div class="d-none d-lg-block">
        <ol class="breadcrumb m-0 float-end">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
            <li class="breadcrumb-item active">Galery</li>
            <li class="breadcrumb-item active">Tambah Galery</li>
        </ol>
    </div>
</div>
<div class="container">
    <div class="table-responsive" style="max-width: 80%; margin: 0 auto;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="judul">Judul</label></td>
                        <td><input type="text" name="judul" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="deskripsi">Deskripsi</label></td>
                        <td><textarea name="deskripsi" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="gambar">Gambar</label></td>
                        <td><input type="file" name="gambar" class="form-control" required></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
