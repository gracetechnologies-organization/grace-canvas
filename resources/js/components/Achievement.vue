<template>
<div class="accordion-item-achievement">
    <h2 class="accordion-header-achievement" id="accordionHeaderAchievement">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Achievement"
      aria-expanded="false"
      aria-controls="panelsOpen-Achievement"
      >  
      Achievement
      </button>
    </h2>

    <div id="panelsOpen-Achievement" class="accordion-collapse collapse" aria-labelledby="accordionHeaderEducation">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewAchievement"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteAchievement(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(achievement, index) in achievements" :key="index">
            
            <div class="accordion-body" :id="'AchievementForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="Achievement.name"
                    />
                    <label>Achievement Name</label>
                  </div>
                </div>     
          </div>
      </div>
    </div>
</div>
<div v-for="(achievement, index) in achievements" :key="index">
  <div v-if="!hideInputFields">
     Name: {{ achievement.name }}<br />
  </div>
</div>
    </template>
    
    <script>
    
    import 'boxicons/css/boxicons.min.css';
      export default {
        data() {
          return {
            achievements: [{name:"achievement 1"}], // Array to store data
            hideInputFields: false, // Checkbox to hide input fields
          };
        },
        methods: {
          addNewAchievement() {
            // Add a new  object to the array with empty values
            this.achievements.push({
              name: "",

            });
          },
          deleteAchievement(index) {
            // Delete the object at the specified index
            this.achievements.splice(index, 1);
          },
        },
      };
    
    
    </script>