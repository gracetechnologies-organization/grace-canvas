<template>

    <div>
      <h2 style="margin: 0;">Vue CropperJS</h2>
      <hr/>
      <img :src="cropImg" style="width: 200px; height: 200px; border: 1px solid gray" alt="Cropped Image" />
      <button @click="cropImage" v-if="imgSrc != ''" style="margin-right: 40px;">Crop</button>
      <button @click="rotate" v-if="imgSrc != ''">Rotate</button>
      <input type="file" name="image" accept="image/*"
             style="font-size: 1.2em; padding: 10px 0;"
             @change="setImage" />
      <br/>
      <div style="width: 200px; height:200px; border: 1px solid gray;">
        <v-card>
          <v-card-text>
        <vue-cropper
            ref='cropper'
            :guides="true"
            :view-mode="1"
            drag-mode="crop"
            :auto-crop-area="0.5"
            :min-container-width="250"
            :min-container-height="180"
            :background="true"
            :rotatable="true"
            :src="imgSrc"
            alt="Source Image"
            :img-style="{ 'width': '400px', 'height': '300px' }">
        </vue-cropper>
        </v-card-text>
      </v-card>
      </div>
      
      <br/>
      <br />
  
      
    </div>
  
  </template>
  
  <script>
    import VueCropper from 'vue-cropperjs';
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
          } else {
            alert('Sorry, FileReader API not supported');
          }
        },
        cropImage() {
          // get image data for post processing, e.g. upload or setting image src
          this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
        },
        rotate() {
          // guess what this does :)
          this.$refs.cropper.rotate(90);
        },
      },
    };
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  </style>
  