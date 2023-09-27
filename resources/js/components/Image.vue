<!-- <template>
  <div>
    <input type="file" @change="handleImageUpload" accept="jpeg/*">
    <div v-if="imageSrc">
      <vue-cropper style="width: 400px; height: 300px;"
        ref="cropper"
        :img="imageSrc"
        :settings="cropperSettings"
      ></vue-cropper>
      <button @click="cropImage">Crop Image</button>
      <div>
        <img :src="croppedImage" alt="Cropped Image" v-if="croppedImage">
      </div>
    </div>
  </div>
</template>

<script>
import VueCropper from 'vue-cropperjs';

export default {
  components: {
    VueCropper,
  },
  data() {
    return {
      imageSrc: null,
      croppedImage: null,
      cropperSettings: {
        aspectRatio: 2, // You can specify the aspect ratio you want for cropping
        viewMode: 4,    // You can customize the view mode
      },
    };
  },
  methods: {
    handleImageUpload(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.imageSrc = e.target.result;
          this.croppedImage = null; // Reset the cropped image when a new image is selected
        };
        reader.readAsDataURL(file);
      }
    },
    cropImage() {
      const cropper = this.$refs.cropper.getCropper();
      cropper.getCroppedCanvas().toBlob((blob) => {
        this.croppedImage = URL.createObjectURL(blob);
      });
    },
  },
};
</script> -->


<!-- <template>
    <div class="col-12 col-md-12 col-lg-8">
      <div class="form-floating">
        <input
          type="text"
          class="form-control"
          placeholder="Enter Your Phone"
          v-model="phone"
          @input="updatePhone"
        />
        <label>Enter Your Phone</label>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        phone: '',
      };
    },
    methods: {
      updatePhone() {
        this.$emit('update:phone', this.phone);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
   -->
<!-- 
   <template>
    <div>
      <input type="text" v-model="formData.name" placeholder="Name">
      <input type="email" v-model="formData.email" placeholder="Email">
      Add more form fields as needed -->
<!-- 
      <div>
      <p>Live-rendered form data:</p>
      <p>Name: {{ formData.name }}</p>
      <p>Email: {{ formData.email }}</p>
      Display other form data as needed -->
    <!-- </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        formData: {
          name: '',
          email: '',
          // Add more fields here
        },
      };
    },
  };
  </script>
   -->
<!-- 
   <template>
    <div>
      <input type="file" @change="handleImageUpload" accept="image/*">
      <div v-if="imageUrl">
        <img :src="imageUrl" alt="Uploaded Image">
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        imageUrl: null
      };
    },
    methods: {
      handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            this.imageUrl = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      }
    }
  };
  </script>
   -->




  
<!-- 
   <template>
    <div>
      <input type="file" @change="handleImageUpload" accept="image/*">
      <div v-if="imageSrc">
        <croppa v-model="croppedImage" :options="croppaOptions"></croppa>
        <div>
          <img :src="croppedImage" alt="Cropped Image">
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import 'croppa/dist/croppa.css'; // Import the Croppa CSS
  import Croppa from 'vue-croppa';
  
  export default {
    data() {
      return {
        imageSrc: null,
        croppedImage: null,
        croppaOptions: {
          aspectRatio: 1, // You can specify the aspect ratio you want for cropping
          width: 300,     // Width of the cropped image
          height: 300,    // Height of the cropped image
        },
      };
    },
    methods: {
      handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            this.imageSrc = e.target.result;
            this.croppedImage = null; // Reset the cropped image when a new image is selected
          };
          reader.readAsDataURL(file);
        }
      }
    },
    components: {
      Croppa,
    },
  };
  </script> -->
  
  <template>
    <div>
      <input type="file" @change="handleImageUpload" accept="image/*">
      <vue-cropper
        ref="cropper"
        :src="imageSrc"
        :options="cropperOptions"
      ></vue-cropper>
      <button @click="cropImage">Crop Image</button>
      <div v-if="croppedImage">
        <img :src="croppedImage" alt="Cropped Image">
      </div>
    </div>
  </template>
  
  <script>
  import VueCropper from 'vue-cropperjs';
  
  export default {
    components: {
      VueCropper,
    },
    data() {
      return {
        imageSrc: null,
        croppedImage: null,
        cropperOptions: {
          aspectRatio: 1, // You can specify the aspect ratio you want for cropping
          viewMode: 1,    // You can customize the view mode
        },
      };
    },
    methods: {
      handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            this.imageSrc = e.target.result;
            this.croppedImage = null; // Reset the cropped image when a new image is selected
          };
          reader.readAsDataURL(file);
        }
      },
      cropImage() {
        const cropper = this.$refs.cropper.getCropper();
        cropper.getCroppedCanvas().toBlob((blob) => {
          this.croppedImage = URL.createObjectURL(blob);
        });
      },
    },
  };
  </script> 
  