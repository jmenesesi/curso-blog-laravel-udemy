@extends('layout')

@section('content')

    <section class="posts container">
        @if(isset($title))
            <h3>{{ $title }}</h3>
        @endif


        @foreach($posts as $post)

        <article class="post">
            @if($post->viewType('home'))
                @include($post->viewType('home'))
            @endif
            

            <div class="content-post">
                @include('posts.header')
                <h1>{{ $post->title }}</h1>
                <div class="divider"></div>
                <p>{{ $post->excerpt }}</p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="{{ route('post.show', $post)}}" class="text-uppercase c-green">Leer más</a>
                    </div>
                    @include('posts.tags')
                </footer>
            </div>

        </article>

        @endforeach

    </section><!-- fin del div.posts.container -->

    <div class="container container-flex">
        {{$posts->links()}}
    </div>
    

    

    @stop