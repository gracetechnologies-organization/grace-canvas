<template>
    <head>
        <link href="https://code.jquery.com/jquery-3.6.0.min.js" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        />
        <!-- <link href="{{ asset('fonts/boxicons.css') }}" rel="stylesheet" /> -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
    </head>

    <nav
        class="navbar navbar-expand-lg navbar-light"
        id="navbarManu"
        style="background-color: #ff6600"
    >
        <div class="container">
            <a class="navbar-brand text-light" href="https://gracecanvas.co">
                Grace Canvas
            </a>
            <button
                class="navbar-toggler text-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-supported-content"
                aria-controls="navbar-supported-content"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon text-light"></span>
            </button>
            <div
                class="mb-4 collapse navbar-collapse text-light"
                id="navbar-supported-content"
            >
                <ul class="mt-4 navbar-nav ms-auto custom-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://gracecanvas.co"
                            >Home</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="https://gracecanvas.co/templates/resume"
                            >Resume Templates</a
                        >
                    </li>

                    <!-- Check if the user is authenticated  -->
                    <!-- If the user is authenticated, display the My Account button  -->
                    <li class="nav-item custom-dropdown">
                        <a class="nav-link my-account-custom-btn" href="#">
                            <span>My Account</span>
                        </a>
                        <ul class="dropdown-content">
                            <li>
                                <a
                                    href="https://gracecanvas.co/user/dashboard/home"
                                >
                                    Dashboard
                                </a>
                                <form
                                    method="POST"
                                    action="https://gracecanvas.co/logout"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        value="Fp7kAxyF55lQ1G9lgKAUUlTE7T39pVcAKA74IBCP"
                                        autocomplete="off"
                                    />
                                    <a
                                        href="https://gracecanvas.co/logout"
                                        onclick="event.preventDefault();this.closest('form').submit();"
                                    >
                                        Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item custom-select-language">
                        <i class="bx bx-world"></i>
                        <select
                            onchange="changeLanguage(this)"
                            id="languageSelect"
                        >
                            <option value="en">English</option>
                            <option value="zh">China</option>
                            <option value="fr">France</option>
                            <option value="es">Spanish</option>
                            <option value="ur">Urdu</option>
                            <option value="de">Danish</option>
                            <option value="de">German</option>
                            <option value="id">Indonasiaon</option>
                            <option value="it">Italian</option>
                            <option value="nl">Dutch</option>
                            <option value="no">Norwagian</option>
                            <option value="pl">Polish</option>
                            <option value="pt">Portuguese</option>
                            <option value="sv">Swedish</option>
                            <option value="ru">Russion</option>
                            <option value="tr">Turkish</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="fixed-btn-container">
        <!-- <button @click="exportToPDF">Export to PDF</button> -->
        <button
            class="fixed-btn"
            @click="exportToPDF"
            title="Download as PDF or Print"
            style="color: #ff6600"
        >
            <i class="bx bx-cloud-download icons-size standard-txt-color"></i>
        </button>
        <button
            class="fixed-btn"
            onclick="saveTemplate(9,'form-and-template')"
            title="Save in your dashboard"
            style="color: #ff6600"
        >
            <i id="icon" class="bx bx-save icons-size standard-txt-color"></i>
            <div id="loader" style="display: none">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </button>
    </div>

    <div>
        <div>
            <!-- <child-component2 @imageCropped="handleImageCropped" /> -->
            <!-- chatgpt parent-comp Bind the cropped image data from the child component -->
        </div>
        <!-- Editing form & preview section -->
        <div class="container-fluid px-md-4 px-lg-5">
            <div class="row">
                <!-- Form column -->
                <div class="col-12 col-md-5 col-lg-4">
                    <!-- @include('components.resume-form') -->

                    <form>
                        <div class="row">
                            <div class="col-10 py-1 mt-1">
                                <div class="input-group mt-0">
                                    <!-- <input type="file" accept="image/jpeg,image/png,image/webp" class="form-control image" id="upload-resume-photo"> 
                 <input type="file" ref="fileInput" @change="handleImageUpload" /> -->
                                    <child-component2
                                        @imageCropped="handleImageCropped"
                                    />
                                    <label
                                        class="input-group-text"
                                        for="upload-resume-photo"
                                        >Upload Pic</label
                                    >
                                </div>
                            </div>
                            <div class="col-2 py-1 text-end">
                                <!-- {{-- <button type="button" class="custom-btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" title="Settings & options">
                <i class='bx bx-cog icons-size standard-txt-color'></i>
            </button> --}} -->
                            </div>
                        </div>
                        <div class="row g-2 my-3">
                            <div class="col-12 col-md-12 col-lg-6 col-sm-12">
                                <div class="form-floating">
                                    <!-- <input type="text" class="form-control" placeholder="Enter first name" onkeyup="CreateResumeForm.renderTxt('FName', this.value)"> -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter first name"
                                        v-model="formData.name"
                                    />
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating">
                                    <!-- <input type="text" class="form-control" placeholder="Enter last name" onkeyup="CreateResumeForm.renderTxt('LName', this.value)"> -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter last name"
                                        v-model="formData.sirname"
                                    />
                                    <label>Last Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-floating">
                                <!-- <input type="text" class="form-control" placeholder="Enter Your Profession" onkeyup="CreateResumeForm.renderTxt('Profession', this.value)"> -->
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Your Profession"
                                    v-model="formData.profession"
                                />
                                <label>Enter Your Profession</label>
                            </div>
                        </div>
                        <div class="row g-2 my-3">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <!-- <input type="text" class="form-control" placeholder="Enter Your Phone" onkeyup="CreateResumeForm.renderTxt('Phone', this.value)"> -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Your Phone"
                                        v-model="formData.phone"
                                    />
                                    <label>Enter Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="form-floating">
                                    <!-- <select class="form-select" id="floatingSelect" aria-label="Select Your Gender" onchange="CreateResumeForm.renderTxt('Gender', this.value)">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select> -->
                                    <select
                                        class="form-select"
                                        id="floatingSelect"
                                        v-model="formData.selectedGenderStatus"
                                        aria-label="Select Your Gender"
                                        @change="handleGenderStatusChange"
                                    >
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="floatingSelect"
                                        >Select Your Gender</label
                                    >
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
                                    <select
                                        class="form-select"
                                        id="floatingSelect"
                                        v-model="formData.selectedMaritalStatus"
                                        aria-label="Marital Status"
                                        @change="handleMaritalStatusChange"
                                    >
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                    </select>
                                    <label for="floatingSelect"
                                        >Marital Status</label
                                    >
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-9">
                                <div class="form-floating">
                                    <!-- <input type="email" class="form-control" placeholder="Enter Your Email" onkeyup="CreateResumeForm.renderTxt('Email', this.value)"> -->
                                    <input
                                        type="email"
                                        class="form-control"
                                        placeholder="Enter Your Email"
                                        v-model="formData.email"
                                    />
                                    <label>Enter Your Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 my-3">
                            <div class="col-12 col-md-12 col-lg-3">
                                <div class="form-floating">
                                    <!-- <input type="date" class="form-control" placeholder="Date Of Birth" onchange="CreateResumeForm.renderTxt('DOB', this.value)"> -->
                                    <input
                                        type="date"
                                        class="form-control"
                                        placeholder="Date Of Birth"
                                        v-model="formData.dob"
                                    />
                                    <label>Date Of Birth</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-9">
                                <div class="form-floating">
                                    <!-- <input type="text" class="form-control" placeholder="CNIC" onkeyup="CreateResumeForm.renderTxt('Cnic', this.value)"> -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="CNIC"
                                        v-model="formData.cnic"
                                    />
                                    <label>CNIC xxxxx-xxxxxxx-x</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 my-3">
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="form-floating">
                                   
                                    <select
                                        class="form-select"
                                        id="floatingSelect"
                                        v-model="
                                            formData.selectedNationalityStatus
                                        "
                                    >
                                        <option value="Select">Select</option>
                                        <option value="Afghanistan">
                                            Afghanistan
                                        </option>
                                        <option value="Aland Islands">
                                            Aland Islands
                                        </option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">
                                            American Samoa
                                        </option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">
                                            Anguilla
                                        </option>
                                        <option value="Antarctica">
                                            Antarctica
                                        </option>
                                        <option value="Antigua and Barbuda">
                                            Antigua and Barbuda
                                        </option>
                                        <option value="Argentina">
                                            Argentina
                                        </option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">
                                            Australia
                                        </option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">
                                            Azerbaijan
                                        </option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">
                                            Bangladesh
                                        </option>
                                        <option value="Barbados">
                                            Barbados
                                        </option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option
                                            value="Bonaire, Sint Eustatius and Saba"
                                        >
                                            Bonaire, Sint Eustatius and Saba
                                        </option>
                                        <option value="Bosnia and Herzegovina">
                                            Bosnia and Herzegovina
                                        </option>
                                        <option value="Botswana">
                                            Botswana
                                        </option>
                                        <option value="Bouvet Island">
                                            Bouvet Island
                                        </option>
                                        <option value="Brazil">Brazil</option>
                                        <option
                                            value="British Indian Ocean Territory"
                                        >
                                            British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">
                                            Brunei Darussalam
                                        </option>
                                        <option value="Bulgaria">
                                            Bulgaria
                                        </option>
                                        <option value="Burkina Faso">
                                            Burkina Faso
                                        </option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">
                                            Cambodia
                                        </option>
                                        <option value="Cameroon">
                                            Cameroon
                                        </option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">
                                            Cape Verde
                                        </option>
                                        <option value="Cayman Islands">
                                            Cayman Islands
                                        </option>
                                        <option
                                            value="Central African Republic"
                                        >
                                            Central African Republic
                                        </option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">
                                            Christmas Island
                                        </option>
                                        <option value="Cocos (Keeling) Islands">
                                            Cocos (Keeling) Islands
                                        </option>
                                        <option value="Colombia">
                                            Colombia
                                        </option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option
                                            value="Congo, Democratic Republic of the Congo"
                                        >
                                            Congo, Democratic Republic of the
                                            Congo
                                        </option>
                                        <option value="Cook Islands">
                                            Cook Islands
                                        </option>
                                        <option value="Costa Rica">
                                            Costa Rica
                                        </option>
                                        <option value="Cote D'Ivoire">
                                            Cote D'Ivoire
                                        </option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curacao">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">
                                            Czech Republic
                                        </option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">
                                            Djibouti
                                        </option>
                                        <option value="Dominica">
                                            Dominica
                                        </option>
                                        <option value="Dominican Republic">
                                            Dominican Republic
                                        </option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">
                                            El Salvador
                                        </option>
                                        <option value="Equatorial Guinea">
                                            Equatorial Guinea
                                        </option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">
                                            Ethiopia
                                        </option>
                                        <option
                                            value="Falkland Islands (Malvinas)"
                                        >
                                            Falkland Islands (Malvinas)
                                        </option>
                                        <option value="Faroe Islands">
                                            Faroe Islands
                                        </option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">
                                            French Guiana
                                        </option>
                                        <option value="French Polynesia">
                                            French Polynesia
                                        </option>
                                        <option
                                            value="French Southern Territories"
                                        >
                                            French Southern Territories
                                        </option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">
                                            Gibraltar
                                        </option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">
                                            Greenland
                                        </option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">
                                            Guadeloupe
                                        </option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">
                                            Guatemala
                                        </option>
                                        <option value="Guernsey">
                                            Guernsey
                                        </option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">
                                            Guinea-Bissau
                                        </option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option
                                            value="Heard Island and Mcdonald Islands"
                                        >
                                            Heard Island and Mcdonald Islands
                                        </option>
                                        <option
                                            value="Holy See (Vatican City State)"
                                        >
                                            Holy See (Vatican City State)
                                        </option>
                                        <option value="Honduras">
                                            Honduras
                                        </option>
                                        <option value="Hong Kong">
                                            Hong Kong
                                        </option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">
                                            Indonesia
                                        </option>
                                        <option
                                            value="Iran, Islamic Republic of"
                                        >
                                            Iran, Islamic Republic of
                                        </option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">
                                            Isle of Man
                                        </option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">
                                            Kazakhstan
                                        </option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">
                                            Kiribati
                                        </option>
                                        <option
                                            value="Korea, Democratic People's Republic of"
                                        >
                                            Korea, Democratic People's Republic
                                            of
                                        </option>
                                        <option value="Korea, Republic of">
                                            Korea, Republic of
                                        </option>
                                        <option value="Kosovo">Kosovo</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">
                                            Kyrgyzstan
                                        </option>
                                        <option
                                            value="Lao People's Democratic Republic"
                                        >
                                            Lao People's Democratic Republic
                                        </option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">
                                            Libyan Arab Jamahiriya
                                        </option>
                                        <option value="Liechtenstein">
                                            Liechtenstein
                                        </option>
                                        <option value="Lithuania">
                                            Lithuania
                                        </option>
                                        <option value="Luxembourg">
                                            Luxembourg
                                        </option>
                                        <option value="Macao">Macao</option>
                                        <option
                                            value="Macedonia, the Former Yugoslav Republic of"
                                        >
                                            Macedonia, the Former Yugoslav
                                            Republic of
                                        </option>
                                        <option value="Madagascar">
                                            Madagascar
                                        </option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">
                                            Malaysia
                                        </option>
                                        <option value="Maldives">
                                            Maldives
                                        </option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">
                                            Marshall Islands
                                        </option>
                                        <option value="Martinique">
                                            Martinique
                                        </option>
                                        <option value="Mauritania">
                                            Mauritania
                                        </option>
                                        <option value="Mauritius">
                                            Mauritius
                                        </option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option
                                            value="Micronesia, Federated States of"
                                        >
                                            Micronesia, Federated States of
                                        </option>
                                        <option value="Moldova, Republic of">
                                            Moldova, Republic of
                                        </option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">
                                            Mongolia
                                        </option>
                                        <option value="Montenegro">
                                            Montenegro
                                        </option>
                                        <option value="Montserrat">
                                            Montserrat
                                        </option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">
                                            Mozambique
                                        </option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">
                                            Netherlands
                                        </option>
                                        <option value="Netherlands Antilles">
                                            Netherlands Antilles
                                        </option>
                                        <option value="New Caledonia">
                                            New Caledonia
                                        </option>
                                        <option value="New Zealand">
                                            New Zealand
                                        </option>
                                        <option value="Nicaragua">
                                            Nicaragua
                                        </option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">
                                            Norfolk Island
                                        </option>
                                        <option
                                            value="Northern Mariana Islands"
                                        >
                                            Northern Mariana Islands
                                        </option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">
                                            Pakistan
                                        </option>
                                        <option value="Palau">Palau</option>
                                        <option
                                            value="Palestinian Territory, Occupied"
                                        >
                                            Palestinian Territory, Occupied
                                        </option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">
                                            Papua New Guinea
                                        </option>
                                        <option value="Paraguay">
                                            Paraguay
                                        </option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">
                                            Philippines
                                        </option>
                                        <option value="Pitcairn">
                                            Pitcairn
                                        </option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">
                                            Portugal
                                        </option>
                                        <option value="Puerto Rico">
                                            Puerto Rico
                                        </option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">
                                            Russian Federation
                                        </option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthelemy">
                                            Saint Barthelemy
                                        </option>
                                        <option value="Saint Helena">
                                            Saint Helena
                                        </option>
                                        <option value="Saint Kitts and Nevis">
                                            Saint Kitts and Nevis
                                        </option>
                                        <option value="Saint Lucia">
                                            Saint Lucia
                                        </option>
                                        <option value="Saint Martin">
                                            Saint Martin
                                        </option>
                                        <option
                                            value="Saint Pierre and Miquelon"
                                        >
                                            Saint Pierre and Miquelon
                                        </option>
                                        <option
                                            value="Saint Vincent and the Grenadines"
                                        >
                                            Saint Vincent and the Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">
                                            San Marino
                                        </option>
                                        <option value="Sao Tome and Principe">
                                            Sao Tome and Principe
                                        </option>
                                        <option value="Saudi Arabia">
                                            Saudi Arabia
                                        </option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Serbia and Montenegro">
                                            Serbia and Montenegro
                                        </option>
                                        <option value="Seychelles">
                                            Seychelles
                                        </option>
                                        <option value="Sierra Leone">
                                            Sierra Leone
                                        </option>
                                        <option value="Singapore">
                                            Singapore
                                        </option>
                                        <option value="Sint Maarten">
                                            Sint Maarten
                                        </option>
                                        <option value="Slovakia">
                                            Slovakia
                                        </option>
                                        <option value="Slovenia">
                                            Slovenia
                                        </option>
                                        <option value="Solomon Islands">
                                            Solomon Islands
                                        </option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">
                                            South Africa
                                        </option>
                                        <option
                                            value="South Georgia and the South Sandwich Islands"
                                        >
                                            South Georgia and the South Sandwich
                                            Islands
                                        </option>
                                        <option value="South Sudan">
                                            South Sudan
                                        </option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">
                                            Sri Lanka
                                        </option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">
                                            Suriname
                                        </option>
                                        <option value="Svalbard and Jan Mayen">
                                            Svalbard and Jan Mayen
                                        </option>
                                        <option value="Swaziland">
                                            Swaziland
                                        </option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">
                                            Switzerland
                                        </option>
                                        <option value="Syrian Arab Republic">
                                            Syrian Arab Republic
                                        </option>
                                        <option
                                            value="Taiwan, Province of China"
                                        >
                                            Taiwan, Province of China
                                        </option>
                                        <option value="Tajikistan">
                                            Tajikistan
                                        </option>
                                        <option
                                            value="Tanzania, United Republic of"
                                        >
                                            Tanzania, United Republic of
                                        </option>
                                        <option value="Thailand">
                                            Thailand
                                        </option>
                                        <option value="Timor-Leste">
                                            Timor-Leste
                                        </option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">
                                            Trinidad and Tobago
                                        </option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">
                                            Turkmenistan
                                        </option>
                                        <option
                                            value="Turks and Caicos Islands"
                                        >
                                            Turks and Caicos Islands
                                        </option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">
                                            United Arab Emirates
                                        </option>
                                        <option value="United Kingdom">
                                            United Kingdom
                                        </option>
                                        <option value="United States">
                                            United States
                                        </option>
                                        <option
                                            value="United States Minor Outlying Islands"
                                        >
                                            United States Minor Outlying Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">
                                            Uzbekistan
                                        </option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">
                                            Venezuela
                                        </option>
                                        <option value="Viet Nam">
                                            Viet Nam
                                        </option>
                                        <option value="Virgin Islands, British">
                                            Virgin Islands, British
                                        </option>
                                        <option value="Virgin Islands, U.s.">
                                            Virgin Islands, U.s.
                                        </option>
                                        <option value="Wallis and Futuna">
                                            Wallis and Futuna
                                        </option>
                                        <option value="Western Sahara">
                                            Western Sahara
                                        </option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">
                                            Zimbabwe
                                        </option>
                                    </select>
                                    <label>Nationality</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="form-floating">
                                    <!-- <input type="text" class="form-control" placeholder="Enter Your Address" onkeyup="CreateResumeForm.renderTxt('Address', this.value)"> -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Your Address"
                                        v-model="formData.address"
                                    />
                                    <label>Enter Your Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-floating">
                                <!-- <textarea class="form-control" placeholder="Describe Your Objective" id="floatingTextarea2" style="height: 120px" onkeyup="CreateResumeForm.renderTxt('Objective', this.value)"></textarea> -->
                                <textarea
                                    class="form-control"
                                    placeholder="Describe Your Objective"
                                    id="floatingTextarea2"
                                    style="height: 120px"
                                    v-model="formData.objective"
                                ></textarea>
                                <label for="floatingTextarea2"
                                    >Describe Your Objective</label
                                >
                            </div>
                        </div>

                        <!-- Bootstrap accordion button -->
                        <div class="col-12 my-3">
                            <div class="accordion" id="AccordionPanels">
                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Experience"
                                            aria-expanded="true"
                                            aria-controls="panelsOpen-Experience"
                                        >
                                            Experiences
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Experience"
                                        class="accordion-collapse collapse show"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin"
                                            type="checkbox"
                                            v-model="hideExperience"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Experience</label
                                        >

                                        <!-- Display existing input fields and render data live -->
                                        <div
                                            v-for="(
                                                experience, index
                                            ) in experiences"
                                            :key="index"
                                        >
                                            <div
                                                class="accordion-body"
                                                :id="'ExperienceForm' + index"
                                                v-show="!hideExperience"
                                            >
                                                <div class="row g-2 my-3">
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter your organization"
                                                                v-model="
                                                                    experience.organization
                                                                "
                                                            />
                                                            <label
                                                                >Organization</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter last designation"
                                                                v-model="
                                                                    experience.designation
                                                                "
                                                            />
                                                            <label
                                                                >Designation</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3 mb-2">
                                                    <div class="form-floating">
                                                        <textarea
                                                            class="form-control"
                                                            id="floatingTextarea2"
                                                            placeholder="Your Job Description"
                                                            style="
                                                                height: 120px;
                                                            "
                                                            v-model="
                                                                experience.jobDescription
                                                            "
                                                        ></textarea>
                                                        <label
                                                            for="floatingTextarea2"
                                                            >Your Job
                                                            Description</label
                                                        >
                                                    </div>
                                                </div>
                                                <div class="row g-2 my-3">
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating custom-lg-mt-24"
                                                            style="
                                                                margin-top: 25px;
                                                            "
                                                        >
                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                placeholder="Joining Date"
                                                                v-model="
                                                                    experience.joiningDate
                                                                "
                                                            />
                                                            <label
                                                                >Joining
                                                                Date</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                        style="margin-top: -8px"
                                                    >
                                                        <div class="my-2">
                                                            <input
                                                                class="mobile-responsive"
                                                                type="checkbox"
                                                                id="render-continue"
                                                                v-model="
                                                                    hideDate
                                                                "
                                                                @change="
                                                                    updateText
                                                                "
                                                            />
                                                            <label
                                                                class="text-muted"
                                                                for="render-continue"
                                                                style="
                                                                    margin-left: 5px;
                                                                "
                                                                >Continue</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                placeholder="Ending Date"
                                                                v-model="
                                                                    experience.endDate
                                                                "
                                                            />
                                                            <label
                                                                >Ending
                                                                Date</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="row g-0 my-3 p-2 input-group"
                                        >
                                            
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color col-6 add-experience"
                                                @click="addNewExperience"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger col-6 delete-experience"
                                                @click="deleteExperience(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Education"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Education"
                                        >
                                            Educations
                                        </button>
                                    </h2>
                                    <div
                                        id="panelsOpen-Education"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin"
                                            type="checkbox"
                                            v-model="hideEducation"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Education</label
                                        >

                                        <!-- Display existing input fields and render data live -->
                                        <div
                                            v-for="(
                                                education, index
                                            ) in educations"
                                            :key="index"
                                        >
                                            <div
                                                class="accordion-body"
                                                :id="'EducationForm' + index"
                                                v-show="!hideEducation"
                                            >
                                                
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter your University Name"
                                                            v-model="
                                                                education.university
                                                            "
                                                        />
                                                        <label
                                                            >Education
                                                            Institute</label
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-12 my-3">
                                                    <div class="form-floating">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Degree"
                                                            v-model="
                                                                education.degree
                                                            "
                                                        />
                                                        <label>Degree</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="row g-2 mb-3">
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating custom-lg-mt-24"
                                                            style="
                                                                margin-top: 25px;
                                                            "
                                                        >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Score"
                                                                v-model="
                                                                    education.score
                                                                "
                                                            />
                                                            <label>Score</label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                        style="margin-top: -8px"
                                                    >
                                                        <div class="my-2">
                                                            <input
                                                                type="checkbox"
                                                                id="render-continue"
                                                                v-model="
                                                                    hideDate2
                                                                "
                                                                @change="
                                                                    updateText2
                                                                "
                                                            />
                                                            <label
                                                                class="text-muted"
                                                                for="render-continue"
                                                                style="
                                                                    margin-left: 5px;
                                                                "
                                                                >Continue</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                placeholder="Ending Date"
                                                                v-model="
                                                                    education.completeDate
                                                                "
                                                            />
                                                            <label
                                                                >Ending
                                                                Date</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="row g-0 my-3 p-2 input-group"
                                        >
                                            
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color col-6 add-education"
                                                @click="addNewEducation"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger col-6 delete-education"
                                                @click="deleteEducation(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Skill"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Skill"
                                        >
                                            Skills
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Skill"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin2"
                                            type="checkbox"
                                            v-model="hideSkill"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Skill</label
                                        >

                                        <div
                                            class="row g-2 mb-3 ps-3 input-group"
                                        >
                                            <div
                                                class="col-12 col-md-12 col-lg-8"
                                            >
                                                <div class="form-floating">
                                                    <!-- Display existing input fields and render data live -->
                                                    <div
                                                        v-for="(
                                                            skill, index
                                                        ) in skills"
                                                        :key="index"
                                                    >
                                                        <div
                                                            class="accordion-body"
                                                            :id="
                                                                'SkillForm' +
                                                                index
                                                            "
                                                            v-show="!hideSkill"
                                                        >
                                                            <input
                                                                type="text"
                                                                style="
                                                                    height: 50px;
                                                                    margin-bottom: 15px;
                                                                "
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    skill.name
                                                                "
                                                            />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2 add-skill"
                                                @click="addNewSkill"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2 delete-skill"
                                                @click="deleteSkill(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                   
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Achievement"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Achievement"
                                        >
                                            Achievements
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Achievement"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin2"
                                            type="checkbox"
                                            v-model="hideAchievement"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Achievements</label
                                        >

                                        <div
                                            class="row g-2 mb-3 ps-3 input-group"
                                        >
                                            <div
                                                class="col-12 col-md-12 col-lg-8"
                                            >
                                                <div class="form-floating">
                                                    <!-- Display existing input fields and render data live -->
                                                    <div
                                                        v-for="(
                                                            achievement, index
                                                        ) in achievements"
                                                        :key="index"
                                                    >
                                                        <div
                                                            class="accordion-body"
                                                            :id="
                                                                'AchievementForm' +
                                                                index
                                                            "
                                                            v-show="
                                                                !hideAchievement
                                                            "
                                                        >
                                                            <input
                                                                type="text"
                                                                style="
                                                                    height: 50px;
                                                                    margin-bottom: 15px;
                                                                "
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    achievement.name
                                                                "
                                                            />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2 add-achievement"
                                                @click="addNewAchievement"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2 delete-achievement"
                                                @click="
                                                    deleteAchievement(index)
                                                "
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Project"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Project"
                                        >
                                            Projects
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Project"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin2"
                                            type="checkbox"
                                            v-model="hideProject"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Projects</label
                                        >

                                        <div
                                            class="row g-2 mb-3 ps-3 input-group"
                                        >
                                            <div
                                                class="col-12 col-md-12 col-lg-8"
                                            >
                                                <div class="form-floating">
                                                    <!-- Display existing input fields and render data live -->
                                                    <div
                                                        v-for="(
                                                            project, index
                                                        ) in projects"
                                                        :key="index"
                                                    >
                                                        <div
                                                            class="accordion-body"
                                                            :id="
                                                                'ProjectForm' +
                                                                index
                                                            "
                                                            v-show="
                                                                !hideProject
                                                            "
                                                        >
                                                            <input
                                                                type="text"
                                                                style="
                                                                    height: 50px;
                                                                    margin-bottom: 15px;
                                                                "
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    project.name
                                                                "
                                                            />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2 add-project"
                                                @click="addNewProject"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2 delete-project"
                                                @click="deleteProject(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Interest"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Interest"
                                        >
                                            Interests
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Interest"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin2"
                                            type="checkbox"
                                            v-model="hideInterest"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Interests</label
                                        >

                                        <div
                                            class="row g-2 mb-3 ps-3 input-group"
                                        >
                                            <div
                                                class="col-12 col-md-12 col-lg-8"
                                            >
                                                <div class="form-floating">
                                                    <!-- Display existing input fields and render data live -->
                                                    <div
                                                        v-for="(
                                                            interest, index
                                                        ) in interests"
                                                        :key="index"
                                                    >
                                                        <div
                                                            class="accordion-body"
                                                            :id="
                                                                'InterestForm' +
                                                                index
                                                            "
                                                            v-show="
                                                                !hideInterest
                                                            "
                                                        >
                                                            <input
                                                                type="text"
                                                                style="
                                                                    height: 50px;
                                                                    margin-bottom: 15px;
                                                                "
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    interest.name
                                                                "
                                                            />
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2 add-interest"
                                                @click="addNewInterest"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2 delete-interest"
                                                @click="deleteInterest(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Language"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Language"
                                        >
                                            Languages
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Language"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin2"
                                            type="checkbox"
                                            v-model="hideLanguage"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Languages</label
                                        >

                                        <div
                                            class="row g-2 mb-3 ps-3 input-group"
                                        >
                                            <div
                                                class="col-12 col-md-12 col-lg-8"
                                            >
                                                <div class="form-floating">
                                                    <!-- Display existing input fields and render data live -->
                                                    <div
                                                        v-for="(
                                                            language, index
                                                        ) in languages"
                                                        :key="index"
                                                    >
                                                        <div
                                                            class="accordion-body"
                                                            :id="
                                                                'LanguageForm' +
                                                                index
                                                            "
                                                            v-show="
                                                                !hideLanguage
                                                            "
                                                        >
                                                            <input
                                                                type="text"
                                                                style="
                                                                    height: 50px;
                                                                    margin-bottom: 15px;
                                                                "
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    language.name
                                                                "
                                                            />
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color custom-r-border-radius-0 col-6 col-md-6 col-lg-2 add-language"
                                                @click="addNewLanguage"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger custom-l-border-radius-0 col-6 col-md-6 col-lg-2 delete-language"
                                                @click="deleteLanguage(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2
                                        class="accordion-header"
                                        id="accordionHeader"
                                    >
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#panelsOpen-Reference"
                                            aria-expanded="false"
                                            aria-controls="panelsOpen-Reference"
                                        >
                                            References
                                        </button>
                                    </h2>

                                    <div
                                        id="panelsOpen-Reference"
                                        class="accordion-collapse collapse"
                                    >
                                        <!-- Checkbox to toggle visibility of input fields -->
                                        <input
                                            class="checkbox-margin"
                                            type="checkbox"
                                            v-model="hideReference"
                                        />
                                        <label class="checkbox-text"
                                            >Hide Reference</label
                                        >

                                        <!-- Display existing input fields and render data live -->
                                        <div
                                            v-for="(
                                                reference, index
                                            ) in references"
                                            :key="index"
                                        >
                                            <div
                                                class="accordion-body"
                                                :id="'ReferenceForm' + index"
                                                v-show="!hideReference"
                                            >
                                                <div class="row g-2 my-3">
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter name"
                                                                v-model="
                                                                    reference.name
                                                                "
                                                            />
                                                            <label
                                                                >Reference
                                                                Name</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-md-12 col-lg-6"
                                                    >
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter designation"
                                                                v-model="
                                                                    reference.designation
                                                                "
                                                            />
                                                            <label
                                                                >Enter
                                                                Designation</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 my-3">
                                                    <div class="form-floating">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Joining Date"
                                                            v-model="
                                                                reference.number
                                                            "
                                                        />
                                                        <label
                                                            >Enter Number</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="row g-0 my-3 p-2 input-group"
                                        >
                                            <!-- Button to add a new input field -->
                                            <button
                                                type="button"
                                                class="btn btn-secondary standard-bg-color standard-border-color col-6 add-reference"
                                                @click="addNewReference"
                                            >
                                                <i
                                                    class="bx bxs-plus-circle icons-size"
                                                ></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-danger col-6 delete-reference"
                                                @click="deleteReference(index)"
                                            >
                                                <i
                                                    class="bx bxs-minus-circle icons-size"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Resume template will render here -->
                
                <!-- Resume template column -->
                <div class="col-12 col-md-7 col-lg-8" style="overflow: scroll">
                    <!-- Resume template design  class="container contianer-customs mt-2 border border-danger" id="resume-template-container"        -->
                    <div class="custom-border" style="width: 720px" >
                        <div ref="scrollContainer"
                            class="row content"
                            style="width: 720px border: 1px solid black"
                            id="element-to-convert"
                        >
                            <div class="left-col">
                                <div class="resume-photo">
                                    <div class="image-container">
                                        <!-- 
                            <img :src="cropImg" style="width: 142px; height: 142px; border: 1px solid gray" alt="Cropped Image" id="cropped" /> -->
                                        <div v-if="croppedImage">
                                            <img
                                                :src="croppedImage"
                                                style="
                                                    width: 142px;
                                                    height: 142px;
                                                    border: 1px solid gray;
                                                "
                                                alt="Cropped Image in Parent"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="personal-info-container">
                                    <h2>Personal Info</h2>
                                    <div class="personal-info-details">
                                        <p>PHONE</p>
                                        <p id="Phone">{{ formData.phone }}</p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>EMAIL</p>
                                        <p id="Email">{{ formData.email }}</p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>ID CARD</p>
                                        <p id="Cnic">{{ formData.cnic }}</p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>DATE OF BIRTH</p>
                                        <p id="DOB">{{ formData.dob }}</p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>GENDER</p>
                                        <p id="Gender">
                                            {{ formData.selectedGenderStatus }}
                                        </p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>MARITAL STATUS</p>
                                        <p id="MaritalStatus">
                                            {{ formData.selectedMaritalStatus }}
                                        </p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>NATIONALITY</p>
                                        <p id="Nationality">
                                            {{
                                                formData.selectedNationalityStatus
                                            }}
                                        </p>
                                    </div>
                                    <div class="personal-info-details">
                                        <p>ADDRESS</p>
                                        <p id="Address">
                                            {{ formData.address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="skills-container"  v-if="!hideSkill">
                                    <h2>Skills</h2>
                                    <div
                                        id="skills-section"
                                        v-for="(skill, index) in skills"
                                        :key="index"
                                    >
                                        <div
                                            class="skills-details"
                                           
                                        >
                                            <p id="SkillName0">
                                                {{ skill.name }}
                                            </p>
                                            <div class="progress-bar-container">
                                                <div
                                                    class="custom-progress-bar"
                                                    style="width: 85%"
                                                ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="interest-container" v-if="!hideInterest">
                                    <h2>Interest</h2>
                                    <div
                                        id="interests-section"
                                        v-for="(interest, index) in interests"
                                        :key="index"
                                    >
                                        <div
                                            class="interest-details"
                                            
                                        >
                                            <p id="Interest0">
                                                {{ interest.name }}
                                            </p>
                                            <div class="progress-bar-container">
                                                <div
                                                    class="custom-progress-bar"
                                                    style="width: 85%"
                                                ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-col">
                                <div class="name-container">
                                    <h2>
                                        <span id="FName">
                                            {{ formData.name }}</span
                                        >
                                        <span id="LName">{{
                                            formData.sirname
                                        }}</span>
                                    </h2>
                                    <p class="profession" id="Profession">
                                        {{ formData.profession }}
                                    </p>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="objective-container">
                                    <h2>Objective</h2>
                                    <p id="Objective">
                                        {{ formData.objective }}
                                    </p>
                                </div>
                                <div class="experience-container" v-if="!hideExperience">
                                    <h2>Work Experience</h2>
                                    <div
                                        id="experiences-section"
                                        v-for="(
                                            experience, index
                                        ) in experiences"
                                        :key="index"
                                    >
                                        <div
                                            class="experience-details"
                                            
                                        >
                                            <h3 id="Designation0">
                                              {{ experience.designation }}
                                                                                               
                                            </h3>
                                            <h3>
                                                <span id="Organization0"> {{ experience.organization }}</span>
                                                <span id="JoiningDate0">
                                                    {{ experience.joiningDate }}
                                                </span>
                                                |
                                                <span
                                                    id="EndDate0"
                                                    v-if="!hideDate"
                                                    >{{
                                                        experience.endDate
                                                    }}</span
                                                >
                                                <span>{{ displayText }}</span>
                                            </h3>
                                            <p id="JobDescription0">
                                                {{ experience.jobDescription }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="education-container" v-if="!hideEducation">
                                    <h2>Education</h2>
                                    <div
                                        id="educations-section"
                                        v-for="(education, index) in educations"
                                        :key="index"
                                    >
                                        <div
                                            class="education-details"
                                            
                                        >
                                            <h3 id="EducationalOrganization0">
                                                {{ education.university }}
                                            </h3>
                                            <p id="Degree0">
                                                {{ education.degree }}
                                            </p>
                                            <p>
                                                <span id="Score0">
                                                    {{ education.score }}</span
                                                >
                                                <span
                                                    v-if="!hideDate2"
                                                    id="CompletionDate0"
                                                    >{{
                                                        education.completeDate
                                                    }}</span
                                                >
                                                <span>{{ displayText2 }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="achievement-container"  v-if="!hideAchievement">
                                    <h2>Achievement</h2>
                                    <div
                                        class="row achievement-section"
                                        id="achievement-section"
                                        v-for="(
                                            achievement, index
                                        ) in achievements"
                                        :key="index"
                                        style="display: inline-block"
                                    >
                                        <div
                                            class="achievement-details"
                                           
                                        >
                                            <p id="AchievementTitle0">
                                                {{ achievement.name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="project-container">
                                    <h2>Project</h2>
                                    <div
                                        class="row project-section"
                                        id="project-section"
                                        v-for="(project, index) in projects"
                                        :key="index"
                                        style="display: inline-block"
                                    >
                                        <div
                                            class="project-details"
                                            v-if="!hideProject"
                                        >
                                            <p id="ProjectTitle0">
                                                {{ project.name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="reference-container"  v-if="!hideReference">
                                    <h2>Reference</h2>
                                    <div
                                        class="row reference-section"
                                        id="reference-section"
                                        v-for="(reference, index) in references"
                                        :key="index"
                                        style="display: inline-block"
                                    >
                                        <div
                                            class="reference-details"
                                           
                                        >
                                            <div>
                                                <h3 id="ReferenceName0">
                                                    {{ reference.name }}
                                                </h3>
                                                <p id="ReferenceDesignation0">
                                                    {{ reference.designation }}
                                                </p>
                                                <p id="ReferenceDescription0">
                                                    {{ reference.number }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-col-divider"></div>
                                </div>
                                <div class="languages-container"  v-if="!hideLanguage">
                                    <h2>Language</h2>
                                    <div
                                        class="row languages-section"
                                        id="languages-section"
                                        v-for="(language, index) in languages"
                                        :key="index"
                                        style="
                                            display: inline-block;
                                            width: 250px;
                                        "
                                    >
                                        <div
                                            class="languages-details"
                                           
                                        >
                                            <div class="row col-12">
                                                <div class="col-6">
                                                    <p id="Language0">
                                                        {{ language.name }}
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span
                                                        class="dot-grey"
                                                    ></span>
                                                    <span
                                                        class="dot-grey"
                                                    ></span>
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
        </div>
    </div>

</template>

<script>

import ChildComponent2 from "./ChildComponent2.vue"; // Import the child component
import html2pdf from "html2pdf.js";

export default {
    name: "app",
    components: {
        ChildComponent2,
    },

    data() {
        return {
            currentPage: 1,
            maxDivHeight: 1042,
            croppedImage: "", // Store the cropped image data here
            receivedImageId: null,
            imgSrc: "",
            // cropImg: '',
            isModalVisible: false,
            isChecked: false, // Initial checkbox state
            displayText: "",
            displayText2: "",
            showModal: false,
            isModalOpen: false,
            selectedImage: "", // Store the selected image data
      
            experiences: [
                {
                    organization: "Organization",
                    designation: "Designation",
                    jobDescription: "Description here",
                    joiningDate: "2018",
                    endDate: "2021",
                },
            ], // Array to store experience data
            educations: [
                {
                    university: "Name",
                    degree: "Degree",
                    score: "3.2 CGPA",
                    completeDate: "1990-07-01",
                },
            ], // Array to store education data
            skills: [{ name: "PHOTOSHOP" }], // Array to store skill data
            projects: [{ name: "Project 1" }],
            achievements: [{ name: "Achievement 1" }], // Array to store data
            interests: [{ name: "Interest 1" }], // Array to store interest data
            languages: [{ name: "Language 1" }], // Array to store experience data
            references: [
                {
                    name: "Name",
                    designation: "Designation",
                    number: "051-9234561",
                },
            ], // Array to store experience data
            hideInputFields: false, // Checkbox to hide input fields
            hideExperience: false,
            hideEducation: false,
            hideSkill: false,
            hideLanguage: false,
            hideProject: false,
            hideReference: false,
            hideInterest: false,
            hideAchievement: false,
            hideDate: false,
            hideDate2: false,
            isExperienceExpanded: true,
            formData: {
                name: "Name",
                sirname: "Sirname",
                profession: "Your Profession",
                phone: "+92 317 0155625",
                email: " mirza@gmail.com ",
                cnic: "47605-7659127-0",
                dob: "1990-07-01",
                maritalStatus: "Single",
                address: "Bahria, Rawalpindi",
                objective:
                    " Highly skilled and motivated web developer with a passion for creating innovative and user-friendly web applications. Seeking a challenging position to utilize my expertise in front-end and back-end technologies, as well as my problem-solving and collaboration skills, to contribute to the development user experiences. ",
                eduInstitute: "",
                selectedMaritalStatus: "Single",
                selectedGenderStatus: "Male",
                selectedNationalityStatus: "Select",

            },
        };
    },

    methods: {

        checkScrollPosition() {
        const scrollContainer = this.$refs.scrollContainer;
        if (scrollContainer) {
          const scrollTop = scrollContainer.scrollTop;
          const scrollHeight = scrollContainer.scrollHeight;
          const clientHeight = scrollContainer.clientHeight;
          
          if (scrollTop + clientHeight >= scrollHeight - 10) {
            // User has reached the bottom of the div, add a new page
            this.currentPage++;
            // window.print();
          }
        }
      },

        exportToPDF() {
            var element = document.getElementById("element-to-convert");
            var opt = {
                margin: 0,
                // margin: [0.2, 0.3, 0.3, 0.3],
                filename: "myfile.pdf",
                image: { type: "jpeg", quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: "in", format: "a4", orientation: "portrait" },
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();

        },

        // Handle the event emitted by the child component
        handleImageCropped(croppedImageData) {
            this.croppedImage = croppedImageData;
        },

        handleImageId(imageId) {
            // This method is called when the child component emits the event
            this.receivedImageId = imageId;
        },

        updateText() {
            // Update the text based on the checkbox state
            this.displayText = this.hideDate ? "Continue" : "";
        },

        updateText2() {
            // Update the text based on the checkbox state
            this.displayText2 = this.hideDate2 ? "Continue" : "";
        },

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

        deleteExperience: function () {
            // Use the pop() method to remove the last element from the array
            this.experiences.pop();
        },

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
        deleteEducation: function () {
            // Use the pop() method to remove the last element from the array
            this.educations.pop();
        },
        addNewSkill() {
            // Add a new skill object to the array with empty values
            this.skills.push({
                name: "PHOTOSHOP",
            });
        },
        deleteSkill: function () {
            // Use the pop() method to remove the last element from the array
            this.skills.pop();
        },

        addNewAchievement() {
            // Add a new  object to the array with empty values
            this.achievements.push({
                name: "Achievement 1",
            });
        },
        deleteAchievement: function () {
            // Use the pop() method to remove the last element from the array
            this.achievements.pop();
        },

        addNewProject(index) {
            this.projects.push({
                name: "Project 1",
            });
        },

        deleteProject: function () {
            // Use the pop() method to remove the last element from the array
            this.projects.pop();
        },

        addNewInterest() {
            // Add a new object to the array with empty values
            this.interests.push({
                name: "Interest 1",
            });
        },
        deleteInterest: function () {
            // Use the pop() method to remove the last element from the array
            this.interests.pop();
        },

        addNewLanguage() {
            // Add a new  object to the array with empty values
            this.languages.push({
                name: "Language 1",
            });
        },

        deleteLanguage: function () {
            // Use the pop() method to remove the last element from the array
            this.languages.pop();
        },

        addNewReference() {
            // Add a new reference object to the array with empty values
            this.references.push({
                name: "Name",
                designation: "Designation",
                number: "051-7171200",
            });
        },

        deleteReference: function () {
            // Use the pop() method to remove the last element from the array
            this.references.pop();
        },
    },

    mounted() {
      // Attach the scroll event listener
      const scrollContainer = this.$refs.scrollContainer;
      if (scrollContainer) {
        scrollContainer.addEventListener("scroll", this.checkScrollPosition);
      }
    },
    beforeDestroy() {
      // Remove the scroll event listener when the component is destroyed
      const scrollContainer = this.$refs.scrollContainer;
      if (scrollContainer) {
        scrollContainer.removeEventListener("scroll", this.checkScrollPosition);
      }
    },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");




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
    color: #fff;
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
    color: #fff;
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
    color: #fff;
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
    color: #fff;
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
    color: #fff;
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
    color: #fff;
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
    color: #7d818c;
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
    color: #302e30;
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
    /* height: 47px; */
    width: 250px;
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
    /* height: 47px; */
    width: 250px;
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
    /* height: 47px; */
    width: 250px;
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
    color: #7e808b;
    font-family: Poppins;
    font-size: 11px;
    font-style: normal;
    line-height: 0px;
}

.languages-container {
    width: 100%;
    padding: 10px 30px 0px 30px;
    /* display:inline-block; */
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
    /* display:inline-block; */
}

.languages-section .languages-detail {
    /* width: 50%; */
    display: inline-block;
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
    background-color: #e7e7e6;
    border-radius: 50%;
    display: inline-block;
}

.right-col-divider {
    width: 450px;
    margin: 10px 0px 0px 0px;
}
/*
    .modal {
       position: fixed;
        margin:0px;
        width: 500px;
        height: 500px;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999; 
        justify-content: center;
        align-items: center;
        border: 1px solid red;
      }
      
      .modal-content {
        background-color: black;
        padding: 20px;
        width: 500px;
        height: 500px;
        /* z-index: 999;  
        border-radius: 5px;
        /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); 
      }
       */

.add-experience {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* margin-left: 20px ; */
    /* width: 270px; */
    padding-bottom: 15px;
}

.delete-experience {
    font-size: 30px;
    height: 50px;
    /* width: 270px; */
}

.add-education {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* margin-left: 20px ; */
    /* width: 270px; */
    padding-bottom: 15px;
}

.delete-education {
    font-size: 30px;
    height: 50px;
    /* width: 270px; */
}

.add-skill {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.delete-skill {
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.add-achievement {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.delete-achievement {
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.add-project {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.delete-project {
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.add-interest {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.delete-interest {
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.add-language {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.delete-language {
    font-size: 30px;
    height: 50px;
    /* width:80px; */
}

.add-reference {
    border-color: #ff6600 !important;
    background-color: #ff6600 !important;
    font-size: 30px;
    height: 50px;
    /* margin-left: 20px ; */
    /* width: 270px; */
    padding-bottom: 15px;
}

.delete-reference {
    font-size: 30px;
    height: 50px;
    /* width: 270px; */
}

.experience-name {
    margin-top: -30px;
}

.checkbox-exp {
    margin-left: 20px;
    margin-top: 15px;
    margin-bottom: -5px;
}

.checkbox-margin {
    margin-left: 20px;
    margin-top: 15px;
}

.checkbox-margin2 {
    margin-left: 20px;
    margin-top: 15px;
    margin-bottom: 15px;
}

.checkbox-text {
    margin-left: 5px;
}

.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}
@media (max-width: 768px) {
    .tablet-responsive {
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        position: relative;
    }
}

@media (max-width: 425px) {
    .mobile-responsive {
        /* display: flex; */
        margin-top: 5px;
        margin-bottom: 5px;
    }
}
</style>
