<template>
    <div class="container">
        <p>
            <router-link :to="{ name: 'home'}">Page 1</router-link> |
            <router-link :to="{ name: 'toDo'}">Page 2</router-link>
        </p>

        <router-view></router-view>
    </div>
</template>

<script>
    // import HomeComponent from '../components/HomeComponent.vue'

    export default {
        name: 'Home',
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
