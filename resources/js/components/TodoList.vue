<template>
    <div class="tasksComponent">
        <div class="my-3">
            <h1 class="">ToDo List</h1>
        </div>
        <ul class="">
            <li class=""
                v-for="task in tasks"
                :key="task.id">
                {{task.name}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'TasksComponent',
        data () {
            return {
                tasks: {}
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/api/tasksList')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error))
        },
        mounted() {
            console.log('Component about mounted.')
        }
    }
</script>
