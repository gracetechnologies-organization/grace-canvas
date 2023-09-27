<template>
    <div class="fixed-btn-container">
      <!-- Download button -->
      <button class="fixed-btn" title="Download as PDF or Print" @click="downloadAsPDF">
        <i class='bx bx-cloud-download icons-size standard-txt-color'></i>
      </button>
  
      <!-- Test button -->
      <button style="border: 1px solid black" class="fixed-btn" title="Download as PDF or Print" @click="testPDF">
        Test PDF
      </button>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      downloadAsPDF() {
        // Add your PDF download logic here
        // You can use a library like jsPDF or a server-side PDF generation approach
        // Example using jsPDF:
        // const doc = new jsPDF();
        // doc.text('Your PDF content here', 10, 10);
        // doc.save('your-pdf-file.pdf');
      },
      testPDF() {
        // This is a test function, you can replace it with your logic
        alert('Test PDF button clicked!');
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add any component-specific styles here */
  </style>
  