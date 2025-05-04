<template>
  <section ref="sectionRef" class="px-4 md:px-8 py-[90px]">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
      <h2 
        :class="[
          'text-4xl font-bold mb-4 md:mb-0',
          isVisible && isLoaded ? 'animate-fade-in-up' : 'opacity-0'
        ]" 
        style='font-family: "Playfair Display", serif;'
      >
        Our <span class="text-red-600">Products</span>
      </h2>
      <div 
        :class="[
          'flex space-x-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto justify-center md:justify-end',
          isVisible && isLoaded ? 'animate-fade-in-up animation-delay-200' : 'opacity-0'
        ]"
      >
        <button class="px-3 py-1 bg-black text-white text-xs rounded-full whitespace-nowrap hover:bg-red-600 transition-colors duration-300">All</button>
        <button class="px-3 py-1 bg-white text-black text-xs border rounded-full whitespace-nowrap hover:bg-red-50 hover:border-red-600 transition-colors duration-300">New</button>
        <button class="px-3 py-1 bg-white text-black text-xs border rounded-full whitespace-nowrap hover:bg-red-50 hover:border-red-600 transition-colors duration-300">Featured</button>
        <button class="px-3 py-1 bg-white text-black text-xs border rounded-full whitespace-nowrap hover:bg-red-50 hover:border-red-600 transition-colors duration-300">On Sale</button>
      </div>
    </div>
    <div 
      :class="[
        'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-400' : 'opacity-0'
      ]"
    >
      <div v-if="products.length === 0" class="col-span-4 text-center py-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-2 animate-fade-in-up animation-delay-400">No products available</h3>
        <p class="text-gray-500 animate-fade-in-up animation-delay-500">Stay tuned! New products coming soon.</p>
      </div>
      <div 
        v-for="(product, index) in products" 
        :key="product.id"
        class="relative bg-slate-200 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 flex flex-col justify-between p-4 min-h-[370px]"
        :style="{ animationDelay: `${index * 100}ms` }"
      >
        <!-- Badge and Wishlist -->
        <!-- <div class="flex justify-between items-start mb-2">
          <span v-if="product.is_new" class="bg-purple-100 text-purple-700 text-xs font-semibold px-2 py-1 rounded-lg">NEW</span>
          <span v-else></span>
          <button class="bg-gray-100 hover:bg-gray-200 p-1 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>
        </div> -->
        <!-- Product Image -->
        <div class="flex justify-center items-center bg-white rounded-xl mb-4 h-80 overflow-hidden">
          
          <img 
            v-if="product.product_images.length > 0" 
            :src="`/${product.product_images[0].image}`"
            :alt="product.imageAlt" 
            class="h-[390px] object-cover rounded-lg overflow-hidden"
          />
          <img 
            v-else
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
            :alt="product.imageAlt"
            class="max-h-44 object-contain"
          />
        </div>
        <!-- Product Info -->
        <div class="flex-1 flex flex-col justify-between">
          <div>
            <h3 class="text-base font-semibold text-gray-900 mb-1 truncate">{{ product.title }}</h3>
          </div>
          <div class="mt-2">
            <span class="block text-xs text-gray-400">Price</span>
            <span class="block text-lg font-bold text-gray-900">₦{{ product.price }}</span>
          </div>
        </div>
        <div class="flex justify-between w-full items-center">
          <!-- view detail button -->
          <div class="flex justify-end mt-4">
            <button @click="openProductModal(product)" class="bg-slate-600 hover:bg-slate-700 text-white p-2 rounded-lg transition-colors flex items-center gap-1 text-[10px]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386a2.25 2.25 0 012.17 1.674l.276 1.104M6.75 7.5h10.128c.978 0 1.698.958 1.493 1.92l-1.223 5.519A2.25 2.25 0 0115.956 17.25H8.043a2.25 2.25 0 01-2.192-2.311l.401-6.439zm0 0L5.812 5.778A2.25 2.25 0 003.75 4.5m3 3v0m0 0h10.128c.978 0 1.698.958 1.493 1.92l-1.223 5.519A2.25 2.25 0 0115.956 17.25H8.043a2.25 2.25 0 01-2.192-2.311l.401-6.439z" />
              </svg>
              View detail
            </button>
          </div>
          <!-- Add to Cart Button -->
          <div class="flex justify-end mt-4">
            <button @click="addToCart(product)" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg transition-colors flex items-center gap-1 text-[10px]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386a2.25 2.25 0 012.17 1.674l.276 1.104M6.75 7.5h10.128c.978 0 1.698.958 1.493 1.92l-1.223 5.519A2.25 2.25 0 0115.956 17.25H8.043a2.25 2.25 0 01-2.192-2.311l.401-6.439zm0 0L5.812 5.778A2.25 2.25 0 003.75 4.5m3 3v0m0 0h10.128c.978 0 1.698.958 1.493 1.92l-1.223 5.519A2.25 2.25 0 0115.956 17.25H8.043a2.25 2.25 0 01-2.192-2.311l.401-6.439z" />
              </svg>
              Add To Cart
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <div 
      :class="[
        'flex justify-center mt-8',
        isVisible && isLoaded ? 'animate-fade-in-up animation-delay-600' : 'opacity-0'
      ]"
    >
      <Link :href="route('products.index')"
          class="text-white bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
          View All Products
      </Link>
    </div>
  </section>

  <!-- Product Detail Modal -->
  <div v-if="showModal && selectedProduct" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[45%] p-6 relative">
      <button @click="closeProductModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-4xl">&times;</button>
      <div class="flex items-center gap-5 justify-between">
        <div>
          <img v-if="selectedProduct.product_images && selectedProduct.product_images.length > 0" :src="`/${selectedProduct.product_images[0].image}`" :alt="selectedProduct.title" class="w-40 h-[270px] object-contain mb-4 rounded-xl overflow-hidden" style="width: auto !important" />
          <img v-else src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png" :alt="selectedProduct.title" class="w-40 h-[270px] object-contain mb-4 rounded-xl overflow-hidden" style="width: auto !important" />
        </div>
        <div class="w-[49%]">
          <h2 class="text-xl font-bold mb-2">{{ selectedProduct.title }}</h2>
          <p class="text-red-600 text-base font-semibold mb-2">₦{{ selectedProduct.price }}</p>
          <div class="flex items-center gap-2 bg-red-100 text-red-700 rounded-lg px-4 py-2 mb-2 font-bold text-sm">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ selectedProduct.description }}</span>
          </div>
          <div class="flex flex-col gap-1 text-sm text-gray-600 w-full mb-4">
            <div><span class="font-semibold">Quantity:</span> {{ selectedProduct.quantity }}</div>
            <div><span class="font-semibold">Brand:</span> {{ selectedProduct.brand?.name }}</div>
            <div><span class="font-semibold">Category:</span> {{ selectedProduct.category?.name }}</div>
          </div>
          <button @click="addToCart(selectedProduct)" class="w-full bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition-colors">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

defineProps({
   products:Array
})

const sectionRef = ref(null)
const isVisible = ref(false)
const isLoaded = ref(false)
const showModal = ref(false)
const selectedProduct = ref(null)

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

const addToCart = (product) => {
   console.log(product)
   router.post(route('cart.store', product), {
       onSuccess: (page) => {
           if (page.props.flash.success) {
               Swal.fire({
                   toast: true,
                   icon: "success",
                   position: "top-end",
                   showConfirmButton: false,
                   title: page.props.flash.success
               });
           }
       },
   })
}

const openProductModal = (product) => {
  selectedProduct.value = product
  showModal.value = true
}
const closeProductModal = () => {
  showModal.value = false
  selectedProduct.value = null
}
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
</style>
