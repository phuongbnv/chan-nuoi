@extends('page.layout.master')
@section('content')
<div class="header">
    @include('page.layout.header')
</div>
<div class="wrapper">
    <div class="section1">
        <div class="row">
            <div class="account col-md-6">
                @foreach($users as $user)
                <p class="ml-5"><img class="icon pr-5" src="{{asset('img/icon/user.png')}}" alt="user">&nbsp;{{$user->phone}} (Level : {{$user->level}})</p>
                <p>Số Dư: <span class="money">{{number_format($user->money)}} VNĐ</span></p>
                @endforeach
                
            </div>
            <div class="nap-tien col-md-6">
                <a href="{{route('page.deposit')}}"> <button type="button" class="btn btn-info rounded-pill"><i><img class="icon" src="{{asset('img/icon/money.png')}}" alt=""> + </i>Nạp Tiền</button></a>
            </div>
        </div>        
    </div>
    <div class="section2">
        <div class="row">           

            <div class="trai-nghiem">
                <p class="title">Trải nghiệm (Nhận nuôi một lần)</p>
                
                @foreach($products as $value)
                @csrf  
                
                <div class="box-shadown row">
                    <div class="col-md-12 row">
                        <div class="col-md-1 col-3">
                            <img width="60px" height="60px" src="{{asset('img/product/'.$value->image)}}" alt="{{$value->image}}">
                        </div>
                        <div class="col-md-11 col-9">
                            <h5>{{$value->name}}</h5>
                            <p>Phí nhận nuôi: <span class="money"><del>{{number_format($value->phi_nhan_nuoi)}} vnđ</del></span></p>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-4">
                        <div class="col-md-4 text-center">
                            <p class="money">{{number_format($value->loi_nhan)}}</p>
                            <p>Lợi Nhuận/ Ngày</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{$value->time}}</p>
                            <p>Thời gian chăn nuôi (Ngày)</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">{{number_format($value->phi_giam_gia)}}</p>
                            <p>Phí nhận nuôi</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button onclick="add({{$value->id}})" type="button" class="btn btn-info text-white col-10">Nhận nuôi</button>                        
                    </div>
                </div>
                @endforeach                
                            
            </div>

            <!-- bảng xếp hạng  -->
            <div class="bxh">
                <p class="title">Bảng xếp hạng kiếm tiền</p> 
                <div class="box-shadown row">
                    <div class="col-md-12 row">
                        <div class="col-md-1 col-3">
                            <img width="60px" src="{{asset('img/icon/farmer.png')}}" alt="img1">
                        </div>
                        <div class="col-md-11 col-9">
                            <h5>Name 0915152829 <span class="money">Top 1</span></h5>
                            <p>Cấp độ: <span class="money">5</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-4">
                        <div class="col-md-4 text-center">
                            <p class="money">310,000 VNĐ</p>
                            <p>Thu Nhập</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">27</p>
                            <p>Giới thiệu người</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">790,000 VNĐ</p>
                            <p>Tài sản</p>
                        </div>
                    </div>
                </div>
                <div class="box-shadown row">
                    <div class="col-md-12 row">
                        <div class="col-md-1 col-3">
                            <img width="60px" src="{{asset('img/icon/farmer.png')}}" alt="img1">
                        </div>
                        <div class="col-md-11 col-9">
                            <h5>Name 0914653872 <span class="money">Top 2</span></h5>
                            <p>Cấp độ: <span class="money">3</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-4">
                        <div class="col-md-4 text-center">
                            <p class="money">120,000 VNĐ</p>
                            <p>Thu Nhập</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">15</p>
                            <p>Giới thiệu người</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">530,000 VNĐ</p>
                            <p>Tài sản</p>
                        </div>
                    </div>
                </div>
                <div class="box-shadown row">
                    <div class="col-md-12 row">
                        <div class="col-md-1 col-3">
                            <img width="60px" src="{{asset('img/icon/farmer.png')}}" alt="img1">
                        </div>
                        <div class="col-md-11 col-9">
                            <h5>Name 0945521786 <span class="money">Top 3</span></h5>
                            <p>Cấp độ: <span class="money">3</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-4">
                        <div class="col-md-4 text-center">
                            <p class="money">90,000 VNĐ</p>
                            <p>Thu Nhập</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">10</p>
                            <p>Giới thiệu người</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="money">270,000 VNĐ</p>
                            <p>Tài sản</p>
                        </div>
                    </div>
                </div>           
            </div>
        </div>        
    </div>
</div>
{{-- <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="{{asset('js/boot4alert.js')}}"></script>
<script>
  
  $("#confirm").on('click',function(){
    boot4.confirm({
    msg: "Yet another jQuery/Bootstrap dialog box plugin used to replace the native alert and confirmation popup boxes using Bootstrap 4 modal component.",
    title: "Confirm Message",
    callback: function(result) {
      if(result){
        alert('Confirmed')
      }
      else{
        console.log("cancel");
      }
    }
  });
  })
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
function add(id_product){
    $.ajax({
        url:"{{ route('addChanNuoi') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
        method:"POST", // phương thức gửi dữ liệu.
        data:{
                "_token" : '{{csrf_token()}}',
                "id_product" :id_product
            },
        success:function(data){ 
        if (data==1) {
            boot4.alert(
            {
              msg: 'Bạn đã nhậ nuôi thành công',
              callback: function() {
                window.location.assign("trang-trai");
              }
            },"OK"); 
        }else{
            boot4.alert(
            {
              msg: data,
              callback: function() {
              }
            },"OK"); 
        }
    }
})
}    
</script>
<style>
.header{
    margin-bottom: 15px;
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
    margin:20px 0px;
    background: #eaeaea;
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
    color: #d41111;
}
@media(max-width: 658px){
    .box-shadown p .money{
        font-size: 16px;
    }
    .carousel-item img{
        height: 180px !important;
    }

}
</style>
@endsection