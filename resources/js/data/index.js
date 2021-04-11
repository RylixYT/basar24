import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

const url = "api/";
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
        },
        // C(R)UD Methods
        async insert(state, payload) {
            console.log(payload);
            await axios.post(url + payload.route + token, payload.data, {
                _method: "put",
                _token: payload.token
            });
        },
        async update(state, payload) {
            console.log(payload);
            await axios.post(
                url + payload.route + "/" + payload.id + token,
                payload.data
            );
        },
        async delete(state, payload) {
            await axios.post(url + payload.route + "/" + payload.id + token, {
                _method: "delete",
                _token: payload.token
            });
        }
    },
    getters: {
        get: state => state.data
    }
});
