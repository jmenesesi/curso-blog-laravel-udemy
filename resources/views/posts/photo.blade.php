<figure>
	<img 
		src="{{ url($post->photos->first()->path) }}" 
		alt="Foto: {{ $post->title}}" 
		class="img-responsive">
</figure>