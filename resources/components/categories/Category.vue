<script setup>
import { ref, reactive, computed } from 'vue';
import { useRoute } from 'vue-router'
import Posts from "../blog/Posts.vue";
import HomePageSection from '../elements/HomePageSection.vue';

import GoBack from '../elements/GoBack.vue';

const route = useRoute();
console.log(route.params);
const category_id = route.params.id;
</script>

<template>
    <section class="cta-section theme-bg-light py-5">
        <HomePageSection />
    </section>
    <section class="blog-list px-3 py-5 p-md-5">
        
        <GoBack />
        <div class="">
            <Posts :category_id="category_id" />
        </div>
    </section>
</template>