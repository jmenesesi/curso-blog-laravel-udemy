<div id="carouselControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($post->photos as $photo)
  <div class="item {{ $loop->first ? 'active' : ''}}">
        <img src="{{ url($photo->path) }}" style="width: 100%" alt="Image ">
      </div>
    @endforeach
  </div>
  <a class="left carousel-control" href="#carouselControls" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carouselControls" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>