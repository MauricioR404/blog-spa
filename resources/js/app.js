

require('./bootstrap');

window.Vue = require('vue');

Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('posts-list', require('./components/PostsList.vue').default);
Vue.component('posts-list-item', require('./components/PostsListItem.vue').default);
Vue.component('disqus-comments', require('./components/DisqusComments.vue').default);
Vue.component('pagination-links', require('./components/PaginationLinks.vue').default);
Vue.component('form-contact', require('./components/FormContact.vue').default);

import router from './routes';

const app = new Vue({
    el: '#app',
    router
});
