<template>
    <div class="tasksComponent">
        <ul class="">
            <li class="mb-4 bg-gray-200"
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
            axios.get('/api/tasksList')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error))
        },
        mounted() {
            console.log('Component about mounted.')
        }
    }
</script>
