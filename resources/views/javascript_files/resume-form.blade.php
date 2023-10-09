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
</script>