<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Kunden</h2>
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
                                    >Kunden hinzufügen</strong
                                >
                                <span class="d-block">
                                    Formular ausfüllen, um einen Kunden
                                    hinzuzufügen.
                                </span>
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Name
                                        </label>
                                        <input
                                            type="text"
                                            placeholder="Max Mustermann"
                                            class="form-control"
                                            v-model="customer.name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Telefon
                                        </label>
                                        <input
                                            type="text"
                                            placeholder="1822-12345678"
                                            class="form-control"
                                            v-model="customer.telefon"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            VBAN
                                        </label>
                                        <input
                                            type="number"
                                            placeholder="123456"
                                            class="form-control"
                                            v-model="customer.vban"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="
                                                insertData(customer)
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
                        <strong>Kunden verwalten</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Telefon</th>
                                    <th>VBAN</th>
                                    <th>Bemerkung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(kunde, index) of customers"
                                    :key="index"
                                >
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kunde)"
                                            v-model="kunde.name"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kunde)"
                                            v-model="kunde.telefon"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kunde)"
                                            v-model="kunde.vban"
                                        />
                                    </td>
                                    <td>
                                        <textarea
                                            class="form-control"
                                            @input="updateData(kunde)"
                                            v-model="kunde.bemerkung"
                                        />
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteData(kunde.id)"
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
            customer: {
                name: "",
                telefon: "",
                vban: null
            }
        };
    },
    mounted() {
        this.set("customers");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            this.insert({
                data: data,
                route: "customers"
            }).then(() => {
                this.customer = {
                    name: "",
                    telefon: "",
                    vban: null
                };
                this.set("customers");
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "customers"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "customers"
            }).then(() => {
                this.set("customers");
            });
        }
    },
    computed: {
        ...mapGetters({
            customers: "getCustomers"
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
