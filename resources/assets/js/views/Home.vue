<template>
<section class="posts container">
        <!-- @if(isset($title)) -->
            <h3><!-- $title --></h3>
        <!-- @endif -->

        <article v-for="post in posts" class="post">
           <!--  @if($post->viewType('home'))
                @include($post->viewType('home'))
            <!-- @endif -->
            

            <div class="content-post">
                <!-- @include('posts.header') -->
                <header class="container-flex space-between">
                  <div class="date">
                    <span class="c-gris">
                        {{ post.published_date }} | {{ post.owner.name }}
                    </span>
                  </div>
                  <div class="post-category">
                    
                    <span class="category" v-if="post.category">
                        <!-- <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a> -->
                        <a href="#">{{ post.category.name }}</a>
                    </span>
                      <span class="category" v-if="!post.category">
                      Sin categoría
                      </span>
                  </div>
                </header>

                <!-- <h1>{{ $post->title }}</h1> -->
                <h1 v-text="post.title"></h1>

                <div class="divider"></div>
                <!-- <p>{{ $post->excerpt }}</p> -->
                <p v-text="post.excerpt"></p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <!-- <a href="{{route('post.show', $post)}}" class="text-uppercase c-green">Leer más</a> -->
                        <router-link :to="{name: 'show_post', params: { url: post.url} }" class="text-uppercase c-green">Leer más</router-link>
                    </div>
                    <!-- @include('posts.tags') -->
                    <div class="tags container-flex">
                        <!-- @foreach($post->tags as $tag) -->
                            <!-- <span class="tag c-gris"><a href="{{ route('tags.show', $tag) }}">#{{$tag->name}}</a></span> -->
                        <!-- @endforeach -->
                        <span class="tag c-gris" v-for="tag in post.tags">
                            <a href="#">#{{tag.name}}</a>
                        </span>
                    </div>
                </footer>
            </div>

        </article>
<!--         @empty -->
        <article class="post" v-if="!posts.length">
            <div class="content-post">
                <h1>No hay publicaciones para mostrar.</h1>
            </div>
        </article>

        <!-- @endforelse -->

    </section><!-- fin del div.posts.container -->

     
    <!-- {{$posts->appends(request()->all())->links()}} -->
</template>
<script>
    export default {

        data() {
            return {
                posts: []
            }
        },

        mounted: function() {
            axios.get('/api/posts').then(response => {
                this.posts = response.data.data;

            }).catch(error => {
                console.log(error);
            });
        }

    }
</script>