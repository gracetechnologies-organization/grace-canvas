<template>
    <div class="col-12 col-md-12 col-lg-4">
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Select Your Gender" v-model="gender">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <label for="floatingSelect">Select Your Gender</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        gender: 'Male', // Default value
      };
    },
    methods: {
      updateGender() {
        this.$emit('update:gender', this.gender);
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
      <phone-input v-model:phone="formData.phone"></phone-input>
      <gender-select v-model:gender="formData.gender"></gender-select>
    </div>
  </template>
  
  <script>
  import PhoneInput from './Image.vue';
  import GenderSelect from './GenderSelect.vue';
  
  export default {
    components: {
      PhoneInput,
      GenderSelect,
    },
    data() {
      return {
        formData: {
          phone: '',
          gender: 'Male', // Default gender value
        },
      };
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  