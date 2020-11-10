<template>
	
	<article class="post container">
    
    <!-- @if($post->viewType())
        @include($post->viewType())
    @endif -->
            
    <div class="content-post">
<!--       @include('posts.header') -->

		<post-header :post="post"></post-header>
      <!-- <h1>{{ $post->title }}</h1> -->
      	
        <div class="image-w-text" v-html="post.body">
          <!-- {!! $post->body !!} -->
        </div>

         <footer class="container-flex space-between">
              <social-links :description="post.title" />
              <div class="tags container-flex">
                  <span class="tag c-gris" v-for="tag in post.tags">
                      <tag-link :tag="tag" />
                  </span>
              </div>
          </footer> 
      <div class="comments">
      <div class="divider"></div>
        <disqus-comments></disqus-comments>
        <!-- @include('partials.disqus-script') -->
      </div><!-- .comments -->
    </div>
  </article>
</template>

<script>
	export default {
    props: ['url'],
		data() {
			return {
				post: { owner: {}, category: {} }
			}
		},

		mounted() {
            axios.get(`/api/posts/${this.url}`).then(response => {
            	console.log(response);
                this.post = response.data;

            }).catch(error => {
                console.log(error);
            });
        }
	}
</script>