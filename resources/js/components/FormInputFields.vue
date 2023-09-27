<template>
    <div class="row g-2 my-3">
      <div class="col-12 col-md-12 col-lg-6">
        <div class="form-floating">
          <input
            type="text"
            class="form-control"
            placeholder="Enter first name"
            v-model="firstName"
            @input="updateFirstName"
          />
          <label>First Name</label>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
        <div class="form-floating">
          <input
            type="text"
            class="form-control"
            placeholder="Enter last name"
            v-model="lastName"
            @input="updateLastName"
          />
          <label>Last Name</label>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        firstName: '',
        lastName: '',
      };
    },
    methods: {
      updateFirstName() {
        this.$emit('update:firstName', this.firstName);
      },
      updateLastName() {
        this.$emit('update:lastName', this.lastName);
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
      <form-input-fields
        v-model:firstName="formData.firstName"
        v-model:lastName="formData.lastName"
      ></form-input-fields>
    </div>
  </template>
  
  <script>
  import FormInputFields from './FormInputFields.vue';
  
  export default {
    components: {
      FormInputFields,
    },
    data() {
      return {
        formData: {
          firstName: '',
          lastName: '',
        },
      };
    },
    // Other component logic
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  
  