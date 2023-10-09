require('./bootstrap');

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from '../components/App.vue';
import router from '../router/index';

createApp({
    components: {
        App,
    }
})
.use(router)
.mount('#app');