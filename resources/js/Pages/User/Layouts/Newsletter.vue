<template>
  <section 
    ref="sectionRef"
    class="px-4 md:px-8 py-12 bg-gray-50 text-center"
  >
    <h2 
      :class="[
        'text-xl font-bold mb-2',
        isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
      ]"
    >
      Sign up for our newsletter
    </h2>
    <p 
      :class="[
        'text-sm text-gray-600 mb-4',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
      ]"
    >
      Stay updated with our latest offers
    </p>
    <div 
      :class="[
        'flex flex-col md:flex-row justify-center items-center max-w-md mx-auto',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-400' : 'opacity-0'
      ]"
    >
      <input 
        type="email" 
        placeholder="Your email address" 
        class="px-4 py-3 border rounded-full md:rounded-l-full md:rounded-r-none w-full md:w-64 mb-2 md:mb-0 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-300" 
      />
      <button 
        class="px-6 py-3 bg-black text-white rounded-full md:rounded-l-none md:rounded-r-full w-full md:w-auto hover:bg-red-600 transition-colors duration-300 flex items-center justify-center group"
      >
        Subscribe
        <svg 
          xmlns="http://www.w3.org/2000/svg" 
          class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke="currentColor"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            stroke-width="2" 
            d="M14 5l7 7m0 0l-7 7m7-7H3" 
          />
        </svg>
      </button>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

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
