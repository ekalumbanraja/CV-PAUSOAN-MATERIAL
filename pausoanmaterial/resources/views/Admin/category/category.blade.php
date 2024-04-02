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
                      <h2>Category Produk</h2>
                      <p>Welcome to category product <span class="bread-ntd">table</span></p>
                    </div>
                    
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                        <button data-toggle="tooltip" data-placement="left" title="Tambah category" class="btn" onclick="window.location='{{ route('tampil_category') }}'">
                            <i class="notika-icon notika-sent"></i>
                        </button>
                    </div>
                </div>
                <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <!-- <div class="basic-tb-hd">
                            <h2>Basic Table</h2>
                            <p>Basic example without any additional modification classes</p>
                        </div> -->
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex " >
                            @foreach ($data as $data)

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                        {{ $data->category_name }}
                                        </td>
                                        <td>
                                        <a class="btn btn-warning notika-btn-danger" href="{{url('deletecategory',$data->id)}}" >Delete</button>

                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection