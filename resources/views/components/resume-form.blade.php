<form>
    <div class="row">
        <div class="col-10 py-1 mt-1">
            <div class="input-group mt-0">
                <input type="file" accept="image/jpeg,image/png,image/webp" class="form-control image" id="upload-resume-photo">
                <label class="input-group-text" for="upload-resume-photo">Upload Pic</label>
            </div>
        </div>
        <div class="col-2 py-1 text-end">
            {{-- <button type="button" class="custom-btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" title="Settings & options">
                <i class='bx bx-cog icons-size standard-txt-color'></i>
            </button> --}}
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Enter first name" onkeyup="CreateResumeForm.renderTxt('FName', this.value)">
                <label>First Name</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Enter last name" onkeyup="CreateResumeForm.renderTxt('LName', this.value)">
                <label>Last Name</label>
            </div>
        </div>
    </div>
    <div class="col-12 my-3">
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="Enter Your Profession" onkeyup="CreateResumeForm.renderTxt('Profession', this.value)">
            <label>Enter Your Profession</label>
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-8">
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Enter Your Phone" onkeyup="CreateResumeForm.renderTxt('Phone', this.value)">
                <label>Enter Your Phone</label>
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
                <input type="email" class="form-control" placeholder="Enter Your Email" onkeyup="CreateResumeForm.renderTxt('Email', this.value)">
                <label>Enter Your Email</label>
            </div>
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-3">
            <div class="form-floating">
                <input type="date" class="form-control" placeholder="Date Of Birth" onchange="CreateResumeForm.renderTxt('DOB', this.value)">
                <label>Date Of Birth</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-9">
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="CNIC" onkeyup="CreateResumeForm.renderTxt('Cnic', this.value)">
                <label>CNIC xxxxx-xxxxxxx-x</label>
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
                <input type="text" class="form-control" placeholder="Enter Your Address" onkeyup="CreateResumeForm.renderTxt('Address', this.value)">
                <label>Enter Your Address</label>
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-experience" onchange="CreateResumeForm.hideShowContainer('.experience-container')">
                            <label class="text-muted" for="hide-experience">Hide Experience</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Enter your organization" onkeyup="CreateResumeForm.renderTxt('Organization0', this.value)">
                                    <label>Organization</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Enter last designation" onkeyup="CreateResumeForm.renderTxt('Designation0', this.value)">
                                    <label>Designation</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-2">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" placeholder="Your Job Description" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('JobDescription0', this.value)"></textarea>
                                <label for="floatingTextarea2">Your Job Description</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating custom-lg-mt-24">
                                    <input type="date" class="form-control" placeholder="Joining Date" onchange="CreateResumeForm.renderTxt('JoiningDate0', this.value)">
                                    <label>Joining Date</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="ps-2">
                                    <input type="checkbox" id="render-continue" onchange="CreateResumeForm.renderContinueTxt('EndDate0', 'EndDateInputField0','Continue')">
                                    <label class="text-muted" for="render-continue">Continue</label>
                                </div>
                                <div class="form-floating">
                                    <input type="date" id="EndDateInputField0" class="form-control" placeholder="Ending Date" onchange="CreateResumeForm.renderTxt('EndDate0', this.value)">
                                    <label>Ending Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 my-3 input-group">
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" title="Add experience" onclick="CreateResumeForm.addNewExperience()">
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-Education" aria-expanded="false" aria-controls="panelsStayOpen-Education">
                        Education
                    </button>
                </h2>
                <div id="panelsStayOpen-Education" class="accordion-collapse collapse">
                    <div class="accordion-body" id="EducationForm0">
                        <div class="my-2">
                            <input type="checkbox" id="hide-education" onchange="CreateResumeForm.hideShowContainer('.education-container')">
                            <label class="text-muted" for="hide-education">Hide Education</label>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Enter your institute" onkeyup="CreateResumeForm.renderTxt('EducationalOrganization0', this.value)">
                                <label>Educational Institute</label>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Enter your degree" onkeyup="CreateResumeForm.renderTxt('Degree0', this.value)">
                                <label>Degree</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating custom-lg-mt-24">
                                    <input type="text" class="form-control" placeholder="Your score" onkeyup="CreateResumeForm.renderTxt('Score0', this.value)">
                                    <label>Score</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="ps-2">
                                    <input type="checkbox" id="render-continue" onchange="CreateResumeForm.renderContinueTxt('CompletionDate0', 'CompletionDateInputField0','Continue')">
                                    <label class="text-muted" for="render-continue">Continue</label>
                                </div>
                                <div class="form-floating">
                                    <input type="date" id="CompletionDateInputField0" class="form-control" placeholder="Your completion date" onchange="CreateResumeForm.renderTxt('CompletionDate0', this.value)">
                                    <label>Completion Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 my-3 input-group">
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" title="Add education" onclick="CreateResumeForm.addNewEducation()">
                                <i class='bx bxs-plus-circle icons-size'></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger col-6" title="Remove education" onclick="CreateResumeForm.delForm('panelsStayOpen-Education', 'educations-section', 'div.education-details')">
                                <i class='bx bxs-minus-circle icons-size'></i>
                            </button>
                        </div>
                    </div>
                    {{-- EducationFormWarning Toast Msg --}}
                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 end-0 show toast-custom-width d-none" id="EducationFormWarning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell me-2"></i>
                            <div class="me-auto fw-semibold">Warning</div>
                            <button type="button" class="btn-close" aria-label="Close" onclick="CreateResumeForm.closeWarning('EducationFormWarning')"></button>
                        </div>
                        <div class="toast-body">
                            {{ config('messages.EDUCATIONS_LIMIT_REACHED') }}
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-skills" onchange="CreateResumeForm.hideShowContainer('.skills-container')">
                            <label class="text-muted" for="hide-skills">Hide Skills</label>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Your skills" onkeyup="CreateResumeForm.renderTxt('SkillName0', this.value)">
                                    <label>Enter Your Skill Title</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add skill" onclick="CreateResumeForm.addNewSkill()">
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-achievements" onchange="CreateResumeForm.hideShowContainer('.achievement-container')">
                            <label class="text-muted" for="hide-achievements">Hide Achievements</label>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Your achievements" onkeyup="CreateResumeForm.renderTxt('AchievementTitle0', this.value)">
                                    <label>Enter Your Achievement Title</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add achievement" onclick="CreateResumeForm.addNewAchievement()">
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-projects" onchange="CreateResumeForm.hideShowContainer('.project-container')">
                            <label class="text-muted" for="hide-projects">Hide Projects</label>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Your projects" onkeyup="CreateResumeForm.renderTxt('ProjectTitle0', this.value)">
                                    <label>Enter Your Project Title</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add project" onclick="CreateResumeForm.addNewProject()">
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-interests" onchange="CreateResumeForm.hideShowContainer('.interest-container')">
                            <label class="text-muted" for="hide-interests">Hide Interests</label>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Your interests" onkeyup="CreateResumeForm.renderTxt('Interest0', this.value)">
                                    <label>Enter Your Interest</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add interest" onclick="CreateResumeForm.addNewInterest()">
                                <i class='bx bxs-plus-circle icons-size'></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2" title="Remove interest" onclick="CreateResumeForm.delForm('panelsStayOpen-Interests', 'interests-section', 'div.interest-details')">
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-languages" onchange="CreateResumeForm.hideShowContainer('.languages-container')">
                            <label class="text-muted" for="hide-languages">Hide Languages</label>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Your languages" onkeyup="CreateResumeForm.renderTxt('Language0', this.value)">
                                    <label>Your Known Language</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2" title="Add language" onclick="CreateResumeForm.addNewLanguage()">
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
                        <div class="my-2">
                            <input type="checkbox" id="hide-references" onchange="CreateResumeForm.hideShowContainer('.reference-container')">
                            <label class="text-muted" for="hide-references">Hide References</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Enter reference name" onkeyup="CreateResumeForm.renderTxt('ReferenceName0', this.value)">
                                    <label>Enter Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Enter reference designation" onkeyup="CreateResumeForm.renderTxt('ReferenceDesignation0', this.value)">
                                    <label>Enter Designation</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Enter reference contact" onkeyup="CreateResumeForm.renderTxt('ReferenceDescription0', this.value)">
                                <label for="floatingTextarea2">Reference Contact</label>
                            </div>
                        </div>
                        <div class="row g-0 my-3 input-group">
                            <button type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" title="Add reference" onclick="CreateResumeForm.addNewReference()">
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
