@extends('admin.layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa sản phẩm</h1>
    @if(session('alert'))
        <section class='alert alert-success'>{{session('alert')}}</section>
    @elseif ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($product as $product)
    <form action="{{ route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleInputEmail1">Tên</label>
            <input value="{{$product->name}}" name="name" required type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">ảnh</label>
            <img width="200px" src="{{asset('img/product/'.$product->image)}}" alt="">
            <input value="{{$product->image}}" name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phí nhận nuôi</label>
            <input value="{{$product->phi_nhan_nuoi}}" required name="phi_nhan_nuoi" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phí giảm giá</label>
            <input value="{{$product->phi_giam_gia}}" required name="phi_giam_gia" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">lợi nhuận</label>
            <input value="{{$product->loi_nhan}}" required name="loi_nhuan" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">thời gian</label>
            <input value="{{$product->time}}" required name="time" type="number" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
    @endforeach
    
</div>
@endsection