<template>
		<div class="pagination" v-if="pagination.last_page > 1">
            <ul class="list-unstyled container-flex space-center">
            	<li v-if="!onFirstPage()">
            		<router-link :to="{
	                    name: 'home',
	                    query: {
	                        page: 1
	                    }
	                    }"
	                    rel="prev">&laquo;</router-link>            		
            	</li>
                
        		<li v-if="onLastPage() && previousPageUrl() > 1 ">
                    <router-link :to="{
                        name: 'home',
                        query: {
                            page: previousPageUrl() - 1
                        }
                        }">{{previousPageUrl() - 1}}</router-link>
                </li>
        		<li v-if="!onFirstPage()">
                    <router-link :class="getActiveClass(previousPageUrl())" :to="{
                        name: 'home',
                        query: {
                            page: previousPageUrl()
                        }
                        }">{{previousPageUrl()}}</router-link>
                </li>
        		<li>
                    <router-link :class="getActiveClass(currentPage())" :to="{
                        name: 'home',
                        query: {
                            page: currentPage()
                        }
                        }">{{currentPage()}}</router-link>
                </li>
                <li v-if="!onLastPage()">
                    <router-link :class="getActiveClass(nextPage())" :to="{
                        name: 'home',
                        query: {
                            page: nextPage()
                        }
                        }">{{nextPage()}}</router-link>
                </li>
                <li v-if="onFirstPage() && nextPage() < lastPage()">
                    <router-link :to="{
                        name: 'home',
                        query: {
                            page: nextPage() + 1
                        }
                        }">{{nextPage() + 1}}</router-link>
                </li>
        		<li v-if="hasMorePages()">
        			<router-link :to="{
	                    name: 'home',
	                    query: {
	                        page: lastPage()
	                    }
	                    }"
	                    rel="next">&raquo;</router-link>
	            </li>
                
            </ul>
        </div>
</template>
<script>
	export default {
		props: ['pagination'],
		methods: {
            getActiveClass(page) {
                return [
                    !this.$route.query.page && page == 1 ? 'active' : ''
                ];
            },
            onFirstPage() {
            	return (this.pagination.current_page == 1);
            },
            previousPageUrl(){
            	return (this.pagination.current_page - 1);
            },
            currentPage() {
            	return this.pagination.current_page;
            },
            lastPage() {
            	return this.pagination.last_page;
            },
            onLastPage() {
            	return this.pagination.current_page == this.pagination.last_page;
            },
            hasMorePages() {
            	return ((this.pagination.current_page + 1) <= this.pagination.last_page);
            },

            nextPage() {
            	return (this.pagination.current_page + 1);
            }
        }
	}
</script>