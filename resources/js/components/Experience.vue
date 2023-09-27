<!--

<template>
    <div>
      <button
        type="button"
        class="btn btn-secondary standard-bg-color standard-border-color col-6"
        title="Add experience"
        @click="addNewExperience"
      >
        <i class='bx bxs-plus-circle icons-size'></i>
      </button>
  
       Display existing experience forms 
      <div v-for="(experience, index) in experiences" :key="index">
        <div class="accordion-body" :id="'ExperienceForm' + index">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  :placeholder="'Enter your organization ' + (index + 1)"
                  v-model="experience.organization"
                >
                <label>Organization</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  :placeholder="'Enter last designation ' + (index + 1)"
                  v-model="experience.designation"
                >
                <label>Designation</label>
              </div>
            </div>
          </div>
          <div class="col-12 my-3">
            <div class="form-floating">
              <textarea
                class="form-control"
                :placeholder="'Your Job Description ' + (index + 1)"
                style="height: 120px"
                v-model="experience.jobDescription"
              ></textarea>
              <label for="floatingTextarea2">Your Job Description</label>
            </div>
          </div>
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  :placeholder="'Joining Date ' + (index + 1)"
                  v-model="experience.joiningDate"
                >
                <label>Joining Date</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  :placeholder="'Ending Date ' + (index + 1)"
                  v-model="experience.endDate"
                >
                <label>Ending Date</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        experiences: [], // Store experience data in an array
      };
    },
    methods: {
      addNewExperience() {
        // Add a new empty experience object to the array
        this.experiences.push({
          organization: "",
          designation: "",
          jobDescription: "",
          joiningDate: "",
          endDate: "",
        });
      },
    },
  };
  </script>
-->

<template>
 <div class="accordion-item">
  <div>
    <h2 class="accordion-header-experience">
      <button 
      class="accordion-button" 
      type="button" 
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Experience" 
      aria-expanded="false" 
      aria-controls="panelsOpen-Experience"
      >Experience</button>
    </h2>
  </div>

 </div>
    <div id="panelsOpen-Experience" class="accordion-collapse collapse show" aria-labelledby="accordionHeaderExperience">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewExperience"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteExperience(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(experience, index) in experiences" :key="index">
        
        <div class="accordion-body" :id="'ExperienceForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter your organization"
                  v-model="experience.organization"
                />
                <label>Organization</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter last designation"
                  v-model="experience.designation"
                />
                <label>Designation</label>
              </div>
            </div>
          </div>
          <div class="col-12 mt-3 mb-2">
            <div class="form-floating">
              <textarea
                class="form-control"
                id="floatingTextarea2"
                placeholder="Your Job Description"
                style="height: 120px"
                v-model="experience.jobDescription"
              ></textarea>
              <label for="floatingTextarea2">Your Job Description</label>
            </div>
          </div>
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="date"
                  class="form-control"
                  placeholder="Joining Date"
                  v-model="experience.joiningDate"
                />
                <label>Joining Date</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  placeholder="Ending Date"
                  v-model="experience.endDate"
                />
                <label>Ending Date</label>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      <div v-for="(experience, index) in experiences" :key="index">
        <div v-if="!hideInputFields">
          Organization: {{ experience.organization }}<br />
          Designation: {{ experience.designation }}<br />
          Job Description: {{ experience.jobDescription }}<br />
          Joining Date: {{ experience.joiningDate }}<br />
          Ending Date: {{ experience.endDate }}
        </div>
      </div>
    </div>
  </template>
  
  <script>

import 'boxicons/css/boxicons.min.css';
  export default {
    data() {
      return {
        experiences: [], // Array to store experience data
        hideInputFields: false, // Checkbox to hide input fields
      };
    },
    methods: {
      addNewExperience() {
        // Add a new experience object to the array with empty values
        this.experiences.push({
          organization: "",
          designation: "",
          jobDescription: "",
          joiningDate: "",
          endDate: "",
        });
      },
      deleteExperience(index) {
        // Delete the experience object at the specified index
        this.experiences.splice(index, 1);
      },
    },
  };
  </script>
  