<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Fahrzeuge</h2>
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
                                    Fahrzeug hinzufügen
                                </strong>
                                <span class="d-block">
                                    Formular ausfüllen, um ein Fahrzeug
                                    hinzuzufügen. Sollten kein Informationen
                                    verfügbar sein bitte 0 als Wert einsetzen.
                                </span>
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Fahrzeugname
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="fahrzeug.model"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Fahrzeugart
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="fahrzeug.art"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Fahrzeugantrieb
                                        </label>
                                        <select
                                            class="form-control"
                                            v-model="fahrzeug.antrieb"
                                        >
                                            <option value=""
                                                >Antrieb auswählen</option
                                            >
                                            <option value="Front">Front</option>
                                            <option value="Heck">Heck</option>
                                            <option value="Allrad"
                                                >Allrad</option
                                            >
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Fahrzeugklasse
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="fahrzeug.klasse"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Kraftstoff
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="fahrzeug.kraftstoff"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            PS
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="fahrzeug.ps"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Sitze
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="fahrzeug.sitze"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Kofferraumplatz
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="fahrzeug.kofferraum"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Max. Km/h
                                        </label>
                                        <input
                                            type="number"
                                            step="0.01"
                                            class="form-control"
                                            v-model="fahrzeug.max"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Kraftstoffverbrauch
                                        </label>
                                        <input
                                            type="number"
                                            step="0.01"
                                            class="form-control"
                                            v-model="fahrzeug.verbrauch"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Beschleunigung
                                        </label>
                                        <input
                                            type="number"
                                            step="0.01"
                                            class="form-control"
                                            v-model="fahrzeug.beschleunigung"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="
                                                insertData(fahrzeug)
                                            "
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <strong>Fahrzeuge verwalten</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Model</th>
                                    <th>Antrieb</th>
                                    <th>Fahrzeugart</th>
                                    <th>Klasse</th>
                                    <th>Kraftstoff</th>
                                    <th>PS</th>
                                    <th>Sitze</th>
                                    <th>Kofferraum</th>
                                    <th>Max. Km/h</th>
                                    <th>Verbrauch</th>
                                    <th>Beschleuinigung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(car, index) of cars" :key="index">
                                    <th scope="row">1</th>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.model"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.antrieb"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.art"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.klasse"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.kraftstoff"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.ps"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.sitze"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.kofferraum"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.max"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.verbrauch"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.beschleunigung"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteData(car.id)"
                                        >
                                            <i class="fa fa-trash"></i> Löschen
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            fahrzeug: {
                model: "",
                art: "",
                antrieb: "",
                klasse: "",
                kraftstoff: "",
                ps: "",
                sitze: "",
                kofferraum: "",
                max: "",
                verbrauch: "",
                beschleunigung: ""
            }
        };
    },
    mounted() {
        this.set("cars");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            this.insert({
                data: data,
                route: "cars"
            }).then(() => {
                this.fahrzeug = {
                    model: "",
                    art: "",
                    antrieb: "",
                    klasse: "",
                    kraftstoff: "",
                    ps: "",
                    sitze: "",
                    kofferraum: "",
                    max: "",
                    verbrauch: "",
                    beschleunigung: ""
                };
                this.set("cars");
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "cars"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "cars"
            }).then(() => {
                this.set("cars");
            });
        }
    },
    computed: {
        ...mapGetters({
            cars: "getCars"
        })
    }
};
</script>

<style>
td input {
    all: unset;
    width: 100%;
}
</style>
