<template>
    <div class="container">
        <div class="row justify-content-center my-3">
            <h1 class="">Home</h1>
        </div>
        <HomeComponent></HomeComponent>
    </div>
</template>

<script>
    import HomeComponent from '../components/HomeComponent.vue'

    export default {
        name: 'Home',
        components: {
            HomeComponent
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
