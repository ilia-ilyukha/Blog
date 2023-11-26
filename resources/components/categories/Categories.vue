<!-- http://127.0.0.1:8000/api/v1/questions -->
<script setup>

import { ref, reactive, computed } from 'vue';
import CategoryCard from './CategoryCard.vue'; 

const data = ref(null)
const categories = ref(null);

const URL = "http://127.0.0.1:8000/api/v1";

fetch(URL + "/category")
    // .then(responce => console.log(responce))
    .then(responce => responce.json())
    .then(data => {
        categories.value = data.data;
        console.log(categories);
    });

</script>

<template>
    <div class="container">
        <CategoryCard v-for="category in categories" :key="categories.id" :category="category">
        </CategoryCard>


        <nav class="blog-nav nav nav-justified my-5">
            <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i
                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
            <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i
                    class="arrow-next fas fa-long-arrow-alt-right"></i></a>
        </nav>
    </div>
</template>