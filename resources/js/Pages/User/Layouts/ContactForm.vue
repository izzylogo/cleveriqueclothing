<template>
  <section 
    ref="sectionRef"
    class="px-4 md:px-8 py-12 bg-gray-50"
  >
    <div class="max-w-2xl mx-auto">
      <h2 
        :class="[
          'text-2xl font-bold mb-2 text-center',
          isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
        ]"
      >
        Get in Touch
      </h2>
      <p 
        :class="[
          'text-sm text-gray-600 mb-8 text-center',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
        ]"
      >
        Have questions? We'd love to hear from you.
      </p>
      
      <form 
        @submit.prevent="handleSubmit" 
        class="space-y-6"
        :class="[
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-400' : 'opacity-0'
        ]"
      >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div 
            v-for="(field, index) in nameEmailFields" 
            :key="index"
            :style="{ animationDelay: `${index * 100}ms` }"
          >
            <label :for="field.id" class="block text-sm font-medium text-gray-700 mb-1">{{ field.label }}</label>
            <input
              :type="field.type"
              :id="field.id"
              v-model="form[field.id]"
              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
              :placeholder="field.placeholder"
              required
            />
          </div>
        </div>

        <div 
          :style="{ animationDelay: '200ms' }"
        >
          <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
          <input
            type="text"
            id="subject"
            v-model="form.subject"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
            placeholder="What's this about?"
            required
          />
        </div>

        <div 
          :style="{ animationDelay: '300ms' }"
        >
          <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
          <textarea
            id="message"
            v-model="form.message"
            rows="4"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
            placeholder="Your message..."
            required
          ></textarea>
        </div>

        <div 
          class="flex justify-center"
          :style="{ animationDelay: '400ms' }"
        >
          <button
            type="submit"
            class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200"
          >
            Send Message
          </button>
        </div>
      </form>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

const form = ref({
  name: '',
  email: '',
  subject: '',
  message: ''
})

const nameEmailFields = [
  {
    id: 'name',
    label: 'Name',
    type: 'text',
    placeholder: 'Your name'
  },
  {
    id: 'email',
    label: 'Email',
    type: 'email',
    placeholder: 'your@email.com'
  }
]

const handleSubmit = () => {
  // Handle form submission here
  console.log('Form submitted:', form.value)
  // You can add your form submission logic here
}

// Listen for preloader completion
const handleLoadingComplete = () => {
  isLoaded.value = true
}

// Setup Intersection Observer
let observer

onMounted(() => {
  // Listen for preloader completion
  window.addEventListener('preloader-complete', handleLoadingComplete)

  // Setup Intersection Observer
  observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        isVisible.value = true
      }
    })
  }, {
    threshold: 0.1
  })

  if (sectionRef.value) {
    observer.observe(sectionRef.value)
  }
})

onUnmounted(() => {
  if (observer) {
    observer.disconnect()
  }
  window.removeEventListener('preloader-complete', handleLoadingComplete)
})
</script>

<style scoped>
.animate-fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.8s ease-out forwards;
}

.animation-delay-200 {
  animation-delay: 0.2s;
}

.animation-delay-400 {
  animation-delay: 0.4s;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style> 