<template>
    <posts-list :posts="posts"></posts-list>
</template>
<script>
    export default {
    props: ['year', 'month'],
        data() {
            return {
                posts: []
            }
        },

        mounted: function() {
            axios.get(`/api/posts?year=${this.year}&month=${this.month}`).then(response => {
                this.posts = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        }

    }
</script>