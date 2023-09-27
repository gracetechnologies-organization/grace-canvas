<template>

<div class="accordion-item-skill">

<h2 class="accordion-header-skill" id="accordionHeaderSkill">
  <button
  class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Skill"
      aria-expanded="false"
      aria-controls="panelsOpen-Skill"
  >Skills</button>
</h2>


    <div id="panelsOpen-Skill" class="accordion-collapse collapse" aria-labelledby="accordionHeaderSkill">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewSkill"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteSkill(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(skill, index) in skills" :key="index">
            
            <div class="accordion-body" :id="'SkillForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="skill.name"
                    />
                    <label>Skill Name</label>
                  </div>
                </div>
          </div>
        </div>
        </div>
</div>
  <div v-for="(skill, index) in skills" :key="index">
    <div v-if="!hideInputFields">
      Name: {{ skill.name }}<br />
    </div>
  </div>
    </template>
    
    <script>
    
    import 'boxicons/css/boxicons.min.css';
      export default {
        data() {
          return {
            skills: [{name:"PHOTOSHOP"}], // Array to store skill data
            hideInputFields: false, // Checkbox to hide input fields
          };
        },
        methods: {
          addNewSkill() {
            // Add a new skill object to the array with empty values
            this.skills.push({
              name: "",
      
            });
          },
          deleteSkill(index) {
            // Delete the skill object at the specified index
            this.skills.splice(index, 1);
          },
        },
      };
    
    
    </script>