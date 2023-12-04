<script setup>
import { ref, reactive, computed } from 'vue';
import { useRoute } from 'vue-router'

</script>

<template>
    <header>
        <router-link to="/">Go to Home</router-link>
        <router-link to="/categories">Categories</router-link>
        <router-link to="/questions">Questions</router-link>
    </header>
</template>