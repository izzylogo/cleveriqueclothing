<template>
  <section 
    ref="sectionRef"
    class="flex flex-col md:flex-row justify-between items-center px-4 md:px-8 py-8 bg-gray-50 w-full gap-[60px]"
  >
    <div class="w-full mb-8 md:mb-0 flex-[1] md:w-[50%]">
      <h1 
        :class="[
          'mb-8 text-5xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white',
          isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
        ]" 
        style='font-family: "Playfair Display", serif;'
      >
        Level up your <span class="text-red-600">style</span> with our collections
      </h1>
      <!-- <p class="mt-4 text-sm text-gray-600">The modern entrepreneur knows customers don't buy goods or what you do. It's about the story you sell.</p> -->
      <p 
        :class="[
          'mt-4 mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
        ]"
      >
        Discover a world of fashion-forward trends, curated collections, and timeless pieces that inspire. Unleash your inner fashionista and embark on a journey of confidence, elegance and impeccable style.
      </p>
      <button 
        :class="[
          'mt-6 px-6 py-2 bg-black text-white text-sm hover:bg-red-600 transition-colors duration-300',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-400' : 'opacity-0'
        ]"
      >
        Shop Now
      </button>
      
      <!-- Brand Logos Marquee -->
      <div 
        :class="[
          'mt-8 overflow-hidden w-[100%]',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-600' : 'opacity-0'
        ]"
      >
        <div class="logos-slide-track flex gap-8 items-center">
          <img src="../../../../assets/companies/CHANEL_Symbol_0.svg" alt="Chanel" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/LouisVuitton_idKrstj4pu_0.svg" alt="Louis Vuitton" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Prada_idgVr-1sRM_0.svg" alt="Prada" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Versace_Logo_0.svg" alt="Versace" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/BALENCIAGA_idpPck7uAA_0.png" alt="Balenciaga" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Fendi_idMhTfI8EN_0.svg" alt="Fendi" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          
          <!-- Duplicate logos for seamless looping -->
          <img src="../../../../assets/companies/CHANEL_Symbol_0.svg" alt="Chanel" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/LouisVuitton_idKrstj4pu_0.svg" alt="Louis Vuitton" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Prada_idgVr-1sRM_0.svg" alt="Prada" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Versace_Logo_0.svg" alt="Versace" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/BALENCIAGA_idpPck7uAA_0.png" alt="Balenciaga" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
          <img src="../../../../assets/companies/Fendi_idMhTfI8EN_0.svg" alt="Fendi" class="h-6 grayscale hover:grayscale-0 transition-all duration-300" />
        </div>
      </div>
    </div>
    <div 
      :class="[
        'relative w-full md:w-[100%] flex-[0.6]',
        isVisible && isLoaded ? 'animate-scale-in' : 'opacity-0'
      ]"
    >
    <img src="../../../../assets/pictures/IMG_9967.jpg" alt="Hero Image" class="w-full md:w-[400px] h-[300px] md:h-[500px] object-cover rounded-3xl" />
      <div class="absolute bottom-4 right-4 flex space-x-1">
        <div class="w-2 h-2 bg-red-600 rounded-full"></div>
        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, onBeforeUnmount } from 'vue'

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
    threshold: 0.1 // Trigger when 10% of the section is visible
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
.transition-opacity {
  transition: opacity 1s ease-in-out;
}
.logos-slide-track {
  animation: scroll 30s linear infinite;
  width: calc(120px * 12);
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-120px * 6));
  }
}

.animate-fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.8s ease-out forwards;
}

.animate-scale-in {
  opacity: 0;
  transform: scale(0.9);
  animation: scaleIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.animation-delay-200 {
  animation-delay: 0.2s;
}

.animation-delay-400 {
  animation-delay: 0.4s;
}

.animation-delay-600 {
  animation-delay: 0.6s;
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

@keyframes scaleIn {
  from {
    opacity: 0;
    transform: scale(0.9);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
</style>
