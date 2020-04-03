require('./bootstrap');

window.Vue = require('vue');


import store from './store'
import VueRouter from 'vue-router'
Vue.use(VueRouter)



let bus = new Vue
Vue.prototype.$bus = bus



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
    store,
    components: {
        index: Index
    }
});
