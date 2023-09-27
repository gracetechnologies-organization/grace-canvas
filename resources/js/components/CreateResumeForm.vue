<template>
   <div>
<head>
    <!-- <link href="{{ asset('fonts/boxicons.css') }}" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


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
            <button class="btn btn-secondary standard-bg-color standard-border-color dropdown-toggle" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown">
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

<!-- @include('components.crop-img-modal') -->

<div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">Crop Your Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img src="" id="image" width="500px">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary standard-bg-color standard-border-color" onclick="cropImg()">Crop</button>
            </div>
        </div>
    </div>
</div>


<!-- Fixed buttons -->
<div class="fixed-btn-container">
    <!-- @include('components.print-btn') -->

    <button class="fixed-btn" title="Download as PDF or Print" onclick="printDiv('resume-template-container')">
    <i class='bx bx-cloud-download icons-size standard-txt-color'></i>
    </button>

    <!-- Test btn -->
    <button style="border: 1px solid black" class="fixed-btn" title="Download as PDF or Print"
        onclick="printDiv('resume-template-container')">
        Test PDF
    </button>
</div>

<!-- Editing form & preview section -->
<div class="container-fluid px-5 px-md-4 px-lg-5">
    <div class="row">
        <!-- Form column -->
        <div class="col-12 col-md-5 col-lg-4">
            <!-- @include('components.resume-form') -->

            <form>
    <div class="row">
        <div class="col-10 py-1 mt-1">
            <div class="input-group mt-0">
                 <!-- <input type="file" accept="image/jpeg,image/png,image/webp" class="form-control image" id="upload-resume-photo">  -->
                <input type="file" accept="image/*" @change="handleImageUpload" >
                <label class="input-group-text" for="upload-resume-photo">Upload Pic</label>
            </div>
        </div>
        <div class="col-2 py-1 text-end">
            <!-- {{-- <button type="button" class="custom-btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" title="Settings & options">
                <i class='bx bx-cog icons-size standard-txt-color'></i>
            </button> --}} -->
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="form-floating">
                <!-- <input type="text" class="form-control" placeholder="Enter first name" onkeyup="CreateResumeForm.renderTxt('FName', this.value)"> -->
                <input type="text" class="form-control" placeholder="Enter first name" v-model="formData.name">
                <label>First Name</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="form-floating">
                <!-- <input type="text" class="form-control" placeholder="Enter last name" onkeyup="CreateResumeForm.renderTxt('LName', this.value)"> -->
                <input type="text" class="form-control" placeholder="Enter last name" v-model="formData.sirname">
                <label>Last Name</label>
            </div>
        </div>
    </div>
    <div class="col-12 my-3">
        <div class="form-floating">
            <!-- <input type="text" class="form-control" placeholder="Enter Your Profession" onkeyup="CreateResumeForm.renderTxt('Profession', this.value)"> -->
            <input type="text" class="form-control" placeholder="Enter Your Profession" v-model="formData.profession">
            <label>Enter Your Profession</label>
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-8">
            <div class="form-floating">
                <!-- <input type="text" class="form-control" placeholder="Enter Your Phone" onkeyup="CreateResumeForm.renderTxt('Phone', this.value)"> -->
                <input type="text" class="form-control" placeholder="Enter Your Phone" v-model="formData.phone">
                <label>Enter Your Phone</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4">
            <div class="form-floating">
                <!-- <select class="form-select" id="floatingSelect" aria-label="Select Your Gender" onchange="CreateResumeForm.renderTxt('Gender', this.value)">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select> -->
                <select class="form-select" id="floatingSelect"  v-model="formData.selectedGenderStatus"   aria-label="Select Your Gender" @change="handleGenderStatusChange">
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
                <!-- <select class="form-select" id="floatingSelect" aria-label="Marital Status" onchange="CreateResumeForm.renderTxt('MaritalStatus', this.value)">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select > -->
                <select class="form-select" id="floatingSelect" v-model="formData.selectedMaritalStatus" aria-label="Marital Status" @change="handleMaritalStatusChange">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                </select>
                <label for="floatingSelect">Marital Status</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-9">
            <div class="form-floating">
                <!-- <input type="email" class="form-control" placeholder="Enter Your Email" onkeyup="CreateResumeForm.renderTxt('Email', this.value)"> -->
                <input type="email" class="form-control" placeholder="Enter Your Email" v-model="formData.email">
                <label>Enter Your Email</label>
            </div>
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-3">
            <div class="form-floating">
                <!-- <input type="date" class="form-control" placeholder="Date Of Birth" onchange="CreateResumeForm.renderTxt('DOB', this.value)"> -->
                <input type="date" class="form-control" placeholder="Date Of Birth" v-model="formData.dob">
                <label>Date Of Birth</label>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-9">
            <div class="form-floating">
                <!-- <input type="text" class="form-control" placeholder="CNIC" onkeyup="CreateResumeForm.renderTxt('Cnic', this.value)"> -->
                <input type="text" class="form-control" placeholder="CNIC" v-model="formData.cnic">
                <label>CNIC xxxxx-xxxxxxx-x</label>
            </div>
        </div>
    </div>
    <div class="row g-2 my-3">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="form-floating">
                <!-- @include('components.countries') -->
                <countries></countries>
                <!-- <div ref="bladeTemplateContainer"></div> -->
                <!-- <label for="floatingSelect">Nationality</label> -->
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="form-floating">
                <!-- <input type="text" class="form-control" placeholder="Enter Your Address" onkeyup="CreateResumeForm.renderTxt('Address', this.value)"> -->
                <input type="text" class="form-control" placeholder="Enter Your Address" v-model="formData.address">
                <label>Enter Your Address</label>
            </div>
        </div>
    </div>
    <div class="col-12 my-3">
        <div class="form-floating">
            <!-- <textarea class="form-control" placeholder="Describe Your Objective" id="floatingTextarea2" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('Objective', this.value)"></textarea> -->
            <textarea class="form-control" placeholder="Describe Your Objective" id="floatingTextarea2" style="height: 120px" v-model="formData.objective"></textarea>
            <label for="floatingTextarea2">Describe Your Objective</label>
        </div>
    </div>
    <!-- Toggle button to collapse/expand the form -->
    <!-- <button type="button" class="btn btn-outline-primary col-6" @click="toggleCollapseForm">
        {{ hideInputFields ? 'Expand' : 'Collapse' }}
      </button> -->

      <!-- Bootstrap accordion button -->
      <div class="col-12 my-3">
        <div class="accordion" id="AccordionPanels">
      <div class="accordion-item">
        <h2 class="accordion-header" id="accordionHeader">
          <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#formCollapse"
            aria-expanded="true"
            aria-controls="formCollapse"
          >
            Experience
          </button>
        </h2>

    <div id="formCollapse" class="accordion-collapse collapse show" aria-labelledby="accordionHeader">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewExperience"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteExperience(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(experience, index) in experiences" :key="index">
        
        <div class="accordion-body" :id="'ExperienceForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter your organization"
                  v-model="experience.organization"
                />
                <label>Organization</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter last designation"
                  v-model="experience.designation"
                />
                <label>Designation</label>
              </div>
            </div>
          </div>
          <div class="col-12 mt-3 mb-2">
            <div class="form-floating">
              <textarea
                class="form-control"
                id="floatingTextarea2"
                placeholder="Your Job Description"
                style="height: 120px"
                v-model="experience.jobDescription"
              ></textarea>
              <label for="floatingTextarea2">Your Job Description</label>
            </div>
          </div>
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="date"
                  class="form-control"
                  placeholder="Joining Date"
                  v-model="experience.joiningDate"
                />
                <label>Joining Date</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  placeholder="Ending Date"
                  v-model="experience.endDate"
                />
                <label>Ending Date</label>
              </div>
            </div>
          </div>
        </div>
         
      </div>
      
    </div>
    </div>

   
    <div class="accordion-item-education">
    <h2 class="accordion-header-education" id="accordionHeaderEducation">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Education"
      aria-expanded="false"
      aria-controls="panelsOpen-Education"
      >  
      Education
      </button>
    </h2>
    <div id="panelsOpen-Education" class="accordion-collapse collapse" aria-labelledby="accordionHeaderEducation">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewEducation"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteEducation(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(education, index) in educations" :key="index">
        
        <div class="accordion-body" :id="'EducationForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter your University Name"
                  v-model="education.university"
                />
                <label>Education Institute</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Degree"
                  v-model="education.degree"
                />
                <label>Degree</label>
              </div>
            </div>
          </div>
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="text"
                  class="form-control"
                  placeholder="Score"
                  v-model="education.score"
                />
                <label>Score</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="date"
                  class="form-control"
                  placeholder="Ending Date"
                  v-model="education.completeDate"
                />
                <label>Ending Date</label>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
   
  <div class="accordion-item-skill">

