<template>
    <div class="col-12 col-md-12 col-lg-3">
      <div class="form-floating">
        <select class="form-select" id="maritalStatusSelect" aria-label="Marital Status" v-model="maritalStatus" @change="updateMaritalStatus">
          <option value="Single">Single</option>
          <option value="Married">Married</option>
        </select>
        <label for="maritalStatusSelect">Marital Status</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        maritalStatus: 'Single', // Default value
      };
    },
    methods: {
      updateMaritalStatus() {
        this.$emit('update:maritalStatus', this.maritalStatus);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  