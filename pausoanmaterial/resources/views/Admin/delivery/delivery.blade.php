@extends('layouts.admin2')
@section('title', 'Delivery')

@section('content')

<div class="row">    
    <div class="col-lg-12">
        {{-- <div class="card"> --}}
            <div class="card-body">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{-- <h1 class="m-0">Delivery</h1> --}}
                            </div>
                            <div class="col-sm-6">
                                <br>
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Delivery</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>  
                
                <div class="normal-table-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="table-wrap">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Status</th>
                                                <th>Alamat</th>
                                                <th>Actions</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengiriman as $index => $item)
                                                <tr>
                                                    <td>{{ ($pengiriman->currentPage() - 1) * $pengiriman->perPage() + $loop->iteration }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.delivery.show', $item->id) }}" class="btn btn-dark"><span class="mdi mdi-eye-circle-outline"></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="pagination-area">
                                    {{ $pengiriman->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        {{-- </div> --}}
    </div>
</div>

@endsection
