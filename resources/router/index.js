import { createRouter, createWebHistory } from 'vue-router'

import Posts from '../components/blog/Posts';
import Post from '../components/blog/Post';

// import Posts from './blog/Posts.vue';
// import Posts from "../components/blog/Posts.vue";
import QuestionsPage from '../components/pages/QuestionsPage';
import HomePage from '../components/pages/HomePage';
import CategoriesPage from '../components/Pages/CategoriesPage';
import Category from '../components/categories/Category';

const routes = [
    {
      path: '/',
      name: 'home',
      component: HomePage
    },
    // {
    //   path: '/',
    //   name: 'home',
    //   component: Posts
    // },
    { 
      path: '/post/:id',
      name: 'post', 
      component: Post
    },
    { 
      path: '/questions',
      name: 'questions', 
      component: QuestionsPage 
    },
    { 
      path: '/categories',
      name: 'categories', 
      component: CategoriesPage 
    },
    { 
      path: '/categories/:id',
      name: 'category', 
      component: Category
    },
    // {
    //   path: '/test',
    //   name: 'test',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => Test
    // },
    // {
    //   path: '/contact',
    //   name: 'contact',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: ContactView
    // }
  ];

export default createRouter({
  history: createWebHistory(),
  routes
});

