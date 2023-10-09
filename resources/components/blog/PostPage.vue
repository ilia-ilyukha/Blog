<script setup>
import { ref, reactive, computed } from 'vue';
import { useRoute } from 'vue-router'
const route = useRoute();

const post = ref(null);

fetch("http://127.0.0.1:8000/api/v1/posts/" + route.params.id)
    // .then(responce => console.log(responce))
    .then(responce => responce.json())
    .then(data => {
        post.value = data.data;
        console.log(post);
    });

</script>

<template>
    <div>
        <header>
            <div class="title">
                <h2>
                    {{ post.title }}
                </h2>
            </div>
        </header>
        {{ post.body }}
        <footer>

        </footer>
    </div>
</template>