<template>
    <posts-list :posts="posts" :title="title"></posts-list>
</template>
<script>
    export default {
        props: ['tag'],
        data() {
            return {
            	title: '',
                posts: [],
                tagUrl: this.tag
            }
        },

        mounted: function() {
            this.getPosts();
        },
        
        /*beforeRouteUpdate(to, from, next) {
            this.tagUrl = to.params.tag;
            this.getPosts();
            next();
        },*/
        methods: {
            getPosts() {
                return axios.get(`/api/tags/${this.tag}`).then(response => {
                    this.posts = response.data.posts.data;
                    this.title = response.data.title;
                }).catch(error => {
                    console.log(error);
                });
            }
        }

    }
</script>