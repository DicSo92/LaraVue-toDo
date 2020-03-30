<template>
    <div class="container">
        <div class="row justify-content-center my-3">
            <h1 class="">ToDo List</h1>
        </div>
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
