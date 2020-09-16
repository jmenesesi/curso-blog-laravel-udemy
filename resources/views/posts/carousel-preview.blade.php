<div class="gallery-photos" data-masonry='{"itemSelector": ".grid-item", "columnWidth" : 464}'>
    @foreach($post->photos->take(4) as $photo)
    <div class="grid-item grid-item--height2 img-bg" style="background-image: url('{{ url($photo->path) }}');">
    @if($loop->iteration === 4)
        <div class="overlay">
            {{$post->photos->count()}}
        </div>
    @endif
    <!--<img src="{{url($photo->path)}}" class="img-responsive" width="100%" alt="">-->
    </div>
@endforeach
</div>
