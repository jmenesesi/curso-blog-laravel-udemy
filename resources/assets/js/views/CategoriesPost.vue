<template>
	<posts-list :posts="posts" :title="title"></posts-list>
</template>
<script>
    export default {
        props: ['category'],
        data() {
            return {
            	title: '',
                posts: []
            }
        },

        mounted: function() {
            axios.get(`/api/categories/${this.category}`).then(response => {
                this.posts = response.data.posts.data;
                this.title = response.data.title;

            }).catch(error => {
                console.log(error);
            });
        }

    }
</script>