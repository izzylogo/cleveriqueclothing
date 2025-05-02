<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue'
import HeroSection from './Layouts/HeroSection.vue';
import Footer from './Layouts/Footer.vue';
import Features from './Layouts/Features.vue';
import AboutSection from './Layouts/AboutSection.vue';
import DealOfTheDay from './Layouts/DealOfTheDay.vue';
import TrendingProducts from './Layouts/TrendingProducts.vue';
import BlogSection from './Layouts/BlogSection.vue';
import Newsletter from './Layouts/Newsletter.vue';
import ProductListing from './Layouts/ProductListing.vue';
import ContactForm from './Layouts/ContactForm.vue';
//products list 
defineProps({
    products: Array
})


</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <!-- <Hero></Hero> -->
        <HeroSection></HeroSection>
        <!-- <FeaturedGrid></FeaturedGrid> -->
        <ProductListing :products="products"></ProductListing>
        <!-- <TrendingProducts></TrendingProducts> -->
        <Features></Features>
        <AboutSection></AboutSection>
        <DealOfTheDay></DealOfTheDay>
        <BlogSection></BlogSection>
        <!-- <Newsletter></Newsletter> -->
        <ContactForm></ContactForm>
        <!-- end -->
        <Footer></Footer>
    </UserLayouts>
</template>


