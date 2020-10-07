<template>
	
	<article class="post container">
    
    <!-- @if($post->viewType())
        @include($post->viewType())
    @endif -->
            
    <div class="content-post">
<!--       @include('posts.header') -->
      <!-- <h1>{{ $post->title }}</h1> -->
      	<h1>{{ post.title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text" v-html="post.body">
          <!-- {!! $post->body !!} -->
        </div>

        <footer class="container-flex space-between">
          <!-- @include('partials.social-links', ['description' => $post->title])
          @include('posts.tags') -->
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        <!-- @include('partials.disqus-script') -->
      </div><!-- .comments -->
    </div>
  </article>
</template>

<script>
	export default {
		data() {
			return {
				post: {}
			}
		},

		mounted() {
            axios.get(`/api/posts/${this.$route.params.url}`).then(response => {
            	console.log(response);
                this.post = response.data;

            }).catch(error => {
                console.log(error);
            });
        }
	}
</script>