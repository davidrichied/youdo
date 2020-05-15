import router from "./router";
import store from "./store";

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    router,
    store,
    el: '#app',
});
