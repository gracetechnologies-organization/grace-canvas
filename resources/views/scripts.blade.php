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
         static ExperienceFormNumber = 1;

         /*
         |--------------------------------------------------------------------------
         | Methods
         |--------------------------------------------------------------------------
         */
         static renderTxt = (id, value) => document.getElementById(id).innerHTML = value;

         static delForm = (id, VarHoldingFormNumb) => {
            console.log(CreateResumeForm[VarHoldingFormNumb]); return;
            document.getElementById(id).remove();

         };

         static closeWarning = (id) => document.getElementById(id).classList.add('d-none');

         static addNewExperience = () => {
             const ChildDivsLength = document.querySelectorAll('#panelsStayOpen-Experience > div.accordion-body').length;
            //  ++CreateResumeForm.ExperienceFormNumber
             const NewForm = `<div class="accordion-body" id="ExperienceForm` + ++CreateResumeForm.ExperienceFormNumber + `">
                                    <div class="row g-2 my-3">
                                        <div class="col-12 col-md-12 col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your organization" onkeyup="CreateResumeForm.renderTxt('Organization'` + ChildDivsLength + `, this.value)">
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
                                            <textarea class="form-control" id="floatingTextarea2" placeholder="Your Job Description" style="height: 120px"></textarea>
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
                                    <div class="row g-0 my-3 input-group">
                                            <button type="button" class="btn btn-secondary col-6" title="Add experience" onclick="CreateResumeForm.addNewExperience()">
                                                <i class='bx bxs-plus-circle icons-size'></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger col-6" title="Remove experience" onclick="CreateResumeForm.delForm('ExperienceForm` + CreateResumeForm.ExperienceFormNumber + `', 'ExperienceFormNumber')">
                                                <i class='bx bxs-minus-circle icons-size'></i>
                                            </button>
                                        </div>
                                </div>`;

             /*
             |--------------------------------------------------------------------------
             | The following code will show an error message
             | Otherwise it will add a new form   
             |--------------------------------------------------------------------------
             */
             //  (ChildDivsLength === 2) ? document.getElementById('ExperienceFormWarning').style.display = 'block': document.getElementById('panelsStayOpen-Experience').insertAdjacentHTML('beforeend', NewForm);
             (ChildDivsLength === 4) ? document.getElementById('ExperienceFormWarning').classList.remove('d-none'): document.getElementById('panelsStayOpen-Experience').insertAdjacentHTML('beforeend', NewForm);
         };
     }

 </script>
