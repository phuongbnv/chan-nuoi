@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        
        <div class="box-shadown p-5 row">
            <div class="col-12 text-center mb-3">
                <h2>NÂNG CẤP TÀI KHOẢN</h2>
            </div>
            <div class="col-12">
                <h5 class="text-danger">*Lưu ý: Bạn chỉ có thể nâng cấp từng level</h5>
                <p>Ví dụ: <span>Bạn phải lên level 1 mới được lên level 2 các cấp còn lại tương tự</span></p>
            </div>
        </div>
        <div class="trai-nghiem row mt-md-5">
                      
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 1</h2>
                    </div>
                    <div class="col-md-7" style="padding-top: 10px;">
                        <ul>
                            <li>1. Tài khoản được cộng thêm 200,000.</li>
                            <li>2. Bạn có thể nuôi thêm Gà, Vịt.</li>
                            <li>3. Hạn mức rút tiền hằng ngày 500,000.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center btn-level" style="padding-top: 45px;">
                        <a href="{{route('page.deposit')}}"><button type="button" class="btn btn-info text-white col-10">Nạp Tiền <p>200.000</p></button></a>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 2</h2>
                    </div>
                    <div class="col-md-7" style="padding-top: 10px;">
                        <ul>
                            <li>1. Tài khoản được cộng thêm 500,000.</li>
                            <li>2. Bạn có thể nuôi thêm Gà, Vịt, Bò.</li>
                            <li>3. Hạn mức rút tiền hằng ngày 1,000,000.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center btn-level" style="padding-top: 45px;">
                    <a href="{{route('page.deposit')}}"><button type="button" class="btn btn-info text-white col-10">Nạp Tiền <p>500.000</p></button></a>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 3</h2>
                    </div>
                    <div class="col-md-7" style="padding-top: 10px;">
                        <ul>
                            <li>1. Tài khoản được cộng thêm 2,000.000.</li>
                            <li>2. Bạn có thể nuôi thêm Gà, Vịt, Bò, Trâu.</li>
                            <li>3. Hạn mức rút tiền hằng ngày 3,000,000.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center btn-level" style="padding-top: 45px;">
                    <a href="{{route('page.deposit')}}"><button type="button" class="btn btn-info text-white col-10">Nạp Tiền <p>2,000.000</p></button></a>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 4</h2>
                    </div>
                    <div class="col-md-7" style="padding-top: 10px;">
                        <ul>
                            <li>1. Tài khoản được cộng thêm 3,500,000.</li>
                            <li>2. Bạn có thể nuôi thêm Gà, Vịt, Bò, Trâu, Dê.</li>
                            <li>3. Hạn mức rút tiền hằng ngày 5,000,000.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center btn-level" style="padding-top: 45px;">
                    <a href="{{route('page.deposit')}}"><button type="button" class="btn btn-info text-white col-10">Nạp Tiền <p>3,500,000</p></button></a>
                    </div>
                </div>                  
            </div>
            <div class="box-shadown">     
                <div class="col-md-12 row">
                    <div class="col-md-2 level">
                       <h2>Level 5</h2>
                    </div>
                    <div class="col-md-7" style="padding-top: 10px;">
                        <ul>
                            <li>1. Tài khoản được cộng thêm 7,000.000.</li>
                            <li>2. Bạn có thể nuôi tất cả.</li>
                            <li>3. Hạn mức rút tiền hằng ngày 10,000,000.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center btn-level" style="padding-top: 45px;">
                    <a href="{{route('page.deposit')}}"><button type="button" class="btn btn-info text-white col-10">Nạp Tiền <p>7,000,000</p></button></a>
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
    border-radius: 10px;
    padding: 0px;
    margin:10px 0px ;
    background: #eaeaea;
}
.box-shadown ul {
    list-style: none;
    padding: 0;
}
.box-shadown ul li {
    padding: 5px;
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
</style>
@endsection