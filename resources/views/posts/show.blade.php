@extends('layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
	<article class="post container">
    
    @if($post->viewType())
        @include($post->viewType())
    @endif
            
    <div class="content-post">
      @include('posts.header')
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          {!! $post->body !!}
        </div>

        <footer class="container-flex space-between">
          @include('partials.social-links', ['description' => $post->title])
          @include('posts.tags')
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus-script')
      </div><!-- .comments -->
    </div>
  </article>
@stop

@push('styles')
<link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css">
@endpush


@push('script')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/twitter-bootstrap.js"></script>
@endpush
