require("./bootstrap");
require("./front");

window.Vue = require("vue").default;

//Import View Router
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Routes
import { routes } from "./router/index";

//Register Routes
const router = new VueRouter({
    routes: routes,
    mode: "hash",
    linkExactActiveClass: "active"
});

import Vuex from "vuex";
Vue.use(Vuex);

//Vuetify
import Vuetify from "../plugins/vuetify";

//Nav Components
Vue.component("topnav", require("./components/Topnav.vue").default);
Vue.component("sidenav", require("./components/Sidenav.vue").default);

const app = new Vue({
    vuetify: Vuetify,
    router,
    el: "#app"
});
