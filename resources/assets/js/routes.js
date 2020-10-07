import Vue from 'vue';

import Router from 'vue-router';

Vue.use(Router);

export default new Router({
	routes: [
		{
			name: 'home',
			path: '/', 
			component: require('./views/Home')
		},
		{
			name: 'about',
			path: '/about', 
			component: require('./views/About')
		},
		{
			name: 'archive',
			path: '/archive', 
			component: require('./views/Archive')
		},
		{
			name: 'contact',
			path: '/contact', 
			component: require('./views/Contact')
		},
		,
		{
			name: 'show_post',
			path: '/article/:url', 
			component: require('./views/Post')
		},
		{
			path: '*', 
			component: require('./views/404')
		}
	],
	linkExactActiveClass: 'active',
	linkActiveClass: 'active-route'
});