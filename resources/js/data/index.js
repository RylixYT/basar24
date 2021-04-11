import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

// const url = "https://web-tower.com/api/";
const url = "http://localhost:8000/api/";
const token = "?api_token=Backend";

export default new Vuex.Store({
    state: {
        data: []
    },
    mutations: {
        set(state, payload) {
            state.data = payload;
        }
    },
    actions: {
        async set(state) {
            await axios.get(url + "data" + token).then(res => {
                state.commit("set", res.data);
            });
        }
    },
    getters: {
        get: state => state.data
    }
});
