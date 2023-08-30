<div class="border border-danger border-5">
    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: rgb(255, 102, 0);
            overflow: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 10px 8px 10px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #fffcfc;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a.active-link {
            background-color: #333;
            color: #fff;
        }

        .sidebar .icon {
            font-size: 25px;
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 15px;
        }
    </style>

    <div id="sidebar" class="sidebar">
        <a href="#" data-content="homeContent">
            <i class="fas fa-home icon"></i> <!-- Home Icon -->
            <span class="d-none d-md-inline">Home</span>
        </a>
        <a href="#" data-content="settingContent">
            <i class="fas fa-cog icon"></i> <!-- Setting Icon -->
            <span class="d-none d-md-inline">Setting</span>
        </a>
        <a href="#" data-content="myTemplateContent">
            <i class="fas fa-file icon"></i> <!-- Template Icon -->
            <span class="d-none d-md-inline">MY Template</span>
        </a>
    </div>
    <div class="content">
        <div id="dataContainer">
            {{-- data displayed here based on click link   --}}
            <p> {{ $Count }} </p>
            <button wire:click="incCounter"> + </button>
        </div>
    </div>
    {{-- content divs  --}}
    <div id="homeContent" style="display: none">
        {{-- <h2>Home content</h2>
        <p>this is the content for home section</p> --}}

        <livewire:user-dashboard.user-dashboard-home/>
    </div>
    <div id="settingContent" style="display: none">
        <h2>Setting content</h2>
        <p>this is the content for Setting section</p>
    </div>
    <div id="myTemplateContent" style="display: none">
        <h2>My Template content</h2>
        <p>this is the content for Template section</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
</div>
