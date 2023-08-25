<div>
    <style>
        .img-container {
            height: 500px;
            overflow: hidden;
        }

        .custom-border {
            border: 1px solid rgb(54, 54, 54);
        }
    </style>
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
                <button class="btn btn-secondary standard-bg-color standard-border-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
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

    @include('components.crop-img-modal')

    <!-- Fixed buttons -->
    <div class="fixed-btn-container">
        @include('components.print-btn')
    </div>

    <!-- Editing form & preview section -->
    <div class="container-fluid px-5 px-md-4 px-lg-5">
        <div class="row">
            <!-- Form column -->
            <div class="col-12 col-md-5 col-lg-4">
                @include('components.resume-form')
            </div>
            <!-- Resume template column -->
            <div class="col-12 col-md-7 col-lg-8">
                <!-- Resume template design -->
                <div class="container contianer-customs mt-2" id="resume-template-container">
                    <div class="row custom-border" style="width:720px;">
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
                            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');

                            .right-col {
                                background: #2D2D2D;
                                width: 230px;
                                height: 1040px;
                                margin-left: 22.5px;
                            }

                            .left-col {
                                background: white;
                                width: 465px;
                                height: 1040px;
                                padding: 0px;
                            }

                            .image-div {
                                background-color: grey;
                                margin-top: 20px;
                                margin-left: -10px;
                                width: 215px;
                                height: 206px;
                            }

                            .resume-photo {
                                border-radius: 50%;
                                background-color: #FFF;
                                overflow: hidden;
                                width: 135px;
                                height: 135px;
                                margin: 15px 0px 0px 39px;
                                position: relative;
                                top: 7.5px;
                            }

                            .left-inner {
                                background-color: #333333;
                                width: 160px;
                                height: 764px;
                                margin-top: 10px;
                                margin-left: 30px;
                                margin-top: 30px;
                                border-radius: 5px;
                            }

                            .personal-info-container {
                                position: relative;
                                top: 90px;
                                left: 20px;
                                width: 150px;
                                padding-top: 10px;
                            }

                            .personal-info-container h2 {
                                color: #FFF;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                                margin-left: -32px;
                                margin-top: -69px;
                                margin-bottom: 12.5px;
                                width: 214px;
                                height: 23px;
                                border-radius: 0 37px 37px 0;
                                padding-top: 13.5px;
                                padding-left: 4px;
                            }

                            .right-col-divider {
                                background-color: #1F1E68;
                                width: 423px;
                                height: 2.17px;
                                margin-top: 20px;
                                margin-bottom: 5px;
                                margin-left: -5px;
                            }

                            .personal-info-details {
                                padding: 10px 0px 0px 7px;
                                height: 39px;
                            }

                            .personal-info-details p {
                                color: #FFF;
                                font-family: Montserrat;
                                font-size: 12.19px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                                margin-left: 5px;
                            }

                            .languages-container {
                                position: relative;
                                top: 135px;
                                left: 20px;
                                width: 180px;
                                padding-top: 10px;
                            }

                            .languages-container h2 {
                                color: #FFF;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                                /* margin-top: 25px; */
                                margin-left: -32px;
                                width: 214px;
                                height: 23px;
                                border-radius: 0 37px 37px 0;
                                padding-top: 13.5px;
                                margin-bottom: 78px;
                            }

                            #languages-section{
                                margin-top: -77px;
                            }

                            .languages-details {
                                padding: 0px 0px 0px 7px;
                                height: auto;
                                margin-top: 0px;
                            }

                            .languages-details p {
                                color: #FFF;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 300;
                                /* line-height: 0px; */
                                text-transform: uppercase;
                                word-spacing: 2px;
                                height: 20px;
                                display: inline-block;
                                width: 45px;
                                margin-left: -5px;
                            }

                            .dot-div-Lan {
                                display: inline-block;
                                height: 20px;
                                margin-left: 15px;
                            }

                            .skills-container {
                                position: relative;
                                top: 135px;
                                left: 20px;
                                width: 180px;
                                padding-top: 10px;
                            }

                            .skills-container h2 {
                                color: #FFF;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                                margin-left: -32px;
                                width: 214px;
                                height: 23px;
                                border-radius: 0 37px 37px 0;
                                padding-top: 13.5px;
                                margin-top: -50px;
                                margin-bottom: 20px;
                            }

                            #skills-section {
                                margin-bottom: -17px;
                            }

                            .skills-details {
                                padding: 20px 0px 0px 7px;
                                height: auto;
                                margin-top: -39px;
                                margin-bottom: 17px;
                            }

                            .skills-details p {
                                color: #FFF;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 300;
                                height: 20px;
                                text-transform: uppercase;
                                margin-bottom: 0px;
                                word-spacing: 2px;
                                display: inline-block;
                                margin-left: -5px;
                            }

                            .dot-div {
                                display: inline-block;
                                height: 20px;
                                width: 80px;
                                margin-left: -10px;
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
                                top: 267px;
                                left: 20px;
                                width: 180px;
                                padding-top: 0px;
                            }

                            .interest-container h2 {
                                color: #FFF;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 0px;
                                text-transform: uppercase;
                                text-align: center;
                                margin-left: -32px;
                                width: 214px;
                                height: 23px;
                                border-radius: 0 37px 37px 0;
                                padding-top: 13.5px;
                                margin-top: -120px;
                                margin-bottom: 30px;
                            }

                            #interests-section{
                                margin-bottom: -17px;
                                margin-top: -36px;
                            }

                            .interest-details {
                                padding: 5px 0px 0px 7px;
                                height: auto;
                                margin-top: -6px;
                            }

                            .interest-details p {
                                color: #FFF;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 300;
                                /* line-height: 0px; */
                                text-transform: uppercase;
                                margin-bottom: 9px;
                                word-spacing: 2px;
                                height: 20px;
                                margin-left: -5px;
                                display: inline-block;
                            }

                            .dot-div-int {
                                display: inline-block;
                                height: 20px;
                                margin-left: 10px;
                            }

                            .name-container {
                                width: 100%;
                                padding: 45px 0px 15px 0px;
                                border: 3px solid #F40000;
                                margin-top: 10px;
                                margin-left: 38px;
                            }

                            .name-container h2 {
                                line-height: 5px;
                                margin-bottom: 10px;
                                margin-left: 10px;
                            }

                            .name-container h2 span {
                                color: #2D2D2D;
                                font-family: Poppins;
                                font-size: 40px;
                                font-style: normal;
                                font-weight: 900;
                                text-transform: none;
                                width: 231px;
                                height: 49px;
                                margin-bottom: 5px;
                            }

                            .name-container .profession {
                                color: #606060;
                                font-family: Poppins;
                                font-size: 20px;
                                font-style: normal;
                                font-weight: 900;
                                line-height: normal;
                                text-transform: none;
                                margin-left: 10px;
                            }

                            .objective-container {
                                width: 100%;
                                padding: 25px 30px 0px 30px;
                                margin-top: 6px;
                            }

                            .objective-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                text-align: center;
                                line-height: normal;
                                text-transform: uppercase;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-top: -20px;
                                margin-bottom: 15px;
                            }

                            .objective-container p {
                                color: black;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: 16px;
                                margin-left: 10px;
                            }

                            .experience-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .experience-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-transform: uppercase;
                                text-align: center;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-top: -15px;
                                margin-bottom: 15px;
                            }

                            .experience-details h3 {
                                color: #000;
                                font-family: Poppins;
                                font-size: 11.34px;
                                font-style: normal;
                                font-weight: 500;
                                line-height: 10px;
                                text-transform: uppercase;
                                margin-left: 10px;
                            }

                            .experience-details p {
                                color: black;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 500;
                                margin-top: 15px;
                                line-height: 16px;
                                margin-left: 10px;
                            }

                            .education-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .education-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-transform: uppercase;
                                text-align: center;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-bottom: 20px;
                                margin-top: -3px;
                            }

                            .education-details {
                                margin-bottom: 22px;
                            }

                            .education-details h3 {
                                color: #000;
                                font-family: Poppins;
                                font-size: 11.34px;
                                font-style: normal;
                                font-weight: 500;
                                line-height: 3px;
                                text-transform: uppercase;
                                margin-bottom: 17px;
                                margin-left: 10px;
                            }

                            .education-details p {
                                color: black;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                font-weight: 500;
                                margin-top: -5px;
                                line-height: 3px;
                                margin-left: 10px;
                            }

                            .achievement-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px
                            }

                            .achievement-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-transform: uppercase;
                                text-align: center;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-bottom: 15px;
                                margin-top: -15px;
                            }

                            .achievement-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .achievement-details p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 11px;
                                font-style: normal;
                                font-weight: 500;
                                margin-top: 0px;
                                line-height: 5px;
                                margin-left: 10px;
                            }

                            .project-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .project-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-transform: uppercase;
                                text-align: center;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-bottom: 10px;
                                margin-top: 5px;
                            }

                            .project-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .project-details p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 11px;
                                font-style: normal;
                                font-weight: 500;
                                margin-top: 5px;
                                line-height: 5px;
                                margin-left: 10px;
                            }

                            .reference-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .reference-container h2 {
                                color: white;
                                background-color: #F40000;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                                text-transform: uppercase;
                                text-align: center;
                                width: 422px;
                                height: 23.74px;
                                border-radius: 100px;
                                padding: 1px 13px 0px 10px;
                                margin-left: 10px;
                                margin-top: -16px;
                                margin-bottom: 8px;
                            }

                            .reference-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .reference-details div h3 {
                                color: #000;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 500;
                                line-height: normal;
                                margin-left: 10px;
                            }

                            .reference-details div p {
                                color: #000;
                                font-family: Montserrat;
                                font-size: 10.5px;
                                font-style: normal;
                                line-height: 0px;
                                margin-left: 10px;
                            }

                            .dot {
                                height: 9px;
                                width: 9px;
                                background-color: white;
                                border-radius: 50%;
                                display: inline-block;
                            }

                            .dot-grey {
                                height: 9px;
                                width: 9px;
                                background-color: grey;
                                border-radius: 50%;
                                display: inline-block;
                            }

                            .custom-col-left {
                                width: 90px;
                                padding: 0px;
                                height: 26px;
                            }

                            .custom-col-right {
                                width: 80px;
                            }
                        </style>
                        <div class="left-col">
                            <div class="name-container">
                                <h2> <span id="FName">Mike</span> <span id="LName">Williams</span> </h2>
                                <span class="profession" id="Profession">Business Consultant</span>
                            </div>
                            <div class="objective-container ">
                                <h2>Objective</h2>
                                <p id="Objective">
                                    Highly skilled and motivated web developer with a passion for creating innovative and
                                    user-friendly web applications. Seeking a challenging position to utilize my expertise in
                                    front-end and back-end technologies, as well as my problem-solving and collaboration skills,
                                    to contribute to the development user experiences.
                                </p>
                            </div>
                            <div class="education-container">
                                <h2>Education</h2>
                                <div id="educations-section">
                                    <div class="education-details">
                                        <h3 id="EducationalOrganization0">University Name or School Name</h3>
                                        <p id="Degree0">Write your degree name here</p>
                                        <p><span id="Score0">3.2 CGPA</span> <span id="CompletionDate0">2015</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-container">
                                <h2>Experience</h2>
                                <div id="experiences-section">
                                    <div class="experience-details">
                                        <h3 id="Designation0">Job Position</h3>
                                        <h3><span id="Organization0">Company Name</span> <span id="JoiningDate0">2020</span> |
                                            <span id="EndDate0">2021</span>
                                        </h3>
                                        <p id="JobDescription0">
                                            Highly skilled and motivated web developer with a passion for creating innovative
                                            and user-friendly web applications. Seeking a challenging position.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="achievement-container ">
                                <h2>Achievement</h2>
                                <div class="row achievement-section" id="achievement-section">
                                    <div class="achievement-details">
                                        <p id="AchievementTitle0">Your achivement 1</p>
                                    </div>
                                    <div class="achievement-details">
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                            </div>
                            <div class="reference-container ">
                                <h2>Reference</h2>
                                <div class="row reference-section" id="reference-section">
                                    <div class="reference-details">
                                        <div>
                                            <h3 id="ReferenceName0">Reference 1</h3>
                                            <p id="ReferenceDesignation0">Designation</p>
                                            <p id="ReferenceDescription0">Number</p>
                                        </div>
                                    </div>
                                    <div class="reference-details">
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                            </div>
                            <div class="project-container ">
                                <h2>Project</h2>
                                <div class="row project-section" id="project-section">
                                    <div class="project-details">
                                        <p id="ProjectTitle0">Your project 1</p>
                                    </div>
                                    <div class="project-details">
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-col">
                            <div class="resume-photo">
                                <img id="resume-photo" width="142px">
                            </div>
                            <div class="personal-info-container">
                                <h2> Personal Info </h2>
                                <div class="personal-info-details">
                                    <p>PHONE NO</p>
                                    <p id="Phone">+92 317 0155625</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>EMAIL</p>
                                    <p id="Email">mirza@gmail.com</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>ID CARD</p>
                                    <p id="Cnic">47605-7659127-0</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>DATE OF BIRTH</p>
                                    <p id="DOB">1990-07-01</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>GENDER</p>
                                    <p id="Gender">Male</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>MARITAL STATUS</p>
                                    <p id="MaritalStatus">Single</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>NATIONALITY</p>
                                    <p id="Nationality">Pakistan</p>
                                </div>
                                <div class="personal-info-details ">
                                    <p>ADDRESS</p>
                                    <p id="Address">Bahria, Rawalpindi</p>
                                </div>
                            </div>
                            <div class="skills-container">
                                <h2> Skills </h2>
                                <div id="skills-section">
                                    <div class="skills-details">
                                        <div class="row col-12">
                                            <div class="custom-col-left">
                                                <p id="SkillName0">Skills 1</p>
                                            </div>
                                            <div class="custom-col-right col-4">
                                                <div class="dot-div">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot-grey"></span>
                                                    <span class="dot-grey"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="languages-container">
                                <h2> Languages </h2>
                                <div id="languages-section">
                                    <div class="languages-details">
                                        <div class="row col-12">
                                            <div class="custom-col-left">
                                                <p id="Language0">Lang 1</p>
                                            </div>
                                            <div class="custom-col-right col-4">
                                                <div class="dot-div">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot-grey"></span>
                                                    <span class="dot-grey"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="interest-container">
                                <h2> Interest </h2>
                                <div id="interests-section">
                                    <div class="interest-details">
                                        <div class="row col-12">
                                            <div class="custom-col-left">
                                                <p id="Interest0">Interest 1</p>
                                            </div>
                                            <div class="custom-col-right col-4">
                                                <div class="dot-div">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot-grey"></span>
                                                    <span class="dot-grey"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    class CreateResumeForm {
                        /*
                        |--------------------------------------------------------------------------
                        | Properties
                        |--------------------------------------------------------------------------
                        */
                        static AchievementNumber;
                        static ProjectNumber;
                        static ReferenceNumber;
                        /*
                        |--------------------------------------------------------------------------
                        | Methods
                        |--------------------------------------------------------------------------
                        */
                        static renderTxt = (id, value) => document.getElementById(id).innerHTML = value;

                        static closeWarning = (id) => document.getElementById(id).classList.add('d-none');

                        static addNewExperience = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Experience > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="ExperienceForm` + ChildDivsLength + `">
                                                  <div class="row g-2 my-3">
                                                      <div class="col-12 col-md-12 col-lg-6">
                                                          <div class="form-floating">
                                                              <input type="text" class="form-control"  placeholder="Enter your organization" onkeyup="CreateResumeForm.renderTxt('Organization` + ChildDivsLength + `', this.value)">
                                                              <label >Organization</label>
                                                          </div>
                                                      </div>
                                                      <div class="col-12 col-md-12 col-lg-6">
                                                          <div class="form-floating">
                                                              <input type="text" class="form-control"  placeholder="Enter last designation" onkeyup="CreateResumeForm.renderTxt('Designation` + ChildDivsLength + `', this.value)">
                                                              <label >Designation</label>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12 my-3">
                                                      <div class="form-floating">
                                                          <textarea class="form-control" id="floatingTextarea2" placeholder="Your Job Description" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('JobDescription` + ChildDivsLength + `', this.value)"></textarea>
                                                          <label for="floatingTextarea2">Your Job Description</label>
                                                      </div>
                                                  </div>
                                                  <div class="row g-2 my-3">
                                                      <div class="col-12 col-md-12 col-lg-6">
                                                          <div class="form-floating">
                                                              <input type="date" class="form-control"  placeholder="Joining Date" onchange="CreateResumeForm.renderTxt('JoiningDate` + ChildDivsLength + `', this.value)">
                                                              <label >Joining Date</label>
                                                          </div>
                                                      </div>
                                                      <div class="col-12 col-md-12 col-lg-6">
                                                          <div class="form-floating">
                                                              <input type="date" class="form-control"  placeholder="Ending Date" onchange="CreateResumeForm.renderTxt('EndDate` + ChildDivsLength + `', this.value)">
                                                              <label >Ending Date</label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>`;

                            const NewExperience = `<div class="experience-details">
                                                  <h3 id="Designation` + ChildDivsLength + `">Job Position</h3>
                                                  <h3><span id="Organization` + ChildDivsLength + `">Company Name</span> <span id="JoiningDate` + ChildDivsLength + `">2020</span> | <span id="EndDate` + ChildDivsLength + `">2021</span></h3>
                                                  <p id="JobDescription` + ChildDivsLength + `">
                                                      Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.
                                                  </p>
                                              </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 2) {
                                document.getElementById('ExperienceFormWarning').classList.remove('d-none');
                            } else {
                                document.getElementById('panelsStayOpen-Experience').insertAdjacentHTML('beforeend', NewForm);
                                document.getElementById('experiences-section').insertAdjacentHTML('beforeend', NewExperience)
                            }
                        };

                        static addNewEducation = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Education > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="EducationForm` + ChildDivsLength + `">
                                                    <div class="col-12 my-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"  placeholder="Enter your institute" onkeyup="CreateResumeForm.renderTxt('EducationalOrganization` + ChildDivsLength + `', this.value)">
                                                            <label >Educational Institute</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 my-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"  placeholder="Enter your degree" onkeyup="CreateResumeForm.renderTxt('Degree` + ChildDivsLength + `', this.value)">
                                                            <label >Degree</label>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 my-3">
                                                        <div class="col-12 col-md-12 col-lg-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"  placeholder="Your score" onkeyup="CreateResumeForm.renderTxt('Score` + ChildDivsLength + `', this.value)">
                                                                <label >Score</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12 col-lg-6">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"  placeholder="Your completion date" onchange="CreateResumeForm.renderTxt('CompletionDate` + ChildDivsLength + `', this.value)">
                                                                <label >Completion Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;

                            const NewEducation = `<div class="education-details">
                                                    <h3 id="EducationalOrganization` + ChildDivsLength + `">University Name or School Name</h3>
                                                    <p id="Degree` + ChildDivsLength + `">Write your degree name here</p>
                                                    <p><span id="Score` + ChildDivsLength + `">3.2 CGPA</span> <span id="CompletionDate` + ChildDivsLength + `">2015</span></p>
                                                </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 2) {
                                document.getElementById('EducationFormWarning').classList.remove('d-none');
                            } else {
                                document.getElementById('panelsStayOpen-Education').insertAdjacentHTML('beforeend', NewForm);
                                document.getElementById('educations-section').insertAdjacentHTML('beforeend', NewEducation)
                            }
                        };

                        static addNewSkill = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Skills > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="SkillsForm` + ChildDivsLength + `">
                                                    <div class="row g-2 my-3">
                                                        <div class="col-12 col-md-12 col-lg-8">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"  placeholder="Your skills" onkeyup="CreateResumeForm.renderTxt('SkillName` + ChildDivsLength + `', this.value)">
                                                                <label >Enter Your Skill Title</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;

                            const NewSkill = `<div class="skills-details">
                                                <div class="row col-12">
                                                    <div class="custom-col-left">
                                                        <p id="SkillName` + ChildDivsLength + `">Skills 1</p>
                                                    </div>
                                                    <div class="custom-col-right col-4">
                                                        <div class="dot-div">
                                                            <span class="dot"></span>
                                                            <span class="dot"></span>
                                                            <span class="dot"></span>
                                                            <span class="dot"></span>
                                                            <span class="dot-grey"></span>
                                                            <span class="dot-grey"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 4) {
                                document.getElementById('SkillFormWarning').classList.remove('d-none');
                            } else {
                                document.getElementById('panelsStayOpen-Skills').insertAdjacentHTML('beforeend', NewForm);
                                document.getElementById('skills-section').insertAdjacentHTML('beforeend', NewSkill)
                            }
                        };

                        static addNewAchievement = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Achievements > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="AchievementForm` + ChildDivsLength + `">
                                            <div class="row g-2 my-3">
                                                <div class="col-12 col-md-12 col-lg-8">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control"  placeholder="Your achievements" onkeyup="CreateResumeForm.renderTxt('AchievementTitle` + ChildDivsLength + `', this.value)">
                                                        <label >Enter Your Achievement Title</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                            CreateResumeForm.AchievementNumber = ChildDivsLength + 1;
                            const NewAchievement = `<p id="AchievementTitle` + ChildDivsLength + `">Your achivement ` + CreateResumeForm.AchievementNumber + `</p>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 4) {
                                document.getElementById('AchievementFormWarning').classList.remove('d-none');
                            } else {
                                const InnerDivs = document.querySelectorAll('.achievement-container > div.achievement-section > div.achievement-details');
                                document.getElementById('panelsStayOpen-Achievements').insertAdjacentHTML('beforeend', NewForm);
                                (InnerDivs[0].children.length === 2) ? InnerDivs[1].insertAdjacentHTML('beforeend', NewAchievement): InnerDivs[0].insertAdjacentHTML('beforeend', NewAchievement);
                            }
                        };

                        static addNewProject = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Projects > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="ProjectForm` + ChildDivsLength + `">
                                                <div class="row g-2 my-3">
                                                    <div class="col-12 col-md-12 col-lg-8">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"  placeholder="Your projects" onkeyup="CreateResumeForm.renderTxt('ProjectTitle` + ChildDivsLength + `', this.value)">
                                                            <label >Enter Your Project Title</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;

                            CreateResumeForm.ProjectNumber = ChildDivsLength + 1;
                            const NewProject = `<p id="ProjectTitle` + ChildDivsLength + `">Your project ` + CreateResumeForm.ProjectNumber + `</p>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 4) {
                                document.getElementById('ProjectFormWarning').classList.remove('d-none');
                            } else {
                                const InnerDivs = document.querySelectorAll('.project-container > div.project-section > div.project-details');
                                document.getElementById('panelsStayOpen-Projects').insertAdjacentHTML('beforeend', NewForm);
                                (InnerDivs[0].children.length === 2) ? InnerDivs[1].insertAdjacentHTML('beforeend', NewProject): InnerDivs[0].insertAdjacentHTML('beforeend', NewProject);
                            }
                        };

                        static addNewInterest = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Interests > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="InterestForm` + ChildDivsLength + `">
                                                    <div class="row g-2 my-3">
                                                        <div class="col-12 col-md-12 col-lg-8">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"  placeholder="Your interests" onkeyup="CreateResumeForm.renderTxt('Interest` + ChildDivsLength + `', this.value)">
                                                                <label >Enter Your Interest</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;

                            const NewInterest = `<div class="interest-details">
                                                    <div class="row col-12">
                                                        <div class="custom-col-left">
                                                            <p id="Interest` + ChildDivsLength + `">Interest ` + ChildDivsLength + `</p>
                                                        </div>
                                                        <div class="custom-col-right col-4">
                                                            <div class="dot-div">
                                                                <span class="dot"></span>
                                                                <span class="dot"></span>
                                                                <span class="dot"></span>
                                                                <span class="dot"></span>
                                                                <span class="dot-grey"></span>
                                                                <span class="dot-grey"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 3) {
                                document.getElementById('InterestFormWarning').classList.remove('d-none');
                            } else {
                                document.getElementById('panelsStayOpen-Interests').insertAdjacentHTML('beforeend', NewForm);
                                document.getElementById('interests-section').insertAdjacentHTML('beforeend', NewInterest)
                            }
                        };

                        static addNewLanguage = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Languages > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="LanguageForm` + ChildDivsLength + `">
                                            <div class="row g-2 my-3">
                                                <div class="col-12 col-md-12 col-lg-8">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control"  placeholder="Your languages" onkeyup="CreateResumeForm.renderTxt('Language` + ChildDivsLength + `', this.value)">
                                                        <label >Your Known Language</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                            const NewLanguage = `<div class="languages-details">
                                                        <div class="row col-12">
                                                            <div class="custom-col-left">
                                                                <p id="Language` + ChildDivsLength + `">Lang ` + ChildDivsLength + `</p>
                                                            </div>
                                                            <div class="custom-col-right col-4">
                                                                <div class="dot-div">
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot"></span>
                                                                    <span class="dot-grey"></span>
                                                                    <span class="dot-grey"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 4) {
                                document.getElementById('LanguageFormWarning').classList.remove('d-none');
                            } else {
                                document.getElementById('panelsStayOpen-Languages').insertAdjacentHTML('beforeend', NewForm);
                                document.getElementById('languages-section').insertAdjacentHTML('beforeend', NewLanguage);
                            }
                        };

                        static addNewReference = () => {
                            const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-References > div.accordion-body').length;
                            const NewForm = `<div class="accordion-body" id="ReferenceForm` + ChildDivsLength + `">
                                                    <div class="row g-2 my-3">
                                                        <div class="col-12 col-md-12 col-lg-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"  placeholder="Enter reference name" onkeyup="CreateResumeForm.renderTxt('ReferenceName` + ChildDivsLength + `', this.value)">
                                                                <label >Enter Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12 col-lg-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"  placeholder="Enter reference designation" onkeyup="CreateResumeForm.renderTxt('ReferenceDesignation` + ChildDivsLength + `', this.value)">
                                                                <label >Enter Designation</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 my-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="Enter reference contact" onkeyup="CreateResumeForm.renderTxt('ReferenceDescription` + ChildDivsLength + `', this.value)">
                                                            <label for="floatingTextarea2">Reference Contact</label>
                                                        </div>
                                                    </div>
                                                </div>`;

                            CreateResumeForm.ReferenceNumber = ChildDivsLength + 1;
                            const NewReference = `<div>
                                                <h3 id="ReferenceName` + ChildDivsLength + `">Reference ` + CreateResumeForm.ReferenceNumber + `</h3>
                                                <p id="ReferenceDesignation` + ChildDivsLength + `">Designation</p>
                                                <p id="ReferenceDescription` + ChildDivsLength + `">Number</p>
                                              </div>`;

                            /*
                            |--------------------------------------------------------------------------
                            | The following code will show an error message
                            | Otherwise it will add a new form   
                            |--------------------------------------------------------------------------
                            */
                            if (ChildDivsLength === 2) {
                                document.getElementById('ReferenceFormWarning').classList.remove('d-none');
                            } else {
                                const InnerDivs = document.querySelectorAll('.reference-container > div.reference-section > div.reference-details');
                                document.getElementById('panelsStayOpen-References').insertAdjacentHTML('beforeend', NewForm);
                                InnerDivs[1].insertAdjacentHTML('beforeend', NewReference)
                            }
                        };

                        static delForm = (FormID, ResumeSectionID, InnerDiv) => {
                            const FormChildElements = document.getElementById(FormID).querySelectorAll('div.accordion-body');
                            const ResumeSectionChildElements = document.getElementById(ResumeSectionID).querySelectorAll(InnerDiv);
                            if (FormChildElements.length > 1) {
                                const FormLastChild = FormChildElements[FormChildElements.length - 1];
                                const ResumeSectionLastChild = ResumeSectionChildElements[ResumeSectionChildElements.length - 1];
                                FormLastChild.parentNode.removeChild(FormLastChild);
                                ResumeSectionLastChild.parentNode.removeChild(ResumeSectionLastChild);
                            }
                        };

                        static delFormAndTwoColumnsData = (FormID, ResumeSectionID, InnerDiv) => {
                            const FormChildElements = document.getElementById(FormID).querySelectorAll('div.accordion-body');
                            const ResumeSectionChildCols = document.getElementById(ResumeSectionID).querySelectorAll(InnerDiv);
                            if (FormChildElements.length > 1) {
                                /*
                                |--------------------------------------------------------------------------
                                | This code is for 2 columns sections of a resume template
                                | If the 2nd col have child HTML elements then we will remove its last child
                                |--------------------------------------------------------------------------
                                */
                                if (ResumeSectionChildCols[1].children.length > 0) {
                                    const SecondColLastChild = ResumeSectionChildCols[1].children[ResumeSectionChildCols[1].children.length - 1];
                                    SecondColLastChild.parentNode.removeChild(SecondColLastChild);
                                }
                                /*
                                |--------------------------------------------------------------------------
                                | Otherwise 1st col's last child will be removed
                                |--------------------------------------------------------------------------
                                */
                                else {
                                    const FirstColLastChild = ResumeSectionChildCols[0].children[ResumeSectionChildCols[0].children.length - 1];
                                    FirstColLastChild.parentNode.removeChild(FirstColLastChild);
                                }
                                const FormLastChild = FormChildElements[FormChildElements.length - 1];
                                FormLastChild.parentNode.removeChild(FormLastChild);
                            }
                        };

                        static hideShowContainer = (ContainerClass) => {
                            let Container = document.querySelector(ContainerClass);
                            (Container.classList.contains('d-none')) ? Container.classList.remove('d-none'): Container.classList.add('d-none');
                        };
                    }
                </script>
            </div>
        </div>
    </div>

</div>
