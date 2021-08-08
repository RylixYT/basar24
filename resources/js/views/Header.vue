<template>
    <div>
        <!-- Page Heheaderer -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Header</h2>
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
                                <strong class="d-block">
                                    Header hinzufügen
                                </strong>
                                <span class="d-block">
                                    Formular ausfüllen, um eine Header
                                    hinzuzufügen.
                                </span>
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Bild
                                        </label>
                                        <input
                                            type="text"
                                            placeholder="pic.statev.de/i/abc123.png"
                                            class="form-control"
                                            v-model="header.bild"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="insertData(header)"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title">
                                <strong>Header verwalten</strong><br />
                                <span class="d-block">
                                    Zum editieren einfach in die Tabellenzelle
                                    tippen.
                                </span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="w-25">Bild</th>
                                            <th>Link</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr
                                            v-for="(header, index) of headers"
                                            :key="index"
                                        >
                                            <th scope="row">{{ index + 1 }}</th>
                                            <td>
                                                <img :src="header.bild" />
                                            </td>
                                            <td>
                                                <input
                                                    type="text"
                                                    v-model="header.bild"
                                                    @input="updateData(header)"
                                                />
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-danger"
                                                    @click="
                                                        deleteData(header.id)
                                                    "
                                                >
                                                    <i class="fa fa-trash"></i>
                                                    Löschen
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
    data() {
        return {
            header: {
                bild: ""
            }
        };
    },
    mounted() {
        this.set("header");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            this.insert({
                data: data,
                route: "header"
            }).then(() => {
                this.header = {
                    bild: ""
                };
                this.set("header");
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "header"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "header"
            }).then(() => {
                this.set("header");
            });
        }
    },
    computed: {
        ...mapGetters({
            headers: "getHeaders"
        })
    }
};
</script>
<style>
td input {
    all: unset;
    width: 100%;
}
td img {
    width: 100%;
}
.w-25 {
    width: 25%;
}
</style>
