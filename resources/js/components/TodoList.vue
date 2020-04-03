<template>
    <div class="tasksComponent">
        <ul class="">
            <li class="mb-4 p-3 rounded bg-gray-200 flex justify-between"
                v-for="task in tasks"
                :key="task.id">
                <p class="m-0">
                    {{task.name}}
                </p>
                <div class="">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </div>

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
