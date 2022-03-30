@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">          
            <div class="trai-nghiem">
                <div class="box-shadown row">
                    <div class="col-md-12 row">
                        <div class="col-md-1">
                            <img class="icon-2 pr-5" src="{{asset('img/icon/user.png')}}" alt="user">
                        </div>
                        <div class="col-md-11">
                                <h5>{{$users->phone}} <i class="font-bold">(Level : {{$users->level}})</i></h5>
                            <span>Mã mời: <span id="copy" >{{$users->invite_code}}</span></span>
                            <!-- <input id="copy" type="hidden" value="{{$users->invite_code}}"> -->
                            <button onclick="copy()" class="button btn btn-info text-white">Sao chép</button>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-5">
                        <div class="col-md-4 text-center">
                            <p class="money">{{number_format($users->money)}}</p>
                            <p>Tài sản của tôi</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{count($hoan_thanh)}}</p>
                            <p>Số vật nuôi hoàn thành</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{$count}}</p>
                            <p>Giới thiệu được</p>
                        </div>
                    </div>
                </div>            
            </div>
            <div>
                <div class="box-shadown row">
                    <!-- <div class="col-2 col-0"></div> -->
                    <div class="col-6"><a href="{{route('page.deposit')}}"><button style="width:90%" type="button" class="btn btn-info text-white"><img class="icon" src="{{asset('img/icon/money.png')}}" alt="">&nbsp;Nạp Tiền</button></a></div>
                    <div class="col-6"><a href="{{route('page.withdraw')}}"><button style="width:90%" type="button" class="btn btn-info text-white"><img class="icon" src="{{asset('img/icon/atm.png')}}" alt="">&nbsp;Rút Tiền</button></a></div>
                </div>
            </div>
            
            <div>
                <div class="box-shadown">
                    <ul>
                        <li class="border-0"><a href="{{route('page.upgrade_account')}}"><img class="icon" src="{{asset('img/icon/level-up.png')}}" alt="">&nbsp;Nâng cấp tài khoản</a> </li>
                        <li><a href="{{route('page.setting_account')}}"><img class="icon" src="{{asset('img/icon/user.png')}}" alt="">&nbsp;Thông tin người dùng</a></li>
                        <li><a href="{{route('page.income')}}"><img class="icon" src="{{asset('img/icon/icons8-transaction-64.png')}}" alt="">&nbsp;Thu nhập của tôi</a></li>
                        <li><a href="{{route('page.transaction_history')}}"><img class="icon" src="{{asset('img/icon/level-up.png')}}" alt="">&nbsp;Lịch sử giao dịch</a></li>
                        <li><a href="{{route('logout')}}"><img class="icon" src="{{asset('img/icon/level-up.png')}}" alt="">&nbsp;Đăng xuất</a></li>
                    </ul>
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
.box-shadown button {
    margin-left: 40px;
    border-radius: 10px;
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
.box-shadown .button {
    margin-left: 0px;
    border-radius: 10px;
}
</style>
@endsection