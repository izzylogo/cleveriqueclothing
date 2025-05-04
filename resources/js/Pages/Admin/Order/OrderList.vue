<script setup>
defineProps({ orders: Array });
import AdminLayout from '../Components/AdminLayout.vue';
</script>

<template>
  <AdminLayout>
    <template #default>
      <section class="p-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">All Orders</h2>
            <div class="text-sm text-gray-500">{{ orders.length }} orders found</div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div v-for="order in orders" :key="order.id" class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
              <!-- Order Header -->
              <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                <div class="flex justify-between items-center">
                  <h3 class="text-lg font-bold text-white">Order #{{ order.id }}</h3>
                  <span class="bg-white text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                    {{ order.status || 'Processing' }}
                  </span>
                </div>
              </div>

              <!-- Customer Info -->
              <div class="p-6 border-b border-gray-100">
                <div class="flex items-start space-x-4">
                  <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900">Customer</h4>
                    <p class="text-sm text-gray-500">{{ order.user_address?.user?.email || 'N/A' }}</p>
                  </div>
                </div>

                <div class="mt-4 flex items-start space-x-4">
                  <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900">Shipping Address</h4>
                    <p class="text-sm text-gray-500">
                      {{ order.user_address?.address1 }}, {{ order.user_address?.city }}, 
                      {{ order.user_address?.state }}, {{ order.user_address?.zipcode }}
                    </p>
                  </div>
                </div>

                <!-- Phone Number -->
                <div class="mt-4 flex items-start space-x-4">
                  <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-gray-900">WhatsApp</h4>
                    <div class="flex items-center">
                      <p class="text-sm text-gray-500">{{ order.user_address?.phone_number }}</p>
                      <a 
                        :href="`https://wa.me/${order.user_address?.phone_number}`" 
                        target="_blank"
                        class="ml-2 inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 hover:bg-green-200"
                      >
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Order Items -->
              <div class="px-6 py-4">
                <h4 class="text-sm font-medium text-gray-900 mb-4">Order Items</h4>
                <div class="space-y-4">
                  <div v-for="item in order.order_items" :key="item.id" class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                      <img
                        v-if="item.product.product_images && item.product.product_images.length"
                        :src="`/${item.product.product_images[0].image}`"
                        alt="Product Image"
                        class="w-16 h-16 object-cover rounded-md border border-gray-200"
                      />
                      <div v-else class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1 min-w-0">
                      <p class="text-sm font-medium text-gray-900 truncate">{{ item.product.title }}</p>
                      <p class="text-sm text-gray-500">
                        Qty: <span class="font-medium">{{ item.quantity }}</span>
                      </p>
                    </div>
                    <div class="flex-shrink-0">
                      <p class="text-sm font-medium text-gray-900">₦{{ item.product.price }}</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Order Footer -->
              <div class="bg-gray-50 px-6 py-4 flex justify-between items-center">
                <div class="text-xs text-gray-500">
                  <span>{{ new Date(order.created_at).toLocaleDateString() }}</span>
                </div>
                <div class="text-sm font-bold text-gray-900">
                  Total: ₦{{ order.order_items.reduce((sum, item) => sum + (item.product.price * (item.quantity || 1)), 0) }}
                </div>
              </div>
            </div>
          </div>

          <!-- Empty State -->
          <div v-if="orders.length === 0" class="flex flex-col items-center justify-center py-16 bg-white rounded-lg shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No orders found</h3>
            <p class="mt-1 text-sm text-gray-500">There are no orders in the system yet.</p>
          </div>
        </div>
      </section>
    </template>
  </AdminLayout>
</template>

<style scoped>
.bg-gradient-to-r {
  background-size: 200% 200%;
  animation: gradient 15s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>
