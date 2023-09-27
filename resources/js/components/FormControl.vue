<template>
    <div class="row g-2 my-3">
      <div class="col-12 col-md-12 col-lg-6">
        <div class="form-floating">
          <input type="text" class="form-control" placeholder="Enter first name" v-model="firstName">
          <label>First Name</label>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
        <div class="form-floating">
          <input type="text" class="form-control" placeholder="Enter last name" v-model="lastName">
          <label>Last Name</label>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        firstName: "", // Initialize data properties for first name
        lastName: "",  // Initialize data properties for last name
      };
    },
  };
  </script>
  