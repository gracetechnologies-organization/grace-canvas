<div>
    {{-- <button onclick="window.print()">Print</button> --}}

    <!-- Offcanvas for detail customization -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Only For Pro Users...!
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Download Now
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">PDF</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Editing form & preview section -->
    <div class="container-fluid px-5 px-md-4 px-lg-5">
        <div class="row">
            <!-- Form column -->
            <div class="col-12 col-md-5 col-lg-4 ">
                <form>
                    <div class="row">
                        <div class="col-10 py-1 mt-1 ">
                            <div class="input-group mt-0">
                                <input type="file" accept="image/jpeg,image/png,image/webp" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload Pic</label>
                            </div>
                        </div>
                        <div class="col-2 py-1 text-end">
                            <button type="button" class="custom-btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" title="Settings & options">
                                <i class='bx bx-cog icons-size'></i>
                            </button>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter first name">
                                <label for="floatingInputGrid">First Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter last name">
                                <label for="floatingInputGrid">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Your Profession">
                            <label for="floatingInputGrid">Enter Your Profession</label>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGrid" placeholder="Enter Your Phone">
                                <label for="floatingInputGrid">Enter Your Phone</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Select Your Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="floatingSelect">Select Your Gender</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Marital Status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                                <label for="floatingSelect">Marital Status</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-9">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="Enter Your Email">
                                <label for="floatingInputGrid">Enter Your Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGrid" placeholder="Date Of Birth">
                                <label for="floatingInputGrid">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-9">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="CNIC">
                                <label for="floatingInputGrid">CNIC</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Marital Status">
                                    <option value="Single">Pakistan</option>
                                    <option value="Married">UAE</option>
                                </select>
                                <label for="floatingSelect">Nationality</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Your Address">
                                <label for="floatingInputGrid">Enter Your Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Describe Your Objective" id="floatingTextarea2" style="height: 120px"></textarea>
                            <label for="floatingTextarea2">Describe Your Objective</label>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="accordion" id="AccordionPanels">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Experience" aria-expanded="true" aria-controls="panelsStayOpen-Experience">
                                        Experience
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Experience" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your organization">
                                                    <label for="floatingInputGrid">Organization</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter last designation">
                                                    <label for="floatingInputGrid">Designation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Your Job Description" id="floatingTextarea2" style="height: 120px"></textarea>
                                                <label for="floatingTextarea2">Your Job Description</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Joining Date">
                                                    <label for="floatingInputGrid">Joining Date</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Ending Date">
                                                    <label for="floatingInputGrid">Ending Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3 px-1">
                                            <button type="button" class="btn btn-secondary" title="Add experience">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add experience">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove experience">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Qualification" aria-expanded="false" aria-controls="panelsStayOpen-Qualification">
                                        Qualification
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Qualification" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your institute">
                                                <label for="floatingInputGrid">Educational Institute</label>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your degree">
                                                <label for="floatingInputGrid">Degree</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your score">
                                                    <label for="floatingInputGrid">Score</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Your completion date">
                                                    <label for="floatingInputGrid">Completion Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3 px-1">
                                            <button type="button" class="btn btn-secondary" title="Add qualification">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add qualification">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove qualification">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Skills" aria-expanded="false" aria-controls="panelsStayOpen-Skills">
                                        Skills
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Skills" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your skills">
                                                    <label for="floatingInputGrid">Enter Your Skill Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary col-lg-4" title="Add skill">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your skills">
                                                    <label for="floatingInputGrid">Enter Your Skill Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add skill">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove skill">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Achievements" aria-expanded="false" aria-controls="panelsStayOpen-Achievements">
                                        Achievements
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Achievements" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your achievements">
                                                    <label for="floatingInputGrid">Enter Your Achievement Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary col-lg-4" title="Add achievement">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your achievements">
                                                    <label for="floatingInputGrid">Enter Your Achievement Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add achievement">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove achievement">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Projects" aria-expanded="false" aria-controls="panelsStayOpen-Projects">
                                        Projects
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Projects" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your projects">
                                                    <label for="floatingInputGrid">Enter Your Project Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary col-lg-4" title="Add project">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your projects">
                                                    <label for="floatingInputGrid">Enter Your Project Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add project">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove project">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Interests" aria-expanded="false" aria-controls="panelsStayOpen-Interests">
                                        Interests
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Interests" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your interests">
                                                    <label for="floatingInputGrid">Enter Your Interest</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary col-lg-4" title="Add interest">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your interests">
                                                    <label for="floatingInputGrid">Enter Your Interest</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add interest">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove interest">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Languages" aria-expanded="false" aria-controls="panelsStayOpen-Languages">
                                        Languages
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-Languages" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your languages">
                                                    <label for="floatingInputGrid">Your Known Language</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary col-lg-4" title="Add language">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your interests">
                                                    <label for="floatingInputGrid">Your Known Language</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add language">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove language">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-References" aria-expanded="false" aria-controls="panelsStayOpen-References">
                                        References
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-References" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter reference name">
                                                    <label for="floatingInputGrid">Enter Name</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter reference designation">
                                                    <label for="floatingInputGrid">Enter Designation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Reference Description" id="floatingTextarea2" style="height: 120px"></textarea>
                                                <label for="floatingTextarea2">Reference Description</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3 px-1">
                                            <button type="button" class="btn btn-secondary" title="Add reference">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add reference">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove reference">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Resume template column -->
            <div class="col-12 col-md-7 col-lg-8 ">
                <!-- Resume template design -->
                <style>
                    .custom-border {
                        border: 1px solid rgb(54, 54, 54);
                    }
                </style>
                <div class="container contianer-customs mt-2" id="resume-template-container">
                    <div class="row custom-border" style="width:720px;">
                        <style>
                            .left-col {
                                background: #464646;
                                width: 200px;
                                height: 1040px;
                            }

                            .right-col {
                                background: white;
                                width: 386px;
                                height: 1040px;
                                padding: 0px;
                            }

                            .resume-photo {
                                border: 2px solid white;
                                border-radius: 100%;
                                overflow: hidden;
                                width: 142px;
                                height: 142px;
                                margin: auto;
                                position: relative;
                                top: 45px;
                            }

                            .personal-info-container {
                                position: relative;
                                top: 90px;
                                left: 20px;
                                width: 120px;
                                padding-top: 10px;
                            }

                            .personal-info-container h2 {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                            }

                            .left-col-divider {
                                background-color: white;
                                width: 120px;
                                height: 1.17px;
                            }

                            .right-col-divider {
                                background-color: #464646;
                                width: 452.2px;
                                height: 2.17px;
                            }

                            .personal-info-details {
                                padding: 10px 0px 0px 7px;
                                height: 39px;
                            }

                            .personal-info-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 10px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                            }

                            .languages-container {
                                position: relative;
                                top: 105px;
                                left: 20px;
                                width: 120px;
                                padding-top: 10px;
                            }

                            .languages-container h2 {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                            }

                            .languages-details {
                                padding: 20px 0px 0px 7px;
                                height: 29px;
                            }

                            .languages-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 12px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 0px;
                                text-transform: uppercase;
                            }

                            .skills-container {
                                position: relative;
                                top: 135px;
                                left: 20px;
                                width: 120px;
                                padding-top: 10px;
                            }

                            .skills-container h2 {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                            }

                            .skills-details {
                                padding: 20px 0px 0px 7px;
                                height: auto;

                            }

                            .skills-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 10.8px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                                text-transform: uppercase;
                                margin-bottom: 9px;
                            }

                            .progress-bar-container {
                                background-color: #8A8A8A;
                            }

                            .progress-bar-container .custom-progress-bar {
                                padding: 3px;
                                background-color: white;
                            }

                            .interest-container {
                                position: relative;
                                top: 170px;
                                left: 20px;
                                width: 120px;
                                padding-top: 10px;
                            }

                            .interest-container h2 {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                            }

                            .interest-details {
                                padding: 20px 0px 0px 7px;
                                height: auto;
                            }

                            .interest-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 10.8px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                                text-transform: uppercase;
                                margin-bottom: 9px;
                            }

                            .name-container {
                                width: 100%;
                                padding: 80px 30px 0px 30px;
                            }

                            .name-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 40.21px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 5px;
                                text-transform: uppercase;
                            }

                            .name-container span {
                                color: #59595B;
                                font-size: 11px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                            }

                            .objective-container {
                                width: 100%;
                                padding: 25px 30px 0px 30px
                            }

                            .objective-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 101.1px;
                                padding: 0px 3px 0px 5px;
                            }

                            .objective-container p {
                                color: #302E30;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 16px;
                            }

                            .experience-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .experience-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 104.1px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 15px;
                            }

                            .experience-details h3 {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 10px;
                                text-transform: uppercase;
                            }

                            .experience-details p {
                                color: #302E30;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                margin-top: 15px;
                                line-height: 16px;
                            }

                            .education-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .education-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 102.1px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 15px;
                            }

                            .education-details {
                                margin-bottom: 25px;
                            }

                            .education-details h3 {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 3px;
                                text-transform: uppercase;
                                margin-bottom: 17px;
                            }

                            .education-details p {
                                color: #302E30;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                margin-top: 15px;
                                line-height: 3px;
                            }

                            .achievement-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .achievement-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 120px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .achievement-details div {
                                height: 47px;
                                width: 50%;
                            }

                            .achievement-details div p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                margin-top: 5px;
                                line-height: 5px;
                            }

                            .project-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .project-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 82px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .project-details div {
                                height: 47px;
                                width: 50%;
                            }

                            .project-details div p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                margin-top: 5px;
                                line-height: 5px;
                            }

                            .reference-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .reference-container h2 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                text-transform: uppercase;
                                border: 2px solid #464646;
                                border-radius: 100px;
                                width: 98px;
                                padding: 0px 3px 0px 5px;
                            }

                            .reference-details div {
                                height: 47px;
                                width: 50%;
                            }

                            .reference-details div h3 {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                            }

                            .reference-details div p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 11px;
                                font-style: normal;
                                line-height: 0px;
                            }
                        </style>
                        <div class="left-col ">
                            <div class="resume-photo">
                                <img src="{{ asset('storage/images/Asset 11.png') }}" width="220px">
                            </div>
                            <div class="personal-info-container ">
                                <h2> Personal Info </h2>
                                <div class="left-col-divider"></div>
                                <div class="personal-info-details ">
                                    <p>PHONE</p>
                                    <p>+92 317 0155625</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>EMAIL</p>
                                    <p>mirza@gmail.com</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>ID CARD</p>
                                    <p>37405-7659127-0</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>DATE OF BIRTH</p>
                                    <p>15.06.2003</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>GENDER</p>
                                    <p>Male</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>MARITAL STATUS</p>
                                    <p>Single</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>NATIONALITY</p>
                                    <p>Pakistan</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>ADDRESS</p>
                                    <p>Bahria, Rawalpindi</p>
                                </div>
                            </div>
                            <div class="languages-container ">
                                <h2> Languages </h2>
                                <div class="left-col-divider"></div>
                                <div class="languages-details">
                                    <p>Urdu</p>
                                </div>
                                <div class="languages-details">
                                    <p>English</p>
                                </div>
                                <div class="languages-details">
                                    <p>Chinese</p>
                                </div>
                                <div class="languages-details">
                                    <p>Spanish</p>
                                </div>
                            </div>
                            <div class="skills-container ">
                                <h2> Skills </h2>
                                <div class="left-col-divider"></div>
                                <div class="skills-details">
                                    <p>Photoshop</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 65%;"></div>
                                    </div>
                                </div>
                                <div class="skills-details">
                                    <p>Illutrator</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 80%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="interest-container ">
                                <h2> Interest </h2>
                                <div class="left-col-divider"></div>
                                <div class="interest-details">
                                    <p>Hiking</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 65%;"></div>
                                    </div>
                                </div>
                                <div class="interest-details">
                                    <p>Swimming</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 80%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-col " style="width:517px;">
                            <div class="name-container ">
                                <h2>Name Surname</h2>
                                <span>Graphic Designer</span>
                            </div>
                            <div class="objective-container ">
                                <h2>Objective</h2>
                                <p>
                                    Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position to utilize my expertise in front-end and back-end technologies, as well as my problem-solving and collaboration skills, to contribute to the development user experiences.
                                </p>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="experience-container ">
                                <h2>Experience</h2>
                                <div class="experience-details">
                                    <h3>Job Position</h3>
                                    <h3>Company Name 2020 | 2021</h3>
                                    <p>
                                        Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.
                                    </p>
                                </div>
                                <div class="experience-details">
                                    <h3>Job Position</h3>
                                    <h3>Company Name 2020 | 2021</h3>
                                    <p>
                                        Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.
                                    </p>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="education-container ">
                                <h2>Education</h2>
                                <div class="education-details">
                                    <h3>University Name or School Name</h3>
                                    <p>Write your degree name here</p>
                                    <p>3.2 CGPA 2010 - 2015</p>
                                </div>
                                <div class="education-details">
                                    <h3>University Name or School Name</h3>
                                    <p>Write your degree name here</p>
                                    <p>3.2 CGPA 2010 - 2015</p>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="achievement-container ">
                                <h2>Achievement</h2>
                                <div class="row achievement-details">
                                    <div>
                                        <p>Your achivement 1</p>
                                        <p>Your achivement 2</p>
                                    </div>
                                    <div>
                                        <p>Your achivement 3</p>
                                        <p>Your achivement 4</p>
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="project-container ">
                                <h2>Project</h2>
                                <div class="row project-details">
                                    <div>
                                        <p>Your project 1</p>
                                        <p>Your project 2</p>
                                    </div>
                                    <div>
                                        <p>Your project 3</p>
                                        <p>Your project 4</p>
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="reference-container ">
                                <h2>Reference</h2>
                                <div class="row reference-details">
                                    <div>
                                        <h3>Reference Name</h3>
                                        <p>Designation</p>
                                        <p>He was a project manager their</p>
                                    </div>
                                    <div>
                                        <h3>Reference Name</h3>
                                        <p>Designation</p>
                                        <p>He was a project manager their</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fixed buttons -->
            <div class="fixed-btn-container">
                <button class="fixed-btn" onclick="printDiv('resume-template-container')" title="Download PDF or print">
                    <i class='bx bx-cloud-download icons-size'></i>
                </button>
            </div>
        </div>
    </div>
</div>
