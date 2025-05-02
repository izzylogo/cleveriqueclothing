<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue';
import Footer from './Footer.vue';
import Hero from './Hero.vue';
import Preloader from './Preloader.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

const handlePreloaderComplete = () => {
    // Dispatch a custom event that all sections can listen to
    window.dispatchEvent(new CustomEvent('preloader-complete'))
}
</script>
<template>
    <!-- Preloader -->
    <Preloader @loading-complete="handlePreloaderComplete" />
    <!-- header -->
    <Header></Header>
    <!-- end -->
    <!-- main content -->
    
    <slot />
    
</template>
