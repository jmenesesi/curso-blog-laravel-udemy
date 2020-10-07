
require('./bootstrap');

import Vue from 'vue';

import router from './routes';

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
