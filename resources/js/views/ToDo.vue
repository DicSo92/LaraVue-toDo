<template>
    <div class="home flex flex-col items-center pt-3">
        <h1 class="text-3xl">ToDo List</h1>
        <div class="flex w-full mb-3">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="username"
                   type="text"
                   placeholder="New task...">
            <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                Send
            </button>
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
