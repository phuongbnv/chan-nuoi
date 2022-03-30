@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">           
                <div>
                    <div class="box-shadown">
                    <h4 class="bg-success text-white text-center py-3 mb-0">Rút tiền</h4>
                    
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

                        <form method="post" action="{{route('page.withdraw.post')}}" class="mx-auto w-95">
                            @csrf
                            @foreach($profile as $value)
                            <h5 class="text-success py-3 mb-0 font-weight-bold pb-5">Tài khoản thẻ ngân hàng</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Tên ngân hàng</label>
                                <input required value="{{$value->brank_bank}}" name="brank_bank" type="text" class="border-solid font-weight-bold" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Số tài khoản</label>
                                <input required value="{{$value->number_bank}}" name="number_bank" type="number" class="border-solid font-weight-bold" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Tên tài khoản</label>
                                <input required value="{{$value->name_bank}}" name="name_bank" type="text" class="border-solid font-weight-bold" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Số Momo</label>
                                <input value="" name="number_momo" type="text" class="border-solid font-weight-bold" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Phương thức rút tiền</label>
                                <select required name="phuong_thuc" class="form-control" id="exampleFormControlSelect1">
                                <option value="">Chọn...</option>
                                <option value="ngân hàng" class="font-weight-bold">Ngân hàng</option>
                                <option value="momo" class="font-weight-bold">Momo</option>
                                </select>
                            </div>
                            <div class="section over-hide z-bigger">
                                <div class="section over-hide z-bigger">
                                    <div class="pb-5">
                                        <div class="row justify-content-center pb-5">
                                            <div class="col-12 pt-5">
                                                <p class="mb-4 pb-2 text-dark">Rút tiền</p>
                                            </div>
                                            <div class="col-12 pb-5">
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-1" value="200000">
                                                <label class="for-checkbox-tools font-15" for="tool-1">
                                                    {{number_format(200000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-2" value="300000">
                                                <label class="for-checkbox-tools font-15" for="tool-2">
                                                    {{number_format(300000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-3" value="500000">
                                                <label class="for-checkbox-tools font-15" for="tool-3">
                                                    {{number_format(500000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-4" value="1000000">
                                                <label class="for-checkbox-tools font-15" for="tool-4">
                                                   {{number_format(1000000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-6" value="2000000">
                                                <label class="for-checkbox-tools font-15" for="tool-6">
                                                    {{number_format(2000000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-7" value="3000000">
                                                <label class="for-checkbox-tools font-15" for="tool-7">
                                                    {{number_format(3000000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-8" value="5000000">
                                                <label class="for-checkbox-tools font-15" for="tool-8">
                                                    {{number_format(5000000)}}
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="number_money" id="tool-9" value="10000000">
                                                <label class="for-checkbox-tools font-15" for="tool-9">
                                                    {{number_format(10000000)}}
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>	
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success w-100 font-weight-bold">Rút tiền</button>
                            </div>
                            <div class="form-group">
                                <h3 class="text-danger">Lưu ý*</h3>
                                <h5 class="text-danger">Mỗi lần giao dịch thấp nhất là 200,000 vnd.</h5>
                                <h5 class="text-danger">Bỏ vào heo đất thu nhập cao hơn ngân hàng gấp 3 lần.</h5>
                            </div>
                        </div>            
                    </div>                        
                </div>
            </div>                                    
        </div>        
    </div>
</div>

<style>

.nap-tien button{
    float:right; 
    color:white;
    padding: 10px 50px;
}
.box-shadown {
    box-shadow: 0px 0px 8px 0px #adadad;
    border-radius: 10px;
    padding: 20px;
    margin:20px 0px ;
    background: #eaeaea;
}
.box-shadown ul {
    list-style: none;
    padding: 0;
}
.box-shadown ul li {
    padding: 12px 5px;
    border-top: 1px solid #cccccc;
}
.box-shadown ul li a{
    text-decoration:none;
    color: #383838;
}

.box-shadown p .money{
    font-size:20px
}
.trai-nghiem .title, .bxh .title {
    border-left: 5px solid #4087f1;
    padding-left: 10px;
    margin-top:20px
}
.bxh{
    margin-top: 50px
}
.money{
    color:#30a569;
}
.icon-2{
        width:60px;
    }
.w-95{
    width: 95%;
}
.border-solid{
    background: none;
    padding: 8px;
    display: block;
    border: none;
    border-bottom: 1px solid #2E8DFF;
    width: 100%;
}
.font-weight-bold{
    font-weight: bold;
}
.box-shadown .button {
    margin-left: 0px;
    border-radius: 10px;
}
.font-15{
    font-size: 12px !important;
}
</style>

@endsection