<template>
    <div style="margin: 12px 12px">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
     <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

    <div>
    <button @click="downloadPDF">Download PDF</button>
  </div>

  <div   class="col-12 col-md-7 col-lg-8 ">
        <!-- Resume template design -->
  
        <div class="container contianer-customs mt-2" id="resume-template-container">
            <div  class="row custom-border" style="width:720px;">
                
                <div class="left-col">
                    <div class="resume-photo-border2">
                        <div class="resume-photo-border1">
                            <img id="resume-photo" width="142px">
                        </div>
                    </div>
                    <div class="personal-info-container">
                        <h2> Personal Info </h2>
                        <div class="left-col-divider"></div>
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
                    <div class="languages-container">
                        <h2> Languages</h2>
                        <div class="left-col-divider"></div>
                        <div id="languages-section">
                            <div class="languages-details">
                                <p id="Language0">Language</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills-container">
                        <h2> Skills</h2>
                        <div class="left-col-divider"></div>
                        <div id="skills-section">
                            <div class="skills-details">
                                <p id="SkillName0">Postman</p>
                            </div>
                        </div>
                    </div>
                    <div class="interest-container ">
                        <h2> Interest </h2>
                        <div class="left-col-divider"></div>
                        <div id="interests-section">
                            <div class="interest-details">
                                <p id="Interest0">Hiking</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-col">
                    <div class="name-container">
                        <h2> <span id="FName">Name</span> <span id="LName">Surname</span> </h2>
                        <p class="profession" id="Profession">Graphic Designer</p>
                    </div>
                    <div class="objective-container ">
                        <h2>Objective</h2>
                        <div class="right-col-divider"></div>
                        <p id="Objective">
                            Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position to utilize my expertise in front-end and back-end technologies, as well as my problem-solving and collaboration skills, to contribute to the development user experiences.
                        </p>
                    </div>
                    <div class="education-container">
                        <h2>Education</h2>
                        <div class="right-col-divider"></div>
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
                        <div class="right-col-divider"></div>
                        <div id="experiences-section">
                            <div class="experience-details">
                                <h3 id="Designation0">Job Position</h3>
                                <h3><span id="Organization0">Company Name</span> <span id="JoiningDate0">2020</span> | <span id="EndDate0">2021</span></h3>
                                <p id="JobDescription0">
                                    Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="achievement-container">
                        <h2>Achievement</h2>
                        <div class="right-col-divider"></div>
                        <div class="row achievement-section" id="achievement-section">
                            <div class="achievement-details">
                                <p id="AchievementTitle0">Your achivement 1</p>
                            </div>
                            <div class="achievement-details">
                                
                            </div>
                        </div>
                    </div>
                    <div class="reference-container">
                        <h2>Reference</h2>
                        <div class="right-col-divider"></div>
                        <div class="row reference-section" id="reference-section">
                            <div class="reference-details">
                                <div>
                                    <h3 id="ReferenceName0">Reference 1</h3>
                                    <p id="ReferenceDesignation0">Designation</p>
                                    <p id="ReferenceDescription0">Number</p>
                                </div>
                            </div>
                            <div class="reference-details">
                            
                            </div>
                        </div>
                    </div>
                    <div class="project-container">
                        <h2>Project</h2>
                        <div class="right-col-divider"></div>
                        <div class="row project-section" id="project-section">
                            <div class="project-details">
                                <p id="ProjectTitle0">Your project 1</p>
                            </div>
                            <div class="project-details">  
                            </div>
                        </div>
                    </div>
            </div>
        </div>
     </div>
</div>
    
    </div>
    
  </template>
  
  <!-- export default {} -->

  <script>
  import html2pdf from 'html2pdf.js';
  
  export default {
    methods: {
      async downloadPDF() {
        const content = document.getElementById('pdf-content'); // Replace with your content ID
        const pdfOptions = {
          margin: 10,
          filename: 'document.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };
  
        try {
          const pdf = await html2pdf().from(content).set(pdfOptions).outputPdf();
          pdf.save();
        } catch (error) {
          console.error('Error generating PDF:', error);
        }
      },
    },
  };
  </script>



  <style scoped>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800;900&display=swap');

#app {

 margin: 50px;
 
}

.custom-border {
  border: 1px solid rgb(54, 54, 54);
  }

.button {
  border-radius: 20px;
 
  
}

.left-col {
  background: #1E1E1E;
  width: 236px;
  height: 1040px;
}

