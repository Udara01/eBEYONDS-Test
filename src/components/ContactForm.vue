<template>
  <section class="contact-form container">
    <h3 class="form-title">How to reach us</h3>
    <br />

    <form @submit.prevent="submitForm" ref="formRef">
      <div class="row g-4">
        <div class="col-md-6">
          <input
            v-model="form.firstName"
            type="text"
            placeholder="First Name *"
            class="form-control"
            required
          />
        </div>
        <div class="col-md-6">
          <input
            v-model="form.lastName"
            type="text"
            placeholder="Last Name *"
            class="form-control"
            required
          />
        </div>
        <div class="col-12">
          <input
            v-model="form.email"
            type="email"
            placeholder="Email *"
            class="form-control"
            required
          />
        </div>
        <div class="col-12">
          <input v-model="form.phone" type="tel" placeholder="Telephone" class="form-control" />
        </div>
        <div class="col-12">
          <textarea
            v-model="form.message"
            placeholder="Message"
            class="form-control"
            rows="4"
            required
          ></textarea>
        </div>
        <div class="col-12 text-start">
          <small class="text-muted">*required fields</small>
        </div>
        <div class="col-12 form-check mt-2">
          <input
            type="checkbox"
            v-model="form.agree"
            required
            class="form-check-input"
            id="agreeCheck"
          />
          <label for="agreeCheck" class="form-check-label">
            I agree to the <a href="#">Terms & Conditions</a>
          </label>
        </div>
        <div class="col-12 text-end">
          <button type="submit" class="btn btn-warning text-white px-4 py-2 fw-bold">SUBMIT</button>
        </div>
      </div>
      <p v-if="responseMessage" class="mt-3">{{ responseMessage }}</p>
    </form>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import gsap from 'gsap'

const formRef = ref(null)
const form = ref({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  message: '',
  agree: false,
})
const responseMessage = ref('')

async function submitForm() {
  const formData = new FormData()
  formData.append('firstName', form.value.firstName)
  formData.append('lastName', form.value.lastName)
  formData.append('email', form.value.email)
  formData.append('phone', form.value.phone)
  formData.append('message', form.value.message)

  try {
    const res = await fetch('http://localhost:8000/contact.php', {
      method: 'POST',
      body: formData,
      mode: 'cors',
    })
    const result = await res.json()
    if (result.success) {
      responseMessage.value = 'Thank you for contacting us!'
      form.value = {
        firstName: '',
        lastName: '',
        email: '',
        phone: '',
        message: '',
        agree: false,
      }
    } else {
      responseMessage.value = 'There was a problem submitting the form.'
    }
  } catch (err) {
    responseMessage.value = 'Server error: ' + err.message
  }
}

onMounted(() => {
  gsap.from(formRef.value, {
    opacity: 0,
    y: 50,
    duration: 1,
    delay: 0.2,
    ease: 'power3.out',
  })
})
</script>

<style scoped>
.contact-form {
  background-color: #000;
  color: white;
  padding: 2rem;
  border-radius: 10px;
}
.form-title {
  font-weight: bold;
  font-size: 1.75rem;
}

.form-control {
  padding: 1rem;
  min-height: 3.5rem;
}

textarea.form-control {
  min-height: 10rem;
}

.form-subtitle {
  color: #ccc;
  margin-bottom: 1.5rem;
}
input,
textarea {
  background-color: #333;
  color: white;
  border: none;
  border-radius: 6px;
}

small.text-muted {
  color: #ffffff !important;
  font-size: 0.9rem;
}

input::placeholder,
textarea::placeholder {
  color: #aaa;
}
input:focus,
textarea:focus {
  outline: none;
  box-shadow: 0 0 0 2px #ffc107;
}
button.btn-warning {
  background-color: #ffc107;
  border: none;
}
</style>
