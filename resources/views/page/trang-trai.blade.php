@extends('page.layout.master')
@section('content')
<div class="wrapper">    
    <div class="row">
        <div class="tablink col-6 text-center" id="defaultOpen" onclick="openPage('thu-nhap', this,'#0dcaf0')">
            Thu Nhập
        </div>
        <div class="tablink col-6 text-center" onclick="openPage('hoan-thanh', this,'#0dcaf0')">
            Hoàn Thành
        </div>
    </div>
    
    <div id="section2" class="section2">
        <div class="row">    
            <div id="thu-nhap" class="tabcontent ">
            <input id="count_thu_nhap" type="hidden" value="{{count($thu_nhap)}}">
                @if(!count($thu_nhap))
                <h3 class="mt-5 text-center">Bạn vui lòng chọn vật nuôi tiếp theo!</h3>
                @endif
                @foreach($thu_nhap as $key => $value)
                <div class="trai-nghiem row">
                    <div class="box-shadown">
                        <div class="time">
                            Thời gian chăn nuôi
                        </div>
                        <div class="col-md-12 row mt-4">
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->loi_nhan)}}</p>
                                <p>Thu nhập mỗi ngày</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->loi_nhan * $value->time)}}</p>
                                <p>Lợi nhuận dự kiến</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->phi_nhan_nuoi)}}</p>
                                <p>Phí nhận nuôi</p>
                            </div>
                        </div>
                        <div class="col-md-12 row mt-4">
                            <div class="col-md-1 col-3">
                                <img width="60px" height="60px" src="{{asset('img/product/'.$value->image)}}" alt="img1">
                            </div>
                            <div class="col-md-11 col-9">
                                <h5>{{$value->name}}</h5>
                                <span>Đang trong thời gian chăn nuôi....</span>                                
                            </div>
                        </div>
                        <div class="col-md-12 con-lai mt-2">

                            <div style="position: relative;">
                                @php 
                                    $newdate = strtotime ( '+'.$value->time. 'day' , strtotime ( $value->created_at )) ;
                                    $newdate = date ( 'Y-m-d H:i:s' , $newdate );                           
                                    $your_date = strtotime($newdate);
                                    $datediff = $your_date - time();                                                                                               
                                @endphp
                                <span> Còn {{round($datediff / (60 * 60))}} giờ nữa hoàn thành</span>
                                <input type="hidden" name="{{round($datediff / (60 * 60))}}" value="{{$value->id_history}}" id="time-{{$key}}">
                            </div>                                                        
                        </div>                     
                    </div>            
                </div> 
                
                @endforeach  
            </div>

            <div id="hoan-thanh" class="tabcontent">
                @if(!count($hoan_thanh))
                <h3 class="mt-5 text-center">Bạn chưa có vật nuôi nào hoàn thành!</h3>
                @endif
                @foreach($hoan_thanh as $value)
                <div class="trai-nghiem row">
                    <div class="box-shadown">
                        <div class="time">
                            Hoàn thành
                        </div>
                        <div class="col-md-12 row mt-4">
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->loi_nhan)}}</p>
                                <p>Thu nhập mỗi ngày</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->loi_nhan * $value->time)}}</p>
                                <p>Lợi nhuận dự kiến</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p class="money">{{number_format($value->phi_nhan_nuoi)}}</p>
                                <p>Phí nhận nuôi</p>
                            </div>
                        </div>
                        <div class="col-md-12 row mt-4">
                            <div class="col-md-1 col-3">
                                <img width="60px" height="60px" src="{{asset('img/product/'.$value->image)}}" alt="img1">
                            </div>
                            <div class="col-md-11 col-9">
                                <h5>{{$value->name}}</h5>
                                <span>Hoàn thành</span>                                
                            </div>
                        </div>                
                    </div>            
                </div>
                @endforeach
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
.con-lai span,.con-lai button {
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
    top: 20px;
    right: 0;
    background: #30a569;
    border-radius: 0 20px;
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

<script>
window.onload = function() {
    
  for (var i = 0; i < $('#count_thu_nhap').val(); i++) {
      let time = document.getElementById('time-'+i).name;
      let id_history = $('#time-'+i).val()
      if (time<=0) {
        ajax(id_history)
      }
  }
};

function ajax(id_history){
    $.ajax({
        type:"POST",
        url:"{{route('page.ajax_history')}}",
        data:{
            "_token" : '{{csrf_token()}}',
            "id_history" : id_history,
        },
        success:function(data) {
            boot4.alert(
            {
              msg: data,
              callback: function() {
                window.location.assign("trang-trai");
              }
            },"OK");  
            
        }
    });
}


</script>
@endsection