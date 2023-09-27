<template>
<div class="accordion-item-ref">
    <h2 class="accordion-header-ref" id="accordionHeaderRef">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Reference"
      aria-expanded="false"
      aria-controls="panelsOpen-Reference"
      >Reference
      </button>
    </h2>


<div id="panelsOpen-Reference" class="accordion-collapse collapse " aria-labelledby="accordionHeaderRef">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewReference"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteReference(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(reference, index) in references" :key="index">
        
        <div class="accordion-body" :id="'ReferenceForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter name"
                  v-model="reference.name"
                />
                <label>Reference Name</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter designation"
                  v-model="reference.designation"
                />
                <label>Enter Designation</label>
              </div>
            </div>
          </div>
        
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="text"
                  class="form-control"
                  placeholder="Joining Date"
                  v-model="reference.number"
                />
                <label>Enter Number</label>
              </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>

  <div v-for="(reference, index) in references" :key="index">
    <div v-if="!hideInputFields">
           {{ reference.name }}<br />
           {{ reference.designation }}<br />
           {{ reference.number }}<br />
    </div>
  </div>

</template>

<script>

import 'boxicons/css/boxicons.min.css';
  export default {
    data() {
      return {
        references: [{name:"Name",designation:"Designation",number:"051-9234561"}], // Array to store experience data
        hideInputFields: false, // Checkbox to hide input fields
      };
    },
    methods: {
      addNewReference() {
        // Add a new reference object to the array with empty values
        this.references.push({
          name: "",
          designation: "",
          number: "",
       
        });
      },
      deleteExperience(index) {
        // Delete the reference object at the specified index
        this.references.splice(index, 1);
      },
    },
  };


</script>