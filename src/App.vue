<template>
  <div class="app">
    <Navbar />
    <HeroSection />
    <MovieLibrary />
    <ContactAndMap />
    <APPFooter />
  </div>
</template>

<script>
import Navbar from './components/AppNavbar.vue'
import HeroSection from './components/HeroSection.vue'
import MovieLibrary from './components/MovieLibrary.vue'
import APPFooter from './components/AppFooter.vue'
import ContactAndMap from './components/ContactAndMap.vue'

export default {
  components: {
    Navbar,
    HeroSection,
    MovieLibrary,
    ContactAndMap,
    APPFooter,
  },
}
</script>

<style scoped>
.app {
  min-height: 100vh;
  width: 100%;
  background-color: #000;
  margin: 0;
  padding: 0;
}
</style>
