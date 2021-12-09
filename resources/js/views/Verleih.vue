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
                                <strong
                                    >Laufende Vermietungen ({{
                                        offen.length
                                    }})</strong
                                ><br />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vertragsnummer</th>
                                            <th>Mietdauer</th>
                                            <th>Rabatt</th>
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
                                                DC-{{ rent.id }}
                                            </th>
                                            <td>{{ rent.name }}</td>
                                            <td>
                                                {{
                                                    (rent.mietdauer = tage(
                                                        rent
                                                    ))
                                                }}
                                            </td>
                                            <td>
                                                {{rent.rabatt}}%
                                            </td>
                                            <td>
                                                <input
                                                    class="w-100"
                                                    type="date"
                                                    v-model="rent.start"
                                                    @input="updateData(rent)"
                                                />
                                            </td>
                                            <td>
                                                <input
                                                    class="w-100"
                                                    type="date"
                                                    v-model="rent.end"
                                                    @input="updateData(rent)"
                                                />
                                            </td>
                                            <td>
                                                {{ format(rent.preis) }}
                                            </td>
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
                                <strong>Abgeschlossene Vermietungen ({{
                                        closed.length
                                    }})</strong
                                ><br />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vertragsnummer</th>
                                            <th>Mietdauer</th>
                                            <th>Rabatt</th>
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
                                            <td>
                                                {{
                                                    (rent.mietdauer = tage(
                                                        rent
                                                    ))
                                                }}
                                            </td>
                                            <td>
                                                {{rent.rabatt}}%
                                            </td>
                                            <td>
                                                <input
                                                    class="w-100"
                                                    type="date"
                                                    v-model="rent.start"
                                                    @input="updateData(rent)"
                                                />
                                            </td>
                                            <td>
                                                <input
                                                    class="w-100"
                                                    type="date"
                                                    v-model="rent.end"
                                                    @input="updateData(rent)"
                                                />
                                            </td>
                                            <td>
                                                {{ format(rent.preis) }}
                                            </td>
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
                                                    >{{ rent.vertrag }}</a
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
        tage(verleih) {
            let dayDiff = date
                .subtract(
                    date.parse(verleih.end, "YYYY-MM-DD"),
                    date.parse(verleih.start, "YYYY-MM-DD")
                )
                .toDays();
            if (
                date.isValid(verleih.start, "YYYY-MM-DD") &&
                date.isValid(verleih.end, "YYYY-MM-DD") &&
                dayDiff > 0
            ) {
                return dayDiff;
            }
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
        updateData(rent) {
            if (rent.mietdauer < 1) return;
            rent.berechnungsindex =
                rent.mietdauer < 7
                    ? "TAG"
                    : rent.mietdauer > 29
                    ? "MONAT"
                    : "WOCHE";
            this.update({
                id: rent.id,
                data: rent,
                route: "rents"
            });
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
                    (this.dayDiff(rent.end) == 0 && new Date().getHours() < 16)
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

<style lang="scss" scoped>
td input {
    all: unset;
    width: 100%;
    &[type="date"] {
        display: grid;
        grid-auto-flow: column;
    }
}
</style>
