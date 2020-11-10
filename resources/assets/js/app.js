
require('./bootstrap');

import Vue from 'vue';

import router from './routes';

Vue.component('example', require('./components/ExampleComponent.vue'));

Vue.component('posts-list', require('./components/PostsList.vue'));
Vue.component('post-list-item', require('./components/PostListItem.vue'));
Vue.component('post-header', require('./components/PostHeader.vue'));
Vue.component('category-link', require('./components/CategoryLink.vue'));
Vue.component('tag-link', require('./components/TagLink.vue'));
Vue.component('post-link', require('./components/PostLink'));
Vue.component('nav-bar', require('./components/NavBar.vue'));
Vue.component('disqus-comments', require('./components/DisqusComments.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('pagination-links', require('./components/PaginationLinks.vue'));
Vue.component('social-links', require('./components/SocialLinks.vue'));
Vue.component('contact-form', require('./components/ContactForm'));

const app = new Vue({
    el: '#app',
    router
});
