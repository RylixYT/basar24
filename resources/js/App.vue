<template>
    <div id="wrapper">
        <topnav></topnav>
        <div class="d-flex align-items-stretch">
            <sidenav></sidenav>
            <div class="page-content active">
                <v-app class="v-app">
                    <router-view></router-view>
                </v-app>
            </div>
        </div>
        <b-modal
            ref="vorschau"
            class="vorschau"
            hide-footer
            title="Bildvorschau"
        >
            <img class="w-100" :src="bild" />
        </b-modal>
    </div>
</template>

<script>
import Topnav from "./components/Topnav";
import Sidenav from "./components/Sidenav";

export default {
    components: {
        topnav: Topnav,
        sidenav: Sidenav
    },
    data() {
        return {
            bild: ""
        };
    },
    methods: {
        openPicture(bild) {
            this.bild = bild;
            this.$refs["vorschau"].show();
        }
    }
};
</script>

<style lang="scss">
.form-group {
    margin-bottom: 0.52vw;
}
input,
th,
td {
    color: #979a9f !important;
}

.v-app,
.v-application {
    background: transparent !important;
}

.modal,
.modal-open {
    padding: 0 !important;
}
</style>
