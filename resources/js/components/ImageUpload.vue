<!-- <template>
  <div>
    <input type="file" class="image" @change="handleImageChange" />
    <input type="file" ref="fileInput" @change="handleImageUpload" />
    <label class="input-group-text" for="upload-resume-photo">Upload Pic</label>
    <div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-label">Crop Your Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img  ref="image" :src="imageSrc" id="image" width="500px" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary standard-bg-color standard-border-color" @click="cropImg">Crop</button>
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
      imageSrc: '',
      cropper: null,
    };
  },
  methods: {
    handleImageChange(event) {
      const files = event.target.files;
      if (files && files.length > 0) {
        const file = files[0];
        this.imageSrc = URL.createObjectURL(file);
        $('#crop-image-modal').modal('show');
      }
    },
    cropImg() {
      if (this.cropper) {
        const canvas = this.cropper.getCroppedCanvas({
          width: 142,
          height: 142,
        });

        canvas.toBlob((blob) => {
          const url = URL.createObjectURL(blob);
          const reader = new FileReader();
          reader.readAsDataURL(blob);
          reader.onloadend = () => {
            const base64data = reader.result;
            document.getElementById('resume-photo').src = base64data;
            $('#crop-image-modal').modal('hide');
          };
        });
      }
    },


    mounted() {
    $('#crop-image-modal').on('shown.bs.modal', () => {
      this.cropper = new Cropper(this.$refs.image, {
        aspectRatio: 1,
        viewMode: 3,
      });
    }).on('hidden.bs.modal', () => {
      this.cropper.destroy();
      this.cropper = null;
    });
  },
  },
  
};
</script> -->



<template>

  <div>
      <!-- <input type="file" @change="handleImageUpload" /> -->
      <input type="file" @click="openModal" @change="handleImageUpload">
         <!-- <img :src="selectedImage" alt="Selected Image" />  -->
  </div>
  <div class="modal" v-if="showModal">
      <div class="modal-content">
          <span class="close-button" @click="closeModal">&times;</span>
    <div class="example">
      <cropper ref="cropper" class="example-cropper" :src="selectedImage" />
      <drop-zone
        v-model="image"
        :label="upload"
        :location="location"
        @uploaded="newImagesUploaded"
        class="pb-15"
      />
      <div class="button-wrapper">
        <span class="button" @click="cropImage">Crop image</span>
      </div>
    </div>
  </div>  
  </div>
<!--Connect Input field with modal -->
      <!-- <button @click="openModal">Open Modal</button>
      <div class="modal" v-if="showModal">
        <div class="modal-content">
          <span class="close-button" @click="closeModal">&times;</span>
          <h2>Modal Content</h2>
          <p>This is a simple modal.</p>
        </div>
      </div> -->

      <!-- <div>
  <button @click="openModal">Open Modal</button>
  <div v-if="showModal" @closeModal="closeModal" >
  </div>
</div> -->

    </template>
    
    <script>
    import { Cropper } from "vue-advanced-cropper";
      import "vue-advanced-cropper/dist/style.css";
    export default {

      name: "vueImageCropperExample",
    components: {
      Cropper
    },
    props: {},

      data() {
        return {
          showModal: false ,
          selectedImage: null, // Store the selected image data
        };
      },
      methods: {
        openModal() {
          this.showModal = true;
        },
        closeModal() {
          this.showModal = false;
        },
        cropImage() {
        const result = this.$refs.cropper.getResult();
        const newTab = window.open();
        // for testing open the result in a new tab
        newTab.document.body.innerHTML = `<img src="${result.canvas.toDataURL(
          "image/jpeg"
        )}"></img>`;
      },

      handleImageUpload(event) {
    const file = event.target.files[0]; // Get the selected file
    
    if (file) {
      // Read the selected file as a data URL
      const reader = new FileReader();
      reader.onload = () => {
        this.selectedImage = reader.result; // Update the selectedImage data property
      };
      reader.readAsDataURL(file);
    }
  },
      },
    };
    </script>
    
    <style scoped>
    /* Add your CSS styles for the modal here */
    .modal {
      
      position: fixed;
      margin: 200px;
      width: 500px;
      height: 500px;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 999;
      justify-content: center;
      align-items: center;
    }
    
    .modal-content {
      background-color: white;
      padding: 20px;
      width: 500px;
      height: 500px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }
    
    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      font-size: 20px;
    }


    .example-cropper {
    border: solid 1px #eee;
    min-height: 300px;
    width: 500px;
    height: 500;
  }
  
  .button-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 17px;
  }
  
  .button {
    color: white;
    font-size: 16px;
    padding: 10px 20px;
    background: #35b392;
    cursor: pointer;
    transition: background 0.5s;
    font-family: Open Sans, Arial;
    margin: 0 10px;
  }
  
  .button:hover {
    background: #38d890;
  }
  
  .button input {
    display: none;
  }

    </style>
    