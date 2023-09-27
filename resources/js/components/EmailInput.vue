<template>
    <div class="col-12 col-md-12 col-lg-9">
      <div class="form-floating">
        <input
          type="email"
          class="form-control"
          placeholder="Enter Your Email"
          v-model="email"
          @input="updateEmail"
        />
        <label>Enter Your Email</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
      };
    },
    methods: {
      updateEmail() {
        this.$emit('update:email', this.email);
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
      <marital-status-select v-model:maritalStatus="formData.maritalStatus"></marital-status-select>
      <email-input v-model:email="formData.email"></email-input>
    </div>
  </template>
  
  <script>
  import MaritalStatusSelect from './MaritalStatusSelect.vue';
  import EmailInput from './EmailInput.vue';
  
  export default {
    components: {
      MaritalStatusSelect,
      EmailInput,
    },
    data() {
      return {
        formData: {
          maritalStatus: 'Single',
          email: '',
        },
      };
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  