.right-col {
  background: white;
  width: 480px;
  height: 1040px;
  padding: 0px;
}

.resume-photo-border1 {
  border: 10px solid black;
  background-color: #3A3A3A;
  overflow: hidden;
  width: 160px;
  height: 160px;
  margin: auto;
  position: relative;
  top: 2px;
  border-radius: 50%;
  object-fit: cover;
  z-index: 1;
}

.resume-photo-border2 {
  border: 7px solid #F0AF37;
  background-color: #3A3A3A;
  overflow: hidden;
  width: 175px;
  height: 175px;
  margin: auto;
  position: relative;
  top: 15px;
  border-radius: 50%;
  object-fit: cover;
  z-index: 1;
}

.personal-info-container {
  position: relative;
  top: 90px;
  left: 20px;
  width: 120px;
  padding-top: 10px;
  margin: -25px 10px 0px 0px;
}

.personal-info-container h2 {
  color: #F0AF37;
  background-color: none;
  font-family: Open Sans;
  font-size: 13.17px;
  font-style: normal;
  font-weight: 700;
  text-transform: uppercase;
  height: 25px;
  width: 200px;
  margin: -45px 0px 0px -35px;
  padding-top: 5px;
  padding-left: 70px;
}

.left-col-divider {
  background-color: #F0AF37;
  width: 236px;
  height: 2px;
  margin-left: -32px;
}

.right-col-divider {
  background-color: #F0AF37;
  width: 452px;
  height: 2px;
  margin: 10px 0px 10px 0px;
}

.personal-info-details {
  padding: 25px 0px 0px 7px;
  height: 39px;
}

.personal-info-details p {
  color: white;
  font-family: Poppins;
  font-size: 11.7px;
  font-style: normal;
  font-weight: 400;
  line-height: 1px;
  margin-left: 0px;
}

.skills-container {
  position: relative;
  top: 135px;
  left: 20px;
  width: 200px;
  padding-top: 10px;
  margin-top: 0px;
}

.skills-container h2 {
  color: #F0AF37;
  background-color: none;
  font-family: Open Sans;
  font-size: 13px;
  font-style: normal;
  font-weight: 700;
  text-transform: uppercase;
  height: 25px;
  width: 200px;
  margin: 0px 0px 0px -35px;
  padding-top: 5px;
  padding-left: 90px;
}

.skills-details {
  padding: 20px 0px 0px 7px;
  height: auto;
}

.skills-details p {
  color: white;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 400;
  line-height: 0px;
  text-transform: uppercase;
  margin-bottom: 2px;
  margin-left: 0px;
}

.progress-bar-container {
  background-color: #a8a8a8;
  border-radius: 100px;
  margin-left: -15px;
}

.progress-bar-container .custom-progress-bar {
  padding: 3px;
  background-color: #F0AF37;
  border-radius: 100px;
}

.interest-container {
  position: relative;
  top: 170px;
  left: 20px;
  width: 120px;
  padding-top: 10px;
  margin-top: -30px;
}

.languages-container {
  position: relative;
  top: 135px;
  left: 20px;
  width: 200px;
  padding-top: 10px;
  margin-top: -30px;
}

.languages-container h2 {
  color: #F0AF37;
  background-color: none;
  font-family: Open Sans;
  font-size: 13px;
  font-style: normal;
  font-weight: 700;
  text-transform: uppercase;
  height: 25px;
  width: 200px;
  margin: 0px 0px 0px -35px;
  padding-top: 5px;
  padding-left: 75px;
}

.languages-details {
  padding: 20px 0px 0px 7px;
  height: auto;
}

.languages-details p {
  color: white;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 400;
  line-height: 0px;
  text-transform: uppercase;
  margin-bottom: 2px;
  margin-left: 0px;
}

.dot {
  height: 7px;
  width: 7px;
  background-color: #3A3A3A;
  border-radius: 50%;
  display: inline-block;
}

.dot-grey {
  height: 7px;
  width: 7px;
  background-color: grey;
  border-radius: 50%;
  display: inline-block;
}

.interest-container {
  position: relative;
  top: 135px;
  left: 20px;
  width: 200px;
  padding-top: 10px;
  margin-top: 0px;
}

.interest-container h2 {
  color: #F0AF37;
  background-color: none;
  font-family: Open Sans;
  font-size: 13px;
  font-style: normal;
  font-weight: 700;
  text-transform: uppercase;
  height: 25px;
  width: 200px;
  margin: 0px 0px 0px -35px;
  padding-top: 5px;
  padding-left: 85px;
}

