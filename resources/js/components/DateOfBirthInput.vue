<template>
    <div class="col-12 col-md-12 col-lg-3">
      <div class="form-floating">
        <input
          type="date"
          class="form-control"
          placeholder="Date Of Birth"
          v-model="dob"
          @change="updateDOB"
        />
        <label>Date Of Birth</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        dob: '',
      };
    },
    methods: {
      updateDOB() {
        this.$emit('update:dob', this.dob);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */

  .form-model{
    margin-top: 20px;
    margin-left: 10px;
    font-weight: 600;
    font-family: Montserrat;
    z-index: 1;
    color: #000;
    background-color: grey;
    image-orientation: flip;
    border-radius: 50px;

 }

  </style>
  