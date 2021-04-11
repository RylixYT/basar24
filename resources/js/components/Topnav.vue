<template>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div
        class="container-fluid d-flex align-items-center justify-content-between"
      >
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase">
              <strong class="text-primary">Liveinvader</strong>
              <strong>Backend x </strong>
              <strong class="text-primary">Unternehmen</strong>
            </div>
            <div class="brand-text brand-sm">
              <strong class="text-primary">LI</strong
              ><strong>&nbsp;x&nbsp;</strong>
              <strong class="text-primary">UN</strong>
            </div>
          </a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle">
            <i class="fa fa-long-arrow-left"></i>
          </button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">
          <!-- Log out -->
          <div class="list-inline-item logout">
            <router-link id="user" to="/user" class="nav-link">
              <span class="d-none d-sm-inline">Nutzerverwaltung </span>
              <i class="icon-user"></i>
            </router-link>
          </div>
          <!-- Log out -->
          <div class="list-inline-item logout">
            <form action="/logout" method="post">
              <input type="hidden" name="_token" :value="csrf" />
              <button type="submit" id="logout" class="nav-link">
                <span class="d-none d-sm-inline">Logout </span>
                <i class="icon-logout"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  data: () => ({
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
  }),
};
</script>

<style>
</style>
