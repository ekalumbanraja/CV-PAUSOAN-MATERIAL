@extends('layouts.admin')
@section('title', 'Category')

@section('content')
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
                    <div class="breadcomb-ctn">
                      <h2>Add Category Produk</h2>
                      <p>Silahkan tambahkan category product <span class="bread-ntd"></span></p>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tambah_category') }}">
            @csrf <!-- Laravel CSRF protection -->
            <div class="form-group">
                <label for="category_name">Nama Kategori:</label>
                <input type="text" class="form-control" id="category_name" name="category" placeholder="Masukkan nama kategori" required>
            </div>
            <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </form>
    </div>
</div>


<!-- <div class="card">
    <div class="card-body">
        <form method="POST" action="#">
            @csrf
            <div class="form-group">
                <label for="category_name">Nama Kategori:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan nama kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div> -->

@endsection

@section('script')
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </script>
<!-- <script>

window.onload = function() {
    @if (session('alert'))
        Swal.fire({
            title: "{{ session('alert.title') }}",
            text: "{{ session('alert.text') }}",
            icon: "{{ session('alert.icon') }}"
        });
    @endif
}
</script> -->


@endsection
