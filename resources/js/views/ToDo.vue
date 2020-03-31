<template>
    <div class="home flex flex-col items-center pt-3">
        <h1 class="text-3xl">ToDo List</h1>
        <ToDoList></ToDoList>
    </div>
</template>

<script>
    import ToDoList from '../components/ToDoList.vue'

    export default {
        name: 'ToDo',
        components: {
            ToDoList
        },
        data () {
            return {
            }
        },
        created() {

        },
        mounted() {
            console.log('Vue ToDo mounted.')
        }
    }
</script>
