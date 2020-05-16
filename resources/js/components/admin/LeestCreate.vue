<template>
    <div class="container">
        <form v-on:submit.prevent="leestStore">
            <div>
                <label for="leest-title">Title</label>
                <input
                    type="text"
                    v-model="leest.title"
                    name="leest-title"
                    id="leest-title"
                />
            </div>
            <div>
                <input
                    class="px-5 py-2 bg-blue-300"
                    type="submit"
                    value="Submit"
                />
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                leest: {},
            };
        },
    }
</script>
