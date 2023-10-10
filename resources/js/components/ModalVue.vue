<!-- <template>
  <div>
    <button @click="showModal = true">Open Modal</button>

    <div v-if="showModal" class="modal-overlay">
      <div class="modal">
        <div class="modal-header">
          <h2>{{ title }}</h2>
          <h2>Modal open</h2>
          <button @click="closeModal">Close</button>
        </div>
        <div class="modal-body">
          <slot><p>Modal Text</p></slot>
          <button @click="closeModal">Close Modal</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
    };
  },
  props: {
    title: String,
  },
  methods: {
    closeModal() {
      this.showModal = false;
    },
  },
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal {
  background: #fff;
  max-width: 600px;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal-header button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 1.2rem;
}
</style> -->

<!-- 
<template>

<div class="modal" >
    <div class="modal-inner">      
      <div v-show="isModalVisible"> 
    
    <button @close="closeModal" ></button>

    </div>
      <button @click="close">&times;</button>
      <p>Hello World!</p>  

    </div>
  </div>


  
    <button @click="openModal" v-show="modal" >Open</button>
    
  
</template>

<script>
  
  export default {

    data() {
      return {
        isModalVisible: false,
      };
    },
    methods: {

      close() {
      this.$emit("close");
    },

      openModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    }
  };
</script>

<style>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: lightseagreen;
}
.modal-inner {  
  background-color: white;
  border-radius: 0.5em;
  padding: 2em;
  margin: auto;
}
</style> -->

<template>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  // data() {
  //   return {
  //     isModalVisible: false,
  //   };
  // },
  // methods: {
  //   close() {
  //     this.isModalVisible = false;
  //   },
  //   openModal() {
  //     this.isModalVisible = true;
  //   },
  // },
};
</script>

<style>
/* Modal styles
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
 /* Hide the modal by default 
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background overlay 
}

.modal.show {
  display: flex; /* Show the modal when isModalVisible is true 
}

.modal-inner {  
  background-color: white;
  border-radius: 0.5em;
  padding: 2em;
  text-align: center;
  position: relative;
}

.close-button {
  position: absolute;
  top: 0.5em;
  right: 0.5em;
  background: none;
  border: none;
  font-size: 1.5em;
  cursor: pointer;
} */
</style>
