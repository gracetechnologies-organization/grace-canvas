<div id="dashboardDiv">
    <style>
        /* Your existing CSS styles */
        .custom-user-dashboard-container {
            margin-top: 10rem;
            margin-bottom: 10rem;
            padding-left: 12rem;
        }

        .custom-sidebar-user-dashboard {
            width: 250px;
            height: 90%;
            margin: 10% 0% 10% 0%;
            background-color: rgb(255, 102, 0);
            overflow: hidden;
            transition: 0.3s;
            padding: 5%;
            margin-left: -18rem;
        }

        .custom-sidebar-user-dashboard a {
            text-decoration: none;
            font-size: 20px;
            font-family: Poppins;
            color: #fffcfc;
            display: block;
            overflow: hidden;
            transition: 0.3s;
            padding: 10px;
        }

        .custom-sidebar-user-dashboard a:hover {
            color: #f1f1f1;
        }

        .custom-sidebar-user-dashboard.active {
            width: 250px;
            /* Keep the width consistent on all screen sizes */
        }

        .custom-sidebar-user-dashboard a.active-link {
            background-color: #333;
            color: #fff;
        }

        .custom-sidebar-user-dashboard .icon {
            font-size: 25px;
            margin-right: 10px;
        }

        .content {
            margin-top: 0.8rem;
            margin-left: -15rem;
            /* Adjust this margin as needed */
            padding: 15px;
        }

        .custome-card-border {
            border: 2px dashed #FF6600;
        }

        .custom-button-css {
            width: 11rem !important;
            height: 4rem !important;
            border-radius: 1rem;
            border: none;
            margin-top: 0px;
            padding-right: 0rem !important;
            padding-left: 0rem !important;
            background-color: #FF6600;
            color: #FFF;
            font-family: Poppins;
            font-size: 20px !important;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
        }

        /* Additional CSS for responsive design */
        @media (max-width: 767px) {
            .custom-user-dashboard-container {
                margin-top: 2rem;
                margin-bottom: 1rem;
                padding-left: 1rem;
            }

            /* Add any additional styles for mobile here */
            .custom-sidebar-user-dashboard {
                width: 250px;
                height: 70%;
                margin-left: 1rem;
            }

            .custom-sidebar-user-dashboard.active {
                width: 250px;
                /* Keep the width consistent on all screen sizes */
            }

            .content {
                margin-left: 0px;
                /* Adjust this margin as needed */
            }

            .custome-color {
                color: #ff6600;
            }

            .custom-button-css {
                width: 8rem !important;
                height: 3rem !important;
                border-radius: 0.5rem;
                border: none;
                padding-right: 0rem !important;
                padding-left: 0rem !important;
                padding-bottom: 1rem !important;
                background-color: #FF6600;
                color: #FFF;
                font-family: Poppins;
                font-size: 1rem !important;
                font-style: normal;
                font-weight: 500;
                line-height: normal;
            }


        }

        @media only screen and (min-width:768px) and (max-width:1440px) {
            .custom-sidebar-user-dashboard {
                margin-left: -10rem;
            }

            .content {
                margin-left: -3rem;
                margin-top: -0.1rem;

            }
        }
    </style>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        <div class="row">
            <!-- Add Bootstrap classes for responsive design -->
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="content">
                    <div id="dataContainer">
                        {{--  @yield('user-dashboard')  --}}
                        @if (session('subscription_message'))
                            <div class="alert alert-danger">
                                {{ session('subscription_message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</div>
