require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Index from "./Index";

import Home from "./views/Home";
import ToDo from "./views/ToDo";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/toDo',
            name: 'toDo',
            component: ToDo,
        },
    ],
});

// Vue.component(
//     'home-component',
//     require('./components/HomeComponent.vue').default
// );


const app = new Vue({
    el: '#app',
    router,
    components: {
        index: Index
    }
});
