<div class="menu">
    <div class="sub text-center">
        <a href="{{route('page.home')}}">
            <p><img src="{{asset('img/icon/home2.png')}}" alt=""></p>
        Home</a>
    </div>
    <div class="sub text-center">
        <a href="{{route('page.trang_trai')}}">
            <p><img src="{{asset('img/icon/barn.png')}}" alt=""></p>
        Trang Trại</a>
    </div>
    <div class="sub text-center">
        <a href="{{route('page.tiet_kiem')}}">
            <p><img src="{{asset('img/icon/piggy-bank.png')}}" alt=""></p>
        Tiết Kiệm</a>
    </div>
    <div class="sub text-center">
        <a href="{{route('page.pagelink')}}">
            <p><img src="{{asset('img/icon/open.png')}}" alt=""></p>
        Link Mời</a>
    </div>
    <div class="sub text-center">
        <a href="{{route('page.profile')}}">
            <p><img src="{{asset('img/icon/farmer.png')}}" alt=""></p>
        Cá Nhân</a>
    </div>
</div>
<style>
    .menu{
        display: flex;
        width: 100%;
    }
    .menu p img{
        width: 25px;
    }
    .menu .sub{
        width: 20%;
    }
    .menu .sub a{
        text-transform: uppercase;
        text-decoration: none;
        color: white;
    }
    .icon{
        width:25px;
    }
</style>