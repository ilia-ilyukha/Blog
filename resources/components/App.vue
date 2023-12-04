
<script setup>

// import Posts from '.Posts.vue';
// import Posts from './blog/Posts.vue';

import { createRouter, createWebHistory } from 'vue-router'
// import HomeView from '../views/HomeView.vue'
// import Test from '../views/Test.vue';
// import PostView from '../views/blog/PostView.vue';
// import Posts from "../components/blog/Posts.vue";

import Header from './sections/Header.vue';

</script>

<template>
    <Header />
    <div class="wrapper">
        <router-view></router-view>
    </div>
</template>

