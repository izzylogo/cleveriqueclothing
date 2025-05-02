<template>
  <section 
    ref="sectionRef"
    class="px-4 md:px-8 py-8 bg-black text-white"
  >
    <h2 
      :class="[
        'text-xl font-bold mb-6',
        isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
      ]"
    >
      Our <span class="text-red-600">Blog</span>
    </h2>
    <div 
      :class="[
        'grid grid-cols-1 md:grid-cols-3 gap-6',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
      ]"
    >
      <div 
        v-for="(blog, index) in blogs" 
        :key="index"
        class="group bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition-all duration-300 hover:scale-105"
        :style="{ animationDelay: `${index * 200}ms` }"
      >
        <div class="overflow-hidden rounded-lg mb-4">
          <img 
            :src=blog.image 
            alt="Blog Image" 
            class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110" 
          />
        </div>
        <p 
          :class="[
            'text-sm font-bold mb-2 group-hover:text-red-600 transition-colors duration-300',
            isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
          ]"
        >
          {{ blog.title }}
        </p>
        <p 
          :class="[
            'text-xs text-gray-400 mb-4',
            isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
          ]"
        >
          {{ blog.excerpt }}
        </p>
        <a 
          href="#" 
          :class="[
            'text-xs font-semibold inline-flex items-center text-red-600 hover:text-white transition-colors duration-300',
            isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
          ]"
        >
          Read More
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor"
          >
            <path 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M9 5l7 7-7 7" 
            />
          </svg>
        </a>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import img1 from '../../../../assets/pictures/IMG_9838.jpg'
import img2 from '../../../../assets/pictures/IMG_9632.jpg'
import img3 from '../../../../assets/pictures/IMG_9813.jpg'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

const blogs = [
        {
          title: 'Glance into the future of Artworks',
          excerpt: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
          image: img1
        },
        {
          title: 'The Evolution of Fashion Design',
          excerpt: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
          image: img2
        },
        {
          title: 'Sustainable Fashion Trends',
          excerpt: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
          image: img3
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
