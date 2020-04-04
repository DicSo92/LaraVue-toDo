<template>
    <li class="mb-4 p-3 rounded bg-gray-200 flex justify-between items-center transitionItem">
        <p class="m-0" v-if="!editing">
            {{task.name}}
        </p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="username"
               type="text"
               placeholder="Edit..."
               v-model="edit"
               v-else
               @keyup.enter="editTask"
               ref="inputEdit">
        <div class="flex">
            <div class="ml-2" @click="editTask">
                <svg class="fill-current h-6 w-6 text-black svg-icon" role="button" viewBox="0 0 20 20">
                    <title>Edit</title>
                    <path d="M19.404,6.65l-5.998-5.996c-0.292-0.292-0.765-0.292-1.056,0l-2.22,2.22l-8.311,8.313l-0.003,0.001v0.003l-0.161,0.161c-0.114,0.112-0.187,0.258-0.21,0.417l-1.059,7.051c-0.035,0.233,0.044,0.47,0.21,0.639c0.143,0.14,0.333,0.219,0.528,0.219c0.038,0,0.073-0.003,0.111-0.009l7.054-1.055c0.158-0.025,0.306-0.098,0.417-0.211l8.478-8.476l2.22-2.22C19.695,7.414,19.695,6.941,19.404,6.65z M8.341,16.656l-0.989-0.99l7.258-7.258l0.989,0.99L8.341,16.656z M2.332,15.919l0.411-2.748l4.143,4.143l-2.748,0.41L2.332,15.919z M13.554,7.351L6.296,14.61l-0.849-0.848l7.259-7.258l0.423,0.424L13.554,7.351zM10.658,4.457l0.992,0.99l-7.259,7.258L3.4,11.715L10.658,4.457z M16.656,8.342l-1.517-1.517V6.823h-0.003l-0.951-0.951l-2.471-2.471l1.164-1.164l4.942,4.94L16.656,8.342z"></path>
                </svg>
            </div>
            <div class="ml-1" @click="deleteTask">
                <svg class="fill-current h-6 w-6 text-red-500 svg-icon" role="button" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        name: "ToDoListItem",
        props: ["task", "page"],
        data() {
            return {
                editing: false,
                edit: ''
            }
        },
        created () {
            this.edit = this.task.name
        },
        methods: {
            deleteTask () {
                axios.delete(`/api/tasksList/${this.task.id}?page=${this.page}`)
                    .then(response => {
                        this.$bus.$emit("refreshTasks", response.data)
                        this.$bus.$emit("showAlert", {positive: true, alerts: ["Task successfully deleted"]})
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            editTask () {
                if (!this.editing) {
                    this.editing = true
                    this.$nextTick( () => this.$refs.inputEdit.focus() )
                } else {
                    // Confirm input and edit
                    axios.put(`/api/tasksList/${this.task.id}?page=${this.page}`, {
                        name: this.edit
                    })
                        .then(response => {
                            this.$bus.$emit("refreshTasks", response.data)
                            this.editing = false
                            this.$bus.$emit("showAlert", {positive: true, alerts: ["Task successfully edited"]})
                        })
                        .catch(error => {
                            console.log(error)
                            this.$bus.$emit("showAlert", {positive: false, alerts: error.response.data.errors.name})
                        })
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .transitionItem {
        transition: all 0.5s;
    }
    .svg-icon {
        width: 22px;
        height: auto;
    }
</style>
