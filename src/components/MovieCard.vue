<template>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="card bg-dark text-white h-100 position-relative movie-card">
      <button
        @click="$emit('remove')"
        class="btn-close position-absolute top-0 end-0 m-2"
        style="filter: invert(1)"
      ></button>
      <img :src="movie.image" class="card-img-top" alt="Movie Poster" />
      <div class="card-body">
        <h5 class="card-title">{{ movie.title }}</h5>
        <p class="card-text small">{{ movie.description }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { gsap } from 'gsap'

defineProps({ movie: Object })

onMounted(() => {
  gsap.from('.movie-card', {
    opacity: 50,
    y: 50,
    duration: 0.8,
    stagger: 0.7,
    ease: 'power2.out',
  })
})
</script>
