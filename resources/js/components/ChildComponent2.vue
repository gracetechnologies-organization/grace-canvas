
<!-- chatgpt - childcomponent -->
<template>
  <div>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Crop Image
    </button>
    <img :src="cropImg" style="width: 142px; height: 142px; border: 1px solid gray" alt="Cropped Image" id="cropped" /> -->
    <input type="file" data-bs-toggle="modal" data-bs-target="#exampleModal" @change="setImage" accept="image/jpeg,image/png,image/webp" class="form-control image">
    
    <!-- Modal -->
    <!-- ... (Your modal code here) -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
      <h2 style="margin: 0;">Vue CropperJS</h2>
      <hr/>
      
      <!-- <button @click="cropImage" v-if="imgSrc != ''" style="margin-right: 40px;">Crop</button> -->
      <button @click="rotate" v-if="imgSrc != ''">Rotate</button>
      
      <!-- <input type="file" name="image" accept="image/*"
             style="font-size: 1.2em; padding: 10px 0;"
             @change="setImage" /> -->
      <br/>
      <!-- <div style="width: 200px; height:200px; border: 1px solid gray;"> -->
        <!-- <v-card>  :guides="true"     :background="true"-->
          <!-- <v-card-text> -->
        <vue-cropper
            ref='cropper'
            
            :view-mode="1"
            drag-mode="crop"
            :auto-crop-area="0.5"
            :min-container-width="250"
            :min-container-height="180"
           
            :rotatable="true"
            :src="imgSrc"
            alt="Source Image"
            :img-style="{ 'width': '400px', 'height': '300px' }">
        </vue-cropper>
        <!-- </v-card-text> -->
      <!-- </v-card> -->
      <!-- </div> -->
      
      <br/>
      <br />

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="cancelModal">Cancel</button>
        <button type="button" class="btn btn-primary" @click="cropImage" data-bs-dismiss="modal" >Crop</button>
      </div>
    </div>
  </div>
</div>
  </div>
</template>

<script>
import VueCropper from 'vue-cropperjs';
import { ref } from 'vue';
// import VueCropper from 'vue-cropperjs';
    import { Cropper } from "vue-advanced-cropper";
    import "vue-advanced-cropper/dist/style.css";
    import { mapState } from 'vuex'
    import axios from 'axios'
    import 'cropperjs/dist/cropper.css'


export default {
  components: {
    VueCropper,
  },
  data() {
    return {
      imgSrc: '',
      cropImg: '',
    };
  },
  methods: {
    setImage(e) {
      // ... (Your setImage code here)
      const file = e.target.files[0];
          
          if (!file.type.includes('image/')) {
            alert('Please select an image file');
            return;
          }
          if (typeof FileReader === 'function') {
            const reader = new FileReader();
            reader.onload = (event) => {
              this.imgSrc = event.target.result;
              // rebuild cropperjs with the updated source
              this.$refs.cropper.replace(event.target.result);
            };
            reader.readAsDataURL(file);
            file = this.$refs.cropper.getCroppedCanvas().toDataURL();
            // file = cropImg;
            this.$emit('file-selected', file);
          } else {
            alert('Sorry, FileReader API not supported');
          }
    },
    cropImage() {
      // ... (Your cropImage code here)
      // Emit the cropped image data to the parent component
        // get image data for post processing, e.g. upload or setting image src
        this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
      this.$emit('imageCropped', this.cropImg);
    },
    rotate() {
          // guess what this does :)
          this.$refs.cropper.rotate(90);
        },
  },
};
</script>
