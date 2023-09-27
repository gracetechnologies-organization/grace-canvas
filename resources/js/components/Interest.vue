<template>

<div class="accordion-item-interest">
    <h2 class="accordion-header-interest" id="accordionHeaderInterest">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Interest"
      aria-expanded="false"
      aria-controls="panelsOpen-Interest"
      >  
      Interest
      </button>
    </h2>


    <div id="panelsOpen-Interest" class="accordion-collapse collapse" aria-labelledby="accordionHeaderInterest">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide Input Fields</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addInterest"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteInterest(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(interest, index) in interests" :key="index">
            
            <div class="accordion-body" :id="'InterestForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="interest.name"
                    />
                    <label>Interest Name</label>
                  </div>
                </div>
  
            </div> 
            
        </div>
          
    </div>
    </div>

    <div v-for="(interest, index) in interests" :key="index">
      <div v-if="!hideInputFields">
        Name: {{ interest.name }}<br />
      
      </div>
    </div>
    </template>
    
    <script>
    
    import 'boxicons/css/boxicons.min.css';
      export default {
        data() {
          return {
            interests: [{name:"Interest 1"}], // Array to store interest data
            hideInputFields: false, // Checkbox to hide input fields
          };
        },
        methods: {
          addNewInterest() {
            // Add a new interest object to the array with empty values
            this.skills.push({
              name: "",
        
              
            });
          },
          deleteInterest(index) {
            // Delete the interest object at the specified index
            this.interests.splice(index, 1);
          },
        },
      };
    
    
    </script>