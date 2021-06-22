<template>
    <div id="wrapper">
        <topnav></topnav>
        <div class="d-flex align-items-stretch">
            <sidenav></sidenav>
            <div class="page-content active">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import { mapMutations } from "vuex";
import Topnav from "./components/Topnav";
import Sidenav from "./components/Sidenav";

export default {
    components: {
        topnav: Topnav,
        sidenav: Sidenav
    }
};
</script>

<style></style>