<h2 class="accordion-header-skill" id="accordionHeaderSkill">
  <button
  class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Skill"
      aria-expanded="false"
      aria-controls="panelsOpen-Skill"
  >Skills</button>
</h2>


    <div id="panelsOpen-Skill" class="accordion-collapse collapse" aria-labelledby="accordionHeaderSkill">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewSkill"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteSkill(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(skill, index) in skills" :key="index">
            
            <div class="accordion-body" :id="'SkillForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="skill.name"
                    />
                    <label>Skill Name</label>
                  </div>
                </div>
          </div>
        </div>
        </div>
</div>
<div class="accordion-item-achievement">
    <h2 class="accordion-header-achievement" id="accordionHeaderAchievement">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Achievement"
      aria-expanded="false"
      aria-controls="panelsOpen-Achievement"
      >  
      Achievement
      </button>
    </h2>

    <div id="panelsOpen-Achievement" class="accordion-collapse collapse" aria-labelledby="accordionHeaderEducation">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewAchievement"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteAchievement(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(achievement, index) in achievements" :key="index">
            
            <div class="accordion-body" :id="'AchievementForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="achievement.name"
                    />
                    <label>Achievement Name</label>
                  </div>
                </div>     
          </div>
      </div>
    </div>
</div>
   
