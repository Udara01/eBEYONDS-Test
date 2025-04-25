<template>
  <section class="contact-and-map container py-5">
    <div class="row g-4">
      <!-- Left side for the Contact Form -->
      <div class="col-md-6">
        <ContactForm />
      </div>

      <!-- Right side for the Map Section -->
      <div class="col-md-6 map-column">
        <MapSection />
      </div>
    </div>
  </section>
</template>

<script>
import ContactForm from './ContactForm.vue'
import MapSection from './MapSection.vue'

export default {
  components: {
    ContactForm,
    MapSection,
  },
}
</script>

<style scoped>
.contact-and-map {
  background-color: #000;
  color: #fff;
}

.map-column {
  margin-top: 7rem;
}
</style>
