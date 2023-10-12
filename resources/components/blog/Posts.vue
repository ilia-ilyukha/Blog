<script setup>

import { ref, reactive, computed } from 'vue';
import PostCard from './PostCard.vue'

const data = ref(null)
const posts = ref(null);

const URL = "http://127.0.0.1:8000";
// const URL = "http://127.0.0.1:8000/api/v1/posts";

fetch(URL + "/api/v1/posts")
    // .then(responce => console.log(responce))
    .then(responce => responce.json())
    .then(data => {
        posts.value = data.data;
        console.log(posts);
    });

</script>

<template>
    <div class="container">
        <post-card v-for="post in posts" :key="post.id" :post="post">
        </post-card>


        <nav class="blog-nav nav nav-justified my-5">
            <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i
                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
            <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i
                    class="arrow-next fas fa-long-arrow-alt-right"></i></a>
        </nav>
    </div>
</template>