<script setup>
import { ref, reactive, computed } from 'vue';
import { useRoute } from 'vue-router'
import GoBack from '../elements/GoBack.vue';
const route = useRoute();

const post = ref(null);

const baseUrl = "http://127.0.0.1:8000/";

fetch("http://127.0.0.1:8000/api/v1/posts/" + route.params.id)
    // .then(responce => console.log(responce))
    .then(responce => responce.json())
    .then(data => {
        post.value = data.data;
        console.log(post);
    });

</script>

<template>
    <div class="container" v-if="post !== null">
        <GoBack />
        <header>
            <div class="title">
                <h1>
                    {{ post.title }}
                </h1>
            </div>
        </header>
        <div>
            <img class="" :src="post.image" alt="image">
            
            <div v-html="post.body"></div>
        </div>
        <!-- {{ post.body }} -->
        <footer>

        </footer>
    </div>
</template>