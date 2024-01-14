<script setup>
import { Accordion, AccordionPanel, AccordionHeader, AccordionContent } from 'flowbite-vue'

import { ref, reactive, computed, onMounted  } from 'vue';
const props = defineProps({
  question: Object,
  current: Number,
  idx: Number
});

onMounted(() => {
  // console.log(props.question);
})

</script>


<template>
  <!-- <Accordion :open-first-item="false">
    <accordion-panel id="question_accordion">
      <accordion-header>   {{ question.question }}</accordion-header>
      <accordion-content>
        <div>
          {{ question.answer }}
        </div>
      </accordion-content>
    </accordion-panel>
  </Accordion> -->
  <div class="question">
    {{ idx }}
    {{ question.question }}


  </div>
</template>


<style>
.question {
    /* background-color: red; */
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #e9ecef;
    border-radius: 0.3rem;
}
</style>