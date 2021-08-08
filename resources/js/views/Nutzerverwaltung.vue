<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Nutzerverwaltung</h2>
            </div>
        </div>
        <!-- Forms -->
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block"
                                    >Registrierungshash</strong
                                >
                                <span class="d-block">
                                    Mit diesem Hash können sich Leute
                                    registrieren. Der Hash wechselt nach jeder
                                    Registrierung. Geben Sie diesen Hash an
                                    keine dritten Personen weiter, die sich hier
                                    nicht registrieren sollen.
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group" v-if="users[0]">
                                    <label class="form-control-label"
                                        >Registrierungshash</label
                                    >
                                    <input
                                        class="form-control"
                                        disabled
                                        :value="users[0].nextHash"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title">
                                <strong>Nutzer</strong>
                                <span class="d-block">
                                    Zum editieren einfach in die Tabellenzelle
                                    tippen.
                                </span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>StateV Mail</th>
                                            <th>Bearbeiten?</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(nutzer, index) in users"
                                            v-bind:key="index"
                                        >
                                            <th>{{ index + 1 }}</th>
                                            <td>
                                                <input
                                                    type="text"
                                                    v-model="nutzer.name"
                                                    @input="updateUser(nutzer)"
                                                />
                                            </td>
                                            <td>{{ nutzer.email }}</td>
                                            <td>
                                                <div
                                                    class="i-checks"
                                                    v-if="index > 1"
                                                >
                                                    <input
                                                        id="admin"
                                                        type="checkbox"
                                                        v-model="nutzer.isAdmin"
                                                        class="checkbox-template"
                                                        @change="
                                                            updateUser(nutzer)
                                                        "
                                                    />
                                                    <label for="admin"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <button
                                                    v-if="index > 1"
                                                    class="btn btn-danger"
                                                    v-on:click="
                                                        deleteUser(nutzer.id)
                                                    "
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    mounted() {
        this.set("users");
    },
    methods: {
        ...mapActions(["set", "update", "delete"]),
        updateUser(user) {
            this.update({
                id: user.id,
                data: user,
                route: "users"
            });
        },
        deleteUser(id) {
            this.delete({
                id: id,
                route: "users"
            });
        }
    },
    computed: {
        ...mapGetters({
            users: "getUsers"
        })
    }
};
</script>

<style scoped>
td input:not(:checkbox) {
    all: unset;
    width: 100%;
}
</style>
