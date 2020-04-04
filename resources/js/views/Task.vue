<template>
    <div class="task">
        <transition name="fade">
            <div v-if="alerts">
                <Alert v-for="(alert, index) in alerts.alerts"
                       :key="index"
                       :message="alert"
                       :positive="alerts.positive">
                </Alert>
            </div>
        </transition>
        <div class="" v-if="!loading">
            <h1 class="text-4xl font-bold my-4">Task #{{this.$route.params.taskId}}</h1>
            <div class="mb-4 p-3 rounded bg-gray-200 hover:bg-gray-300 cursor-pointer flex justify-between items-center transitionItem"
                 @click="">
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
                       ref="inputEdit"
                       @click.stop>
                <div class="ml-2" @click.stop="editTask">
                    <svg class="fill-current h-6 w-6 text-black svg-icon" role="button" viewBox="0 0 20 20">
                        <title>Edit</title>
                        <path d="M19.404,6.65l-5.998-5.996c-0.292-0.292-0.765-0.292-1.056,0l-2.22,2.22l-8.311,8.313l-0.003,0.001v0.003l-0.161,0.161c-0.114,0.112-0.187,0.258-0.21,0.417l-1.059,7.051c-0.035,0.233,0.044,0.47,0.21,0.639c0.143,0.14,0.333,0.219,0.528,0.219c0.038,0,0.073-0.003,0.111-0.009l7.054-1.055c0.158-0.025,0.306-0.098,0.417-0.211l8.478-8.476l2.22-2.22C19.695,7.414,19.695,6.941,19.404,6.65z M8.341,16.656l-0.989-0.99l7.258-7.258l0.989,0.99L8.341,16.656z M2.332,15.919l0.411-2.748l4.143,4.143l-2.748,0.41L2.332,15.919z M13.554,7.351L6.296,14.61l-0.849-0.848l7.259-7.258l0.423,0.424L13.554,7.351zM10.658,4.457l0.992,0.99l-7.259,7.258L3.4,11.715L10.658,4.457z M16.656,8.342l-1.517-1.517V6.823h-0.003l-0.951-0.951l-2.471-2.471l1.164-1.164l4.942,4.94L16.656,8.342z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-3"
            v-else>
            <img src="/images/timer-512.png"
                 alt="" class="loaderImg">
        </div>
    </div>
</template>

<script>
    import Alert from '../components/Alert.vue'

    export default {
        name: "Task",
        components: {
            Alert
        },
        data () {
            return {
                task: null,
                loading: false,
                editing: false,
                edit: '',
                alerts: null
            }
        },
        created() {
            this.getTask()
        },
        methods: {
            getTask () {
                // this.tasks.data = []
                this.loading = true
                axios.get(`/api/tasksList/${this.$route.params.taskId}`)
                    .then(response => {
                        this.task = response.data
                        this.edit = this.task.name
                        this.loading = false
                    })
                    .catch(error => console.log(error))
            },
            editTask () {
                if (!this.editing) {
                    this.editing = true
                    this.$nextTick( () => this.$refs.inputEdit.focus() )
                } else {
                    axios.put(`/api/tasksList/${this.task.id}?page=${this.$store.state.page}`, {
                        name: this.edit
                    })
                        .then(response => {
                            this.task = response.data.task
                            this.editing = false
                            this.showAlert({positive: true, alerts: ["Task successfully edited"]})
                        })
                        .catch(error => {
                            console.log(error)
                            this.showAlert({positive: false, alerts: error.response.data.errors.name})
                        })
                }
            },
            showAlert (alerts) {
                this.alerts = alerts
                setTimeout( () => {
                    this.alerts = null
                }, 2500);
            }
        }
    }
</script>

<style scoped lang="scss">
    .loaderImg {
        width: 60px;
        height: auto;
        animation: spin 4s linear infinite;
    }
    @keyframes spin {
        100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); }
    }
</style>
