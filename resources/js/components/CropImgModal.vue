

    <!-- Crop Image Modal 
<div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">Crop Your Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img src="" id="image" width="500px">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary standard-bg-color standard-border-color" onclick="cropImg()">Crop</button>
            </div>
        </div>
    </div>
</div>
</template>
 -->
 <template>
    <div>
      <!-- Image Upload -->
      <vue2-dropzone id="image-upload" ref="myDropzone" :options="dropzoneOptions"></vue2-dropzone>
  
      <!-- Cropper -->
      <cropper :src="croppedImage" :options="cropperOptions" @crop="onCrop"></cropper>
  
      <!-- Display Cropped Image -->
      <div v-if="croppedImage">
        <img :src="croppedImage" alt="Cropped Image">
      </div>
    </div>
  </template>
  
  <script>
  import 'cropperjs/dist/cropper.css';
  import VueCropper from 'vue-cropperjs';
  import 'vue2-dropzone/dist/vue2Dropzone.min.css';
  import Vue2Dropzone from 'vue2-dropzone';
  
  export default {
    components: {
      VueCropper,
      Vue2Dropzone,
    },
    data() {
      return {
        dropzoneOptions: {
          url: '/upload', // Your upload URL
          thumbnailWidth: 150,
          thumbnailHeight: 150,
          maxFilesize: 1, // Maximum file size in MB
          acceptedFiles: 'image/*',
          addRemoveLinks: true,
        },
        cropperOptions: {
          aspectRatio: 1, // You can set the aspect ratio you want
        },
        croppedImage: null,
      };
    },
    methods: {
      onCrop(eventData) {
        // The cropped image data is available in eventData.detail.
        this.croppedImage = eventData.detail;
      },
    },
  };
  </script>
  