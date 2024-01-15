<template>
    <div>
         <Question v-if="currentStep" :is="currentStep" :data=questions.value[currentQuestionIndex]></Question>
        <!--<BProgress striped animated variant="info" :max="steps.length + 1" :value="currentStepIndex + 1"></BProgress>
        <div class="text-center">
            <BButton 
                class="m-1" 
                :disabled="!prevStep"
                @click="$emit('update:currentStepIndex', props.currentStepIndex - 1)" 
            >
                Previous
            </BButton>
            <BButton 
                class="m-1" 
                :disabled="!nextStep"
                @click="$emit('update:currentStepIndex', props.currentStepIndex + 1)" 
            >
                Next
            </BButton>
        </div> -->
    </div>
</template>

<script setup>
import { defineComponent, ref, onMounted } from "vue";
import Question from "./Question.vue";

const props = defineProps(['questions', 'currentQuestionIndex']);
const URL = "http://127.0.0.1:8000/api/v1";

const questions = ref(null);
onMounted(() => {
    // current = 0;
    fetch(URL + "/questions")
        // .then(responce => console.log(responce))
        .then(responce => responce.json())
        .then(data => {
            questions.value = data.data;
            console.log(questions.value);
            console.log(questions.value[1]);
        });
})

console.log(props.currentQuestionIndex);
</script> 