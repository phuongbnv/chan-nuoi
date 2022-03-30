@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">   
            <div class="col-12 text-center title">Mời</div>   
            <div class="col-md-4 mt-4">
                <p>Mã mời: <span id="copy">{{$users->invite_code}}</span></p>
                <button onclick="copy()" class="btn btn-info text-white mt-3">Sao chép</button>
            </div>
            <div class="col-md-8 mt-4">
                <p>Link mời: <span id="copy2">{{route('register')}}?gioithieu={{$users->invite_code}}</span></p>
                <button onclick="copy2()" class="btn btn-info text-white mt-3">Sao chép</button>
            </div>                    
        </div>
        <div class="trai-nghiem row mt-5">
            <p class="title">Hệ thống thành viên</p>               
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 1</h2>
                    </div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <strong>Tỷ lệ hoa hồng</strong>
                        <p>10%</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <button type="button" class="btn btn-info text-white col-10">Xem chi tiết</button>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 2</h2>
                    </div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <strong>Tỷ lệ hoa hồng</strong>
                        <p>5%</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <button type="button" class="btn btn-info text-white col-10">Xem chi tiết</button>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 3</h2>
                    </div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <strong>Tỷ lệ hoa hồng</strong>
                        <p>3%</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <button type="button" class="btn btn-info text-white col-10">Xem chi tiết</button>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 4</h2>
                    </div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <strong>Tỷ lệ hoa hồng</strong>
                        <p>2%</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <button type="button" class="btn btn-info text-white col-10">Xem chi tiết</button>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 5</h2>
                    </div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <strong>Tỷ lệ hoa hồng</strong>
                        <p>2%</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 text-center" style="padding-top: 45px;">
                        <button type="button" class="btn btn-info text-white col-10">Xem chi tiết</button>
                    </div>
                </div>                  
            </div>           
        </div>   
    </div>
</div>
<style>

.level {
    margin-left: -10px;
    background: #37aff5;
    border-radius: 20px 50px 50px 20px;
    color: white;
    padding: 50px 10px 40px;
}
.section2 .title{
    padding: 10px;
    color: white;
    background: #5f7aff;
}
.nap-tien button{
    float:right; 
    color:white;
    padding: 10px 50px;
}
.box-shadown {
    box-shadow: 0px 0px 8px 0px #adadad;
    border-radius: 20px;
    margin:10px 0px ;
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
</style>
@endsection