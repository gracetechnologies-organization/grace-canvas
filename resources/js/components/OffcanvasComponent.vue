<template>
    <div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" @click="closeOffcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <div>
            Only For Pro Users...!
          </div>
          <div class="dropdown mt-3">
            <button class="btn btn-secondary standard-bg-color standard-border-color dropdown-toggle" type="button"
              id="dropdownMenuButton" data-bs-toggle="dropdown">
              Download Now
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="#">PDF</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      closeOffcanvas() {
        // Close the offcanvas when the Close button is clicked
        $('#offcanvas').offcanvas('hide');
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  