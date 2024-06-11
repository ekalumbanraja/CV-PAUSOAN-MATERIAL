@extends('layouts.admin2')
@section('title', 'Category')

@section('content')
<div class="col-lg-6 mb-4">
    <div class="d-none d-lg-block">
        <ol class="breadcrumb m-0 float-end">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
            <li class="breadcrumb-item active">Tambah Category</li>
        </ol>
    </div>
</div>
<div class="card">
    {{-- <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Kategori Baru</h5>
    </div> --}}
    <div class="card-body">
        <form method="POST" action="{{ route('tambah_category') }}">
            @csrf <!-- Laravel CSRF protection -->
            <div class="form-group mb-3">
                <label for="category_name" class="form-label">Nama Kategori:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                    <input type="text" class="form-control" id="category_name" name="category" placeholder="Masukkan nama kategori" required>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-info" id="submitBtn"><i class="bi bi-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Ambil tombol "Simpan" berdasarkan ID
    const submitBtn = document.getElementById('submitBtn');

    // Tambahkan event listener untuk event klik pada tombol "Simpan"
    submitBtn.addEventListener('click', function(event) {
        // Mencegah tindakan default (mengirimkan formulir)
        event.preventDefault();

        // Tampilkan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menyimpan kategori!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!'
        }).then((result) => {
            // Jika pengguna mengklik "Ya, Simpan!", kirimkan formulir
            if (result.isConfirmed) {
                // Cari formulir dan kirimkan
                document.querySelector('form').submit();
            }
        });
    });

    window.onload = function() {
        @if (session('alert'))
            Swal.fire({
                title: "{{ session('alert.title') }}",
                text: "{{ session('alert.text') }}",
                icon: "{{ session('alert.icon') }}"
            });
        @endif
    }
</script>
@endsection

<style>
    body {
        background: #f8f9fa;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
</style>
