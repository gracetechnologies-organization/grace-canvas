
<!--
<template>
    <div>
       Checkbox to toggle visibility of input fields 
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide Input Fields</label>
  
       Display existing input fields and render data live 
      <div v-for="(item, index) in inputItems" :key="index">
        <input v-model="item.value" @input="updateItem(index)" v-if="!hideInputFields" />
        <button @click="deleteInputField(index)">Delete</button>
        <p v-if="!hideInputFields">{{ item.value }}</p>
      </div>
  
       Button to add a new input field 
      <button @click="addNewInputField">Add Input Field</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputItems: [{ value: "" }], // Array to store input field data
        hideInputFields: false, // Checkbox to hide input fields
      };
    },
    methods: {
      addNewInputField() {
        // Add a new input item to the array with an empty value
        this.inputItems.push({ value: "" });
      },
      deleteInputField(index) {
        // Delete the input item at the specified index
        this.inputItems.splice(index, 1);
      },
      updateItem(index) {
        // Handle live data updates
        // Data is automatically rendered in <p> tags
      },
    },
  };
  </script>
-->
<!--
<template>
    <div>
       Input field for data
      <input v-model="inputData" @input="updateData" />
  
       Button to add data 
      <button @click="addData">Add Data</button>
      <button @click="delData">Delete Data</button>
  
      Display multiple <p> tags for data 
      <div v-for="(dataItem, index) in dataItems" :key="index">
        <p>{{ dataItem }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputData: '', // Input field data
        dataItems: [], // Array to store data for <p> tags
      };
    },
    methods: {
      updateData() {
        // Optional: Update data in real-time as the user types in the input field
        // You can add validation or formatting logic here if needed
      },
      addData() {
        if (this.inputData) {
          // Add data to the array and clear the input field
          this.dataItems.push(this.inputData);
          this.inputData = '';
        }
      },
      delData(){
        dataItems = '';
      }
    },
  };
  </script>
-->
<!--
<template>
    <div>
      Input field for data 
      <input v-model="inputData" @input="updateData" />
  
      Button to add data
      <button @click="addData">Add Data</button>
  
       Checkbox to toggle visibility of data 
      <input type="checkbox" v-model="hideData" />
      <label>Hide Data</label>
  
       Display multiple <p> tags for data 
      <div v-for="(dataItem, index) in dataItems" :key="index">
        <p v-if="!hideData">{{ dataItem }}</p>
        <button @click="deleteData()" >Delete</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputData: '', // Input field data
        dataItems: [], // Array to store data for <p> tags
        hideData: false, // Checkbox to hide/show data
      };
    },
    methods: {
      updateData() {
        // Optional: Update data in real-time as the user types in the input field
        // You can add validation or formatting logic here if needed
      },
      addData() {
        if (this.inputData) {
          // Add data to the array and clear the input field
          this.dataItems.push(this.inputData);
          this.inputData = '';
        }
      },
      deleteData() {
        // Delete data at the specified index
        this.dataItems=[];
      },
    },
  };
  </script>
-->


<!--
<template>
    <div>
       Input field for data
      <input v-model="inputData" @input="updateData" />
  
      Button to add data 
      <button @click="addData">Add Data</button>
  
       Checkbox to toggle visibility of data 
      <input type="checkbox" v-model="hideData" />
      <label>Hide Data</label>
  
      Display multiple <p> tags for data 
      <div v-for="(dataItem, index) in dataItems" :key="index">
        <p v-if="!hideData">{{ dataItem }}</p>
      </div>
  
       Button to delete all data 
      <button @click="deleteAllData">Delete All</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputData: '', // Input field data
        dataItems: [], // Array to store data for <p> tags
        hideData: false, // Checkbox to hide/show data
      };
    },
    methods: {
      updateData() {
        // Optional: Update data in real-time as the user types in the input field
        // You can add validation or formatting logic here if needed
      },
      addData() {
        if (this.inputData) {
          // Add data to the array and clear the input field
          this.dataItems.push(this.inputData);
          this.inputData = '';
        }
      },
      deleteAllData() {
        // Clear all data in the array
        this.dataItems = [];
      },
    },
  };
  </script>
  
-->
<template>
    <div>
      <!-- Input field for data -->
      <input v-model="inputData" @input="updateData" />
  
      <!-- Button to add data -->
      <button @click="addData">Add Data</button>
  
      <!-- Checkbox to toggle visibility of data -->
      <input type="checkbox" v-model="hideData" />
      <label>Hide Data</label>
  
      <!-- Display multiple <p> tags for data -->
      <div v-for="(dataItem, index) in dataItems" :key="index">
        <p v-if="!hideData">{{ dataItem }}</p>
        <button @click="deleteData(index)" v-if="!hideData">Delete</button>
      </div>
  
      <!-- Button to delete all data -->
      <button @click="deleteAllData">Delete All</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        inputData: '', // Input field data
        dataItems: [], // Array to store data for <p> tags
        hideData: false, // Checkbox to hide/show data
      };
    },
    methods: {
      updateData() {
        // Optional: Update data in real-time as the user types in the input field
        // You can add validation or formatting logic here if needed
      },
      addData() {
        if (this.inputData) {
          // Add data to the array and clear the input field
          this.dataItems.push(this.inputData);
          this.inputData = '';
        }
      },
      deleteData(index) {
        // Delete data at the specified index
        this.dataItems.splice(index, 1);
      },
      deleteAllData() {
        // Clear all data in the array
        this.dataItems = [];
      },
    },
  };
  </script>
  