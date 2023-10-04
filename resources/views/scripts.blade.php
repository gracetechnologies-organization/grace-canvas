<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- Vanilla JavaScript - Static scripts --}}
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
        const IconElement = document.getElementById('icon');
        const LoaderElement = document.getElementById('loader');
        // const SuccessMessageElement = document.getElementById('successMessage');

        // Hide the icon and display the loader
        IconElement.style.display = 'none';
        LoaderElement.style.display = 'block';

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

                    // SuccessMessageElement.style.display = 'block';
                    $('#template-saved-success-model').modal('show');
                } else {
                    // Handle other response statuses (e.g., display an error message)
                    console.error('Error: ' + response.status);
                }
            })
            .catch(error => {
                console.error(error);
            })
            .finally(() => {
                // Hide the loader and show the icon (regardless of success or error)
                LoaderElement.style.display = 'none';
                IconElement.style.display = 'block';
            });
    }

    const updateTemplate = (RequestedPageID, ContainerID) => {
        const IconElement = document.getElementById('icon');
        const LoaderElement = document.getElementById('loader');
        // const updateMessageElement = document.getElementById('updateMessage');

        // Hide the icon and display the loader
        IconElement.style.display = 'none';
        LoaderElement.style.display = 'block';

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

                    // updateMessageElement.style.display = 'block';
                    $('#update-template-success-model').modal('show');
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
                LoaderElement.style.display = 'none';
                IconElement.style.display = 'block';
            });
    }

    const changeLanguage = (selectElement) => {
        var url = "/change";
        var selectedValue = selectElement.value;
        window.location.href = url + "?lang=" + selectedValue;
    }

</script>
{{-- Vanilla JavaScript - Dynamic scripts --}}
@php
    $UserDashboardRoutes = ['user/dashboard/home', 'user/dashboard/settings', 'user/dashboard/subcribtion', 'user/dashboard/templates'];
@endphp
@if (in_array(Route::current()->uri, $UserDashboardRoutes))
    @include('javascript_files.user-dahsboard-scripts')
@endif
{{--  @if (Route::current()->uri == '/payment/subscription/{ID}')  --}}
@include('javascript_files.subscription-form')
{{--  @endif  --}}
{{-- JQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
{{-- JQuery - Dynamic scripts --}}
@include('jquery_files.modals-scripts')

@php
    $EditingRoutes = ['edit/resume/{ID}', 'edit/saved/resume/{ID}'];
@endphp
@if (in_array(Route::current()->uri, $EditingRoutes))
    @include('jquery_files.cropper-scripts')
@endif

