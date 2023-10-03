<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
{{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
    integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const printDiv = (ID) => {
        var printContents = document.getElementById(ID).innerHTML;
        var originalContents = document.body.innerHTML;
        // Replace the current document's body with the content to be printed
        document.body.innerHTML = printContents;
        // Trigger the print dialog for the current window
        window.print();
        // Restore the original document content after printing is done
        document.body.innerHTML = originalContents;
    }
    const saveTemplate = (RequestedTemplateID, ContainerID) => {
        const iconElement = document.getElementById('icon');
        const loaderElement = document.getElementById('loader');
        const successMessageElement = document.getElementById('successMessage');

        // Hide the icon and display the loader
        iconElement.style.display = 'none';
        loaderElement.style.display = 'block';

        const PageCode = document.getElementById(ContainerID).innerHTML;

        const data = {
            RequestedTemplateID: RequestedTemplateID,
            PageCode: PageCode
        };

        fetch('{{ route('save.resume') }}', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': @json(csrf_token())
            }
        })
        .then(response => {
            if (response.status === 200) {
                // Display the success message and show the custom modal
                successMessageElement.style.display = 'block';
                $('#customModal').modal('show');
            } else {
                // Handle other response statuses (e.g., display an error message)
                console.error('Error: ' + response.status);
            }
        })
        .catch(error => {
            console.error(error);
            // Handle fetch errors (e.g., display an error message)
        })
        .finally(() => {
            // Hide the loader and show the icon (regardless of success or error)
            loaderElement.style.display = 'none';
            iconElement.style.display = 'block';
        });
    }

    {{--  updateTemplate JavaScript start --}}
    const updateTemplate = (RequestedPageID, ContainerID) => {
            const iconElement = document.getElementById('icon');
            const loaderElement = document.getElementById('loader');
            const updateMessageElement = document.getElementById('updateMessage');


        // Hide the icon and display the loader
        iconElement.style.display = 'none';
        loaderElement.style.display = 'block';

        const PageCode = document.getElementById(ContainerID).innerHTML;

        const data = {
            RequestedPageID: RequestedPageID,
            PageCode: PageCode
        };

        fetch('{{ route('update.resume') }}', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': @json(csrf_token())
            }
        })
        .then(response => {
            if (response.status === 200) {
                // Display the success message and show the custom modal
                updateMessageElement.style.display = 'block';
                $('#customModal').modal('show');
            }else{
                // Handle other response statuses (e.g., display an error message)
                console.error('Error: ' + response.status);
            }
        })
        .catch(error => {
            console.error(error);
            // Handle fetch errors (e.g., display an error message)
        })
        .finally(() => {
            // Hide the loader and show the icon (regardless of success or error)
            loaderElement.style.display = 'none';
            iconElement.style.display = 'block';
        });
    }
    {{--  updateTemplate JavaScript end --}}



        {{--  const saveTemplate = (RequestedTemplateID, ContainerID) => {
            const iconElement = document.getElementById('icon');
            const loaderElement = document.getElementById('loader');
            const successMessageElement = document.getElementById('successMessage');

            // Hide the icon and display the loader
            iconElement.style.display = 'none';
            loaderElement.style.display = 'block';

            const PageCode = document.getElementById(ContainerID).innerHTML;

            const data = {
                RequestedTemplateID: RequestedTemplateID,
                PageCode: PageCode
            };

            fetch('{{ route('save.resume') }}', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': @json(csrf_token())
                }
            })
            .then(response => {
                if (response.status === 200) {
                    // Display the success message and show the custom modal
                    successMessageElement.style.display = 'block';
                    $('#customModal').modal('show');
                } else {
                    // Handle other response statuses (e.g., display an error message)
                    console.error('Error: ' + response.status);
                }
            })
            .catch(error => {
                console.error(error);
                // Handle fetch errors (e.g., display an error message)
            })
            .finally(() => {
                // Hide the loader and show the icon (regardless of success or error)
                loaderElement.style.display = 'none';
                iconElement.style.display = 'block';
            });
        }  --}}

    {{--  const saveTemplate = (RequestedTemplateID, ContainerID) => {
        // Icon ko hide karo
        document.getElementById('icon').style.display = 'none';
        // Loader dikhao (button click ke pehle)
        document.getElementById('loader').style.display = 'block';

        const PageCode = document.getElementById(ContainerID).innerHTML;

        const data = {
            RequestedTemplateID: RequestedTemplateID,
            PageCode: PageCode
        };

        fetch('{{ route('save.resume') }}', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': @json(csrf_token())
                }
            })
            .then(response => {
                console.log(response.status);

                if (response.status === 200) {
                    document.getElementById('successMessage').style.display = 'block';
                    $('#customModal').modal('show');
                }

                // Success message ko dikhao
                document.getElementById('successMessage').style.display = 'block';

                // Loader chhupao (request ke baad)
                document.getElementById('loader').style.display = 'none';

                // Icon ko dikhao (request ke baad)
                document.getElementById('icon').style.display = 'block';

            })
            .catch(error => {
                console.log(error);
                // Loader chhupao (request ke baad)
                document.getElementById('loader').style.display = 'none';

                // Icon ko dikhao (request ke baad)
                document.getElementById('icon').style.display = 'block';

            });
    }  --}}

    {{--  const saveTemplate = (RequestedTemplateID, ContainerID) => {
         const PageCode = document.getElementById(ContainerID).innerHTML;

         //  saveResume(int $UserID, $ResumeID, $FrontImage, $FormData, $PageCode)
         const data = {
             RequestedTemplateID: RequestedTemplateID,
             PageCode: PageCode
         };
         // Send a POST request to the server-side script
         fetch('{{ route('save.resume') }}', {
                 method: 'POST',
                 body: JSON.stringify(data),
                 headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-Token': @json(csrf_token())
                 }
             })
             //  .then(response => response.json())
             .then(response => {
                 console.log(response);
             })
             .catch(error => {
                 console.error(error);
             });
     }  --}}

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

@if (Route::current()->uri == 'user/dashboard/home' ||
        Route::current()->uri == 'user/dashboard/settings' ||
        Route::current()->uri == 'user/dashboard/subcribtion')
    @include('javascript_files.user-dahsboard-scripts')
@endif
