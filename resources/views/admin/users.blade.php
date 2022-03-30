@extends('admin.layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách User</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số điện thoại</th>
                            <th>Số dư</th>
                            <th>level</th>
                            <th>Số tài khoản</th>
                            <th>Tên ngân hàng</th>
                            <th>Mã giới thiệu</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->phone}}</td>
                            <td>{{number_format($user->money)}}</td>
                            <td>{{$user->level}}</td>
                            <td>{{$user->number_bank}}</td>
                            <td>{{$user->brank_bank}}</td>
                            <td>{{$user->invite_code}}</td>
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

@endsection