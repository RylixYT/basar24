<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Vermietungen</h2>
            </div>
        </div>
        <!-- Forms -->
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title">
                                <strong>Laufende Vermietungen</strong><br />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>O.O.T-Kennung</th>
                                            <th>Typ</th>
                                            <th>Mietdauer</th>
                                            <th>Rabatt</th>
                                            <th>Tagespreis</th>
                                            <th>Wochenpreis</th>
                                            <th>Monatspreis</th>
                                            <th>Index</th>
                                            <th>von</th>
                                            <th>bis</th>
                                            <th>Preis</th>
                                            <th>Mieter</th>
                                            <th>Eigentümer</th>
                                            <th>Kaution</th>
                                            <th>Vertrag</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(rent, index) of offen"
                                            :key="index"
                                        >
                                            <th scope="row">
                                                OOT-{{ rent.id }}
                                            </th>
                                            <td>{{ rent.name }}</td>
                                            <td>{{ rent.typ }}</td>
                                            <td>{{ rent.mietdauer }}</td>
                                            <td>{{ rent.rabatt }}%</td>
                                            <td>
                                                {{ format(rent.tagespreis) }}
                                            </td>
                                            <td>
                                                {{ format(rent.wochenpreis) }}
                                            </td>
                                            <td>
                                                {{ format(rent.monatspreis) }}
                                            </td>
                                            <td>{{ rent.berechnungsindex }}</td>
                                            <td>
                                                {{ formatDate(rent.start) }}
                                            </td>
                                            <td>{{ formatDate(rent.end) }}</td>
                                            <td>{{ format(preis(rent)) }}</td>
                                            <td>
                                                {{
                                                    rent.customer
                                                        ? rent.customer.name
                                                        : "Mieter gelöscht"
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    rent.owner
                                                        ? rent.owner.name
                                                        : "Vermieter gelöscht"
                                                }}
                                            </td>
                                            <td>{{ rent.kaution }} $</td>
                                            <td>
                                                <a
                                                    @click.prevent="
                                                        openPicture(
                                                            rent.vertrag
                                                        )
                                                    "
                                                    >>{{ rent.vertrag }}</a
                                                >
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-danger"
                                                    @click="beenden(rent.id)"
                                                >
                                                    <i
                                                        class="fa fa-envelope"
                                                    ></i>
                                                    Beenden
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
                                <strong>Abgeschlossene Vermietungen</strong
                                ><br />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>O.O.T-Kennung</th>
                                            <th>Typ</th>
                                            <th>Mietdauer</th>
                                            <th>Rabatt</th>
                                            <th>Tagespreis</th>
                                            <th>Wochenpreis</th>
                                            <th>Monatspreis</th>
                                            <th>Index</th>
                                            <th>von</th>
                                            <th>bis</th>
                                            <th>Preis</th>
                                            <th>Mieter</th>
                                            <th>Eigentümer</th>
                                            <th>Kaution</th>
                                            <th>Vertrag</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(rent, index) of closed"
                                            :key="index"
                                        >
                                            <th scope="row">
                                                OOT-{{ rent.id }}
                                            </th>
                                            <td>{{ rent.name }}</td>
                                            <td>{{ rent.typ }}</td>
                                            <td>{{ rent.mietdauer }}</td>
                                            <td>{{ rent.rabatt }}%</td>
                                            <td>
                                                {{ format(rent.tagespreis) }}
                                            </td>
                                            <td>
                                                {{ format(rent.wochenpreis) }}
                                            </td>
                                            <td>
                                                {{ format(rent.monatspreis) }}
                                            </td>
                                            <td>{{ rent.berechnungsindex }}</td>
                                            <td>
                                                {{ formatDate(rent.start) }}
                                            </td>
                                            <td>{{ formatDate(rent.end) }}</td>
                                            <td>{{ format(preis(rent)) }}</td>
                                            <td>
                                                {{
                                                    rent.customer
                                                        ? rent.customer.name
                                                        : "Mieter gelöscht"
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    rent.owner
                                                        ? rent.owner.name
                                                        : "Vermieter gelöscht"
                                                }}
                                            </td>
                                            <td>{{ rent.kaution }} $</td>
                                            <td>
                                                <a
                                                    @click.prevent="
                                                        openPicture(
                                                            rent.vertrag
                                                        )
                                                    "
                                                    >>{{ rent.vertrag }}</a
                                                >
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-danger"
                                                    @click="deleteVerleih(rent)"
                                                >
                                                    <i class="fa fa-trash"></i>
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
import date from "date-and-time";
import { mapGetters, mapActions } from "vuex";
export default {
    mounted() {
        this.set("rents");
    },
    methods: {
        ...mapActions(["set", "insert", "update", "delete"]),
        format(number) {
            return Number(Math.round(number / 10) * 10).toLocaleString(
                "de-DE", // leave undefined to use the visitor's browser
                // locale or a string like 'en-US' to override it.
                {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                    style: "currency",
                    currency: "USD"
                }
            );
        },
        formatDate(dateString) {
            return date.transform(dateString, "YYYY-MM-DD", "DD.MM.YYYY");
        },
        preis(rent) {
            switch (rent.berechnungsindex) {
                case "TAG":
                    return (
                        rent.tagespreis * rent.mietdauer -
                        rent.tagespreis * rent.mietdauer * (rent.rabatt / 100)
                    );
                case "WOCHE":
                    return (
                        (rent.wochenpreis * rent.mietdauer) / 7 -
                        ((rent.wochenpreis * rent.mietdauer) / 7) *
                            (rent.rabatt / 100)
                    );
                case "MONAT":
                    return (
                        (rent.monatspreis * rent.mietdauer) / 30 -
                        ((rent.monatspreis * rent.mietdauer) / 30) *
                            (rent.rabatt / 100)
                    );
            }
        },
        dayDiff(dateString) {
            return date
                .subtract(
                    date.parse(dateString, "YYYY-MM-DD"),
                    date.parse(
                        date.format(new Date(), "YYYY-MM-DD"),
                        "YYYY-MM-DD"
                    )
                )
                .toDays();
        },
        openPicture(bild) {
            this.$parent.$parent.openPicture(bild);
        },
        beenden(id) {
            this.update({
                id: id,
                data: { end: date.format(new Date(), "YYYY-MM-DD") },
                route: "rents"
            });
            this.set("rents");
            this.set("rentables");
        },
        deleteVerleih(rent) {
            this.delete({
                id: rent.id,
                route: "rents"
            }).then(() => {
                this.set("rents");
            });
        }
    },
    computed: {
        ...mapGetters({
            rents: "getRents"
        }),
        offen() {
            return this.rents.filter(rent => {
                if (
                    this.dayDiff(rent.end) > 0 ||
                    (this.dayDiff(rent.end) == 0 && new Date().getHours() < 20)
                ) {
                    return true;
                }
            });
        },
        closed() {
            return this.rents.filter(rent => !this.offen.includes(rent));
        }
    }
};
</script>

<style>
td input {
    all: unset;
    width: 100%;
}
</style>
