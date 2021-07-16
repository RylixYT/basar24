<template>
    <nav id="sidebar" class="shrinked">
        <!-- Sidebar Navidation Menus-->
        <span class="heading mt-3">Menü</span>
        <ul class="list-unstyled">
            <router-link to="/" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/">
                        <i class="icon-home"></i>Dashboard
                    </router-link>
                </li>
            </router-link>
            <router-link to="/customers" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/customers">
                        <i class="icon-user-outline"></i>Kunden
                    </router-link>
                </li>
            </router-link>
            <li>
                <a href="#cars" aria-expanded="false" data-toggle="collapse">
                    <i class="fa fa-car"></i>Fahrzeuge
                </a>
                <ul id="cars" class="collapse list-unstyled">
                    <router-link to="/cars" custom v-slot="{ isExactActive }">
                        <li :class="[isExactActive && 'active']">
                            <router-link to="/cars">
                                <i class="fa fa-car"></i>Fahrzeugtypen
                            </router-link>
                        </li>
                    </router-link>
                    <router-link
                        to="/cars/rentable"
                        custom
                        v-slot="{ isExactActive }"
                    >
                        <li :class="[isExactActive && 'active']">
                            <router-link to="/cars/rentable">
                                <i class="fa fa-car"></i>Mietfahrzeuge
                            </router-link>
                        </li>
                    </router-link>
                    <router-link
                        to="/discounts"
                        custom
                        v-slot="{ isExactActive }"
                    >
                        <li :class="[isExactActive && 'active']">
                            <router-link to="/discounts">
                                <i class="fa fa-percent"></i>Rabatte
                            </router-link>
                        </li>
                    </router-link>
                </ul>
            </li>
            <router-link to="/verleih" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/verleih">
                        <i class="icon-contract"></i>Verleihe
                    </router-link>
                </li>
            </router-link>

            <router-link to="/deposits" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/deposits">
                        <i class="fa fa-money"></i>Kautionen
                    </router-link>
                </li>
            </router-link>
            <router-link to="/ads" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/ads">
                        <i class="fa fa-dollar"></i>Werbung
                    </router-link>
                </li>
            </router-link>

            <!-- <li>
        <a
          href="#exampledropdownDropdown"
          aria-expanded="false"
          data-toggle="collapse"
        >
          <i class="icon-windows"></i>Example dropdown
        </a>
        <ul id="exampledropdownDropdown" class="collapse list-unstyled">
          <router-link to="/" custom v-slot="{ isExactActive }">
        <li :class="[isExactActive && 'active']">
          <a href="#"><i class="icon-home"></i>Dashboard</a>
        </li>
      </router-link>
        </ul>
      </li> -->
        </ul>
    </nav>
</template>

<script>
export default {};
</script>

<style></style>
