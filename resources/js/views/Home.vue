<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>
        <!-- Forms -->
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="statistic-block block">
                            <div
                                class="progress-details d-flex align-items-end justify-content-between"
                            >
                                <div class="title">
                                    <strong>Fahrzeuge</strong>
                                </div>
                                <div class="number dashtext-3">
                                    {{ cars.length }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="statistic-block block">
                            <div
                                class="progress-details d-flex align-items-end justify-content-between"
                            >
                                <div class="title">
                                    <strong>Kunden</strong>
                                </div>
                                <div class="number dashtext-3">
                                    {{ customers.length }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="statistic-block block">
                            <div
                                class="progress-details d-flex align-items-end justify-content-between"
                            >
                                <div class="title">
                                    <strong>Vermietungen</strong>
                                </div>
                                <div class="number dashtext-3">
                                    {{ rents.length }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Fahrzeug
                                </strong>
                                <span class="d-block">
                                    Schritt 1: Fahrzeug auswählen
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Fahrzeugmodell
                                    </label>
                                    <input
                                        type="text"
                                        list="modelle"
                                        class="form-control"
                                        v-model="model"
                                        @input="setActiveCar"
                                    />
                                    <datalist id="modelle">
                                        <option
                                            v-for="(model, index) of modelle"
                                            :key="index"
                                        >
                                            {{ model }}
                                        </option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Fahrzeuginfos
                                </strong>
                            </div>
                            <div class="block-body">
                                <span
                                    class="d-block"
                                    v-if="!isObject(activeCar)"
                                >
                                    Bitte Fahrzeug auswählen ...
                                </span>
                                <div v-else>
                                    <p>Fahrzeug: {{ activeCar.name }}</p>
                                    <p>Typ: {{ activeCar.car.art }}</p>
                                    <p>
                                        Kennzeichen:
                                        {{ activeCar.kennzeichen }}
                                    </p>
                                    <p>Motor: {{ activeCar.car.ps }} PS</p>
                                    <p>
                                        Eigentümer:
                                        {{ activeCar.owner.name }}
                                    </p>
                                    <p
                                        :class="{
                                            zustand: true,
                                            vermietet: activeCar.customer
                                        }"
                                    >
                                        Fahrzeugzustand:
                                        {{
                                            activeCar.customer
                                                ? "Vermietet"
                                                : "Frei"
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 2">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Mieter
                                </strong>
                                <span class="d-block">
                                    Schritt 2: Mieter auswählen
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Mieter
                                    </label>
                                    <input
                                        type="text"
                                        list="kunden"
                                        class="form-control"
                                        v-model="mieter"
                                        @input="setActiveMieter"
                                    />
                                    <datalist id="kunden">
                                        <option
                                            v-for="(name, index) of namen"
                                            :key="index"
                                        >
                                            {{ name }}
                                        </option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 2">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Mieterinformationen
                                </strong>
                            </div>
                            <div class="block-body">
                                <span
                                    class="d-block"
                                    v-if="!isObject(activeMieter)"
                                >
                                    Bitte Mieter auswählen ...
                                </span>
                                <div v-else>
                                    <p>Name: {{ activeMieter.name }}</p>
                                    <p>Telefon: {{ activeMieter.telefon }}</p>
                                    <p>VBAN: {{ activeMieter.vban }}</p>
                                    <p>
                                        Bemerkungen:
                                        {{
                                            activeMieter.bemerkung
                                                ? activeMieter.bemerkung
                                                : "-/-"
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 3">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Rabatt
                                </strong>
                                <span class="d-block">
                                    Schritt 3: Rabatt eintragen (ganze Zahl)
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Rabatt
                                    </label>
                                    <input
                                        type="number"
                                        placeholder="0-100"
                                        class="form-control"
                                        v-model="rabatt"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 3">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Preisinformationen
                                </strong>
                            </div>
                            <div class="block-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Orginal</th>
                                            <th>Bearbeiteter Preis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Tagespreis:</th>
                                            <td>
                                                {{
                                                    tagespreis
                                                        ? format(tagespreis)
                                                        : "-"
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    tagespreis
                                                        ? rabatt
                                                            ? format(
                                                                  tagespreis -
                                                                      tagespreis *
                                                                          (rabatt /
                                                                              100)
                                                              )
                                                            : format(tagespreis)
                                                        : "-"
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Wochenpreis:</th>
                                            <td>
                                                {{
                                                    wochenpreis
                                                        ? format(wochenpreis)
                                                        : "-"
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    wochenpreis
                                                        ? rabatt
                                                            ? format(
                                                                  wochenpreis -
                                                                      wochenpreis *
                                                                          (rabatt /
                                                                              100)
                                                              )
                                                            : format(
                                                                  wochenpreis
                                                              )
                                                        : "-"
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Monatspreis:</th>
                                            <td>
                                                {{
                                                    monatspreis
                                                        ? format(monatspreis)
                                                        : "-"
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    monatspreis
                                                        ? rabatt
                                                            ? format(
                                                                  monatspreis -
                                                                      monatspreis *
                                                                          (rabatt /
                                                                              100)
                                                              )
                                                            : format(
                                                                  monatspreis
                                                              )
                                                        : "-"
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 3">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Mietdauer & Kaution
                                </strong>
                                <span class="d-block">
                                    Schritt 4: Mietdauer und Kaution angeben
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Kaution in $
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        v-model="kaution"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Anfang
                                    </label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        v-model="start"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Ende
                                    </label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        v-model="end"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step >= 3">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Vertrag
                                </strong>
                                <span class="d-block">
                                    Schritt 5: Vertrag eingeben (pic.statev.de
                                    upload) zum kopieren klicken
                                </span>
                            </div>
                            <div class="block-body">
                                <div class="vertrag">
                                    <p @click="selectText" id="vertrag">{{ vertragsText() }}</p>
                                </div>
                                <div class="form-group mt-5">
                                    <label class="form-control-label">
                                        Vertrag
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="vertrag"
                                        @input="vertragCheck()"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" v-if="step == 4">
                        <div class="block">
                            <div class="title">
                                <strong class="d-block">
                                    Vermieten
                                </strong>
                                <small class="d-block">
                                    Schritt 6: Informationen oben nochmal
                                    überprüfen und vermieten
                                </small>
                            </div>
                            <div class="block-body">
                                <button
                                    class="btn btn-primary"
                                    @click="vermieten"
                                >
                                    Fahrzeug vermieten
                                </button>
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
    data() {
        return {
            name: document.user.name,
            model: "",
            activeCar: "",
            mieter: "",
            activeMieter: "",
            rabatt: 0,
            kaution: 500,
            start: date.format(new Date(), "YYYY-MM-DD"),
            end: date.format(date.addDays(new Date(), 1), "YYYY-MM-DD"),
            vertrag: "",
            step: 1
        };
    },
    mounted() {
        this.set("customers");
        this.set("rentables");
        this.set("rents");
        this.set("discounts");
        this.set("vertrag");
    },
    methods: {
        ...mapActions(["set", "insert", "update"]),
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
        setActiveCar() {
            if (this.modelle.includes(this.model)) {
                this.cars.forEach(car => {
                    if (
                        car.name +
                            "_" +
                            car.kennzeichen +
                            "_" +
                            car.owner.name ==
                        this.model
                    ) {
                        this.activeCar = car;
                        if (!this.activeCar.rent_id) {
                            this.step = 2;
                        }
                    }
                });
            } else {
                this.activeCar = "";
                this.step = 1;
            }
        },
        setActiveMieter() {
            if (this.namen.includes(this.mieter)) {
                this.customers.forEach(customer => {
                    if (this.mieter == customer.name) {
                        this.activeMieter = customer;
                        this.step = 3;
                    }
                });
            } else {
                this.activeMieter = "";
                this.step = 2;
            }
        },
        formatDate(dateString) {
            return date.transform(dateString, "YYYY-MM-DD", "DD.MM.YYYY");
        },
        selectText() {
            var aux = document.createElement("input");
            aux.setAttribute(
                "value",
                document.getElementById("vertrag").outerText
            );
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        },
        vermieten() {
            if (this.step == 4 && !this.activeCar.customer) {
                // Add Kaution
                this.insert({
                    data: {
                        typ: "hin", //Hin zu OOT | Zurueck zu kaution
                        bemerkung: "OOT-" + (this.rents.length + 1),
                        vban_empfaenger: 993990,
                        vban_sender: this.activeMieter.vban,
                        wert: this.kaution
                    },
                    route: "deposits"
                });

                // Add Rent
                this.insert({
                    data: {
                        name: this.model,
                        typ: this.activeCar.car.art,
                        vertrag: this.vertrag,
                        vertragsnummer: this.rents.length + 1,
                        rabatt: this.rabatt,
                        kaution: this.kaution,
                        start: this.start,
                        end: this.end,
                        customer_id: this.activeMieter.id,
                        owner_id: this.activeCar.owner.id,
                        mietdauer: this.tage,
                        berechnungsindex:
                            this.tage < 7
                                ? "TAG"
                                : this.tage > 29
                                ? "MONAT"
                                : "WOCHE",
                        tagespreis: this.tagespreis,
                        wochenpreis: this.wochenpreis,
                        monatspreis: this.monatspreis
                    },
                    route: "rents"
                }).then(() => {
                    // Add Driver to Mietfahrzeug
                    this.update({
                        id: this.activeCar.id,
                        data: { rent_id: this.rents.length + 1 },
                        route: "rentables"
                    });
                    this.step = 1;
                    this.set("rentables");
                    this.set("rents");
                });
            }
        },
        vertragCheck() {
            if (this.vertrag) {
                this.step = 4;
            } else {
                this.step = 3;
            }
        },
        isObject(value) {
            if (typeof value == "object") {
                return true;
            }
            return false;
        },
        vertragsText() {
            let result = this.vertragVorlage.text;
            if (this.rents.length) {
                result = result.replace(
                    "#vertragsnummer",
                    this.rents.length + 1
                );
            }
            result = result.replace("#vermieter", this.name);
            if (this.activeMieter) {
                result = result.replace("#mieter", this.activeMieter.name);
            }
            if (this.activeCar) {
                result = result.replace("#fahrzeugname", this.activeCar.name);
                result = result.replace(
                    "#kennzeichen",
                    this.activeCar.kennzeichen
                );
            }
            if (this.start && this.end && this.tage && this.mietzahlung) {
                result = result.replace(
                    "#anfangdatum",
                    this.formatDate(this.start)
                );
                result = result.replace("#enddatum", this.formatDate(this.end));
                result = result.replace(
                    "#kosten",
                    this.rabatt
                        ? this.format(
                              (this.mietzahlung * (100 - this.rabatt)) / 100
                          )
                        : this.format(this.mietzahlung)
                );
            }
            result = result.replace("#kaution", this.kaution);
            return result;
        }
    },
    computed: {
        ...mapGetters({
            customers: "getCustomers",
            cars: "getRentables",
            rents: "getRents",
            discount: "getDiscounts",
            vertragVorlage: "getVertrag"
        }),
        modelle() {
            return this.cars.map(
                car => car.name + "_" + car.kennzeichen + "_" + car.owner.name
            );
        },
        namen() {
            return this.customers.map(customer => customer.name);
        },
        tagespreis() {
            if (!this.activeCar) return 0;
            if (this.activeCar.car.art == "Motorrad")
                return (
                    (this.activeCar.car.neupreis / 365) *
                    this.discount.tag *
                    this.discount.gesamt *
                    this.activeCar.car.rabatt *
                    2
                );
            return (
                (this.activeCar.car.neupreis / 365) *
                this.discount.tag *
                this.discount.gesamt *
                this.activeCar.car.rabatt
            );
        },
        wochenpreis() {
            if (!this.activeCar) return 0;
            if (this.activeCar.car.art == "Motorrad")
                return (
                    (this.activeCar.car.neupreis / 365) *
                    7 *
                    this.discount.woche *
                    this.discount.gesamt *
                    this.activeCar.car.rabatt *
                    1.5
                );
            return (
                (this.activeCar.car.neupreis / 365) *
                7 *
                this.discount.woche *
                this.discount.gesamt *
                this.activeCar.car.rabatt
            );
        },
        monatspreis() {
            if (!this.activeCar) return 0;
            if (this.activeCar.car.art == "Motorrad") {
                return (
                    (this.activeCar.car.neupreis / 365) *
                    30.5 *
                    this.discount.monat *
                    this.discount.gesamt *
                    this.activeCar.car.rabatt *
                    1.5
                );
            }
            return (
                (this.activeCar.car.neupreis / 365) *
                30.5 *
                this.discount.monat *
                this.discount.gesamt *
                this.activeCar.car.rabatt
            );
        },
        tage() {
            let dayDiff = date
                .subtract(
                    date.parse(this.end, "YYYY-MM-DD"),
                    date.parse(this.start, "YYYY-MM-DD")
                )
                .toDays();
            if (
                date.isValid(this.start, "YYYY-MM-DD") &&
                date.isValid(this.end, "YYYY-MM-DD") &&
                dayDiff > 0
            ) {
                return dayDiff;
            }
        },
        mietzahlung() {
            if (
                !this.tage ||
                !this.tagespreis ||
                !this.wochenpreis ||
                !this.monatspreis
            )
                return false;
            if (this.tage < 7) {
                return this.tagespreis * this.tage;
            }
            if (this.tage < 30) {
                return (this.wochenpreis * this.tage) / 7;
            }
            return (this.monatspreis * this.tage) / 30;
        }
    }
};
</script>

<style lang="scss" scoped>
td input {
    all: unset;
    width: 100%;
}
.zustand {
    color: green;
    &.vermietet {
        color: red;
    }
}
.vertrag p {
    line-height: 100%;
    font-size: 10px;
    white-space: pre;
    white-space: pre-line;
}
</style>
