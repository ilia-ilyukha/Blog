<script setup>
import { Accordion, AccordionPanel, AccordionHeader, AccordionContent } from 'flowbite-vue'

const props = defineProps({
    question: Object
});

</script>


<template>
  <Accordion :open-first-item="false">
    <accordion-panel id="question_accordion">
      <accordion-header>   {{ question.question }}</accordion-header>
      <accordion-content>
        <div>
          {{ question.answer }}
        </div>
      </accordion-content>
    </accordion-panel>
  </Accordion>
</template>