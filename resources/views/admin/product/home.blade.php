@extends('admin.layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <a class="btn btn-success text-white" href="{{route('product.create')}}"> Create Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Phí nhận nuôi</th>
                            <th>Lợi nhuận</th>
                            <th>Phí giảm giá</th>
                            <th>Thời gian nuôi/ngày</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td><img width="200px" src="{{asset('img/product/'.$product->image)}}" alt="{{$product->image}}"></td>
                            <td>{{$product->phi_nhan_nuoi}}</td>
                            <td>{{$product->loi_nhan}}</td>
                            <td>{{$product->phi_giam_gia}}</td>
                            <td>{{$product->time}}</td>
                            <td>
                                <form action="{{ route('product.show',$product->id) }}" method="GET">
                                    <button class="btn btn-warning edit"><img width="20px" src="{{asset('img/icon/edit-icon.png')}}"></button>
                                </form>
                                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button onclick="return confirm('Bạn muốn xóa sản phẩm?')" class="btn btn-danger"><img width="20px" src="{{asset('img/icon/delete-icon.png')}}"></button>
                                </form>
                            </td>
                        </tr>  
                    @endforeach                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<style>
    .dataTables_filter, .dataTables_paginate{
    float:right;
    }
    .table td .edit{
        float: left;
        margin-bottom: 10px;
    }
</style>

@endsection