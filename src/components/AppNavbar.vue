<template>
  <nav class="navbar navbar-expand-lg fixed-top w-100">
    <div class="container-fluid px-0">
      <!-- Logo on left side -->
      <router-link class="navbar-brand ps-3 ps-lg-5" to="/">
        <img src="@/assets/logo.png" alt="Theater" class="hero-img" />
      </router-link>

      <!-- This is Toggle button for mobile Screens -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbar links -->
      <div class="collapse navbar-collapse justify-content-end pe-lg-5" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item mx-2">
            <router-link class="nav-link" to="/">HOME</router-link>
          </li>
          <li class="nav-item mx-2">
            <router-link class="nav-link" to="/screens">OUR SCREENS</router-link>
          </li>
          <li class="nav-item mx-2">
            <router-link class="nav-link" to="/schedule">SCHEDULE</router-link>
          </li>
          <li class="nav-item mx-2">
            <router-link class="nav-link" to="/library">MOVIE LIBRARY</router-link>
          </li>
          <li class="nav-item mx-2">
            <router-link class="nav-link" to="/location">LOCATION & CONTACT</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'AppNavbar',
}
</script>

<style scoped>
.navbar {
  background-color: #000 !important;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  z-index: 1030;
}

.hero-img {
  height: 40px;
  width: auto;
}

.nav-link {
  color: #fff !important;
  padding: 0.5rem 1rem;
}

.nav-link:hover {
  color: #ccc !important;
}

.nav-link.router-link-exact-active {
  font-weight: bold;
}

.navbar-toggler {
  border-color: rgba(255, 255, 255, 0.5) !important;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
}

/* This for the Mobile view */
@media (max-width: 1024.78px) {
  .navbar-collapse {
    background-color: #000;
    margin-top: 8px;
    border-radius: 4px;
    padding: 10px;
  }

  .nav-item {
    padding: 8px 0;
    text-align: right;
  }

  .navbar-toggler {
    margin-right: 1rem;
  }
}
</style>
