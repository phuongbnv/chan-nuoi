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
                                <h5>{{$users->phone}}</h5>
                            <span>Mã mời: <span id="copy">{{$users->invite_code}}</span></span>
                            <button onclick="copy()" class="button">Sao chép</button>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-5">
                        <div class="col-md-4 text-center">
                            <p class="money">{{number_format($users->money)}}</p>
                            <p>Tài sản của tôi</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{number_format($users->money_gt)}}</p>
                            <p>Tổng thu nhập giới thiệu</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{count($gioithieu)}}</p>
                            <p>Giới thiệu được</p>
                        </div>
                    </div>
                </div>            
            </div>        
            <div class="row">
                <div class="tablink col-6 text-center" id="defaultOpen" onclick="openPage('thu-nhap', this,'#0dcaf0')">
                    Thu Nhập Trang trại
                </div>
                <div class="tablink col-6 text-center" onclick="openPage('hoan-thanh', this,'#0dcaf0')">
                    Thu nhập giới thiệu
                </div>
            </div>
            
            <div class="section2">
                <div class="row">    
                    <div id="thu-nhap" class="tabcontent">  
                        <div class="trai-nghiem">
                            <div class="box-shadown row">
                                <table class="table">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phí nhận nuôi</th>
                                            <th scope="col">Lợi nhuận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($hoan_thanh)>0)
                                                @foreach($hoan_thanh as $value)
                                                <tr>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{ number_format( $value->phi_nhan_nuoi)}}</td>
                                                    <td>{{number_format( $value->loi_nhan)}}</td>
                                                </tr>
                                                @endforeach                                        
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>No data</td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                    </tbody>
                                </table>                        
                            </div>            
                        </div>  
                    </div>

                    <div id="hoan-thanh" class="tabcontent">
                        <div class="trai-nghiem">
                            <div class="box-shadown row">
                                <table class="table">
                                <thead class="bg-success text-white">
                                    <tr>
                                    <th scope="col">Account user</th>
                                    <th scope="col">Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gioithieu as $list)
                                        <tr>
                                            <td>{{$list->phone}}</td>
                                            <td>{{$list->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                <!-- <div class="col-md-12 con-lai mt-2">
                                    <div style="position: relative;">
                                        <span> Còn 21 giờ nữa hoàn thành</span>
                                    </div>
                                </div>                         -->
                            </div>            
                        </div>
                        </div>
                    </div>      
                                                    
                </div>        
            </div>                                   
        </div>        
    </div>
</div>
<style>
.tablink{
    padding: 15px;
    color: white;
    cursor: default;
}
.con-lai span {
    display: inline;
    border: 1px solid;
    padding: 10px 50px;
    border-radius: 50px;
    position: absolute;
    right: 0;
    top: -40px;
}
.time {
    position: absolute;
    top: 0;
    right: 0;
    background: #30a569;
    border-radius: 0 10px;
    padding: 5px 25px;
    color: white;
}
.nap-tien button{
    float:right; 
    color:white;
    padding: 10px 50px;
}
.box-shadown {
    box-shadow: 0px 0px 8px 0px #adadad;
    border-radius: 20px;
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
.trai-nghiem{
    position: relative;
}
.bxh{
    margin-top: 50px
}
.money{
    color:#30a569;
}
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
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection