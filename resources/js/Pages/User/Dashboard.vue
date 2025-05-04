<script setup>
import UserLayouts from './Layouts/UserLayouts.vue'

defineProps({
    orders: Array
})
</script>
<template>
    <UserLayouts>
        <div class="bg-gray-50 min-h-screen">
            <div class="max-w-screen-xl py-12 px-4 sm:px-6 lg:px-8 mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">My Orders</h1>
                
                <div v-if="orders.length > 0" class="space-y-8">
                    <div v-for="order in orders" :key="order.id" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Order Header -->
                        <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-4 flex justify-between items-center">
                            <h2 class="text-lg font-bold text-white">Order #{{ order.id }}</h2>
                            <div class="text-white text-sm">
                                <span class="bg-white text-red-600 px-3 py-1 rounded-full font-medium">
                                    {{ order.status || 'Processing' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="p-4 border-b border-gray-100 bg-gray-50">
                            <div class="flex flex-wrap gap-4">
                                <!-- Shipping Address -->
                                <div class="flex-1 min-w-[200px]">
                                    <h3 class="text-sm font-medium text-gray-700 mb-1">Shipping Address</h3>
                                    <p class="text-sm text-gray-500">
                                        {{ order.user_address?.address1 }}, {{ order.user_address?.city }}, 
                                        {{ order.user_address?.state }}, {{ order.user_address?.zipcode }}
                                    </p>
                                </div>
                                
                                <!-- Phone Number -->
                                <div v-if="order.user_address?.phone_number" class="flex items-center">
                                    <div class="flex-shrink-0 mr-2">
                                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">WhatsApp</p>
                                        <p class="text-sm font-medium">{{ order.user_address?.phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order Items -->
                        <div class="divide-y divide-gray-200">
                            <div v-for="item in order.order_items" :key="item.id" class="p-6 flex flex-col sm:flex-row">
                                <!-- Product Image -->
                                <div class="flex-shrink-0 w-full sm:w-32 md:h-32 h-[320px] mb-4 sm:mb-0">
                                    <img 
                                        v-if="item.product.product_images && item.product.product_images.length > 0" 
                                        :src="`/${item.product.product_images[0].image}`" 
                                        :alt="item.product.title"
                                        class="w-full md:h-full h-[320px] object-cover rounded-md"
                                    />
                                    <div v-else class="w-full h-full bg-gray-200 rounded-md flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Product Details -->
                                <div class="flex-1 sm:ml-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ item.product.title }}</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Brand</p>
                                            <p class="font-medium">{{ item.product.brand.name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Category</p>
                                            <p class="font-medium">{{ item.product.category.name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Price</p>
                                            <p class="font-medium">₦{{ item.product.price }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Quantity</p>
                                            <p class="font-medium">{{ item.quantity || 1 }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order Footer -->
                        <div class="bg-gray-50 px-6 py-4 flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <span>Order Date: {{ new Date(order.created_at).toLocaleDateString() }}</span>
                            </div>
                            <div class="text-lg font-bold text-gray-900">
                                Total: ₦{{ order.order_items.reduce((sum, item) => sum + (item.product.price * (item.quantity || 1)), 0) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="orders.length == 0" class="flex flex-col items-center justify-center py-16">
                    <div class="bg-white rounded-2xl shadow-lg border-t-4 border-red-500 p-8 max-w-md w-full text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-16 h-16 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-700 mb-2">
                            No Orders <span class="text-red-500">Yet</span>
                        </h4>
                        <p class="text-gray-500 mb-6">We have <span class="text-red-500 font-semibold">no orders</span> for you. Please order a product to see it here!</p>
                        <a href="/products" class="inline-block px-6 py-3 bg-red-500 text-white rounded-lg font-semibold hover:bg-red-600 transition shadow-md">
                            Shop Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </UserLayouts>
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