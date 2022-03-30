@extends('admin.layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>
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
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên</label>
            <input name="name" required type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">ảnh</label>
            <input name="image" required type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phí nhận nuôi</label>
            <input required name="phi_nhan_nuoi" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phí giảm giá</label>
            <input required name="phi_giam_gia" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">lợi nhuận</label>
            <input required name="loi_nhuan" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">thời gian</label>
            <input required name="time" type="number" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>
@endsection