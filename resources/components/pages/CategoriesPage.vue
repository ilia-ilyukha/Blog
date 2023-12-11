<template>
  <section class="cta-section theme-bg-light py-5">
    <HomePageSection />
  </section>
  <section class="blog-list px-3 py-5 p-md-5">
    <div class="container">
      <Categories />
    </div>
  </section>
</template>
<script setup>
import Categories from '../categories/Categories.vue';
import HomePageSection from '../elements/HomePageSection.vue';
//   import { Dropdown, ListGroup, ListGroupItem } from 'flowbite-vue'
</script>