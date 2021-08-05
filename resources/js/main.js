require("jquery");
require("./bootstrap");
require("./front");

import App from "./App.vue";

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

//Vuex
import Vuex from "vuex";
Vue.use(Vuex);

import store from "./data/store";

//Vue Bootstrap
import Bootstrap from "../plugins/vue-bootstrap";

//Vuetify
import Vuetify from "../plugins/vuetify";
import Vue from "vue";

const app = new Vue({
    vuetify: Vuetify,
    router,
    store,
    render: h => h(App)
}).$mount("#app");
