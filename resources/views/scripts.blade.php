 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <!-- * *                               SB Forms JS                               * *-->
 <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}

 {{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script> --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script> --}}

 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>  --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
     const printDiv = (id) => {
         var printContents = document.getElementById(id).innerHTML;
         var originalContents = document.body.innerHTML;
         // Replace the current document's body with the content to be printed
         document.body.innerHTML = printContents;
         // Trigger the print dialog for the current window
         window.print();
         // Restore the original document content after printing is done
         document.body.innerHTML = originalContents;
     }

     function changeLanguage(selectElement) {
         var url = "/change";
         var selectedValue = selectElement.value;
         window.location.href = url + "?lang=" + selectedValue;
     }

     //  const printDiv = (id) => {
     //      const { jsPDF } = window.jspdf;

     //      // Get the content of the div
     //       var content = document.getElementById(id);

     //       window.jsPDF = window.jspdf.jsPDF;

     //       var doc = new jsPDF();
     //       // Source HTMLElement or a string containing HTML.
     //       var elementHTML = document.getElementById(id);
     //       console.log(elementHTML);

     //      // Add the content to the PDF
     //       doc.html(elementHTML, {
     //           callback: function(doc) {
     //               // Save the PDF
     //               doc.save('sample-document.pdf');
     //           },
     //          //  x: 15,
     //          //  y: 15,
     //          //  width: 170, //target width in the PDF document
     //          //  windowWidth: 650 //window width in CSS pixels
     //       });

     //      // Save the PDF
     //      //  pdf.save('resume.pdf');
     //  }


     //  const printDiv = (id) => {


     //      // Choose the element and save the PDF for your user.
     //      // Choose the element that your content will be rendered to.
     //      const element = document.getElementById(id);
     //      // Choose the element and save the PDF for your user.
     //      html2pdf().from(element).save();

     //      console.log(element);
     //  }
 </script>

 @if (Route::current()->uri == 'edit/resume/{ID}')
     @include('javascript_files.cropper-scripts')
 @endif
