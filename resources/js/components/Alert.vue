<template>
    <div class="alert border-l-4 p-4 absolute"
         :class="positive ? 'bg-green-100 border-green-500 text-green-700' : 'bg-orange-100 border-orange-500 text-orange-700'"
         role="alert">
        <p class="font-bold">{{positive ? 'Success !' : 'Oups !'}}</p>
        <p>{{message}}</p>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: [
            "message",
            "positive"
        ]
    }
</script>

<style scoped lang="scss">
    .alert {
        top: 5px;
        left: 20px;
    }
</style>
