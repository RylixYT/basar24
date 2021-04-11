<template>
  <nav id="sidebar">
    <!-- Sidebar Navidation Menus-->
    <span class="heading mt-3">Menü</span>
    <ul class="list-unstyled">
      <router-link to="/" custom v-slot="{ isExactActive }">
        <li :class="[isExactActive && 'active']">
          <router-link to="/"><i class="icon-home"></i>Dashboard</router-link>
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

<style>
</style>
