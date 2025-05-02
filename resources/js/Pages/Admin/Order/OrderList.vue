<script setup>
defineProps({ orders: Array });
</script>

<template>
  <section class="p-6">
    <h2 class="text-2xl font-bold mb-6">All Orders</h2>
    <div v-for="order in orders" :key="order.id" class="mb-8 border-b pb-4">
      <div class="mb-2">
        <span class="font-semibold">User Email:</span>
        {{ order.user_address?.user?.email || 'N/A' }}
      </div>
      <div class="mb-2">
        <span class="font-semibold">Address:</span>
        {{ order.user_address?.address1 }}, {{ order.user_address?.city }}, {{ order.user_address?.state }}, {{ order.user_address?.zipcode }}
      </div>
      <table class="w-full text-sm text-left text-gray-700">
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in order.order_items" :key="item.id">
            <td>
              <img
                v-if="item.product.product_images.length"
                :src="`/${item.product.product_images[0].image}`"
                alt="Product Image"
                class="w-16 h-16 object-cover rounded"
              />
              <span v-else>No Image</span>
            </td>
            <td>{{ item.product.title }}</td>
            <td>{{ item.quantity }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>
