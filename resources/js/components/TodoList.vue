<template>
    <div class="tasksComponent w-full">
        <ul class="">
            <ToDoListItem v-for="task in tasks"
                          :key="task.id" :task="task">
            </ToDoListItem>
        </ul>
    </div>
</template>

<script>
    import ToDoListItem from '../components/ToDoListItem.vue'

    export default {
        name: 'TasksComponent',
        components: {
            ToDoListItem
        },
        data () {
            return {
                tasks: []
            }
        },
        created() {
            axios.get('/api/tasksList')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error))
        },
        mounted() {
            this.$bus.$on("newTask", newTasks => {
                this.tasks = newTasks
            })
        }
    }
</script>
