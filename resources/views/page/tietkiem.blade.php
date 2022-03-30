@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">           
                <div>
                    <div class="box-shadown">
                    <h4 class="bg-success text-white text-center py-3 mb-0">Gửi tiết kiệm</h4>
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
                        <form action="{{route('page.tiet_kiem.post')}}" method="post" class="mx-auto w-95">
                            @csrf
                            <div class="section over-hide z-bigger">
                                <div class="section over-hide z-bigger">
                                    <div class="pb-5">
                                        <div class="row justify-content-center pb-5">
                                            <div class="col-12 pt-5">
                                                <p class="mb-4 pb-2 text-dark">Tiền gửi</p>
                                            </div>
                                            <div class="col-12 pb-5">
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-1" value="1">
                                                <label class="for-checkbox-tools font-15" for="tool-1">
                                                    1 tháng (2%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-2" value="3">
                                                <label class="for-checkbox-tools font-15" for="tool-2">
                                                    3 tháng (7%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-3" value="6">
                                                <label class="for-checkbox-tools font-15" for="tool-3">
                                                    6 tháng (15%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-4" value="9">
                                                <label class="for-checkbox-tools font-15" for="tool-4">
                                                    9 tháng (22%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-6" value="12">
                                                <label class="for-checkbox-tools font-15" for="tool-6">
                                                    1 Năm (30%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-7" value="24">
                                                <label class="for-checkbox-tools font-15" for="tool-7">
                                                    2 Năm (60%)
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="tools" id="tool-8" value="36">
                                                <label class="for-checkbox-tools font-15" for="tool-8">
                                                    3 Năm (100%)
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>	
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền muốn gửi</label>
                                <input required type="number" name = "money" class="border-solid" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success w-100 font-weight-bold">Gửi tiết kiệm</button>
                            </div>
                            <div class="form-group">
                                <h3 class="text-danger">Lưu ý*</h3>
                                <h5 class="text-danger">Bỏ vào heo đất thu nhập cao hơn ngân hàng gấp 3 lần.</h5>
                            </div>
                    </form>
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
.font-15{
    font-size: 12px !important;
}
</style>
@endsection