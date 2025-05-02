<template>
  <section 
    ref="sectionRef"
    class="px-4 md:px-8 py-12 md:py-16 bg-white"
  >
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
      <div 
        :class="[
          'max-w-xl',
          isVisible && isLoaded ? 'animate-fade-in-left' : 'opacity-0'
        ]"
      >
        <h2 class="text-5xl font-bold mb-4" style='font-family: "Playfair Display", serif;'>About <span class="text-red-600">Cleverique</span></h2>
        <p 
          v-for="(paragraph, index) in paragraphs" 
          :key="index"
          :class="[
            'text-gray-600 mb-4',
            isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
          ]"
          :style="{ animationDelay: `${index * 200}ms` }"
        >
          {{ paragraph }}
        </p>
        <div 
          :class="[
            'grid grid-cols-2 gap-4 mb-8',
            isVisible && isLoaded ? 'animate-fade-in-up animation-delay-800' : 'opacity-0'
          ]"
        >
          <div 
            v-for="(stat, index) in stats" 
            :key="index"
            class="flex flex-col"
            :style="{ animationDelay: `${index * 100}ms` }"
          >
            <p class="text-3xl font-bold" :class="stat.highlight ? 'text-red-600' : ''">{{ stat.value }}</p>
            <p class="text-sm text-gray-600">{{ stat.label }}</p>
          </div>
        </div>
        <button 
          :class="[
            'px-6 py-2 bg-black text-white text-sm hover:bg-red-600 transition-colors duration-300',
            isVisible && isLoaded ? 'animate-fade-in-up animation-delay-1200' : 'opacity-0'
          ]"
        >
          Discover Our Story
        </button>
      </div>
      <div 
        :class="[
          'w-full gap-4 mt-8 md:mt-0',
          isVisible && isLoaded ? 'animate-fade-in-right' : 'opacity-0'
        ]"
      >
        <!-- <img src="../../../../assets/boutique.jpg" alt="Fashion Blog" class="w-full h-auto object-cover rounded-lg" /> -->
        <img src="../../../../assets/pictures/IMG_9865.jpg" alt="Fashion Blog" class="w-full h-auto object-cover rounded-lg" />
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

const paragraphs = [
  'At Cleverique, style is not just what you wear — it\'s a statement of who you are. We exist for the bold, the elegant, and the effortlessly sophisticated.',
  'Guided by our promise — "Your style, our concern" — we curate timeless pieces that transcend trends, crafting a wardrobe where luxury meets individuality.',
  'Every fabric, every detail, every design is carefully chosen to elevate your presence and leave an unforgettable impression.',
  'At Cleverique, we don\'t just dress you — we define you.'
]

const stats = [
  { value: '100k+', label: 'Happy Customers', highlight: true },
  { value: '200+', label: 'Top Products', highlight: false },
  { value: '1+', label: 'Years Experience', highlight: false },
  { value: '100%', label: 'High Quality', highlight: false }
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

.animate-fade-in-left {
  opacity: 0;
  transform: translateX(-50px);
  animation: fadeInLeft 0.8s ease-out forwards;
}

.animate-fade-in-right {
  opacity: 0;
  transform: translateX(50px);
  animation: fadeInRight 0.8s ease-out forwards;
}

.animation-delay-800 {
  animation-delay: 0.8s;
}

.animation-delay-1200 {
  animation-delay: 1.2s;
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

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>