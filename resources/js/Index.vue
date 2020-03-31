<template>
    <div class="index flex flex-col justify-start items-center">
        <div class="flex justify-center">
            <p class="mx-2 link">
                <router-link :to="{ name: 'home'}" exact-active-class="text-blue-400">Home</router-link>
            </p>
            |
            <p class="mx-2 link">
                <router-link :to="{ name: 'toDo'}" exact-active-class="text-blue-400">ToDoList</router-link>
            </p>
        </div>
        <div class="w-2/3">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    // import HomeComponent from '../components/HomeComponent.vue'

    export default {
        name: 'Index',
        components: {
        },
        data () {
            return {
            }
        },
        created() {

        },
        mounted() {
            console.log('Vue home mounted.')
        }
    }
</script>

<style type="scss">
    .link:hover {
        color: indianred;
        cursor: pointer;
    }
</style>
