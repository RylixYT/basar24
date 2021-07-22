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
                                    <p @click="selectText" id="vertrag">
                                        "Mietvertrag Nr. : OOT-{{
                                            rents.length + 1
                                        }}
                                        <br />
                                        Zwischen O.O.T. Carsharing vertreten
                                        durch
                                        <br />
                                        {{ name }}, im folgenden Vermieter
                                        genannt,
                                        <br />
                                        und <br />
                                        {{
                                            activeMieter
                                                ? activeMieter.name
                                                : "k.A."
                                        }}
                                        , im folgenden Mieter genannt, <br />
                                        wird folgender Vertrag geschlossen:
                                        <br />
                                        <br /><br />
                                        §1. Vertragsgegenstand <br /><br />
                                        1.1 Der Mieter mietet das Fahrzeug
                                        {{
                                            activeCar ? activeCar.name : "k.A."
                                        }}
                                        mit dem Kennzeichen
                                        {{
                                            activeCar
                                                ? activeCar.kennzeichen
                                                : "k.A."
                                        }}
                                        vom {{ formatDate(start) }} bis zum
                                        {{ formatDate(end) }} um 20 Uhr. <br />
                                        In der Zeit entsteht eine Mietzahlung
                                        von
                                        {{
                                            tage && mietzahlung
                                                ? format(mietzahlung)
                                                : "!!!Fehler: Tagesanzahl muss größer 0 und ein Fahrzeug ausgewählt sein!!!"
                                        }}
                                        , welche am Tag des Mietens mit dem
                                        Verwendungszweck: - OOT-{{
                                            rents.length + 1
                                        }}
                                        - aufs Konto mit der VBAN 870 956
                                        überwiesen wird. <br />
                                        1.2 Der Mieter erhält einen Schlüssel
                                        für das Fahrzeug. Die anderen zwei
                                        Schlüssel verbleiben beim Vermieter.
                                        <br /><br />§2. Sicherheit <br /><br />
                                        2.1 Der Mieter hinterlässt eine Kaution
                                        von ${{ kaution }},00 auf das Konto mit
                                        der VBAN 993 990. Nach Beendigung der
                                        Mietzeit wird die Kaution zurückgezahlt,
                                        sofern das Fahrzeug zu 90% getankt ist,
                                        keine sichtbaren Schäden aufweist und
                                        der Vermieter den Fahrzeugschlüssel
                                        wieder besitzt. <br /><br />
                                        §3. Vertragsabschluss <br /><br />
                                        3.1 Nach dem Mietzeitraum (siehe 1.1)
                                        hat der Mieter das Fahrzeug sauber, ohne
                                        sichtbare Schäden und mit einem
                                        Tankvolumen von mindestens 90% zurück
                                        zum Vermieter an die Adresse - Del Perro
                                        Pier 2300 - zu bringen. Dort kann der
                                        Mieter den Vertrag verlängern oder mit
                                        der Abgabe des Schlüssels ihn beenden.
                                        <br /><br />
                                        §4. Vertragsbruch/Vertragsstrafe
                                        <br /><br />
                                        4.1 Sollte in dem vereinbarten
                                        Mietzeitraum (siehe 1.1) Straftaten oder
                                        Ordnungswidrigkeiten mit den Fahrzeug
                                        begangen werden, so übernimmt der Mieter
                                        dafür die volle Verantwortung und
                                        Kosten. Dies schließt das Zahlen von
                                        Straftickets und/oder absitzen/zahlen
                                        von Haftstrafen mit ein. Je Ticket das
                                        umgeschrieben werden muss berechnen wir
                                        $1.000 Aufwandsentschädigung.
                                        <br /><br />
                                        §5. Sonstiges <br /><br />
                                        5.1 Sollte dem Mieter während der
                                        Mietzeit (siehe 1.1) der Schlüssel
                                        abhanden kommen, wird dieses von der
                                        Kaution abgezogen.
                                        <br />
                                        5.2 Die Weitergabe des Fahrzeuges
                                        und/oder des Schlüssels an Drittpersonen
                                        ist untersagt und wird mit einer
                                        Strafzahlung von $1.000 berechnet.
                                        <br />
                                        5.3 Dem Mieter ist es untersagt Stich-,
                                        Hieb-, Schlag- oder Schusswaffen im
                                        Kofferraum aufzubewahren. <br />
                                        5.4 Dem Mieter ist es untersagt ohne
                                        schriftliche Absprachen, Änderungen am
                                        Fahrzeug durchzuführen. <br /><br />
                                        §6. Salvatorische Klausel <br /><br />
                                        6.1 Sollten einzelne Bestimmungen dieses
                                        Vertrages unwirksam oder undurchführbar
                                        sein oder nach Vertragsschluss unwirksam
                                        oder undurchführbar werden, bleibt davon
                                        die Wirksamkeit des Vertrages im Übrigen
                                        unberührt. An die Stelle der unwirksamen
                                        oder undurchführbaren Bestimmung soll
                                        diejenige wirksame und durchführbare
                                        Regelung treten, deren Wirkungen der
                                        wirtschaftlichen Zielsetzung am nächsten
                                        kommen, die die Vertragsparteien mit der
                                        unwirksamen bzw. undurchführbaren
                                        Bestimmung verfolgt haben. Die
                                        vorstehenden Bestimmungen gelten
                                        entsprechend für den Fall, dass sich der
                                        Vertrag als lückenhaft erweist.
                                        <br /><br />
                                        §7. Gerichtsstand und
                                        Schlussbestimmungen
                                        <br /><br />
                                        7.1 Der Gerichtsstand ist Los Santos -
                                        San Andreas. <br />
                                        7.2 Es gelten die aktuellen Gesetze zum
                                        Zeitpunkt der Unterschrift dieses
                                        Vertrags.
                                        <br />
                                        7.3 Mit Unterzeichnung dieses Vertrags
                                        bekennt der Mieter, vom Inhalt desselben
                                        Kenntnis genommen zu haben, diesen
                                        verstanden zu haben und mit seiner
                                        Geltung einverstanden zu sein. "
                                    </p>
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
                        if (!this.activeCar.customer_id) {
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
                // Add Driver to Mietfahrzeug
                this.update({
                    id: this.activeCar.id,
                    data: { customer_id: this.activeMieter.id },
                    route: "rentables"
                });

                // Add Kaution
                this.insert({
                    data: {
                        typ: "hin", //Hin zu OOT | Zurueck zu kaution
                        bemerkung: "OOT-" + this.rents.length + 1,
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
        }
    },
    computed: {
        ...mapGetters({
            customers: "getCustomers",
            cars: "getRentables",
            rents: "getRents",
            discount: "getDiscounts"
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
                    this.activeCar.rabatt *
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
            if (this.activeCar.car.art == "Motorrad")
                return (
                    (this.activeCar.car.neupreis / 365) *
                    30.5 *
                    this.discount.monat *
                    this.discount.gesamt *
                    this.activeCar.rabatt *
                    2
                );
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
                if (new Date().getHours() < 12) {
                    return dayDiff + 1;
                }
                return dayDiff;
            }
            return false;
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
}
</style>
