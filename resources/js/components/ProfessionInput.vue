<template>
    <div class="col-12 my-3">
      <div class="form-floating">
        <input
          type="text"
          class="form-control"
          placeholder="Enter Your Profession"
          v-model="profession"
          @input="updateProfession"
        />
        <label>Enter Your Profession</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        profession: '',
      };
    },
    methods: {
      updateProfession() {
        this.$emit('update:profession', this.profession);
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
      <profession-input v-model:profession="formData.profession"></profession-input>
    </div>
  </template>
  
  <script>
  import ProfessionInput from './ProfessionInput.vue';
  
  export default {
    components: {
      ProfessionInput,
    },
    data() {
      return {
        formData: {
          profession: '',
        },
      };
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  
  