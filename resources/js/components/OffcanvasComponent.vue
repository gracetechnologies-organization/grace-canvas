
<template>
  <div>
    <div size="120" class="user">
      <v-img :src="image_name" class="profile-img"></v-img>
      <v-icon class="icon primary white--text" @click="$refs.FileInput.click()">mdi-upload</v-icon>
      <input ref="FileInput" type="file" style="display: none;" @change="onFileSelect" />
    </div>
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-text>
          <VueCropper v-show="selectedFile" ref="cropper" :src="selectedFile" alt="Source Image"></VueCropper>
        </v-card-text>
        <v-card-actions>
          <button class="primary" @click="cropImage">Crop</button>
          <button color="primary" text @click="dialog = false">Cancel</button>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import axios from 'axios'
import VueCropper from 'vue-cropperjs'
import 'cropperjs/dist/cropper.css'
export default {
components: { VueCropper },
props: ['image_name'],
data() {
  return {
    showModal: false ,
    selectedImage: null, // Store the selected image data
    mime_type: '',
    cropedImage: '',
    autoCrop: false,
    selectedFile: '',
    image: '',
    dialog: false,
    files: '',
  }
},
computed: {
  ...mapState(['user']),
},
methods: {

  cropImage() {
  const result = this.$refs.cropper.getResult();
  const imageDataURL = result.canvas.toDataURL("image/jpeg");

  // Update the src attribute of the img element
  const imgElement = document.getElementById("croppedImage");
  if (imgElement) {
    imgElement.src = imageDataURL;
  }
  this.showModal = false;
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



  saveImage() {
    const userId = this.$route.params.user_id
    this.cropedImage = this.$refs.cropper.getCroppedCanvas().toDataURL()
    this.$refs.cropper.getCroppedCanvas().toBlob((blob) => {
      const formData = new FormData()
      formData.append('profile_photo', blob, 'name.jpeg')
      axios
        .post('/api/user/' + userId + '/profile-photo', formData)
        .then((response) => {
        })
        .catch(function (error) {
          console.log(error)
        })
    }, this.mime_type)
  },
  onFileSelect(e) {
    const file = e.target.files[0]
    this.mime_type = file.type
    console.log(this.mime_type)
    if (typeof FileReader === 'function') {
      this.dialog = true
      const reader = new FileReader()
      reader.onload = (event) => {
        this.selectedFile = event.target.result
        this.$refs.cropper.replace(this.selectedFile)
      }
      reader.readAsDataURL(file)
    } else {
      alert('Sorry, FileReader API not supported')
    }
  },
},
}
</script>
<style scoped>
.user {
width: 142px;
height: 142px;
border-radius: 100%;
border: 3px solid black;
position: relative;
}
.profile-img {
height: 100%;
width: 100%;
border-radius: 50%;
}
.icon {
position: absolute;
top: 10px;
right: 0;
background: #e2e2e2;
border-radius: 100%;
width: 30px;
height: 30px;
vertical-align: middle;
text-align: center;
color: #0000ff;
font-size: 14px;
cursor: pointer;
}
</style>
