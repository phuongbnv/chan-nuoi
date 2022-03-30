@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="section2">
        <div class="row">           
                <div>
                    <div class="box-shadown">
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
                    <h4 class="bg-success text-white text-center py-3 mb-0">Thông tin người dùng</h4>
                    <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Liên kết thẻ ngân hàng
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse pb-1" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            
                        <form action="{{route('page.addBank')}}" method="POST">
                            @csrf
                            @foreach($profile as $value)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tên ngân hàng</label> 
                                <select class="form-control" name="nganhang" maxlength="50">
                                            <option value="" >Chọn ngân hàng</option>
                                    @php
                                    $options = array('MOMO','VIETINBANK','TECHCOMBANK','BIDV','SACOMBANK','ACB','VPBANK','MB','DONGABANK','TPBANK','AGRIBANK','VIB','MSB','OCB','SHB','LVPB','SEABANK','HDBANK','PVCOMBANK','ABBANK','EXIMBANK','SAIGONBANK','SCB','NAMABANK','NCB','VIETABANK','KIENLONGBANK','BAOVIETBANK','OCEANBANK','PGBANK');  
                                    @endphp
                                    
                                        @for ($i = 0; $i < count($options); $i++)
                                            @if($value->brank_bank == $options[$i])
                                            <option value="{{$options[$i]}}" selected = 'selected'>{{$options[$i]}}</option>
                                            @else
                                            <option value="{{$options[$i]}}" >{{$options[$i]}}</option>
                                            @endif
                                        @endfor
                                    
                                    
                                                                     
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số tài khoản</label>
                                <input type="number" class="form-control" required name="stk" value = "{{$value->number_bank}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPasswor">Tên chủ tài khoản</label>
                                <input type="text" class="form-control" required name="nametk" value = "{{$value->name_bank}}">
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary fl-right">Xác nhận</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Thay đổi mật khẩu
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse pb-1" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        <form action="{{route('page.ChangePassword')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu cũ</label>
                                <input name="curPassword" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu mới</label>
                                <input name="newPassword" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại</label>
                                <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary fl-right">Xác nhận</button>
                        </form>
                        </div>
                            </div>
                        </div>
                    <!-- <div class="card">
                            <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Xác thực tài khoản
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse pb-1" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        <form>
                            <h4 class="mb-0 pb-2 font-weight-bold text-success">
                                <strong>Vui lòng xác thực bằng chứng minh nhân dân hoặc căn cước công dân*</strong>
                            </h4>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Mặt trước</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Mặt sau</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary fl-right">Xác nhận</button>
                        </form>
                        </div>
                        </div>
                    </div> -->
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
</style>

<script>
$('.collapse').collapse()
</script>
@endsection