<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Infos</h2>
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
                                    Texte bearbeiten
                                </strong>
                                <span class="d-block">
                                    Texte werden automatisch gespeichert.
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="control-label">Text</label>
                                    <editor
                                        :api-key="key"
                                        :init="options"
                                        v-model="infos.verlosung"
                                        @input="updateInfos(infos)"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label"
                                        >Mitgliedskarte</label
                                    >
                                    <editor
                                        :api-key="key"
                                        :init="options"
                                        v-model="infos.mitgliedskarte"
                                        @input="updateInfos(infos)"
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
import Editor from "@tinymce/tinymce-vue";

export default {
    data() {
        return {
            key: "wodsiny1gpszwvg25jsd2wzzpvjdc3tx88a7dlkvnpynhus3",
            options: {
                height: "480",
                menubar: false,
                plugins:
                    "save code emoticons lists link image imagetools autoresize",
                toolbar:
                    "styleselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | " +
                    "bullist numlist outdent indent | link image | " +
                    "forecolor backcolor | code",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                toolbar_mode: "floating",
                statusbar: false,
                save_enablewhendirty: false,
                skin: "oxide-dark",
                content_css: "dark"
            }
        };
    },
    mounted() {
        this.set("infos");
    },
    methods: {
        ...mapActions(["set", "update"]),
        updateInfos(data) {
            this.update({
                id: 1,
                data: data,
                route: "infos"
            });
        }
    },
    computed: {
        ...mapGetters({
            infos: "getInfos"
        })
    },
    components: {
        editor: Editor
    }
};
</script>

<style lang="scss" scoped>
td input {
    all: unset;
    width: 100%;
}
.index {
    color: red;
    &.open {
        color: green;
    }
}
</style>
