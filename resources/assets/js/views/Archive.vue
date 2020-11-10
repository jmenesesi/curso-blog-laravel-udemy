<template>
<section class="pages container">
    <div class="page page-archive">
        <h1 class="text-capitalize">archive</h1>
        <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <div class="container-flex space-between">
            <div class="authors-categories">
                <h3 class="text-capitalize">authors</h3>
                <ul class="list-unstyled">
                    <li v-for="author in authors">{{author.name}}</li>
                </ul>
                <h3 class="text-capitalize">categories</h3>
                <ul class="list-unstyled">
                    <li class="text-capitalize" v-for="category in categories">
                        <router-link :to="{name: 'categories_post', params: {category: category.url}}">{{category.name}}</router-link>
                    </li>
                </ul>
            </div>
            <div class="latest-posts">
                <h3 class="text-capitalize">latest posts</h3>
                    <p v-for="post in posts">
                        <router-link :to="{name: 'show_post', params: {url: post.url}}">{{post.title}}</router-link>
                    </p>
                <h3 class="text-capitalize">posts by month</h3>
                <ul class="list-unstyled text-capitalize">
                        <li v-for="post in archive">
                            <router-link :to="{name: 'post_date', params: {year: post.year, month: post.month}}">{{post.monthname}} {{post.year}} ({{post.posts}})</router-link>

                            <!-- <a href="{{route('pages.home', ['month'=> $post->month, 'year' => $post->year])}}">
                                {{$post->monthname}} {{$post->year}} ({{$post->posts}})
                            </a> -->
                        </li>
                </ul>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    export default {
        data() {
            return {
                authors: [],
                categories: [],
                posts: [],
                archive: [],
            }
        },

        mounted: function() {
            axios.get('/api/archive').then(response => {
                console.log(response);
                this.authors = response.data.authors;
                this.categories = response.data.categories;
                this.posts = response.data.posts;
                this.archive = response.data.archive;

            }).catch(error => {
                console.log(error);
            });
        }

    }
</script>