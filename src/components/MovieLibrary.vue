<template>
  <section class="movie-library px-4 py-5 bg-dark text-white min-vh-100">
    <!-- this is header with title and search sections-->
    <div
      class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3"
      ref="header"
    >
      <h2 class="h4 mb-2 mb-md-0">Collect your favourites</h2>
      <input
        type="text"
        v-model="searchQuery"
        @input="searchMovies"
        @keydown.enter.prevent
        placeholder="Search Movies..."
        class="form-control search-input"
      />
    </div>

    <hr class="bg-secondary" style="height: 7px; border: none" />

    <!-- Movie Grid -->
    <div class="row g-4 mt-3" ref="movieGrid">
      <MovieCard
        v-for="movie in allMovies"
        :key="movie.id"
        :movie="movie"
        @remove="removeMovie(movie.id)"
      />
    </div>

    <!-- Search Results -->
    <div class="mt-5" ref="results">
      <h4 class="text-white">Search Results</h4>
      <div class="row g-4">
        <div class="col-12 col-sm-6 col-md-4" v-for="movie in searchResults" :key="movie.id">
          <div class="card bg-dark text-white h-100">
            <img :src="movie.image" class="card-img-top" alt="movie.title" />
            <div class="card-body">
              <h5 class="card-title">{{ movie.title }}</h5>
              <p class="card-text">{{ movie.description }}</p>
              <button @click="addMovie(movie)" class="btn btn-outline-light btn-sm">
                Select Movie
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from 'vue'
import { gsap } from 'gsap'
import MovieCard from './MovieCard.vue'

const searchQuery = ref('')
const staticMovies = ref([
  {
    id: 1,
    title: 'Batman Returns',
    description: 'Dark knight returns.',
    image:
      'https://m.media-amazon.com/images/M/MV5BOGZmYzVkMmItM2NiOS00MDI3LWI4ZWQtMTg0YWZkODRkMmViXkEyXkFqcGdeQXVyODY0NzcxNw@@._V1_FMjpg_UX1000_.jpg',
  },
  {
    id: 2,
    title: 'Iron Man',
    description:
      'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.',
    image:
      'https://m.media-amazon.com/images/M/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_FMjpg_UX1000_.jpg',
  },
  {
    id: 3,
    title: 'The Amazing Spiderman',
    description: 'A teenage web-slinger.',
    image:
      'https://m.media-amazon.com/images/M/MV5BMjMyOTM4MDMxNV5BMl5BanBnXkFtZTcwNjIyNzExOA@@._V1_.jpg',
  },
])
const addedMovies = ref([])
const searchResults = ref([])

async function searchMovies() {
  if (!searchQuery.value.trim()) {
    searchResults.value = []
    return
  }
  const res = await fetch(`https://api.tvmaze.com/search/shows?q=${searchQuery.value}`)
  const data = await res.json()
  searchResults.value = data.map((item) => ({
    id: item.show.id,
    title: item.show.name,
    description: item.show.summary?.replace(/<[^>]+>/g, '') || 'No description available.',
    image:
      item.show.image?.original || item.show.image?.medium || getPlaceholderImage(item.show.name),
  }))
}
function getPlaceholderImage(title) {
  return `https://via.placeholder.com/300x400.png?text=${encodeURIComponent(title)}`
}
function addMovie(movie) {
  if (!addedMovies.value.find((m) => m.id === movie.id)) {
    addedMovies.value.push(movie)
  }
}
function removeMovie(id) {
  staticMovies.value = staticMovies.value.filter((m) => m.id !== id)
  addedMovies.value = addedMovies.value.filter((m) => m.id !== id)
}

const allMovies = computed(() => [...staticMovies.value, ...addedMovies.value])

//this is animation for header and movie grid
const movieGrid = ref(null)
const header = ref(null)
const results = ref(null)

onMounted(async () => {
  await nextTick()
  gsap.from(header.value, {
    opacity: 0,
    y: -30,
    duration: 1,
    ease: 'power2.out',
  })

  gsap.from(movieGrid.value.children, {
    opacity: 0,
    y: 50,
    stagger: 0.15,
    duration: 0.8,
    ease: 'power3.out',
  })

  gsap.from(results.value, {
    opacity: 0,
    y: 40,
    duration: 1,
    ease: 'power2.out',
    delay: 0.5,
  })
})
</script>

<style scoped>
.search-input {
  max-width: 300px;
  background-color: #f8f9fa;
  color: #000;
  margin-left: auto;
}

.movie-library input::placeholder {
  color: #aaa;
}
</style>
