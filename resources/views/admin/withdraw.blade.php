@extends('admin.layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách rút tiền</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Account user</th>
                            <th>Phương thức</th>
                            <th>Số Momo</th>
                            <th>Số Tài khoản</th>
                            <th>Tên tài khoản</th>
                            <th>Tên ngân hàng</th>
                            <th>tiền rút</th>
                            <th>Ngày rút</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdraw as $value)
                        <tr>
                            <td>{{$value->id}}</td>   
                            <td>{{$value->phone}}</td>
                            <td>{{$value->phuong_thuc}}</td>
                            <td>{{$value->number_momo}}</td>
                            <td>{{$value->number_bank}}</td>
                            <td>{{$value->name_bank}}</td>
                            <td>{{$value->brank_bank}}</td>
                            <td>{{number_format($value->number_money)}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                @if($value->active == 0)
                                <input type="hidden" value="{{$value->id}}" name="id">
                                <button onclick="duyet({{$value->id}})" class="badge bg-info rounded-pill">duyệt</button>
                                @elseif($value->active == 1)
                                <div id="status" class="badge bg-warning rounded-pill">Đã duyệt</div>
                                @endif
                                
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
</style>
<script type="text/javascript">
    function duyet($id){
        $.ajax({
            url:"{{ route('admin.duyetrut') }}", 
            method:"POST", 
            data:{
                    "_token" : '{{csrf_token()}}',
                    "id"     : $id
                },
            success:function(data){   
                alert(data)
                window.location.assign('withdraw');

        }
    });

    }
</script>
@endsection