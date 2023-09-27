<template>

<div class="accordion-item-project">

<h2 class="accordion-header-project" id="accordionHeaderProject">
  <button
  class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Project"
      aria-expanded="false"
      aria-controls="panelsOpen-Project"
  >Project</button>
</h2>


    <div id="panelsOpen-Project" class="accordion-collapse collapse" aria-labelledby="accordionHeaderProject">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewProject"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteProject(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(project, index) in projects" :key="index">
            
            <div class="accordion-body" :id="'ProjectForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="project.name"
                    />
                    <label>Project Name</label>
                  </div>
                </div>
          </div>
        </div>
        </div>
</div>
  <div v-for="(project, index) in projects" :key="index">
    <div v-if="!hideInputFields">
       {{ project.name }}<br />
    </div>
  </div>
    </template>
    
    <script>
    
    import 'boxicons/css/boxicons.min.css';
      export default {
        data() {
          return {
            projects: [{name:"PHOTOSHOP"}], // Array to store data
            hideInputFields: false, // Checkbox to hide input fields
          };
        },
        methods: {
          addNewProject() {
            // Add a new object to the array with empty values
            this.projects.push({
              name: "",
      
            });
          },
          deleteSkill(index) {
            // Delete the object at the specified index
            this.projects.splice(index, 1);
          },
        },
      };
    
    
    </script>