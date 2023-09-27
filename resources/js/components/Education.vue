<template>
 
<div class="accordion-item-education">
    <h2 class="accordion-header-education" id="accordionHeaderEducation">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Education"
      aria-expanded="false"
      aria-controls="panelsOpen-Education"
      >  
      Education
      </button>
    </h2>
    <div id="panelsOpen-Education" class="accordion-collapse collapse show" aria-labelledby="accordionHeaderEducation">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewEducation"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteEducation(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(education, index) in educations" :key="index">
        
        <div class="accordion-body" :id="'EducationForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter your University Name"
                  v-model="education.university"
                />
                <label>Education Institute</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Degree"
                  v-model="education.degree"
                />
                <label>Degree</label>
              </div>
            </div>
          </div>
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="text"
                  class="form-control"
                  placeholder="Score"
                  v-model="education.score"
                />
                <label>Score</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  placeholder="Ending Date"
                  v-model="education.completeDate"
                />
                <label>Ending Date</label>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

        <div v-for="(education, index) in educations" :key="index">
        <div v-if="!hideInputFields">
          University: {{ education.university }}<br />
          Degree: {{ education.degree }}<br />
          Score: {{ education.score }}<br />
          Complete Date: {{ education.completeDate }}
        </div>
      </div>
  </template>
  
  <script>

import 'boxicons/css/boxicons.min.css';
  export default {
    data() {
      return {
        educations: [{University:"Name",degree:"Degree",score:"3.2 CGPA", completeDate:"1990-07-01"}], // Array to store education data
        hideInputFields: false, // Checkbox to hide input fields
      };
    },
    methods: {
      addNewEducation() {
        // Add a new education object to the array with empty values
        this.educations.push({
          university: "",
          degree: "",
          score: "",
          completeDate: "",
        //   endDate: "",
        });
      },
      deleteEducation(index) {
        // Delete the education object at the specified index
        this.educations.splice(index, 1);
      },
    },
  };
  </script>
  