<script setup>
import { Accordion, AccordionPanel, AccordionHeader, AccordionContent } from 'flowbite-vue'
</script>

<template>
  <Accordion :open-first-item="false">
    <accordion-panel id="question_accordion">
      <accordion-header>header</accordion-header>
      <accordion-content>
        <div>
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
          <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
        </div>
      </accordion-content>
    </accordion-panel>
  </Accordion>
</template>