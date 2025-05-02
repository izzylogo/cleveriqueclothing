<template>
  <nav class="fixed top-0 left-0 right-0 z-50 bg-white flex flex-col md:flex-row justify-between items-center py-4 px-4 md:px-8 w-full">
    <div class="flex items-center mb-4 md:mb-0 md:block hidden w-[100%]">
      <img src="../../../assets/logo.png" alt="Cleverique Logo" class="h-14" />
    </div>
    
    <!-- Mobile menu button -->
    <div class="flex items-center justify-between w-[100%]">
      <div class="flex items-center mb-4 md:mb-0 md:hidden block w-[100%]">
        <img src="../../../assets/logo.png" alt="Cleverique Logo" class="h-12" />
      </div>
      <button @click="isMenuOpen = !isMenuOpen" class="md:hidden absolute right-4 top-4 p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path v-if="isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    
    <!-- Navigation links -->
    <div :class="['md:flex gap-4 md:gap-6 text-sm w-full md:w-auto justify-center transition-all duration-300 ease-in-out', 
                  isMenuOpen ? 'flex flex-col items-center pt-4' : 'hidden md:flex']">
      <a href="#" class="hover:text-gray-600 whitespace-nowrap py-2 md:py-0">Home</a>
      <a href="#" class="hover:text-gray-600 whitespace-nowrap py-2 md:py-0">Shop</a>
      <a href="#" class="hover:text-gray-600 whitespace-nowrap py-2 md:py-0">Sale</a>
      <a href="#" class="hover:text-gray-600 whitespace-nowrap py-2 md:py-0">Blog</a>
      <a href="#" class="hover:text-gray-600 whitespace-nowrap py-2 md:py-0">Contact</a>
    </div>
    
    <!-- Icons -->
    <div class="hidden md:flex gap-4 mt-4 md:mt-0">
      <button class="p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </button>
      <button class="p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
      </button>
    </div>
  </nav>
  
  <!-- Spacer to prevent content from being hidden behind fixed navbar -->
  <div class="h-[70px] md:h-[76px]"></div>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      isMenuOpen: false
    }
  }
}
</script>
