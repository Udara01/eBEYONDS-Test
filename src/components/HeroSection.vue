<template>
  <section class="hero">
    <div
      id="heroCarousel"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
      data-bs-interval="4000"
      ref="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            class="carousel-img d-block w-100"
            src="@/assets/carousel-image1.webp"
            alt="Slide 1"
          />
        </div>
        <div class="carousel-item">
          <img
            class="carousel-img d-block w-100"
            src="@/assets/carousel-image2.jpg"
            alt="Slide 2"
          />
        </div>
        <div class="carousel-item">
          <img
            class="carousel-img d-block w-100"
            src="@/assets/carousel-image3.jpg"
            alt="Slide 3"
          />
        </div>
      </div>

      <!-- Controls  -->
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#heroCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#heroCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
</template>

<script>
import { onMounted, ref } from 'vue'
import { gsap } from 'gsap'

export default {
  setup() {
    const carousel = ref(null)

    onMounted(() => {
      const images = document.querySelectorAll('.carousel-img')

      // this is the animation for carousel container
      gsap.from(carousel.value, {
        opacity: 0,
        y: 30,
        duration: 1,
        ease: 'power2.out',
      })

      // this is the animate for the individual slide images automatically
      images.forEach((img, index) => {
        gsap.from(img, {
          opacity: 0,
          scale: 1.05,
          delay: index * 0.2,
          duration: 1.2,
          ease: 'power3.out',
        })
      })
    })

    return {
      carousel,
    }
  },
}
</script>

<style scoped>
.hero {
  width: 100vw;
  height: 100vh;
  position: relative;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

.carousel,
.carousel-inner,
.carousel-item {
  width: 100%;
  height: 100%;
}

.carousel-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
}

.carousel-item::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent 50%);
  z-index: 1;
}

.carousel-control-prev,
.carousel-control-next {
  width: 8%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  filter: invert(1) drop-shadow(0 0 5px white);
  width: 3rem;
  height: 3rem;
}
</style>
