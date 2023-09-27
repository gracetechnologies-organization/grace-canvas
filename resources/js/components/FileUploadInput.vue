<template>
    <div class="row">
      <div class="col-10 py-1 mt-1">
        <div class="input-group mt-0">
          <input
            type="file"
            accept="image/jpeg,image/png,image/webp"
            class="form-control image"
            :id="inputId"
            @change="handleFileUpload"
          />
          <label class="input-group-text" :for="inputId">Upload Pic</label>
        </div>
      </div>
      <div class="col-2 py-1 text-end">
        <!-- You can add any additional content for the right column here -->
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      inputId: {
        type: String,
        required: true,
      },
    },
    methods: {
      handleFileUpload(event) {
        // Handle the file upload here
        const selectedFile = event.target.files[0];
        if (selectedFile) {
          // You can perform actions with the selected file, such as displaying it, uploading it, etc.
          console.log('Selected file:', selectedFile);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  