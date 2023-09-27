<template>

<div class="accordion-item">
    <h2 class="accordion-header-language" id="accordionHeaderLanguage">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Language"
      aria-expanded="false"
      aria-controls="panelsOpen-Language"
      >  
      Languages
      </button>
    </h2>

  <div id="panelsOpen-Language" class="accordion-collapse collapse" aria-labelledby="accordionHeaderRef">
        <!-- Checkbox to toggle visibility of input fields -->
        <input type="checkbox" v-model="hideInputFields" />
        <label>Hide</label>
    <div class="row g-0 my-3 input-group">
        <!-- Button to add a new input field -->
        <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewLanguage"> <i class='bx bxs-plus-circle icons-size'></i></button>
        <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteLanguage(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
      </div>
        <!-- Display existing input fields and render data live -->
        <div v-for="(language, index) in languages" :key="index">
          
          <div class="accordion-body" :id="'LanguageForm' + index" v-show="!hideInputFields">
            
              <div class="col-12 col-md-12 col-lg-6">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter name"
                    v-model="language.name"
                  />
                  <label>Language Name</label>
                </div>
              </div>          
          </div>
        </div>
      </div>  
</div>

  <div v-for="(language, index) in languages" :key="index">
    <div v-if="!hideInputFields">
    {{ language.name }}<br />
    </div>
  </div>
  </template>
  
  <script>
  
  import 'boxicons/css/boxicons.min.css';
    export default {
      data() {
        return {
          languages: [{name:"English"}], // Array to store experience data
          hideInputFields: false, // Checkbox to hide input fields
        };
      },
      methods: {
        addNewLanguage() {
          // Add a new reference object to the array with empty values
          this.languages.push({
            name: "",
      
          });
        },
        deleteLanguage(index) {
          // Delete the reference object at the specified index
          this.languages.splice(index, 1);
        },
      },
    };
  
  
  </script>