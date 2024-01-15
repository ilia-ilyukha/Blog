<script setup>

import { ref, reactive, computed } from 'vue';
import { useRoute } from 'vue-router'
import PostCard from './PostCard.vue'

// import usePosts '../../composables/post.js';

const data = ref(null)
const posts = ref(null);
const pagination_links = ref(null);
const props = defineProps(['category_id']);
let params = '';
let url_link = '';

if(props.category_id){
    params = '?category_id[eq]=' + props.category_id;
    console.log(props.category_id);
}
const URL = "http://127.0.0.1:8000";
url_link = URL + "/api/v1/posts/" + params;
// const URL = "http://127.0.0.1:8000/api/v1/posts";


fetch(url_link)
    .then(responce => responce.json())
    .then(data => {
        posts.value = data.data;
        pagination_links.value = data.links;
        // console.log(pagination_links);
    });
 
</script>

<template>
    <div class="">
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