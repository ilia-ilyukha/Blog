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
    </div>
</template>