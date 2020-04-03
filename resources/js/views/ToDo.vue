<template>
    <div class="home flex flex-col items-center pt-3">
        <h1 class="text-3xl">ToDo List</h1>
        <AddTask></AddTask>
        <ToDoList></ToDoList>
    </div>
</template>

<script>
    import ToDoList from '../components/ToDoList.vue'
    import AddTask from '../components/AddTask.vue'

    export default {
        name: 'ToDo',
        components: {
            ToDoList,
            AddTask
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
