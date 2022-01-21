import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { rest } from "lodash";

Vue.use(Vuex);

const url = "api/";
const csrf = document.token;
const api_token = document.user.api_token;

export default new Vuex.Store({
    state: {
        users: [],
        customers: [],
        cars: [],
        rentables: [],
        deposits: [],
        discounts: [],
        rents: [],
        vertrag: []
    },
    mutations: {
        set(state, payload) {
            state[payload.state] = payload.data;
        }
    },
    actions: {
        async set(state, payload) {
            await axios
                .get(url + payload + "?api_token=" + api_token)
                .then(res => {
                    res.state = payload;
                    state.commit("set", res);
                });
        },
        // C(R)UD Methods
        async insert(state, payload) {
            let data = payload.data;
            data._token = csrf;
            data.api_token = api_token;
            await axios.post(url + payload.route, data).then(res => {
                res.state = "rent_id";
                state.commit("set", res);
            });
        },
        async update(state, payload) {
            let data = payload.data;
            data._method = "put";
            data._token = csrf;
            data.api_token = api_token;
            await axios.post(url + payload.route + "/" + payload.id, data);
        },
        async delete(state, payload) {
            let data = {};
            data._method = "delete";
            data._token = csrf;
            data.api_token = api_token;
            await axios.post(url + payload.route + "/" + payload.id, data);
        }
    },
    getters: {
        getUsers: state => state.users,
        getCustomers: state => state.customers,
        getCars: state => state.cars,
        getRentables: state => state.rentables,
        getDeposits: state => state.deposits,
        getDiscounts: state => state.discounts,
        getAds: state => state.werb,
        getRents: state => state.rents,
        getHeaders: state => state.header,
        getVertrag: state => state.vertrag,
        getRentId: state => state.rent_id
    }
});
