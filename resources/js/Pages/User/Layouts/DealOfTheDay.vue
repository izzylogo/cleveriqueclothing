<template>
  <section 
    ref="sectionRef"
    class="deal-bg-image px-4 md:px-8 py-[50px] flex flex-col items-center justify-center relative overflow-hidden w-full md:w-[70%] rounded-3xl shadow-2xl bg-cover bg-center shadow-[0_-4px_32px_8px_rgba(0,0,0,0.25)]"
    :style="`margin: 0 auto; margin-bottom: 30px;`"
    >
    <div 
      :class="[
        'text-center max-w-md my-8 md:my-0 mx-auto z-10 bg-white/30 backdrop-blur-md rounded-2xl p-8',
        isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
      ]"
    >
      <h2 class="text-2xl font-bold mb-4 text-white drop-shadow-lg" style='font-family: "Playfair Display", serif;'>Deal of the <span class="text-red-400">Day</span></h2>
      <div class="mb-6">
        <div class="text-lg font-semibold text-green-300 mb-2">we are ready and open</div>
        <div class="text-base text-white font-medium mb-1">Monday to Friday: <span class="text-green-300">9:00am - 8:00pm</span></div>
        <div class="text-sm text-slate-200 font-medium mb-2 leading-relaxed">
          <span class="block font-semibold text-base text-white mb-1">Favour of God Plaza</span>
          14 Ada George road opp. MKT square, port Harcourt
        </div>
      </div>
      <div 
        :class="[
          'flex justify-center space-x-2 md:space-x-4 mb-6',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
        ]"
      >
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-red-400">{{ countdown.days }}</p>
          <p class="text-xs text-white">Days</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-white">:</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-red-400">{{ countdown.hours }}</p>
          <p class="text-xs text-white">Hours</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-white">:</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-red-400">{{ countdown.minutes }}</p>
          <p class="text-xs text-white">Minutes</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-white">:</p>
        </div>
        <div class="text-center">
          <p class="text-xl md:text-2xl font-bold text-red-400">{{ countdown.seconds }}</p>
          <p class="text-xs text-white">Seconds</p>
        </div>
      </div>
      <button 
        :class="[
          'px-6 py-2 bg-white text-slate-900 text-sm font-bold hover:bg-red-400 hover:text-white transition-colors duration-300 shadow-lg',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-400' : 'opacity-0'
        ]"
      >
        Shop Now
      </button>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)

const countdown = ref({
  days: 2,
  hours: 12,
  minutes: 45,
  seconds: 30
})

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
.deal-bg-image{
  background-image:
    linear-gradient(rgba(30, 41, 59, 0.8), rgba(30, 41, 59, 0.7)),
    url('../../../../assets/pictures/IMG_9797.jpg');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
.animate-fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.8s ease-out forwards;
}

.animate-slide-in-left {
  opacity: 0;
  transform: translateX(-50px);
  animation: slideInLeft 0.8s ease-out forwards;
}

.animate-slide-in-right {
  opacity: 0;
  transform: translateX(50px);
  animation: slideInRight 0.8s ease-out forwards;
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

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
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
