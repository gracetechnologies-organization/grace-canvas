<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.getElementById('sidebar');
        var sidebarToggle = false;

        sidebar.addEventListener('click', function() {
            sidebarToggle = !sidebarToggle;
            if (sidebarToggle) {
                sidebar.classList.add('active');
            } else {
                sidebar.classList.remove('active');
            }
        });

        var sidebarlinks = document.querySelectorAll('.sidebar a');
        var dataContainer = document.getElementById('dataContainer');

        sidebarlinks.forEach(function(link) {
            link.addEventListener('click', function() {
                sidebarlinks.forEach(function(I) {
                    I.classList.remove('active-link');
                });
                link.classList.add('active-link');
                var dataContentId = link.getAttribute('data-content');
                var contentToDisplay = document.getElementById(dataContentId).innerHTML;
                dataContainer.innerHTML = contentToDisplay;
            });
        });
    });
</script>
