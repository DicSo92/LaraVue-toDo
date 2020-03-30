/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import HomeComponent from "./components/HomeComponent";
import ToDoComponent from "./components/ToDoComponent";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/toDoList',
            name: 'toDoList',
            component: ToDoComponent,
        },
    ],
});

// Vue.component('home-component', require('./components/HomeComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
