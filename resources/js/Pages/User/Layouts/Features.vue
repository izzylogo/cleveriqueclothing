<template>
  <section 
    ref="sectionRef"
    class="px-4 md:px-8 py-12 bg-gray-50"
  >
    <h1 
      :class="[
        'text-4xl font-bold mb-8',
        isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
      ]" 
      style='font-family: "Playfair Display", serif;'
    >
      Our <span class="text-red-600">Features</span>
    </h1>
    <div 
      :class="[
        'grid grid-cols-1 md:grid-cols-3 gap-8',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
      ]"
    >
      <div 
        v-for="(feature, index) in features" 
        :key="index"
        class="group flex bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:scale-105"
        :style="{ animationDelay: `${index * 200}ms` }"
      >
        <div class="mr-6 bg-red-600 rounded-full w-16 h-16 flex items-center justify-center text-white shrink-0 group-hover:bg-black transition-colors duration-300">
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-8 w-8" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor"
          >
            <path 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              :d="feature.iconPath"
            />
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-lg mb-2 group-hover:text-red-600 transition-colors duration-300">{{ feature.title }}</h3>
          <p class="text-sm text-gray-600">{{ feature.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

const features = [
  {
    title: 'Fast Delivery',
    description: 'Get your favorite products delivered to your doorstep within 24-48 hours.',
    icon: 'svg',
    iconPath: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
  },
  {
    title: 'Secure Payments',
    description: 'Shop with confidence using our secure payment gateway and multiple payment options.',
    icon: 'svg',
    iconPath: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'
  },
  {
    title: 'Easy Returns',
    description: 'Not satisfied? Return your purchase within 30 days for a full refund.',
    icon: 'svg',
    iconPath: 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'
  }
]

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
