<template>
    <div class="container">
        <div class="row justify-content-center my-3">
            <h1 class="">ToDo List</h1>
        </div>
        <ul class="list-group">
            <li class="list-group-item"
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
