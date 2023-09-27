<template>
    <div>
      <div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-label">Crop Your Image</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeModal"></button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                <img src="" id="image" width="500px">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="closeModal">Cancel</button>
              <button type="button" class="btn btn-primary standard-bg-color standard-border-color" @click="cropImg">Crop</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      closeModal() {
        // Close the modal when Cancel is clicked
        $('#crop-image-modal').modal('hide');
      },
      cropImg() {
        // Add your crop image logic here
        // After cropping, close the modal
        this.closeModal();
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  