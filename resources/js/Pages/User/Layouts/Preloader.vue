<template>
  <div v-if="isLoading" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
    <div class="flex flex-col items-center">
      <img 
        src="../../../../assets/logo.png" 
        alt="Logo" 
        class="w-68 h-32 animate-pulse"
      />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, defineEmits } from 'vue'

const emit = defineEmits(['loading-complete'])
const isLoading = ref(true)

onMounted(() => {
  // Simulate loading time (you can remove this in production)
  setTimeout(() => {
    isLoading.value = false
    emit('loading-complete')
  }, 6000)
})
</script>

<style scoped>
.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.5;
    transform: scale(0.95);
  }
}
</style> 