<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Mietfahrzeuge</h2>
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
                                    Mietfahrzeug hinzufügen
                                </strong>
                                <span class="d-block">
                                    Formular ausfüllen, um ein Mietfahrzeug
                                    hinzuzufügen.
                                </span>
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Fahrzeugname
                                        </label>
                                        <select
                                            class="form-control"
                                            v-model="rentable.name"
                                        >
                                            <option disabled :value="null">
                                                Bitte Fahzreugmodell auswählen
                                            </option>
                                            <option
                                                v-for="car of cars"
                                                :key="car.id"
                                                :value="car.model"
                                            >
                                                {{ car.model }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Kennzeichen
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="rentable.kennzeichen"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <select
                                            class="form-control"
                                            v-model="rentable.owner_id"
                                        >
                                            <option disabled :value="null">
                                                Bitte Besitzer auswählen
                                            </option>
                                            <option
                                                v-for="customer of customers"
                                                :key="customer.id"
                                                :value="customer.id"
                                            >
                                                {{ customer.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="
                                                insertData(rentable)
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
                        <strong>Mietfahrzeuge verwalten</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="w-15">Name</th>
                                    <th class="w-15">Kennzeichen</th>
                                    <th class="w-15">Eigentümer</th>
                                    <th>Mieter</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(car, index) of rentables"
                                    :key="index"
                                >
                                    <th scope="row">
                                        {{
                                            car.name +
                                                "_" +
                                                car.kennzeichen +
                                                "_" +
                                                car.owner.name
                                        }}
                                    </th>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.name"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            v-model="car.kennzeichen"
                                            @input="updateData(car)"
                                        />
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                class="form-control"
                                                v-model="car.owner_id"
                                                @change="updateData(car)"
                                            >
                                                <option disabled :value="null">
                                                    Bitte Besitzer auswählen
                                                </option>
                                                <option
                                                    v-for="customer of customers"
                                                    :key="customer.id"
                                                    :value="customer.id"
                                                >
                                                    {{ customer.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        {{
                                            car.customer_id
                                                ? car.customer.name
                                                : "Nicht vermietet"
                                        }}
                                    </td>
                                    <td>
                                        <button
                                            v-if="car.customer_id"
                                            class="btn btn-warning"
                                            @click="mieterEntfernen(car.id)"
                                        >
                                            <i class="fa fa-fast-backward"></i>
                                            Mieter enfternen
                                        </button>
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
            rentable: {
                name: "",
                kennzeichen: "",
                owner_id: null
            }
        };
    },
    mounted() {
        this.set("rentables");
        this.set("customers");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            if (!data.ownerID)
                this.insert({
                    data: data,
                    route: "rentables"
                }).then(() => {
                    this.fahrzeug = {
                        name: "",
                        kennzeichen: "",
                        owner_id: null
                    };
                    this.set("rentables");
                });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "rentables"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "rentables"
            }).then(() => {
                this.set("rentables");
            });
        },
        mieterEntfernen(id) {
            this.update({
                id: id,
                data: { customer_id: null },
                route: "rentables"
            }).then(() => {
                this.set("rentables");
            });
        }
    },
    computed: {
        ...mapGetters({
            rentables: "getRentables",
            customers: "getCustomers",
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

.w-15 {
    width: 15%;
}
</style>
