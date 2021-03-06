import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: require('./views/Home').default
    },
    {
      path: '/nosotros',
      name: 'about',
      component: require('./views/About').default
    },
    {
      path: '/contacto',
      name: 'contact',
      component: require('./views/Contact').default
    },
    {
      path: '/blog/:url',
      name: 'posts_show',
      component: require('./views/PostsShow').default,
      props: true
    },
    {
      path: '/etiquetas/:tag',
      name: 'tags_posts',
      component: require('./views/TagsPosts').default,
      props: true
    },
  ],
  linkExactActiveClass: 'active',
  mode: 'history',
})