<header class="container-flex space-between">
  <div class="date">
    <span class="c-gris">{{ optional($post->published_at)->diffForHumans()}} | {{ $post->owner->name }}</span>
  </div>
  <div class="post-category">
    
    <span class="category">
      @if($post->category)
      <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
      @else
      Sin categoría
      @endif
      </span>
  </div>
</header>