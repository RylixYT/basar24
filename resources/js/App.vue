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
    </div>
</template>

<script>
import Topnav from "./components/Topnav";
import Sidenav from "./components/Sidenav";

export default {
    components: {
        topnav: Topnav,
        sidenav: Sidenav
    }
};
</script>

<style lang="scss" scoped>
.v-app,
.v-application {
    background: transparent !important;
}
</style>
