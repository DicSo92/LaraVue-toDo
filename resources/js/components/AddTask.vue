<template>
    <div class="flex w-full mb-3">
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="username"
               type="text"
               placeholder="New task..."
               v-model="newTask">
        <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button"
                @click="addTask">
            Add
        </button>
    </div>
</template>

<script>
    export default {
        name: "AddTask",
        data () {
            return {
                newTask: ''
            }
        },
        methods: {
            addTask () {
                axios.post(`/api/tasksList?page=1`, {
                    name: this.newTask
                })
                    .then(response => this.$bus.$emit("refreshTasks", response.data))
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped lang="scss">

</style>