.interest-details {
  padding: 20px 0px 0px 7px;
  height: auto;
}

.interest-details p {
  color: white;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 400;
  line-height: 0px;
  text-transform: uppercase;
  margin-bottom: 2px;
  margin-left: 0px;
}

.name-container {
  width: 718px;
  height: 110px;
  padding: 25px 30px 0px 30px;
  background-color: #F0AF37;
  margin-left: -236px;
  margin-top: 50px;
  z-index: 0;
}

.name-container h2 {
  line-height: 5px;
  font-size: 15px;
  margin: 15px 0px 0px 220px;
}

.name-container h2 span {
  color: white;
  font-family: Open Sans;
  font-size: 43.51008px;
  font-style: normal;
  font-weight: 700;
}

.name-container .profession {
  background-color: #F0AF37;
  color: #1E1E1E;
  width: 320px;
  height: 22px;
  margin-top: 20px;
  padding-left: 0px;
  font-size: 26px;
  font-style: normal;
  font-family: Poppins;
  line-height: normal;
  margin: 10px 0px 0px 220px;
  font-weight: 600;
}

.objective-container {
  width: 100%;
  padding: 22px 30px 0px 30px;
}

.objective-container h2 {
  background-color: #F0AF37;
  color: #1E1E1E;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 0px;
  width: 170px;
  margin-bottom: -12px;
  margin-top: -4px;
  padding-left: 10px;
}

.objective-container p {
  color: #302E30;
  font-family: Poppins;
  font-size: 10px;
  font-style: normal;
  font-weight: 400;
  line-height: 16px;
  text-align: justify;
}

.experience-container {
  width: 100%;
  padding: 0px 30px 0px 30px;
}

.experience-container h2 {
  background-color: #F0AF37;
  color: #302E30;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  width: 170px;
  margin-bottom: -12px;
  margin-top: 10px;
  padding-left: 10px;
}

.experience-details h3 {
  color: #000;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 500;
  line-height: 10px;
  text-transform: uppercase;
}

.experience-details p {
  color: #302E30;
  font-family: Poppins;
  font-size: 11px;
  font-style: normal;
  font-weight: 400;
  margin-top: 10px;
  line-height: 16px;
  margin-bottom: 18px;
}

.education-container {
  width: 100%;
  padding: 10px 30px 0px 30px;
}

.education-container h2 {
  background-color: #F0AF37;
  color: #1E1E1E;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 0px;
  width: 170px;
  margin-top: -10px;
  margin-bottom: -12px;
  padding-left: 10px;
}

.education-details {
  margin-bottom: 20px;
}

.education-details h3 {
  color: #1E1E1E;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 500;
  line-height: 3px;
  text-transform: uppercase;
  margin-bottom: 14px;
  padding-top: 10px;
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
  margin-bottom: 15px;
}

.achievement-container h2 {
  background-color: #F0AF37;
  color: #1E1E1E;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 0px;
  width: 170px;
  margin-bottom: -12px;
  margin-top: -15px;
  padding-left: 10px;
}

.achievement-section div {
  height: 47px;
  width: 50%;
}

.achievement-details p {
  color: black;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 500;
  margin-top: 5px;
  line-height: 5px;
}

.project-container {
  width: 100%;
  padding: 10px 30px 0px 30px;
  margin-bottom: 15px;
}

.project-container h2 {
  background-color: #F0AF37;
  color: #1E1E1E;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 0px;
  width: 170px;
  margin-bottom: -12px;
  margin-top: 0px;
  padding-left: 10px;
}

.project-section div {
  height: 47px;
  width: 50%;
}

.project-details p {
  color: black;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 500;
  margin-top: 5px;
  line-height: 5px;
}

.reference-container {
  width: 100%;
  padding: 10px 30px 0px 30px;
  margin-bottom: 15px;
}

.reference-container h2 {
  background-color: #F0AF37;
  color: #1E1E1E;
  font-family: Open Sans;
  font-size: 15px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 0px;
  width: 170px;
  margin-bottom: -12px;
  margin-top: -10px;
  padding-left: 10px;
}

.reference-section div {
  height: 47px;
  width: 50%;
}

.reference-details div h3 {
  color: black;
  font-family: Poppins;
  font-size: 13px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
}

.reference-details div p {
  color: black;
  font-family: Poppins;
  font-size: 11px;
  font-style: normal;
  line-height: 0px;
}
              


</style>