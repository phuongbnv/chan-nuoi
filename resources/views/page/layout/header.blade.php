<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @for($i=1;$i<=5;$i++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
    @endfor
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('img/slide2.jpeg')}}" style="width:100%; height:350px">
    </div>
    @for($i=1;$i<=5;$i++)
    <div class="carousel-item">
      <img src="{{asset('img/slide'.$i.'.jpeg')}}" style="width:100%; height:350px">
    </div>
    @endfor    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
