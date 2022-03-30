@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">           
                <div>
                    <div class="box-shadown">
                    <h4 class="bg-success text-white text-center py-3 mb-0">Nạp tiền</h4>
                    @if(session('alert'))

                        <section class='alert alert-success'>{{session('alert')}}</section>
                        <div class="text-center qr">
                            <img width="450px" src="{{asset('img/icon/'.session('img').'')}}">
                        </div>
                    @elseif ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{route('page.deposit.post')}}" method="POST" class="mx-auto w-95">
                            @csrf
                            <h5 class="text-success py-3 mb-0 font-weight-bold pb-5">Tài khoản thẻ ngân hàng</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Tên ngân hàng</label>
                                <p class="border-solid font-weight-bold">AVVCCC</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Số tài khoản</label>
                                <p class="border-solid font-weight-bold">2131241251251</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Tên tài khoản</label>
                                <p class="border-solid font-weight-bold">Nguyen Thu Phuong</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-primary">Số Momo</label>
                                <p class="border-solid font-weight-bold">0122222145</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="text-primary">Phương thức nạp tiền</label>
                                <select name="phuong_thuc" class="form-control" id="exampleFormControlSelect1">
                                <option value="" class="font-weight-bold">Chọn...</option>
                                <option value="ngân hàng" class="font-weight-bold">Ngân hàng</option>
                                <option value="momo" class="font-weight-bold">Momo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền cần Nạp</label>
                                <input name="number_money" type="number" class="border-solid" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success w-100 font-weight-bold">Nạp tiền</button>
                            </div>
                            <div class="form-group">
                                <h3 class="text-danger">Lưu ý*</h3>
                                <h5 class="text-danger">- Quý khách vui lòng điền chính xác nội dung chuyển khoản là số điện thoại đăng ký tài khoản</h5>
                                <h5 class="text-danger">- Khuyến cáo nạp qua bank, vì nạp Momo đôi lúc giao dịch bị delay</h5>                                
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
@media(max-width: 658px){
    .qr img{
        width: 100%;
    }

}
</style>

@endsection