<template>
  <section class="grid grid-cols-2 md:grid-cols-4 gap-2 px-4 md:px-8 py-4">
    <div class="col-span-2 row-span-2 bg-red-500 h-60 md:h-80 relative">
      <div class="absolute bottom-0 left-0 p-4 text-white">
        <p class="text-lg font-bold">SALE</p>
        <p class="text-sm">Up to 50% off</p>
      </div>
    </div>
    <div class="bg-blue-300 h-28 md:h-40 relative">
      <div class="absolute bottom-0 left-0 p-4 text-white">
        <p class="text-xs md:text-sm font-bold">New Collection</p>
      </div>
    </div>
    <div class="bg-yellow-200 h-28 md:h-40 relative">
      <div class="absolute bottom-0 left-0 p-4 text-black">
        <p class="text-xs md:text-sm font-bold">Only winter jackets</p>
      </div>
    </div>
    <div class="bg-blue-800 h-28 md:h-40 relative">
      <div class="absolute bottom-0 left-0 p-4 text-white">
        <p class="text-xs md:text-sm font-bold">Shoes</p>
      </div>
    </div>
    <div class="bg-gray-200 h-28 md:h-40 relative">
      <div class="absolute bottom-0 left-0 p-4 text-black">
        <p class="text-xs md:text-sm font-bold">Accessories</p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'FeaturedGrid'
}
</script>
