<template>
    <div class="ToDo flex flex-col items-center pt-3">
        <transition name="fade">
            <div v-if="alerts">
                <Alert v-for="(alert, index) in alerts.alerts"
                       :key="index"
                       :message="alert"
                       :positive="alerts.positive">
                </Alert>
            </div>
        </transition>
        <h1 class="text-3xl">ToDo List</h1>
        <AddTask></AddTask>
        <ToDoList></ToDoList>
    </div>
</template>

<script>
    import ToDoList from '../components/ToDoList'
    import AddTask from '../components/AddTask'
    import Alert from '../components/Alert'

    export default {
        name: 'ToDo',
        components: {
            ToDoList,
            AddTask,
            Alert
        },
        data () {
            return {
                alerts: null
            }
        },
        created() {

        },
        mounted() {
            console.log('Vue ToDo mounted.')

            this.$bus.$on('showAlert', alerts => {
                this.showAlert(alerts)
            })
        },
        methods: {
            showAlert (alerts) {
                this.alerts = alerts
                setTimeout( () => {
                    this.alerts = null
                }, 2500);
            }
        }
    }
</script>
