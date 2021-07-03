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
            <router-link to="/cars" custom v-slot="{ isExactActive }">
                <li :class="[isExactActive && 'active']">
                    <router-link to="/cars">
                        <i class="fa fa-car"></i>Fahrzeuge
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
