<template>
	<section class="items container">
        <h3 v-if="title">{{title}}</h3>
        <post-list-item v-for="post in items" :post="post" :key="post.id"></post-list-item>
        <article class="post" v-if="!items.length">
            <div class="content-post">
                <h1>No hay publicaciones para mostrar.</h1>
            </div>
        </article>
    </section>
</template>
<script>
    export default {
        props: ['title', 'items'],
    }
</script>