<template>
    <div class="container">
        <div v-if="leests.length > 0">
            <div v-for="leest in leests">
                {{ leest.title }}
            </div>
        </div>
        <div v-else>
            You don't have any todo lists, yet.
        </div>
        <router-link :to="{ name: 'LeestCreate' }">Create List</router-link>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                leests: [],
            };
        },
        mounted() {
            axios.get('/api/home').then((res) => {
                this.leests = res.data.leests;
            });
        }
    }
</script>
