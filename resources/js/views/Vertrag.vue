<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Vertrag</h2>
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
                                    Vertrag abändern
                                </strong>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    Variablen: #vertragsnummer #vermieter
                                    #mieter #fahrzeugname #kennzeichen
                                    #anfangdatum #enddatum #kosten #kaution
                                </div>
                                <div class="form-group">
                                    <textarea
                                        v-model="vertrag.text"
                                        @input="updateData(vertrag)"
                                        placeholder="Zwischentext"
                                        class="form-control"
                                    />
                                </div>
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
        this.set("vertrag");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "vertrag"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "vertrag"
            }).then(() => {
                this.set("vertrag");
            });
        }
    },
    computed: {
        ...mapGetters({
            vertrag: "getVertrag"
        })
    }
};
</script>

<style lang="scss" scoped>
textarea {
    min-height: 100vw;
}
</style>
