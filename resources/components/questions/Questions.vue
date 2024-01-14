<!-- http://127.0.0.1:8000/api/v1/questions -->
<script setup>

import { ref, reactive, computed, onMounted  } from 'vue';
import Question from './Question.vue';
import Multistep from './Multistep.vue';

const questions = ref(null);

const current = ref(0);
const obj = reactive({ current })
const currentQuestionIndex = ref(1);

const URL = "http://127.0.0.1:8000/api/v1";


onMounted(() => {
    // current = 0;
    fetch(URL + "/questions")
        // .then(responce => console.log(responce))
        .then(responce => responce.json())
        .then(data => {
            questions.value = data.data;
            // console.log(questions.value);
        });
})

function nextQuestion() { current.value++; }
function previousQuestion() { current.value--; }
let currentQuestion = computed(() => { 
    return questions[current.value]; 
});

</script>

<template>
    <div class="container">
        <!-- <Question v-for="(question, index) in questions" 
            :key="index" 
            :question="question"
            :idx="index"
            >
        </Question> -->

        <Question v-if="questions" :question="questions[current]" ></Question>
       
        <!-- <div v-for="question in questions" :key="questions.id">
           
        </div> -->
        
    <span>
      Current question is: {{ obj.current }}
    </span>
        
        
        <button 
            class="border rounded px-1 py-px text-xs"
            @click="previousQuestion"
            :class="{
                'border-blue-500 text-blue-500': true
            }"
        > Previous </button>
        <button 
            class="border rounded px-1 py-px text-xs"
            @click="nextQuestion"
            :class="{
                'border-blue-500 text-blue-500': true
            }"
        > Next </button>
        <!-- <nav class="blog-nav nav nav-justified my-5">
            <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i
                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
            <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i
                    class="arrow-next fas fa-long-arrow-alt-right"></i></a>
        </nav> -->

        
        <!-- <Multistep :questions="questions" v-model:currentQuestionIndex="currentQuestionIndex" /> -->
    </div>
</template>

<style>
.current {
    background-color: red;
}
</style>