<div class="accordion-item-project">

<h2 class="accordion-header-project" id="accordionHeaderProject">
  <button
  class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Project"
      aria-expanded="false"
      aria-controls="panelsOpen-Project"
  >Project</button>
</h2>


    <div id="panelsOpen-Project" class="accordion-collapse collapse" aria-labelledby="accordionHeaderProject">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewProject"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteProject(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(project, index) in projects" :key="index">
            
            <div class="accordion-body" :id="'ProjectForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="project.name"
                    />
                    <label>Project Name</label>
                  </div>
                </div>
          </div>
        </div>
        </div>
</div>

<div class="accordion-item-interest">
    <h2 class="accordion-header-interest" id="accordionHeaderInterest">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Interest"
      aria-expanded="false"
      aria-controls="panelsOpen-Interest"
      >  
      Interests
      </button>
    </h2>


    <div id="panelsOpen-Interest" class="accordion-collapse collapse" aria-labelledby="accordionHeaderInterest">
          <!-- Checkbox to toggle visibility of input fields -->
          <input type="checkbox" v-model="hideInputFields" />
          <label>Hide Input Fields</label>
      <div class="row g-0 my-3 input-group">
          <!-- Button to add a new input field -->
          <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewInterest"> <i class='bx bxs-plus-circle icons-size'></i></button>
          <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteInterest(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
        </div>
          <!-- Display existing input fields and render data live -->
          <div v-for="(interest, index) in interests" :key="index">
            
            <div class="accordion-body" :id="'InterestForm' + index" v-show="!hideInputFields">
              
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      v-model="interest.name"
                    />
                    <label>Interest Name</label>
                  </div>
                </div>
  
            </div> 
            
        </div>
          
    </div>
    </div>


    <div class="accordion-item">
    <h2 class="accordion-header-language" id="accordionHeaderLanguage">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Language"
      aria-expanded="false"
      aria-controls="panelsOpen-Language"
      >  
      Languages
      </button>
    </h2>

  <div id="panelsOpen-Language" class="accordion-collapse collapse" aria-labelledby="accordionHeaderRef">
        <!-- Checkbox to toggle visibility of input fields -->
        <input type="checkbox" v-model="hideInputFields" />
        <label>Hide</label>
    <div class="row g-0 my-3 input-group">
        <!-- Button to add a new input field -->
        <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewLanguage"> <i class='bx bxs-plus-circle icons-size'></i></button>
        <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteLanguage(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
      </div>
        <!-- Display existing input fields and render data live -->
        <div v-for="(language, index) in languages" :key="index">
          
          <div class="accordion-body" :id="'LanguageForm' + index" v-show="!hideInputFields">
            
              <div class="col-12 col-md-12 col-lg-6">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter name"
                    v-model="language.name"
                  />
                  <label>Language Name</label>
                </div>
              </div>          
          </div>
        </div>
      </div>  
</div>


<div class="accordion-item-ref">
    <h2 class="accordion-header-ref" id="accordionHeaderRef">
      <button
      class="accordion-button"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsOpen-Reference"
      aria-expanded="false"
      aria-controls="panelsOpen-Reference"
      >References
      </button>
    </h2>


<div id="panelsOpen-Reference" class="accordion-collapse collapse " aria-labelledby="accordionHeaderRef">
      <!-- Checkbox to toggle visibility of input fields -->
      <input type="checkbox" v-model="hideInputFields" />
      <label>Hide</label>
  <div class="row g-0 my-3 input-group">
      <!-- Button to add a new input field -->
      <button  type="button" class="btn btn-secondary standard-bg-color standard-border-color col-6" @click="addNewReference"> <i class='bx bxs-plus-circle icons-size'></i></button>
      <button  type="button" class="btn btn-outline-danger col-6"  @click="deleteReference(index)"> <i class='bx bxs-minus-circle icons-size'></i></button>
    </div>
      <!-- Display existing input fields and render data live -->
      <div v-for="(reference, index) in references" :key="index">
        
        <div class="accordion-body" :id="'ReferenceForm' + index" v-show="!hideInputFields">
          <div class="row g-2 my-3">
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter name"
                  v-model="reference.name"
                />
                <label>Reference Name</label>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter designation"
                  v-model="reference.designation"
                />
                <label>Enter Designation</label>
              </div>
            </div>
          </div>
        
            <div class="col-12 col-md-12 col-lg-6">
              <div class="form-floating custom-lg-mt-24"  >
                <input
                  type="text"
                  class="form-control"
                  placeholder="Joining Date"
                  v-model="reference.number"
                />
                <label>Enter Number</label>
              </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
    <!-- <button class="accordion-button" data-bs-toggle="collapse" aria-expanded="true">Button</button> -->
            
        </div>
        
    </div>

</form>

        </div>
        <!-- Resume template will render here -->
        <!-- {{-- @include($ResumeFile) --}} -->
        <!-- Resume template column -->
        <div class="col-12 col-md-7 col-lg-8">
            <!-- Resume template design  class="container contianer-customs mt-2 border border-danger" id="resume-template-container"        -->
            <div >
                <div class="row custom-border" style="width:720px;">
                    
                    <div class="left-col">
                        <div class="resume-photo" >
                            <phone-input></phone-input>
                             <img id="resume-photo" width="142px">
                        </div>
                        <div class="personal-info-container">
                            <h2> Personal Info </h2>
                            <div class="personal-info-details">
                                <p>PHONE</p>
                                <p id="Phone"> {{ formData.phone }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>EMAIL</p>
                                <p id="Email"> {{ formData.email }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>ID CARD</p>
                                <p id="Cnic">{{ formData.cnic }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>DATE OF BIRTH</p>
                                <p id="DOB"> {{ formData.dob }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>GENDER</p>
                                <p id="Gender">{{ formData.selectedGenderStatus }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>MARITAL STATUS</p>
                                <p id="MaritalStatus"> {{ formData.selectedMaritalStatus }} </p>
                            </div>
                            <div class="personal-info-details ">
                                <p>NATIONALITY</p>
                                <p id="Nationality">Pakistan {{ displayValue }}</p>
                            </div>
                            <div class="personal-info-details ">
                                <p>ADDRESS</p>
                                <p id="Address">{{ formData.address }}</p>
                            </div>
                        </div>

                        <div class="skills-container">
                            <h2> Skills </h2>
                            <div id="skills-section" v-for="(skill, index) in skills" :key="index">
                                <div class="skills-details" v-if="!hideInputFields">
                                    <p id="SkillName0">{{ skill.name }}</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 85%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="interest-container">
                            <h2> Interest </h2>
                            <div id="interests-section" v-for="(interest, index) in interests" :key="index">
                                <div class="interest-details" v-if="!hideInputFields">
                                    <p id="Interest0">{{ interest.name }}</p>
                                    <div class="progress-bar-container">
                                        <div class="custom-progress-bar" style="width: 85%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="name-container">
                            <h2> <span id="FName"> {{ formData.name }}</span> <span id="LName">{{ formData.sirname }}</span> </h2>
                            <p class="profession" id="Profession"> {{ formData.profession }}</p>
                            <div class="right-col-divider"></div>
                        </div>

                        <div class="objective-container ">
                            <h2>Objective</h2>
                            <p id="Objective">
                               
                                {{ formData.objective }}
                            </p>
                        </div>
                    
                        <div class="experience-container" >
                            <h2>Work Experience</h2>
                            <div id="experiences-section" v-for="(experience, index) in experiences" :key="index">
                                <div class="experience-details" v-if="!hideInputFields">
                                    <h3 id="Designation0">{{ experience.organization }}</h3>
                                    <h3><span id="Organization0">{{ experience.designation }}</span> <span
                                            id="JoiningDate0"> {{ experience.joiningDate }} </span> | <span id="EndDate0">{{ experience.endDate }}</span></h3>
                                    <p id="JobDescription0">
                                        {{ experience.jobDescription }}
                                    </p>
                                </div>
                            </div>
                            <div class="right-col-divider"></div>
                            <div v-for="(experience, index) in experiences" :key="index"></div>
                        </div>
                        <div class="education-container">
                            <h2>Education</h2>
                            <div id="educations-section" v-for="(education, index) in educations" :key="index">
                                <div class="education-details" v-if="!hideInputFields">
                                    <h3 id="EducationalOrganization0"> {{education.university }}</h3>
                                    <p id="Degree0"> {{ education.degree }}</p>
                                    <p><span id="Score0"> {{ education.score }}</span> <span id="CompletionDate0">{{ education.completeDate }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="right-col-divider"></div>
                        </div>
                        <div class="achievement-container">
                            <h2>Achievement</h2>
                            <div class="row achievement-section" id="achievement-section" v-for="(achievement, index) in achievements" :key="index">
                                <div class="achievement-details" v-if="!hideInputFields">
                                    <p id="AchievementTitle0">{{ achievement.name }}</p>
                                </div>
                                <div class="achievement-details">
                                    <!-- {{-- This area is for JavaScript Baby --}} -->
                                </div>
                            </div>
                            <div class="right-col-divider"></div>
                        </div>
                        <div class="project-container">
                            <h2>Project</h2>
                            <div class="row project-section" id="project-section" v-for="(project, index) in projects" :key="index">
                                <div class="project-details" v-if="!hideInputFields">
                                    <p id="ProjectTitle0">{{ project.name  }}</p>
                                </div>
                                <div class="project-details">
                                    <!-- {{-- This area is for JavaScript Baby --}} -->
                                </div>
                            </div>
                            <div class="right-col-divider"></div>
                        </div>
                        <div class="reference-container">
                            <h2>Reference</h2>
                            <div class="row reference-section" id="reference-section" v-for="(reference, index) in references" :key="index">
                                <div class="reference-details" v-if="!hideInputFields">
                                    <div>
                                        <h3 id="ReferenceName0">{{ reference.name }}</h3>
                                        <p id="ReferenceDesignation0">{{ reference.designation }}</p>
                                        <p id="ReferenceDescription0">{{ reference.number}}</p>
                                    </div>
                                </div>
                                <div class="reference-details">
                                    <!-- {{-- This area is for JavaScript Baby --}} -->
                                </div>
                            </div>
                            <div class="right-col-divider"></div>
                        </div>
                        <div class="languages-container">
                            <h2>Language</h2>
                            <div class="row languages-section" id="languages-section" v-for="(language, index) in languages" :key="index">
                                <div class="languages-details" v-if="!hideInputFields">
                                    <div class="row col-12">
                                        <div class="col-6">
                                            <p id="Language0">{{ language.name }}</p>
                                        </div>
                                        <div class="col-6">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot-grey"></span>
                                            <span class="dot-grey"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="languages-details">
                                    <!-- {{-- This area is for JavaScript Baby --}} -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>

</div>

<!-- <div v-if="imageUrl" >
     <img :src="imageUrl" alt="Uploaded Image">                        
</div> -->


<!-- <experience></experience>
<education></education> -->
<!-- <reference></reference> -->
</template>

<script>

import 'boxicons/css/boxicons.min.css';
// import PhoneInput from './PhoneInput.vue';
// import NewFile from './NewFile.vue';
import Countries from './Countries.vue';
// import Experience from './Experience.vue';
// import Education from './Education.vue';

//import Reference from './Reference.vue';
//import PhoneInput from '../components/PhoneInput.vue';


export default {

  props:{displayValue: String,},  

//   components: { PhoneInput },
//   components:{ NewFile},
    components: {Countries},
    // components: {Experience},
    // components: {Education},
    
   // components: {Reference},
  data() {
    return {
        experiences: [{organization: "Name",designation: "Designation",jobDescription: "Description here",joiningDate: "",endDate: "",}], // Array to store experience data
        educations: [{University:"Name",degree:"Degree",score:"3.2 CGPA", completeDate:"1990-07-01"}], // Array to store education data
        skills: [{name:"PHOTOSHOP"}], // Array to store skill data
        projects:[{name:"Project 1"}],
        achievements: [{name:"Achievement 1"}], // Array to store data
        interests: [{name:"Interest 1"}], // Array to store interest data
        languages: [{name:"Language 1"}], // Array to store experience data
        references: [{name:"Name",designation:"Designation",number:"051-9234561"}], // Array to store experience data
        hideInputFields: false, // Checkbox to hide input fields
        imageUrl: null,
        isExperienceExpanded: true,
        formData: {
        name: 'Name',
        sirname: 'Sirname',
        profession: 'Your Profession',
        phone:'+92 317 0155625',
        email: ' mirza@gmail.com ', 
        cnic: '47605-7659127-0',
        dob: '1990-07-01',
        maritalStatus: 'Single',
        address:'Bahria, Rawalpindi',
        objective:' Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position to utilize my expertise in front-end and back-end technologies, as well as my problem-solving and collaboration skills, to contribute to the development user experiences. ',
        eduInstitute:'',
       // organization:'Job Position',
       // designation:'COMPANY NAME',
        //joinDate:'2020',
       // endDate:'2022',
       // jobDes:'Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.',
        selectedMaritalStatus: 'Single',
        selectedGenderStatus:'Male',
        selectedCountryStatus:'',
        // eduInstitute: 'UNIVERSITY NAME OR SCHOOL NAME',
        //degree:'Write your degree name here',
        //score:'3.2 CGPA 2015',
       // completeDate: '1990-07-01',
        // skill:'PHOTOSHOP',
        // Achievement: 'Your Achievement 1',
        // Project:'Your Project 1',
        // Interest:'GAMING',
        // Language:'Language',
        //referenceName: 'Reference 1',
        //referenceDesignation: 'Designation',
        //referenceContact:'Number',

        
        // Add more fields here
      },
    };
  },

//   methods: {
//     handleImageUpload(event) {
//       const file = event.target.files[0];
//       if (file) {
//         const reader = new FileReader();
//         reader.onload = (e) => {
//           this.imageUrl = e.target.result;
//         };
//         reader.readAsDataURL(file);
//       }
//     }
//   },

//   methods: {
//     toggleExperience() {
//       this.isExperienceExpanded = !this.isExperienceExpanded;
//     },
//   },

//   methods: {
//     handleMaritalStatusChange() {
//       // The selected value is available in this.maritalStatus
//       console.log('Selected Marital Status:', this.selectedMaritalStatus);

//       // You can perform additional actions here if needed
//     },
//   },



  methods: {
      addNewExperience() {
        // Add a new experience object to the array with empty values
        this.experiences.push({
          organization: "Organization",
          designation: "Designation",
          jobDescription: "Job Description",
          joiningDate: "1990-07-01",
          endDate: "1990-07-01",
        });
      },
      deleteExperience(index) {
        // Delete the experience object at the specified index
        this.experiences.splice(index, 1);
      },

    //   toggleCollapseForm() {
      // Toggle the visibility of the input fields form
    //   this.hideInputFields = !this.hideInputFields;
    // },

    addNewEducation() {
        // Add a new education object to the array with empty values
        this.educations.push({
          university: "University",
          degree: "Bachlors",
          score: "3.2 CGPA",
          completeDate: "1990-07-01",
        //   endDate: "",
        });
      },
      deleteEducation(index) {
        // Delete the education object at the specified index
        this.educations.splice(index, 1);
      },

      addNewSkill() {
            // Add a new skill object to the array with empty values
            this.skills.push({
              name: "PHOTOSHOP",
      
            });
          },
        deleteSkill(index) {
        // Delete the skill object at the specified index
        this.skills.splice(index, 1);
        },

        addNewAchievement() {
        // Add a new  object to the array with empty values
        this.achievements.push({
            name: "Achievement 1",

        });
        },
        deleteAchievement(index) {
        // Delete the object at the specified index
        this.achievements.splice(index, 1);
        },

        addNewProject(index){
            this.projects.push({
                name:"Project 1",
            });
        },

        deleteProject(index){
            this.projects.splice(index,1);
        },

        addNewInterest() {
            // Add a new object to the array with empty values
            this.interests.push({
              name: "Interest 1",
       
            });
          },
          deleteInterest(index) {
            // Delete the object at the specified index
            this.interests.splice(index, 1);
          },

          addNewLanguage() {
          // Add a new  object to the array with empty values
          this.languages.push({
            name: "Language 1",
      
          });
        },
        deleteLanguage(index) {
          // Delete the object at the specified index
          this.languages.splice(index, 1);
        },

        addNewReference() {
        // Add a new reference object to the array with empty values
        this.references.push({
          name: "Name",
          designation: "Designation",
          number: "051-7171200",
       
        });
      },
      deleteExperience(index) {
        // Delete the reference object at the specified index
        this.references.splice(index, 1);
      },
    },

    
};




</script>


<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');


    .img-container {
        height: 500px;
        overflow: hidden;
    }

    .custom-border {
        border: 1px solid rgb(54, 54, 54);
    }

    .accordion-body {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }


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

    .languages-section .languages-details {
        width: 50%;
    }

    /* .languages-details div p {
color: #7D818C;
font-family: Poppins;
font-size: 13px;
font-style: normal;
font-weight: 400;
margin-top: 5px;
line-height: 5px;
} */

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
