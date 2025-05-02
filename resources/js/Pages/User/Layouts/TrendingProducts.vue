<template>
  <section class="px-4 md:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold">Trending <span class="text-red-600">Products</span></h2>
      <div class="flex space-x-1">
        <button class="w-8 h-8 bg-white border rounded-full flex items-center justify-center hover:border-red-600 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button class="w-8 h-8 bg-black rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
      <div v-for="product in products" :key="product.id" class="group">
        <div class="relative mb-2">
          <img src="../../../../assets/shoes(12).jpg" :alt="product.name" class="w-full h-48 md:h-64 object-cover" />
          <button class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>
        </div>
        <div>
          <p class="text-xs text-gray-500">{{ product.category }}</p>
          <p class="text-sm">{{ product.name }}</p>
          <p class="text-sm font-semibold">{{ product.price }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'TrendingProducts',
  data() {
    return {
      products: [
        {
          id: 1,
          name: 'Leather Watch',
          category: 'ACCESSORIES',
          price: '$189.00',
          image: 'product (15).jpg'
        },
        {
          id: 2,
          name: 'Premium Coat',
          category: 'OUTERWEAR',
          price: '$275.00',
          image: 'product (8).jpg'
        },
        {
          id: 3,
          name: 'Designer Jacket',
          category: 'JACKET MEN',
          price: '$225.00',
          image: 'product (4).jpg'
        },
        {
          id: 4,
          name: 'Luxury Sneakers',
          category: 'FOOTWEAR',
          price: '$165.00',
          image: 'product (35).jpg'
        }
      ]
    }
  }
}
</script>
