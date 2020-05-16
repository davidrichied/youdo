import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        name: "Home",
        path: "/home",
        component: () =>
            import(/* webpackChunkName: "Home" */ "../components/Home.vue")
    },
    {
        name: "LeestCreate",
        path: "/leest/create",
        component: () =>
            import(/* webpackChunkName: "LeestCreate" */ "../components/admin/LeestCreate.vue")
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;
