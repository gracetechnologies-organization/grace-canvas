 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
 {{-- <script src="js/scripts.js"></script> --}}
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <!-- * *                               SB Forms JS                               * *-->
 <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
 <script>
     function printDiv(id) {
         var printContents = document.getElementById(id).innerHTML;
         var originalContents = document.body.innerHTML;
         // Replace the current document's body with the content to be printed
         document.body.innerHTML = printContents;
         // Trigger the print dialog for the current window
         window.print();
         // Restore the original document content after printing is done
         document.body.innerHTML = originalContents;
     }

     class CreateResumeForm {
         /*
         |--------------------------------------------------------------------------
         | Properties
         |--------------------------------------------------------------------------
         */
         //  static ExperienceFormNumber = 1;

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
                                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your organization" onkeyup="CreateResumeForm.renderTxt('Organization` + ChildDivsLength + `', this.value)">
                                                  <label for="floatingInputGrid">Organization</label>
                                              </div>
                                          </div>
                                          <div class="col-12 col-md-12 col-lg-6">
                                              <div class="form-floating">
                                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter last designation" onkeyup="CreateResumeForm.renderTxt('Designation` + ChildDivsLength + `', this.value)">
                                                  <label for="floatingInputGrid">Designation</label>
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
                                                  <input type="date" class="form-control" id="floatingInputGrid" placeholder="Joining Date" onchange="CreateResumeForm.renderTxt('JoiningDate` + ChildDivsLength + `', this.value)">
                                                  <label for="floatingInputGrid">Joining Date</label>
                                              </div>
                                          </div>
                                          <div class="col-12 col-md-12 col-lg-6">
                                              <div class="form-floating">
                                                  <input type="date" class="form-control" id="floatingInputGrid" placeholder="Ending Date" onchange="CreateResumeForm.renderTxt('EndDate` + ChildDivsLength + `', this.value)">
                                                  <label for="floatingInputGrid">Ending Date</label>
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

         static addNewQualification = () => {
             const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Qualification > div.accordion-body').length;
             const NewForm = `<div class="accordion-body" id="QualificationForm` + ChildDivsLength + `">
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your institute" onkeyup="CreateResumeForm.renderTxt('EducationalOrganization` + ChildDivsLength + `', this.value)">
                                                <label for="floatingInputGrid">Educational Institute</label>
                                            </div>
                                        </div>
                                        <div class="col-12 my-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your degree" onkeyup="CreateResumeForm.renderTxt('Degree` + ChildDivsLength + `', this.value)">
                                                <label for="floatingInputGrid">Degree</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your score" onkeyup="CreateResumeForm.renderTxt('Score` + ChildDivsLength + `', this.value)">
                                                    <label for="floatingInputGrid">Score</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Your completion date" onchange="CreateResumeForm.renderTxt('CompletionDate` + ChildDivsLength + `', this.value)">
                                                    <label for="floatingInputGrid">Completion Date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

             const NewQualification = `<div class="education-details">
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
                 document.getElementById('QualificationFormWarning').classList.remove('d-none');
             } else {
                 document.getElementById('panelsStayOpen-Qualification').insertAdjacentHTML('beforeend', NewForm);
                 document.getElementById('qualifications-section').insertAdjacentHTML('beforeend', NewQualification)
             }
         };

         static addNewSkill = () => {
             const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Skills > div.accordion-body').length;
             const NewForm = `<div class="accordion-body" id="SkillsForm` + ChildDivsLength + `">
                                        <div class="row g-2 my-3">
                                            <div class="col-12 col-md-12 col-lg-8">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Your skills" onkeyup="CreateResumeForm.renderTxt('Skill` + ChildDivsLength + `', this.value)">
                                                    <label for="floatingInputGrid">Enter Your Skill Title</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

             const NewSkill = `<div class="skills-details">
                                <p id="Skill` + ChildDivsLength + `">Illustrator</p>
                                <div class="progress-bar-container">
                                    <div class="custom-progress-bar" style="width: 80%;"></div>
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
     }
 </script>
