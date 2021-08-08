<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Werbungen</h2>
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
                                    Werbung hinzufügen
                                </strong>
                                <span class="d-block">
                                    Formular ausfüllen, um eine Werbung
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
                                            v-model="ad.bild"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="insertData(ad)"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title">
                                <strong>Werbungen verwalten</strong><br />
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
                                            v-for="(werbung, index) of ads"
                                            :key="index"
                                        >
                                            <th scope="row">{{ index + 1 }}</th>
                                            <td>
                                                <img :src="werbung.bild" />
                                            </td>
                                            <td>
                                                <input
                                                    type="text"
                                                    v-model="werbung.bild"
                                                    @input="updateData(werbung)"
                                                />
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-danger"
                                                    @click="
                                                        deleteData(werbung.id)
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
            ad: {
                bild: ""
            }
        };
    },
    mounted() {
        this.set("werb");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            this.insert({
                data: data,
                route: "werb"
            }).then(() => {
                this.ad = {
                    bild: ""
                };
                this.set("werb");
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "werb"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "werb"
            }).then(() => {
                this.set("werb");
            });
        }
    },
    computed: {
        ...mapGetters({
            ads: "getAds"
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
