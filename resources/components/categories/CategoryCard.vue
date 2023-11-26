<script setup>
import { Accordion, AccordionPanel, AccordionHeader, AccordionContent } from 'flowbite-vue'

const props = defineProps({
  category: Object
});

</script>


<template>
  <h2 class="p-2 border-gray-200">
    <router-link :to="{ path: `/categories/${category.id}` }">
      <!-- <a href="#">{{ post.title }}</a> -->
      {{ category.title }}
    </router-link>
    
  </h2>
</template>