<div>
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

    {{-- <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop Your Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- BS-5 Modal -->
    <div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label">Crop Your Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
                {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div> --}}
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
                                <input type="file" accept="image/jpeg,image/png,image/webp" class="form-control image" id="inputGroupFile02">
                                {{-- <input type="file" name="image" class="image"> --}}
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
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter first name" onkeyup="CreateResumeForm.renderTxt('FName', this.value)">
                                <label for="floatingInputGrid">First Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter last name" onkeyup="CreateResumeForm.renderTxt('LName', this.value)">
                                <label for="floatingInputGrid">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Your Profession" onkeyup="CreateResumeForm.renderTxt('Profession', this.value)">
                            <label for="floatingInputGrid">Enter Your Profession</label>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Your Phone" onkeyup="CreateResumeForm.renderTxt('Phone', this.value)">
                                <label for="floatingInputGrid">Enter Your Phone</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Select Your Gender" onchange="CreateResumeForm.renderTxt('Gender', this.value)">
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
                                <select class="form-select" id="floatingSelect" aria-label="Marital Status" onchange="CreateResumeForm.renderTxt('MaritalStatus', this.value)">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                                <label for="floatingSelect">Marital Status</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-9">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="Enter Your Email" onkeyup="CreateResumeForm.renderTxt('Email', this.value)">
                                <label for="floatingInputGrid">Enter Your Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGrid" placeholder="Date Of Birth" onchange="CreateResumeForm.renderTxt('DOB', this.value)">
                                <label for="floatingInputGrid">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-9">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="CNIC" onkeyup="CreateResumeForm.renderTxt('Cnic', this.value)">
                                <label for="floatingInputGrid">CNIC xxxxx-xxxxxxx-x</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="form-floating">
                                @include('components.countries')
                                <label for="floatingSelect">Nationality</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Your Address" onkeyup="CreateResumeForm.renderTxt('Address', this.value)">
                                <label for="floatingInputGrid">Enter Your Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Describe Your Objective" id="floatingTextarea2" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('Objective', this.value)"></textarea>
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
                                    <div class="accordion-body" id="ExperienceForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your organization" onkeyup="CreateResumeForm.renderTxt('Organization0', this.value)">
                                                    <label for="floatingInputGrid">Organization</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter last designation" onkeyup="CreateResumeForm.renderTxt('Designation0', this.value)">
                                                    <label for="floatingInputGrid">Designation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="floatingTextarea2" placeholder="Your Job Description" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('JobDescription0', this.value)"></textarea>
                                                <label for="floatingTextarea2">Your Job Description</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Joining Date" onchange="CreateResumeForm.renderTxt('JoiningDate0', this.value)">
                                                    <label for="floatingInputGrid">Joining Date</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Ending Date" onchange="CreateResumeForm.renderTxt('EndDate0', this.value)">
                                                    <label for="floatingInputGrid">Ending Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add experience" onclick="CreateResumeForm.addNewExperience()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove experience" onclick="CreateResumeForm.delForm('panelsStayOpen-Experience', 'experiences-section', 'div.experience-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- ExperienceFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="ExperienceFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('ExperienceFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.EXPERIENCES_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="QualificationForm0">
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your institute" onkeyup="CreateResumeForm.renderTxt('EducationalOrganization0', this.value)">
                                                <label for="floatingInputGrid">Educational Institute</label>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your degree" onkeyup="CreateResumeForm.renderTxt('Degree0', this.value)">
                                                <label for="floatingInputGrid">Degree</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your score" onkeyup="CreateResumeForm.renderTxt('Score0', this.value)">
                                                    <label for="floatingInputGrid">Score</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Your completion date" onchange="CreateResumeForm.renderTxt('CompletionDate0', this.value)">
                                                    <label for="floatingInputGrid">Completion Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add experience" onclick="CreateResumeForm.addNewQualification()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove experience" onclick="CreateResumeForm.delForm('panelsStayOpen-Qualification', 'qualifications-section', 'div.education-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- QualificationFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="QualificationFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('QualificationFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.QUALIFICATIONS_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="SkillsForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your skills" onkeyup="CreateResumeForm.renderTxt('SkillName0', this.value)">
                                                    <label for="floatingInputGrid">Enter Your Skill Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add skill" onclick="CreateResumeForm.addNewSkill()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove skill" onclick="CreateResumeForm.delForm('panelsStayOpen-Skills', 'skills-section', 'div.skills-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- SkillFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="SkillFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('SkillFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.SKILLS_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="AchievementForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your achievements" onkeyup="CreateResumeForm.renderTxt('AchievementTitle0', this.value)">
                                                    <label for="floatingInputGrid">Enter Your Achievement Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add achievement" onclick="CreateResumeForm.addNewAchievement()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove achievement" onclick="CreateResumeForm.delFormAndTwoColumnsData('panelsStayOpen-Achievements', 'achievement-section', 'div.achievement-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- AchievementFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="AchievementFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('AchievementFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.ACHIEVEMENTS_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="ProjectForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your projects" onkeyup="CreateResumeForm.renderTxt('ProjectTitle0', this.value)">
                                                    <label for="floatingInputGrid">Enter Your Project Title</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add project" onclick="CreateResumeForm.addNewProject()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove project" onclick="CreateResumeForm.delFormAndTwoColumnsData('panelsStayOpen-Projects', 'project-section', 'div.project-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- ProjectFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="ProjectFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('ProjectFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.PROJECTS_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="InterestForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your interests" onkeyup="CreateResumeForm.renderTxt('Interest0', this.value)">
                                                    <label for="floatingInputGrid">Enter Your Interest</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add interest" onclick="CreateResumeForm.addNewInterest()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove interest" onclick="CreateResumeForm.delForm('panelsStayOpen-Interests', 'interests-section', 'div.interests-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                        {{-- InterestFormWarning Toast Msg --}}
                                        <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="InterestFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                            <div class="toast-header">
                                                <i class="bx bx-bell me-2"></i>
                                                <div class="me-auto fw-semibold">Warning</div>
                                                <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('InterestFormWarning')"></button>
                                            </div>
                                            <div class="toast-body">
                                                {{ config('messages.INTERESTS_LIMIT_REACHED') }}
                                            </div>
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
                                    <div class="accordion-body" id="LanguageForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your languages" onkeyup="CreateResumeForm.renderTxt('Language0', this.value)">
                                                    <label for="floatingInputGrid">Your Known Language</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add language" onclick="CreateResumeForm.addNewLanguage()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove language" onclick="CreateResumeForm.delForm('panelsStayOpen-Languages', 'languages-section', 'div.languages-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- LanguageFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="LanguageFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('LanguageFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.LANGUAGES_LIMIT_REACHED') }}
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
                                    <div class="accordion-body" id="ReferenceForm0">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter reference name" onkeyup="CreateResumeForm.renderTxt('ReferenceName0', this.value)">
                                                    <label for="floatingInputGrid">Enter Name</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter reference designation" onkeyup="CreateResumeForm.renderTxt('ReferenceDesignation0', this.value)">
                                                    <label for="floatingInputGrid">Enter Designation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Reference Description" id="floatingTextarea2" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('ReferenceDescription0', this.value)"></textarea>
                                                <label for="floatingTextarea2">Reference Description</label>
                                            </div>
                                        </div>
                                        <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add reference" onclick="CreateResumeForm.addNewReference()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove reference" onclick="CreateResumeForm.delFormAndTwoColumnsData('panelsStayOpen-References', 'reference-section', 'div.reference-details')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- ReferenceFormWarning Toast Msg --}}
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="ReferenceFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-semibold">Warning</div>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('ReferenceFormWarning')"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ config('messages.REFERENCES_LIMIT_REACHED') }}
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
                            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

                            .left-col {
                                background: rgb(23, 23, 214);
                                width: 200px;
                                height: 1040px;
                            }

                            .right-col {
                                background: white;
                                width: 517px;
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
                                margin: -10px 10px 0px 0px;
                            }

                            .personal-info-container h2 {
                                color: #FFF;
                                background-color: #000;
                                font-family: Poppins;
                                font-size: 13.17px;
                                font-style: normal;
                                font-weight: 400;
                                text-transform: uppercase;
                                height: 25px;
                                width: 200px;
                                margin: 30px 0px 0px -40px;
                                padding-top: 5px;
                                padding-left: 45px;
                            }

                            .left-col-divider {
                                background-color: white;
                                width: 120px;
                                height: 1.17px;
                            }

                            .right-col-divider {
                                background-color: #464646;
                                width: 452.2px;
                                height: 2px;
                            }

                            .personal-info-details {
                                padding: 25px 0px 0px 7px;
                                height: 39px;
                            }

                            .personal-info-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 12px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 1px;
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
                                background-color: #000;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                text-transform: uppercase;
                                height: 25px;
                                width: 200px;
                                margin: 0px 0px 0px -40px;
                                padding-top: 5px;
                                padding-left: 45px;
                            }

                            .skills-details {
                                padding: 20px 0px 0px 7px;
                                height: auto;
                            }

                            .skills-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 10px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                                text-transform: uppercase;
                                margin-bottom: 9px;
                            }

                            .progress-bar-container {
                                background-color: #a8a8a8;
                                border-radius: 100px;
                            }

                            .progress-bar-container .custom-progress-bar {
                                padding: 3px;
                                background-color: white;
                                border-radius: 100px;
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
                                background-color: #000;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                text-transform: uppercase;
                                height: 25px;
                                width: 200px;
                                margin: 0px 0px 0px -40px;
                                padding-top: 5px;
                                padding-left: 60px;
                            }

                            .interest-details {
                                padding: 20px 0px 0px 7px;
                                height: auto;
                            }

                            .interest-details p {
                                color: #FFF;
                                font-family: Poppins;
                                font-size: 10px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 0px;
                                text-transform: uppercase;
                                margin-bottom: 9px;
                            }

                            .name-container {
                                width: 100%;
                                padding: 40px 30px 0px 30px;
                            }

                            .name-container h2 {
                                line-height: 5px;
                                font-size: 15px;
                            }

                            .name-container h2 span {
                                color: black;
                                font-family: Poppins;
                                font-size: 30.21px;
                                font-style: normal;
                                font-weight: 700;
                                text-transform: uppercase;
                            }

                            .name-container .profession {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                width: 220px;
                                height: 22px;
                                margin-top: 20px;
                                padding-left: 20px;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                margin: 15px 0px 0px 0px;
                            }

                            .objective-container {
                                width: 100%;
                                padding: 12px 30px 0px 30px;
                            }

                            .objective-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                            }

                            .objective-container p {
                                color: black;
                                font-family: Poppins;
                                font-size: 10px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 16px;
                            }

                            .experience-container {
                                width: 100%;
                                padding: 0px 30px 0px 30px;
                            }

                            .experience-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 16px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .experience-details h3 {
                                color: #000;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: 10px;
                                text-transform: uppercase;
                            }

                            .experience-details p {
                                color: #7D818C;
                                font-family: Poppins;
                                font-size: 10px;
                                font-style: normal;
                                font-weight: 400;
                                margin-top: 10px;
                                line-height: 16px;
                                margin-bottom: 8px;
                            }

                            .education-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .education-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 15px;
                            }

                            .education-details {
                                margin-bottom: 25px;
                            }

                            .education-details h3 {
                                color: #464646;
                                font-family: Poppins;
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
                                padding: 10px 30px 0px 30px;
                            }

                            .achievement-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .achievement-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .achievement-details p {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                margin-top: 5px;
                                line-height: 5px;
                            }

                            .project-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .project-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .project-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .project-details p {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                margin-top: 5px;
                                line-height: 5px;
                            }

                            .reference-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .reference-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                            }

                            .reference-section div {
                                height: 47px;
                                width: 50%;
                            }

                            .reference-details div h3 {
                                color: #464646;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                            }

                            .reference-details div p {
                                color: #7E808B;
                                font-family: Poppins;
                                font-size: 11px;
                                font-style: normal;
                                line-height: 0px;
                            }

                            .languages-container {
                                width: 100%;
                                padding: 10px 30px 0px 30px;
                            }

                            .languages-container h2 {
                                background-color: rgb(23, 23, 214);
                                color: white;
                                font-family: Poppins;
                                font-size: 15px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: normal;
                                text-transform: uppercase;
                                border-radius: 0px;
                                width: 170px;
                                padding: 0px 3px 0px 5px;
                                margin-bottom: 10px;
                            }

                            .languages-details div {
                                height: 100px;
                                width: 50%;
                            }

                            .languages-details div p {
                                color: #7D818C;
                                font-family: Poppins;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 400;
                                margin-top: 5px;
                                line-height: 5px;
                            }

                            .dot {
                                height: 8px;
                                width: 8px;
                                background-color: rgb(23, 23, 214);
                                border-radius: 50%;
                                display: inline-block;
                            }

                            .dot-grey {
                                height: 7px;
                                width: 7px;
                                background-color: #E7E7E6;
                                border-radius: 50%;
                                display: inline-block;
                            }

                            .right-col-divider {
                                width: 450px;
                                margin: 10px 0px 0px 0px;

                            }
                        </style>
                        <div class="left-col">
                            <div class="resume-photo">
                                <img id="resume-photo" width="142px">
                            </div>
                            <div class="personal-info-container">
                                <h2> Personal Info </h2>
                                <div class="personal-info-details">
                                    <p>PHONE</p>
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

                            <div class="skills-container ">
                                <h2> Skills </h2>
                                <div id="skills-section">
                                    <div class="skills-details">
                                        <p id="SkillName0">Photoshop</p>
                                        <div class="progress-bar-container">
                                            <div class="custom-progress-bar" style="width: 85%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="interest-container ">
                                <h2> Interest </h2>
                                <div class="interest-details">
                                    <p>Gaming</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 85%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-col">
                            <div class="name-container">
                                <h2> <span id="FName">Name</span> <span id="LName">Surname</span> </h2>
                                <p class="profession" id="Profession">Your Profession</p>
                                <div class="right-col-divider"></div>
                            </div>

                            <div class="objective-container ">
                                <h2>Objective</h2>
                                <p id="Objective">
                                    Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position to utilize my expertise in front-end and back-end technologies, as well as my problem-solving and collaboration skills, to contribute to the development user experiences.
                                </p>
                            </div>
                            <div class="experience-container">
                                <h2>Work Experience</h2>
                                <div id="experiences-section">
                                    <div class="experience-details">
                                        <h3 id="Designation0">Job Position</h3>
                                        <h3><span id="Organization0">Company Name</span> <span id="JoiningDate0">2020</span> | <span id="EndDate0">2021</span></h3>
                                        <p id="JobDescription0">
                                            Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.
                                        </p>
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="education-container">
                                <h2>Education</h2>
                                <div id="qualifications-section">
                                    <div class="education-details">
                                        <h3 id="EducationalOrganization0">University Name or School Name</h3>
                                        <p id="Degree0">Write your degree name here</p>
                                        <p><span id="Score0">3.2 CGPA</span> <span id="CompletionDate0">2015</span></p>
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="achievement-container">
                                <h2>Achievement</h2>
                                <div class="row achievement-section" id="achievement-section">
                                    <div class="achievement-details">
                                        <p id="AchievementTitle0">Your achivement 1</p>
                                    </div>
                                    <div class="achievement-details">
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="project-container">
                                <h2>Project</h2>
                                <div class="row project-section" id="project-section">
                                    <div class="project-details">
                                        <p id="ProjectTitle0">Your project 1</p>
                                    </div>
                                    <div>
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="reference-container">
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
                                <div class="right-col-divider"></div>
                            </div>
                            <div class="languages-container">
                                <h2>Language</h2>
                                <div class="row languages-details">
                                    <div>
                                        <p id="Language0">Your Title
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot-grey"></span>
                                            <span class="dot-grey"></span>
                                            <span class="dot-grey"></span>
                                            <span class="dot-grey"></span>
                                        </p>
                                    </div>
                                    <div>
                                        {{-- This area is for JavaScript Baby --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fixed buttons -->
            <div class="fixed-btn-container">
                <button class="fixed-btn" title="Download as PDF or print" onclick="printDiv('resume-template-container')">
                    <i class='bx bx-cloud-download icons-size'></i>
                </button>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <script>
        // var $modal = $('#modal');
        var $modal = $('#crop-image-modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                // preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 142,
                height: 142,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);

                // console.log(url);
                // return;
                reader.onloadend = function() {
                    var base64data = reader.result;
                    // console.log(base64data);
                    // return;
                    document.getElementById('resume-photo').src = base64data;

                    var modal = document.querySelector('#crop-image-modal');
                    var modalBackdrop = document.querySelector('.modal-backdrop');

                    // Remove the 'show' class from modal and modal-backdrop
                    modal.classList.remove('show');
                    modalBackdrop.classList.remove('show');

                    cropper.destroy();
                    cropper = null;
                }
            });
        })
    </script>


</div>
