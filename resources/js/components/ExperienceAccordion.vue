<template>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button
          class="accordion-button"
          type="button"
          :class="{ 'collapsed': !isOpen }"
          @click="toggleAccordion"
        >
          Experience
        </button>
      </h2>
      <div :id="collapseId" class="accordion-collapse collapse" :class="{ 'show': isOpen }">
        <div class="accordion-body">
          <!-- Your experience form content here -->
          <!-- You can also use child components for different sections of the form -->
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isOpen: true,
      };
    },
    computed: {
      collapseId() {
        return `panelsStayOpen-Experience-${this._uid}`;
      },
    },
    methods: {
      toggleAccordion() {
        this.isOpen = !this.isOpen;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  
  <template>
    <div>
      <!-- Other content -->
      <experience-accordion></experience-accordion>
    </div>
  </template>
  
  <script>
  import ExperienceAccordion from './ExperienceAccordion.vue';
  
  export default {
    components: {
      ExperienceAccordion,
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  