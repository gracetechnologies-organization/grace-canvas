<template>
    <div class="col-12 col-md-12 col-lg-4">
      <div class="form-floating">
        <select class="form-select" id="nationalitySelect" aria-label="Nationality" v-model="nationality">
          <option value="Country1">Country1</option>
          <option value="Country2">Country2</option>
          <!-- Add more options as needed -->
        </select>
        <label for="nationalitySelect">Nationality</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        nationality: '', // Default value
      };
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  

  <template>
    <div>
      <!-- Other content -->
      <nationality-select v-model:nationality="formData.nationality"></nationality-select>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="form-floating">
          <input
            type="text"
            class="form-control"
            placeholder="Enter Your Address"
            v-model="address"
            @input="updateAddress"
          />
          <label>Enter Your Address</label>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import NationalitySelect from './NationalitySelect.vue';
  
  export default {
    components: {
      NationalitySelect,
    },
    data() {
      return {
        formData: {
          nationality: '', // Default nationality value
          address: '',
        },
      };
    },
    methods: {
      updateAddress() {
        // Handle address updates here
      },
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  