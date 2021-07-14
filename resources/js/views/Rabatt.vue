<template>
    <div>
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Rabatte</h2>
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
                                <strong class="d-block">Rabatte ändern</strong>
                            </div>
                            <div class="block-body">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Tagesrabatt
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        v-model="discount.tag"
                                        @input="updateData(discount)"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Wochenrabatt
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        v-model="discount.woche"
                                        @input="updateData(discount)"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Monatsrabatt
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        v-model="discount.monat"
                                        @input="updateData(discount)"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Gesamtrabatt
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        v-model="discount.gesamt"
                                        @input="updateData(discount)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <strong>Fahrzeugpreise verwalten</strong><br />
                        <span class="d-block">
                            Zum editieren einfach in die Tabellenzelle tippen.
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fahrzeug</th>
                                    <th>Neupreis</th>
                                    <th>Rabatt</th>
                                    <th>Tagespreis</th>
                                    <th>Wochenpreis</th>
                                    <th>Monatspreis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(car, index) of cars" :key="index">
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>
                                        {{ car.model }}
                                    </td>
                                    <td class="d-flex">
                                        $
                                        <input
                                            type="text"
                                            @input="updateCar(car)"
                                            v-model="car.neupreis"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            @input="updateCar(car)"
                                            v-model="car.rabatt"
                                        />
                                    </td>
                                    <td>
                                        {{
                                            car.art == "Motorrad"
                                                ? format(
                                                      (car.neupreis / 365) *
                                                          discount.tag *
                                                          discount.gesamt *
                                                          car.rabatt *
                                                          2
                                                  )
                                                : format(
                                                      (car.neupreis / 365) *
                                                          discount.tag *
                                                          discount.gesamt *
                                                          car.rabatt
                                                  )
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            car.art == "Motorrad"
                                                ? format(
                                                      (car.neupreis / 365) *
                                                          7 *
                                                          discount.woche *
                                                          discount.gesamt *
                                                          car.rabatt *
                                                          1.5
                                                  )
                                                : format(
                                                      (car.neupreis / 365) *
                                                          7 *
                                                          discount.woche *
                                                          discount.gesamt *
                                                          car.rabatt
                                                  )
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            car.art == "Motorrad"
                                                ? format(
                                                      (car.neupreis / 365) *
                                                          30.5 *
                                                          discount.monat *
                                                          discount.gesamt *
                                                          car.rabatt *
                                                          1.5
                                                  )
                                                : format(
                                                      (car.neupreis / 365) *
                                                          30.5 *
                                                          discount.monat *
                                                          discount.gesamt *
                                                          car.rabatt
                                                  )
                                        }}
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
    mounted() {
        this.set("discounts");
        this.set("cars");
    },
    methods: {
        ...mapActions(["set", "update"]),
        updateCar(data) {
            this.update({
                id: data.id,
                data: data,
                route: "cars"
            });
        },
        updateData(data) {
            this.update({
                id: data.id,
                data: data,
                route: "discounts"
            });
        },
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
        }
    },
    computed: {
        ...mapGetters({
            discount: "getDiscounts",
            cars: "getCars"
        })
    }
};
</script>
<style lang="scss" scoped>
td input {
    all: unset;
    width: 100%;
}
</style>
