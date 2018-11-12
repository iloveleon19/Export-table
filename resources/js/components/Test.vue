<template>
    <div :class="{active:false,bg:true}" :style="{backgroundImage:`url('${path}')`}">
        <ul>
            <li v-for="(item, index) in tasks" :key="index"><font size="18" color="red">{{ item }}</font></li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks:[],
                isActive:false,
                path:'/images/IMG_1.jpg',
                info:[{title:'title001'},{title:'title002'}],
            }
        },
        mounted() {
            this.$http
                .get('/tasks')
                .then((response) => {
                    this.tasks = response.data;
                })
            console.log('Component mounted.')
        },

    }
</script>