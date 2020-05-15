import Vue from "vue";
import Vuex from "vuex";
import todo from "./_todo.js";
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        todo
    },
});