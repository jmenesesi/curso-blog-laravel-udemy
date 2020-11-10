<template>
	<div>
		<header class="container-flex space-between">
          <div class="date">
            <span class="c-gris">
                {{ post.published_date }} | {{ post.owner.name }}
            </span>
          </div>
          <div class="post-category">
            
            <span class="category" v-if="post.category">
                <category-link :category="post.category" />
            </span>
              <span class="category" v-if="!post.category">
              Sin categoría
              </span>
          </div>
        </header>
		<h1>{{ post.title }}</h1>
        <div class="divider"></div>
	</div>
</template>

<script>
	export default {
		props: ['post']
	}
</script>