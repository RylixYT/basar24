<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Kautionen</h2>
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
                                    >Kaution hinzufügen</strong
                                >
                                <span class="d-block">
                                    Formular ausfüllen, um eine Kaution
                                    hinzuzufügen.
                                </span>
                            </div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Wert
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            step="0.01"
                                            v-model="deposit.wert"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            VBAN Sender
                                        </label>
                                        <input
                                            type="number"
                                            placeholder="123456"
                                            class="form-control"
                                            v-model="deposit.vban_sender"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            VBAN Empfänger
                                        </label>
                                        <input
                                            type="number"
                                            placeholder="123456"
                                            class="form-control"
                                            v-model="deposit.vban_empfaenger"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Bemerkung
                                        </label>
                                        <textarea
                                            class="form-control"
                                            v-model="deposit.bemerkung"
                                        ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            value="Hinzufügen"
                                            class="btn btn-primary"
                                            @click.prevent="insertData(deposit)"
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
                        <strong>Offene Kautionen verwalten</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Wert</th>
                                    <th>VBAN Sender</th>
                                    <th>VBAN Empfänger</th>
                                    <th>Bemerkung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(kaution, index) of openDeposits"
                                    :key="index"
                                >
                                    <th
                                        scope="row"
                                        :class="{
                                            open: kaution.typ == 'hin',
                                            index: true
                                        }"
                                    >
                                        {{ index + 1 }}
                                    </th>
                                    <td class="d-flex">
                                        $&nbsp;
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.wert"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.vban_sender"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.vban_empfaenger"
                                        />
                                    </td>
                                    <td>
                                        <textarea
                                            class="form-control"
                                            @input="updateData(kaution)"
                                            v-model="kaution.bemerkung"
                                        />
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteData(kaution.id)"
                                        >
                                            <i class="fa fa-trash"></i> Löschen
                                        </button>
                                        <button
                                            class="btn btn-warning"
                                            @click="returnMoney(kaution)"
                                        >
                                            <i class="fa fa-arrow-circle-up">
                                            </i>
                                            Zurücküberweisen
                                        </button>
                                        <button
                                            class="btn btn-success"
                                            @click="changeFertig(kaution)"
                                        >
                                            <i class="fa fa-money"></i> Behalten
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <strong>Abgeschlossene Kautionen verwalten</strong
                        ><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Wert</th>
                                    <th>VBAN Sender</th>
                                    <th>VBAN Empfänger</th>
                                    <th>Bemerkung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(kaution, index) of closedDeposits"
                                    :key="index"
                                >
                                    <th
                                        scope="row"
                                        :class="{
                                            open: kaution.typ == 'hin',
                                            index: true
                                        }"
                                    >
                                        {{ index + 1 }}
                                    </th>
                                    <td class="d-flex">
                                        $&nbsp;
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.wert"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.vban_sender"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateData(kaution)"
                                            v-model="kaution.vban_empfaenger"
                                        />
                                    </td>
                                    <td>
                                        <textarea
                                            class="form-control"
                                            @input="updateData(kaution)"
                                            v-model="kaution.bemerkung"
                                        />
                                    </td>
                                    <td>
                                        <button
                                            v-if="kaution.typ == 'hin'"
                                            class="btn btn-success"
                                            @click="changeFertig(kaution)"
                                        >
                                            <i class="fa fa-refresh"></i> Öffnen
                                        </button>
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteData(kaution.id)"
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
            deposit: {
                typ: "hin", //Hin zu OOT | Zurueck zu kaution
                bemerkung: "",
                vban_empfaenger: "",
                vban_sender: "",
                wert: null
            }
        };
    },
    mounted() {
        this.set("deposits");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        insertData(data) {
            this.insert({
                data: data,
                route: "deposits"
            }).then(() => {
                this.deposit = {
                    typ: "hin", //Hin zu OOT | Zurueck zu kaution
                    bemerkung: "",
                    vban_empfaenger: "",
                    vban_sender: "",
                    wert: null
                };
                this.set("deposits");
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "deposits"
            });
        },
        deleteData(id) {
            this.delete({
                id: id,
                route: "deposits"
            }).then(() => {
                this.set("deposits");
            });
        },
        changeFertig(deposit) {
            deposit.fertig = 1 - deposit.fertig;
            this.updateData(deposit);
        },
        returnMoney(deposit) {
            // Update current Deposit
            this.changeFertig(deposit);
            // Create new Deposit for send back
            let newDeposit = {
                typ: "zurueck", //Hin zu OOT | Zurueck zu kaution
                bemerkung: deposit.bemerkung + " zurückgesendet.",
                vban_empfaenger: deposit.vban_sender,
                vban_sender: deposit.vban_empfaenger,
                wert: deposit.wert,
                fertig: 1
            };
            this.insertData(newDeposit);
        }
    },
    computed: {
        ...mapGetters({
            deposits: "getDeposits"
        }),
        openDeposits() {
            return this.deposits.filter(deposit => !deposit.fertig);
        },
        closedDeposits() {
            return this.deposits.filter(deposit => deposit.fertig);
        }
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
