<template>
    <div class="container">
        <div v-for="item in items">
            {{ item.title }}
        </div>
        <router-link :to="{ name: 'LeestCreate' }">Create List</router-link>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                items: [],
            };
        },
        mounted() {
            axios.get('/api/items').then((res) => {
                this.items = res.data.items;
            });
        }
    }
</script>
