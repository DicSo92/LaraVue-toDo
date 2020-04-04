<template>
    <div class="tasksComponent w-full">
        <h5 v-if="tasks.total">{{tasks.total}} tasks</h5>
        <ul class="">
            <transition-group name="list" tag="li">
                <li class="flex justify-center transitionSpinner"
                    :key="'loader'">
                    <img src="/images/timer-512.png"
                         alt="" class="loaderImg"
                         v-if="loading">
                </li>
                <ToDoListItem v-for="task in tasks.data"
                              :key="task.id"
                              :task="task"
                              :page="tasks.current_page">
                </ToDoListItem>
            </transition-group>
        </ul>
        <div class="flex mb-3">
            <button class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-1"
                    v-for="(page, index) in tasks.last_page"
                    :class="page === tasks.current_page ? 'bg-blue-500' : 'bg-blue-200'"
                    :key="page"
                    @click="getTasks(page)">
                {{page}}
            </button>
        </div>
    </div>
</template>

<script>
    import ToDoListItem from '../components/ToDoListItem.vue'

    export default {
        name: 'ToDoList',
        components: {
            ToDoListItem
        },
        data () {
            return {
                tasks: [],
                loading: false,
            }
        },
        created() {
            this.getTasks(1)
        },
        mounted() {
            this.$bus.$on("refreshTasks", newTasks => {
                this.tasks = newTasks
            })
        },
        computed: {

        },
        methods: {
            getTasks (page) {
                // this.tasks.data = []
                this.loading = true
                axios.get('/api/tasksList?page=' + page)
                    .then(response => {
                        this.tasks = response.data
                        this.loading = false
                        this.$store.commit('changePage', response.data.current_page)
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped lang="scss">
    .list-enter, .list-leave-to {
        opacity: 0;
        transform: translateX(-50px);
    }
    .list-leave-active {
        position: absolute;
        /*z-index: 10;*/
    }
    .list-move {
        transition: transform 0.5s;
    }

    .loaderImg {
        width: 40px;
        height: auto;
        animation: spin 4s linear infinite;
        //
        position: absolute;
        //
    }
    .transitionSpinner {
        transition: all 0.5s;
    }
    @keyframes spin {
        100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); }
    }
</style>
