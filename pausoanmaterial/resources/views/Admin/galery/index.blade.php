@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($galeris as $galeri)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                        <p class="card-text">{{ $galeri->deskripsi }}</p>
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
