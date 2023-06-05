<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- BASE CSS -->
      <link href="{!! asset('assets/questions/css/bootstrap.min.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/questions/css/menu.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/questions/css/style.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/questions/css/vendors.css') !!}" rel="stylesheet">

      <!-- YOUR CUSTOM CSS -->
      <link href="{!! asset('assets/questions/css/custom.css') !!}" rel="stylesheet">
      <link href="{!! asset('bootstrap/header/style.css') !!}" rel="stylesheet">
      <!-- MODERNIZR MENU -->
      <script src="{!! asset('assets/questions/js/modernizr.js') !!}"></script>
      <link rel="stylesheet" href="{!! asset('bootstrap/custom.css') !!}">
      <link rel="stylesheet" href="{!! asset('bootstrap/style.css') !!}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="{!! asset('assets/js/intl-tel-input-master/build/css/intlTelInput.css') !!}">

      <!-- TrustBox script -->
      <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
      <!-- End TrustBox script -->

<style>
   :root {
    --primary-color: #000;
  }
  body {
    font-family: Arial, Helvetica, sans-serif;
    line-height: 1.4;
    padding: 1rem;
    background-image: url({{asset('assets/img/apex1.jpg')}})";

  }
  .signature-pad-form {
    max-width: 300px;
    margin: 0 auto;
  }
  .signature-pad {
    /* cursor: url(pen.jpeg) 1 26, pointer; */
    cursor:url(http://www.javascriptkit.com/dhtmltutors/cursor-hand.gif), auto;
    border: 2px solid var(--primary-color);
    border-radius: 4px;
  }
  /* .clear-button {
    color: var(--primary-color);
  } */
  .clear-button {
    background-color: #002748;
    color: white;
    border: none;
    padding: 5px 10px;
    margin-top: 5px;
    cursor: pointer;
  }
  #buyer-form {
  display: none;
}

.buyer-fields {
  margin-bottom: 20px;
}

  @media (pointer: coarse) {
    body {
      overflow: hidden; /* Needed to prevent the vertical scroll on touch devices */
    }
  }

</style>
<body style="background-image: url({{asset('assets/img/apex1.jpg')}})">
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      {{-- @include('partials._navbar') --}}
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- row end -->

          <div class="row justify-content-center">
            <div class="col-10 grid-margin">
               <div class="card">
                 <div class="card-body">
                  <h4 class="card-title" style="background-color: #002748; Text-align: center; color: #fff;">PROPERTY RESERVATION FORM</h4>
                  <p class="card-description"  style="background-color: #002748; Text-align: center; color: #fff;">
                     DEVELOPMENT DETAILS
                  </p>
                   <form action="{!! route('reservations.store') !!}" method="POST" class="form-sample">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="property_name" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input type="text" name="address_property" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                             <label class="col-sm-3 col-form-label">Agent Name</label>
                             <div class="col-sm-9">
                               <input type="text" name="agent_name" class="form-control" required/>
                             </div>
                           </div>
                        </div>
                     </div>
                     <p class="card-description" style="background-color: #002748; Text-align: center; color: #fff;">
                        PLOT AND RESERVATION DETAILS
                      </p>
                      <div class="row">
                        <div class="col-md-3">
                           <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Plot No.</label>
                              <div class="col-sm-6">
                                <input type="text" name="plot_no" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Unit No.</label>
                              <div class="col-sm-6">
                                <input type="number" name="unit_no" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Unit Size.</label>
                              <div class="col-sm-6">
                                <input type="number" name="unit_size" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Unit Price</label>
                              <div class="col-sm-6">
                                <input type="number" name="unit_price" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Type</label>
                              <div class="col-sm-9">
                                <input type="text" name="type" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Total Purchase Price.</label>
                              <div class="col-sm-8">
                                <input type="number" name="total_price" class="form-control" required/>
                              </div>
                            </div>
                        </div>
                      </div>
                      <p class="card-description" style="background-color: #002748; Text-align: center; color: #fff;">
                       BUYER DETAILS
                     </p>
                     <label for="buyer-count">How many buyers?</label>
                     <input type="number" id="buyer-count" min="1" required>

                     <div id="buyer-details"></div>


                     {{-- <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">First Name</label>
                           <div class="col-sm-9">
                             <input type="text" class="form-control" name="first_name" required/>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Last Name</label>
                           <div class="col-sm-9">
                             <input type="text" name="last_name" class="form-control" required/>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" name="email" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input type="number" name="phone_number" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                             <label class="col-sm-3 col-form-label">ID/Passport</label>
                             <div class="col-sm-9">
                               <input type="number" name="passport" class="form-control" required/>
                             </div>
                           </div>
                         </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="title" id="membershipRadios1" value="Mr" required/>
                                Mr
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input"  name="title" id="membershipRadios2" value="Mrs" required/>
                                Mrs
                              </label>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                     <p class="card-description" style="background-color: #002748; Text-align: center; color: #fff;">
                        Proof Of Payment
                      </p>
                     <div class="row">
                        <div class="col-md-6">
                           <label>Upload Receipt</label><br>
                           <input type="file" name="upload" class="file-upload-default">
                       </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                             <label for="country" class="col-sm-3 col-form-label">Method Of Payment</label>
                             <div class="col-sm-9">
                             <select id="payment-method" name="method_of_payment" class="form-control" required>
                                 <option value="Morgage">Mortgage</option>
                                 <option value="Cash">Cash</option>
                             </select>
                           </div>
                        </div>
                       </div>
                     </div>
                     <p class="card-description" style="background-color: #002748; Text-align: center; color: #fff;">
                        Signatures
                      </p>
                        <label for="signature-count">How many signatures?</label>
                        <input type="number" id="signature-count" max="2" required>
                        <div id="signature-details"></div>

                        {{-- <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Signature</label>
                                <canvas id="signatureCanvas" height="100" width="400"  name="signature1"  class="signature-pad"></canvas>
                              </div>
                            <button type="button" class="btn" style="background: #002748; color: white;" id="clearSignatureButton">Clear signature</button>
                        </div> --}}

                    <!-- Add a hidden input field to store the signature data -->
                     <input type="hidden" id="signatureData1" name="signature1" required>

                      <br>
                      <p class="card-description" style="background-color: #002748; Text-align: center; color: #fff;">
                       Address
                     </p>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Address 1</label>
                           <div class="col-sm-9">
                             <input type="text" name="address_1" class="form-control" />
                           </div>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">State</label>
                           <div class="col-sm-9">
                             <input type="text" name="state" class="form-control" />
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Address 2</label>
                           <div class="col-sm-9">
                             <input type="text" name="address_2" class="form-control" />
                           </div>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Postcode</label>
                           <div class="col-sm-9">
                             <input type="text" name="postcode" class="form-control" />
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">City</label>
                           <div class="col-sm-9">
                             <input type="text" name="city" class="form-control" />
                           </div>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group row">
                              <label for="country" class="col-sm-3 col-form-label">Country</label>
                              <div class="col-sm-9">
                              <select id="country" name="country" class="form-control" required>
                                  <option value="Afghanistan">Afghanistan</option>
                                  <option value="Åland Islands">Åland Islands</option>
                                  <option value="Albania">Albania</option>
                                  <option value="Algeria">Algeria</option>
                                  <option value="American Samoa">American Samoa</option>
                                  <option value="Andorra">Andorra</option>
                                  <option value="Angola">Angola</option>
                                  <option value="Anguilla">Anguilla</option>
                                  <option value="Antarctica">Antarctica</option>
                                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                  <option value="Argentina">Argentina</option>
                                  <option value="Armenia">Armenia</option>
                                  <option value="Aruba">Aruba</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Austria">Austria</option>
                                  <option value="Azerbaijan">Azerbaijan</option>
                                  <option value="Bahamas">Bahamas</option>
                                  <option value="Bahrain">Bahrain</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Barbados">Barbados</option>
                                  <option value="Belarus">Belarus</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Belize">Belize</option>
                                  <option value="Benin">Benin</option>
                                  <option value="Bermuda">Bermuda</option>
                                  <option value="Bhutan">Bhutan</option>
                                  <option value="Bolivia">Bolivia</option>
                                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                  <option value="Botswana">Botswana</option>
                                  <option value="Bouvet Island">Bouvet Island</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                  <option value="Brunei Darussalam">Brunei Darussalam</option>
                                  <option value="Bulgaria">Bulgaria</option>
                                  <option value="Burkina Faso">Burkina Faso</option>
                                  <option value="Burundi">Burundi</option>
                                  <option value="Cambodia">Cambodia</option>
                                  <option value="Cameroon">Cameroon</option>
                                  <option value="Canada">Canada</option>
                                  <option value="Cape Verde">Cape Verde</option>
                                  <option value="Cayman Islands">Cayman Islands</option>
                                  <option value="Central African Republic">Central African Republic</option>
                                  <option value="Chad">Chad</option>
                                  <option value="Chile">Chile</option>
                                  <option value="China">China</option>
                                  <option value="Christmas Island">Christmas Island</option>
                                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                  <option value="Colombia">Colombia</option>
                                  <option value="Comoros">Comoros</option>
                                  <option value="Congo">Congo</option>
                                  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                  <option value="Cook Islands">Cook Islands</option>
                                  <option value="Costa Rica">Costa Rica</option>
                                  <option value="Cote D'ivoire">Cote D'ivoire</option>
                                  <option value="Croatia">Croatia</option>
                                  <option value="Cuba">Cuba</option>
                                  <option value="Cyprus">Cyprus</option>
                                  <option value="Czech Republic">Czech Republic</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Djibouti">Djibouti</option>
                                  <option value="Dominica">Dominica</option>
                                  <option value="Dominican Republic">Dominican Republic</option>
                                  <option value="Ecuador">Ecuador</option>
                                  <option value="Egypt">Egypt</option>
                                  <option value="El Salvador">El Salvador</option>
                                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                                  <option value="Eritrea">Eritrea</option>
                                  <option value="Estonia">Estonia</option>
                                  <option value="Ethiopia">Ethiopia</option>
                                  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                  <option value="Faroe Islands">Faroe Islands</option>
                                  <option value="Fiji">Fiji</option>
                                  <option value="Finland">Finland</option>
                                  <option value="France">France</option>
                                  <option value="French Guiana">French Guiana</option>
                                  <option value="French Polynesia">French Polynesia</option>
                                  <option value="French Southern Territories">French Southern Territories</option>
                                  <option value="Gabon">Gabon</option>
                                  <option value="Gambia">Gambia</option>
                                  <option value="Georgia">Georgia</option>
                                  <option value="Germany">Germany</option>
                                  <option value="Ghana">Ghana</option>
                                  <option value="Gibraltar">Gibraltar</option>
                                  <option value="Greece">Greece</option>
                                  <option value="Greenland">Greenland</option>
                                  <option value="Grenada">Grenada</option>
                                  <option value="Guadeloupe">Guadeloupe</option>
                                  <option value="Guam">Guam</option>
                                  <option value="Guatemala">Guatemala</option>
                                  <option value="Guernsey">Guernsey</option>
                                  <option value="Guinea">Guinea</option>
                                  <option value="Guinea-bissau">Guinea-bissau</option>
                                  <option value="Guyana">Guyana</option>
                                  <option value="Haiti">Haiti</option>
                                  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                  <option value="Honduras">Honduras</option>
                                  <option value="Hong Kong">Hong Kong</option>
                                  <option value="Hungary">Hungary</option>
                                  <option value="Iceland">Iceland</option>
                                  <option value="India">India</option>
                                  <option value="Indonesia">Indonesia</option>
                                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                  <option value="Iraq">Iraq</option>
                                  <option value="Ireland">Ireland</option>
                                  <option value="Isle of Man">Isle of Man</option>
                                  <option value="Israel">Israel</option>
                                  <option value="Italy">Italy</option>
                                  <option value="Jamaica">Jamaica</option>
                                  <option value="Japan">Japan</option>
                                  <option value="Jersey">Jersey</option>
                                  <option value="Jordan">Jordan</option>
                                  <option value="Kazakhstan">Kazakhstan</option>
                                  <option value="Kenya">Kenya</option>
                                  <option value="Kiribati">Kiribati</option>
                                  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                  <option value="Korea, Republic of">Korea, Republic of</option>
                                  <option value="Kuwait">Kuwait</option>
                                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                                  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                  <option value="Latvia">Latvia</option>
                                  <option value="Lebanon">Lebanon</option>
                                  <option value="Lesotho">Lesotho</option>
                                  <option value="Liberia">Liberia</option>
                                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                  <option value="Liechtenstein">Liechtenstein</option>
                                  <option value="Lithuania">Lithuania</option>
                                  <option value="Luxembourg">Luxembourg</option>
                                  <option value="Macao">Macao</option>
                                  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                  <option value="Madagascar">Madagascar</option>
                                  <option value="Malawi">Malawi</option>
                                  <option value="Malaysia">Malaysia</option>
                                  <option value="Maldives">Maldives</option>
                                  <option value="Mali">Mali</option>
                                  <option value="Malta">Malta</option>
                                  <option value="Marshall Islands">Marshall Islands</option>
                                  <option value="Martinique">Martinique</option>
                                  <option value="Mauritania">Mauritania</option>
                                  <option value="Mauritius">Mauritius</option>
                                  <option value="Mayotte">Mayotte</option>
                                  <option value="Mexico">Mexico</option>
                                  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                  <option value="Moldova, Republic of">Moldova, Republic of</option>
                                  <option value="Monaco">Monaco</option>
                                  <option value="Mongolia">Mongolia</option>
                                  <option value="Montenegro">Montenegro</option>
                                  <option value="Montserrat">Montserrat</option>
                                  <option value="Morocco">Morocco</option>
                                  <option value="Mozambique">Mozambique</option>
                                  <option value="Myanmar">Myanmar</option>
                                  <option value="Namibia">Namibia</option>
                                  <option value="Nauru">Nauru</option>
                                  <option value="Nepal">Nepal</option>
                                  <option value="Netherlands">Netherlands</option>
                                  <option value="Netherlands Antilles">Netherlands Antilles</option>
                                  <option value="New Caledonia">New Caledonia</option>
                                  <option value="New Zealand">New Zealand</option>
                                  <option value="Nicaragua">Nicaragua</option>
                                  <option value="Niger">Niger</option>
                                  <option value="Nigeria">Nigeria</option>
                                  <option value="Niue">Niue</option>
                                  <option value="Norfolk Island">Norfolk Island</option>
                                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                  <option value="Norway">Norway</option>
                                  <option value="Oman">Oman</option>
                                  <option value="Pakistan">Pakistan</option>
                                  <option value="Palau">Palau</option>
                                  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                  <option value="Panama">Panama</option>
                                  <option value="Papua New Guinea">Papua New Guinea</option>
                                  <option value="Paraguay">Paraguay</option>
                                  <option value="Peru">Peru</option>
                                  <option value="Philippines">Philippines</option>
                                  <option value="Pitcairn">Pitcairn</option>
                                  <option value="Poland">Poland</option>
                                  <option value="Portugal">Portugal</option>
                                  <option value="Puerto Rico">Puerto Rico</option>
                                  <option value="Qatar">Qatar</option>
                                  <option value="Reunion">Reunion</option>
                                  <option value="Romania">Romania</option>
                                  <option value="Russian Federation">Russian Federation</option>
                                  <option value="Rwanda">Rwanda</option>
                                  <option value="Saint Helena">Saint Helena</option>
                                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                  <option value="Saint Lucia">Saint Lucia</option>
                                  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                  <option value="Samoa">Samoa</option>
                                  <option value="San Marino">San Marino</option>
                                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                  <option value="Saudi Arabia">Saudi Arabia</option>
                                  <option value="Senegal">Senegal</option>
                                  <option value="Serbia">Serbia</option>
                                  <option value="Seychelles">Seychelles</option>
                                  <option value="Sierra Leone">Sierra Leone</option>
                                  <option value="Singapore">Singapore</option>
                                  <option value="Slovakia">Slovakia</option>
                                  <option value="Slovenia">Slovenia</option>
                                  <option value="Solomon Islands">Solomon Islands</option>
                                  <option value="Somalia">Somalia</option>
                                  <option value="South Africa">South Africa</option>
                                  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                  <option value="Spain">Spain</option>
                                  <option value="Sri Lanka">Sri Lanka</option>
                                  <option value="Sudan">Sudan</option>
                                  <option value="Suriname">Suriname</option>
                                  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                  <option value="Swaziland">Swaziland</option>
                                  <option value="Sweden">Sweden</option>
                                  <option value="Switzerland">Switzerland</option>
                                  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                  <option value="Taiwan">Taiwan</option>
                                  <option value="Tajikistan">Tajikistan</option>
                                  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                  <option value="Thailand">Thailand</option>
                                  <option value="Timor-leste">Timor-leste</option>
                                  <option value="Togo">Togo</option>
                                  <option value="Tokelau">Tokelau</option>
                                  <option value="Tonga">Tonga</option>
                                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                  <option value="Tunisia">Tunisia</option>
                                  <option value="Turkey">Turkey</option>
                                  <option value="Turkmenistan">Turkmenistan</option>
                                  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                  <option value="Tuvalu">Tuvalu</option>
                                  <option value="Uganda">Uganda</option>
                                  <option value="Ukraine">Ukraine</option>
                                  <option value="United Arab Emirates">United Arab Emirates</option>
                                  <option value="United Kingdom">United Kingdom</option>
                                  <option value="United States">United States</option>
                                  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                  <option value="Uruguay">Uruguay</option>
                                  <option value="Uzbekistan">Uzbekistan</option>
                                  <option value="Vanuatu">Vanuatu</option>
                                  <option value="Venezuela">Venezuela</option>
                                  <option value="Viet Nam">Viet Nam</option>
                                  <option value="Virgin Islands, British">Virgin Islands, British</option>
                                  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                  <option value="Wallis and Futuna">Wallis and Futuna</option>
                                  <option value="Western Sahara">Western Sahara</option>
                                  <option value="Yemen">Yemen</option>
                                  <option value="Zambia">Zambia</option>
                                  <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                           </div>
                         </div>
                       </div>
                       <div class="center">
                         <button type="submit" class="btn " style="background: #002748; color: white;">Submit</button>
                     </div>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
            </div>
          </div>
         </div>
      </div>
        </div>

        <div class="mt-5">
         <!-- TrustBox widget - Starter -->
         <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5613c9cde69ddc09340c6beb" data-businessunit-id="5f746adaaccd9d0001fcbe15" data-style-height="100%" data-style-width="100%" data-theme="light">
            <a href="https://uk.trustpilot.com/review/baroncabot.com" target="_blank" rel="noopener">Trustpilot</a>
         </div>


         <!-- End TrustBox widget -->
      </div>
   </div>
          </div>
        <!-- content-wrapper ends -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      <!-- footer start -->


<!-- footer end -->

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <footer class="footer-59391" style="background: #002748;">
        <div class="border-bottom pb-5 mb-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3">
                <form action="#" class="subscribe mb-4 mb-lg-0">
                  <div class="form-group">
                  <input type="email" class="form-control" placeholder="Enter your email">
                  <button><span class="icon-keyboard_backspace"></span></button>
                  </div>
                </form>
              </div>
              <div class="col-lg-6 text-lg-center">
                <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                  <li><a href="https://baroncabot.com/projects">Projects</a></li>
                  <li><a href="https://baroncabot.com/services">Services</a></li>
                  <li><a href="https://baroncabot.com/our-team">Team</a></li>
                  <li><a href="https://baroncabot.com/contacts-us">Contacts</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <ul class="list-unstyled nav-links social nav-right text-lg-right">
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                  <li><a href="https://www.facebook.com/baronandcabot" target="_blank"><span class="fab fa-facebook"></span></a></li>
                  <li><a href="https://www.instagram.com/baron.cabot/"><span class="fab fa-instagram"></span></a></li>
                  <li><a href="https://twitter.com/BaronCabotLtd"><span class="fab fa-twitter"></span></a></li>
                  <li><a href="https://www.linkedin.com/company/baron-cabot-research"><span class="fab fa-linkedIn"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-4 text-lg-center site-logo order-1 order-lg-2 mb-3 mb-lg-0">
              <div class="brand-logo">
               <a href="https://baroncabot.com">
                  <svg xmlns="http://www.w3.org/2000/svg" width="104" height="50" viewBox="0 0 104 50" fill="none">
                     <path d="M15.4313 12.8103C17.7184 13.3523 19.3244 14.0081 20.2492 14.7779C21.5761 15.8725 22.2397 17.2924 22.2402 19.0375C22.2402 20.8789 21.5113 22.4011 20.0535 23.6043C18.264 25.061 15.6624 25.7891 12.2488 25.7886H0V25.1206C1.11386 25.1206 1.86939 25.0153 2.26657 24.8048C2.66376 24.5943 2.94222 24.3207 3.10197 23.9839C3.26215 23.6466 3.34225 22.8161 3.34225 21.4924V5.60849C3.34225 4.28433 3.26215 3.45097 3.10197 3.10841C2.94179 2.76584 2.66048 2.49197 2.25806 2.28679C1.85477 2.08294 1.10208 1.98057 0 1.97968V1.31494H11.5555C14.317 1.31494 16.2726 1.56466 17.4222 2.0641C18.5719 2.56354 19.4786 3.3096 20.1425 4.30228C20.8055 5.29495 21.1372 6.35078 21.1377 7.46976C21.1377 8.64989 20.7169 9.69996 19.8754 10.62C19.0339 11.54 17.5525 12.2701 15.4313 12.8103ZM8.96023 13.7309V21.5828L8.94255 22.4855C8.94255 23.1348 9.10536 23.6251 9.43096 23.9566C9.75656 24.2881 10.2395 24.4536 10.8798 24.4532C11.7926 24.4616 12.6934 24.2415 13.5025 23.8124C14.2892 23.3982 14.9315 22.7484 15.3422 21.9511C15.7691 21.1388 15.9825 20.2332 15.9825 19.2343C15.9825 18.091 15.7207 17.065 15.1969 16.1566C14.6731 15.2481 13.956 14.6133 13.0456 14.2521C12.1351 13.894 10.7733 13.7203 8.96023 13.7309ZM8.96023 12.323C10.6428 12.323 11.8841 12.1305 12.6842 11.7454C13.4842 11.3603 14.0977 10.8187 14.5245 10.1207C14.9514 9.42276 15.1648 8.53223 15.1648 7.44915C15.1648 6.36607 14.9544 5.47975 14.5337 4.7902C14.1125 4.09842 13.5108 3.57195 12.7287 3.21078C11.9465 2.8496 10.6904 2.67522 8.96023 2.68763V12.323Z" fill="white"></path>
                     <path d="M29.7592 23.0101C27.7711 24.7902 25.987 25.6803 24.407 25.6803C23.4774 25.6803 22.7044 25.3701 22.0881 24.7497C21.4718 24.1293 21.1639 23.3537 21.1643 22.4231C21.1643 21.1605 21.699 20.0247 22.7683 19.0157C23.8377 18.0066 26.168 16.6651 29.7592 14.9913V13.3295C29.7592 12.0784 29.6924 11.2905 29.5589 10.9657C29.4253 10.6408 29.1726 10.3577 28.8007 10.1161C28.4258 9.87376 27.9894 9.74763 27.545 9.75319C26.7895 9.75319 26.1677 9.92447 25.6798 10.267C25.3773 10.4789 25.2263 10.7266 25.2267 11.0102C25.2267 11.2579 25.3893 11.5648 25.7145 11.9309C26.1566 12.4378 26.3775 12.9275 26.377 13.3999C26.3803 13.6781 26.3253 13.9538 26.2156 14.2087C26.1059 14.4636 25.944 14.6919 25.7407 14.8783C25.3164 15.2851 24.7614 15.4886 24.0758 15.4886C23.3438 15.4886 22.7308 15.2643 22.2367 14.8158C21.7426 14.3674 21.4956 13.8422 21.4956 13.2404C21.4956 12.3909 21.8269 11.5797 22.4894 10.8068C23.152 10.0339 24.076 9.44076 25.2614 9.02729C26.4509 8.6137 27.6999 8.40432 28.9572 8.40776C30.5032 8.40776 31.7266 8.74123 32.6275 9.40819C33.5283 10.0751 34.1123 10.7979 34.3794 11.5766C34.5427 12.0725 34.6241 13.2114 34.6236 14.9933V21.4187C34.6236 22.1747 34.6527 22.6498 34.7107 22.8439C34.7523 23.0121 34.8437 23.1634 34.9726 23.2773C35.0854 23.3714 35.2273 23.4221 35.3733 23.4202C35.6757 23.4202 35.9839 23.202 36.2977 22.7654L36.8215 23.1902C36.241 24.0637 35.6395 24.6981 35.0171 25.0934C34.3805 25.4908 33.645 25.6945 32.8978 25.6803C31.9673 25.6803 31.2408 25.4587 30.7184 25.0156C30.1959 24.5724 29.8762 23.9039 29.7592 23.0101ZM29.7592 21.7178V16.1746C28.3529 17.0166 27.3069 17.9144 26.6212 18.8681C26.1682 19.5049 25.9414 20.1475 25.941 20.7958C25.9376 21.3325 26.1441 21.8487 26.5152 22.231C26.8059 22.5501 27.2126 22.7094 27.7355 22.7089C28.3187 22.7089 28.9932 22.3786 29.7592 21.7178Z" fill="white"></path>
                     <path d="M41.4334 8.5244V12.4656C42.5682 10.6691 43.563 9.4763 44.4176 8.88734C45.2722 8.29839 46.096 8.00391 46.889 8.00391C47.5726 8.00391 48.1181 8.21773 48.5258 8.64538C48.9335 9.07303 49.1386 9.67705 49.1412 10.4575C49.1412 11.2879 48.9428 11.9323 48.5461 12.3905C48.1493 12.8487 47.6692 13.0781 47.1058 13.0785C46.4862 13.0889 45.8852 12.8634 45.4212 12.4464C44.9476 12.0254 44.669 11.79 44.5852 11.7404C44.4576 11.6645 44.312 11.6259 44.1642 11.6287C43.8098 11.6287 43.4739 11.7652 43.1566 12.0382C42.6564 12.4597 42.2782 13.0606 42.022 13.841C41.6292 15.0437 41.4339 16.3699 41.4361 17.8194V21.8158L41.4544 22.8568C41.4544 23.5637 41.498 24.0161 41.5853 24.2142C41.7313 24.5466 41.948 24.4382 42.2348 24.5931C42.5215 24.748 43.0067 24.8437 43.6902 24.881V25.5504L38.9318 24.2069L34.4373 25.906V25.2366C35.1819 25.1746 35.6854 24.9669 35.9477 24.6137C36.21 24.2605 36.341 23.3279 36.3405 21.8158V12.2051C36.3405 11.2142 36.2919 10.5822 36.1945 10.3092C36.0723 9.96223 35.8953 9.70808 35.6636 9.54677C35.4318 9.38546 35.0228 9.27467 34.4366 9.2144V8.5244H41.4334Z" fill="white"></path><path d="M54.3198 8.40584C55.7426 8.39951 57.1394 8.79317 58.3554 9.54321C59.5998 10.3019 60.5449 11.379 61.1909 12.7745C61.8369 14.17 62.1599 15.6989 62.1599 17.3612C62.1599 19.7543 61.5615 21.7578 60.3647 23.3718C58.9187 25.3217 56.9216 26.2966 54.3735 26.2966C51.8726 26.2966 49.9464 25.4061 48.5951 23.625C47.2438 21.844 46.5673 19.7804 46.5656 17.4343C46.5656 15.0156 47.2558 12.9066 48.6364 11.1073C50.0169 9.30811 51.9114 8.40761 54.3198 8.40584ZM54.3912 9.68745C53.7867 9.68745 53.2682 9.91923 52.8356 10.3828C52.4031 10.8463 52.1194 11.7608 51.9845 13.1261C51.8483 14.4924 51.7802 16.3907 51.7802 18.821C51.7747 20.029 51.8579 21.2357 52.029 22.4312C52.16 23.286 52.4386 23.9359 52.8651 24.3808C53.2915 24.8258 53.7773 25.0485 54.3224 25.0489C54.8558 25.0489 55.3003 24.8984 55.6561 24.5975C56.1183 24.189 56.4264 23.6173 56.5805 22.8825C56.8175 21.7392 56.936 19.4288 56.936 15.9513C56.936 13.9061 56.8234 12.5011 56.5982 11.7362C56.373 10.9713 56.041 10.4149 55.6024 10.067C55.2925 9.81397 54.8888 9.68745 54.3912 9.68745Z" fill="white"></path><path d="M76.2188 11.5833C75.991 10.6952 75.4935 9.90255 74.7968 9.31786C74.0858 8.71029 73.191 8.40628 72.1125 8.40584C71.2314 8.40107 70.3633 8.62143 69.588 9.04665C68.8063 9.47385 67.9886 10.1568 67.1349 11.0954V8.9117H60.3633V9.57644C61.097 9.6766 61.5791 9.88178 61.8095 10.192C62.04 10.5022 62.1556 11.2963 62.1565 12.5744V25.7888H67.1322V13.0996C68.1856 11.7947 68.9575 10.8394 69.9769 10.8394C70.2834 10.8392 70.581 10.9442 70.8215 11.1372C71.086 11.351 71.276 11.6453 71.3636 11.9768C71.4705 12.338 71.5237 13.2103 71.5233 14.5939V26.0733H76.499V15.5358C76.5016 13.5868 76.4082 12.2693 76.2188 11.5833Z" fill="white"></path><path d="M95.7537 11.1496H103.152V11.8536C102.323 11.9741 101.671 12.2238 101.196 12.6027C100.722 12.9816 100.106 13.8631 99.3474 15.2471C98.5883 16.6311 97.5216 18.1772 96.1472 19.8856C97.3558 20.9935 98.3393 21.7637 99.0979 22.1962C99.6317 22.4976 100.153 22.648 100.663 22.6476C101.54 22.6476 102.334 22.064 103.045 20.8967L103.774 21.2955C102.802 23.2326 101.765 24.6104 100.663 25.4289C99.8207 26.0426 98.8605 26.3495 97.782 26.3495C96.8685 26.3518 95.9662 26.1451 95.1422 25.7446C94.3064 25.3418 93.2901 24.5866 92.0933 23.4792C90.6093 24.49 89.2165 25.2213 87.915 25.6728C86.6042 26.1255 85.2286 26.3544 83.8441 26.3502C81.5919 26.3502 79.8024 25.7298 78.4755 24.4889C77.1486 23.2481 76.485 21.7921 76.4846 20.1209C76.4846 18.3155 77.1187 16.7449 78.3871 15.4093C79.6555 14.0736 81.4985 12.9185 83.9161 11.944C83.6197 11.2017 83.3877 10.4345 83.2227 9.6513C83.072 8.93947 82.9946 8.21366 82.9916 7.48558C82.9916 5.55961 83.6581 3.95604 84.9911 2.67487C86.3241 1.39369 88.0272 0.752885 90.1004 0.752441C91.7716 0.752441 93.0961 1.17654 94.0738 2.02475C95.0514 2.87296 95.5405 3.86275 95.5409 4.99414C95.5409 6.35419 95.039 7.51859 94.0351 8.48734C93.0313 9.45609 91.446 10.3435 89.2794 11.1496C90.6189 13.5427 92.5804 16.1239 95.1638 18.8932C96.9062 16.9078 97.7774 15.205 97.7774 13.7846C97.7816 13.5454 97.7381 13.3078 97.6496 13.0861C97.561 12.8643 97.4292 12.6631 97.2621 12.4944C96.9178 12.1399 96.4139 11.9263 95.7504 11.8536L95.7537 11.1496ZM84.4117 13.0993C83.4637 13.5079 82.7941 13.9411 82.4031 14.3989C81.8453 15.0729 81.5666 15.8249 81.567 16.655C81.567 17.7864 81.89 18.9116 82.536 20.0305C83.1819 21.1495 83.9612 22.0159 84.8739 22.6297C85.7865 23.2452 86.6992 23.553 87.6119 23.553C88.0623 23.553 88.5688 23.4537 89.1314 23.2552C89.7723 23.0173 90.3887 22.7163 90.9718 22.3564C88.1155 19.3873 85.9288 16.3016 84.4117 13.0993ZM88.6784 10.0668C89.9227 9.59745 90.7583 9.09491 91.1852 8.55913C91.6121 8.02335 91.8253 7.37656 91.8249 6.61876C91.8249 5.27156 91.4757 4.13441 90.7773 3.20732C90.3151 2.59399 89.7462 2.2871 89.0705 2.28666C88.5132 2.28666 88.0361 2.50935 87.6394 2.95472C87.2426 3.4001 87.0442 4.00168 87.0442 4.75949C87.052 5.40153 87.1476 6.03935 87.3284 6.65466C87.5174 7.3287 87.9674 8.46607 88.6784 10.0668Z" fill="white"></path><path d="M48.8408 23.8545V32.3505H48.1435C47.6198 30.1347 46.6464 28.4355 45.2236 27.2527C43.8007 26.0699 42.1857 25.4794 40.3788 25.4811C38.8948 25.4738 37.4452 25.9349 36.2306 26.8006C34.9962 27.6507 34.0362 28.8518 33.471 30.2533C32.7234 32.0733 32.3495 34.0981 32.3495 36.3277C32.3495 38.5213 32.6225 40.5189 33.1686 42.3203C33.7146 44.1217 34.5692 45.4836 35.7324 46.4058C36.8951 47.328 38.4025 47.7889 40.2544 47.7884C41.7742 47.7884 43.1658 47.451 44.4294 46.776C45.693 46.1011 47.0253 44.9383 48.4263 43.2875V45.4027C47.0733 46.8363 45.664 47.8757 44.1983 48.521C42.7326 49.1662 41.0204 49.4886 39.0615 49.4882C36.4864 49.4882 34.1984 48.9639 32.1976 47.9154C30.1969 46.8669 28.654 45.3601 27.5689 43.3952C26.4965 41.4841 25.9347 39.3215 25.9394 37.122C25.9394 34.7844 26.5419 32.567 27.747 30.47C28.9521 28.373 30.5781 26.7459 32.6252 25.5888C34.6162 24.4474 36.8647 23.8498 39.1512 23.8545C40.8482 23.8545 42.6405 24.2281 44.5283 24.9753C45.6194 25.4087 46.3136 25.6256 46.6109 25.626C46.7955 25.6275 46.9784 25.5906 47.1484 25.5175C47.3185 25.4445 47.472 25.3368 47.5995 25.2013C47.8784 24.9181 48.0593 24.4692 48.1422 23.8545H48.8408Z" fill="white"></path><path d="M56.1938 46.1639C54.2201 47.9343 52.4482 48.8193 50.8782 48.8189C49.9564 48.8189 49.19 48.5111 48.5789 47.8956C47.9679 47.28 47.6624 46.5096 47.6624 45.5843C47.6624 44.3301 48.1933 43.2021 49.2552 42.2001C50.3172 41.1981 52.6304 39.8649 56.1951 38.2004V36.5478C56.1951 35.307 56.1296 34.5248 55.9987 34.2013C55.8677 33.8778 55.6152 33.5966 55.2412 33.3577C54.8701 33.1168 54.4377 32.9914 53.9972 32.9968C53.247 32.9968 52.6296 33.1667 52.1451 33.5066C51.8448 33.718 51.6947 33.9642 51.6947 34.2452C51.6947 34.4911 51.8561 34.7958 52.1791 35.1592C52.6156 35.663 52.8338 36.1494 52.8338 36.6183C52.8373 36.8945 52.7827 37.1682 52.6738 37.4213C52.5648 37.6744 52.404 37.901 52.202 38.086C51.7804 38.4911 51.2292 38.6934 50.5483 38.6929C49.8216 38.6929 49.2127 38.4713 48.7217 38.0282C48.2306 37.585 47.9866 37.0623 47.9897 36.4601C47.9897 35.6181 48.3186 34.8124 48.9763 34.0431C49.6341 33.2738 50.5518 32.6848 51.7294 32.2762C52.9098 31.8662 54.1494 31.6589 55.397 31.6626C56.9325 31.6626 58.1474 31.9939 59.0417 32.6564C59.936 33.319 60.5161 34.0367 60.7819 34.8095C60.9438 35.3023 61.0246 36.4324 61.0241 38.1997V44.5812C61.0241 45.3315 61.0532 45.8032 61.1112 45.9964C61.1533 46.1637 61.2446 46.314 61.3731 46.4272C61.4855 46.5199 61.6263 46.5698 61.7712 46.5681C62.0714 46.5681 62.377 46.3512 62.6877 45.9173L63.2069 46.3394C62.6295 47.2076 62.0308 47.8377 61.4111 48.2299C60.7797 48.6263 60.0497 48.8307 59.3075 48.8189C58.3835 48.8189 57.662 48.5991 57.1431 48.1595C56.6241 47.7199 56.3077 47.0547 56.1938 46.1639ZM56.1938 44.881V39.3783C54.7971 40.2105 53.7583 41.1013 53.0774 42.0505C52.6269 42.6834 52.4017 43.3222 52.4017 43.967C52.3992 44.4997 52.6047 45.0117 52.9733 45.3908C53.2614 45.7072 53.6653 45.8655 54.1851 45.8655C54.7626 45.8655 55.4321 45.5373 56.1938 44.881Z" fill="white"></path><path d="M77.1673 35.3792C76.6043 34.1414 75.8247 33.1862 74.8287 32.5135C73.8327 31.8408 72.7719 31.5046 71.6462 31.5051C70.0047 31.5051 68.4925 32.231 67.1098 33.6828V24.4888H62.1688V49.1792H62.8366L65.5621 47.3764C66.2307 48.0185 66.9105 48.4825 67.6015 48.7684C68.2924 49.0542 69.0837 49.1971 69.9754 49.1971C71.5113 49.1971 72.877 48.8074 74.0725 48.0278C75.268 47.2483 76.2234 46.1141 76.9388 44.625C77.6537 43.1374 78.0112 41.4828 78.0112 39.6614C78.0112 38.0448 77.7299 36.6174 77.1673 35.3792ZM72.3755 45.3769C72.0879 46.4006 71.7304 47.0848 71.3031 47.4296C70.8758 47.7744 70.363 47.947 69.7646 47.9474C69.0728 47.9474 68.5054 47.7303 68.0624 47.296C67.6194 46.8617 67.3381 46.2933 67.2185 45.5909C67.1443 45.1743 67.1072 44.2098 67.1072 42.6973V35.2715C68.0329 34.1193 68.9999 33.5432 70.0081 33.5432C70.782 33.5432 71.3974 33.8884 71.8544 34.5788C72.4877 35.5312 72.8042 37.2868 72.8037 39.8456C72.8055 42.5094 72.6627 44.3532 72.3755 45.3769Z" fill="white"></path><path d="M85.79 31.6627C87.1751 31.6568 88.5347 32.0403 89.7182 32.7708C90.9307 33.5086 91.8514 34.5574 92.4804 35.917C93.1093 37.2766 93.4245 38.7645 93.4258 40.3807C93.4258 42.7126 92.8429 44.6638 91.6771 46.2344C90.269 48.1329 88.3239 49.0821 85.8417 49.0821C83.4063 49.0821 81.5294 48.2149 80.2113 46.4803C78.8932 44.7458 78.2354 42.7359 78.238 40.4505C78.238 38.0951 78.9104 36.0413 80.2552 34.289C81.5999 32.5368 83.4449 31.6613 85.79 31.6627ZM85.8594 32.911C85.2711 32.911 84.7661 33.1366 84.3444 33.5877C83.9228 34.0389 83.6459 34.9296 83.5136 36.26C83.3827 37.5895 83.3172 39.4383 83.3172 41.8066C83.3119 42.983 83.3931 44.1582 83.5601 45.3224C83.6867 46.1546 83.9579 46.7875 84.3739 47.2209C84.7898 47.6543 85.263 47.8712 85.7933 47.8716C86.3131 47.8716 86.7461 47.725 87.0922 47.4316C87.5418 47.0327 87.8418 46.4761 87.9924 45.7618C88.2229 44.6486 88.3383 42.3984 88.3388 39.0113C88.3388 37.0171 88.2296 35.6489 88.0114 34.9066C87.7932 34.1643 87.47 33.6221 87.0418 33.28C86.7385 33.0327 86.3443 32.909 85.8594 32.909V32.911Z" fill="white"></path><path d="M99.3452 26.1406V32.1532H103.189V33.8935H99.3452V44.0367C99.3452 44.9869 99.3888 45.5993 99.4761 45.8741C99.5559 46.1401 99.7163 46.3739 99.9344 46.5421C100.153 46.7123 100.355 46.7972 100.541 46.7967C101.291 46.7967 102.001 46.2166 102.67 45.0565L103.19 45.4433C102.255 47.6937 100.737 48.8189 98.6361 48.8189C97.6083 48.8189 96.7397 48.5288 96.0304 47.9487C95.3212 47.3686 94.8677 46.721 94.67 46.0057C94.5543 45.6069 94.4965 44.5286 94.4965 42.7711V33.8935H92.3851V33.2779C93.8394 32.2347 95.0774 31.139 96.0992 29.9908C97.137 28.8189 98.0347 27.5265 98.7736 26.1406H99.3452Z" fill="white"></path></svg>
               </a>
            </div>
            </div>
            <div class="col-lg-4 order-2 order-lg-1 mb-3 mb-lg-0">
              <ul class="list-unstyled nav-links m-0 nav-left">
               <li><a href="#">Terms</a></li>
               <li><a href="#">About</a></li>
               <li><a href="#">Privacy</a></li>
               <li><a href="#">Contact</a></li>
              </ul>
            </div>

            <div class="col-lg-4 text-lg-right order-3 order-lg-3">
              <p class="m-0 text-muted"><small>&copy; 2023. All Rights Reserved.</small></p>
            </div>
          </div>
        </div>

    </footer>

  <!-- base:js -->
  <script src="asset1/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="asset1/js/off-canvas.js"></script>
  <script src="asset1/js/hoverable-collapse.js"></script>
  <script src="asset1/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="asset1/js/dashboard.js"></script>
  <!-- End custom js for this page-->

 <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2"></script>

{{-- <script>
   const canvas = document.getElementById('signatureCanvas');
   const signaturePad = new SignaturePad(canvas);
   const signatureDataInput = document.getElementById('signatureData');

   function clearSignature() {
       signaturePad.clear();
       signatureDataInput.value = '';
   }

   function captureSignature() {
       if (signaturePad.isEmpty()) {
           alert('Please provide a signature.');
           return;
       }

       const signatureData = signaturePad.toDataURL();
       signatureDataInput.value = signatureData;
   }

   document.getElementById('clearSignatureButton').addEventListener('click', clearSignature);
   document.querySelector('form').addEventListener('submit', captureSignature);
</script> --}}
<script>
   $(document).ready(function() {
  $('#buyer-count').on('input', function() {
    var count = $(this).val();
    var buyerDetails = $('#buyer-details');

    buyerDetails.empty(); // Clear previous fields

    for (var i = 1; i <= count; i++) {
      buyerDetails.append(`
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="first_name${i}" required/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" name="last_name${i}" class="form-control" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" name="email${i}" class="form-control" required/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Phone Number</label>
              <div class="col-sm-9">
                <input type="number" name="phone_number${i}" class="form-control" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">ID/Passport</label>
              <div class="col-sm-9">
                <input type="number" name="passport${i}" class="form-control" required/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="title${i}" id="titleMr${i}" value="Mr" required/>
                    Mr
                  </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="title${i}" id="titleMrs${i}" value="Mrs" required/>
                    Mrs
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      `);
    }
  });
});
</script>
<script>
   const signatureCountInput = document.getElementById('signature-count');
   const signatureDetails = document.getElementById('signature-details');
   const signatureDataInputs = [];

   signatureCountInput.addEventListener('input', function() {
     const count = parseInt(signatureCountInput.value);

     // Clear previous signature pads and data inputs
     signatureDetails.innerHTML = '';
     signatureDataInputs.length = 0;

     for (let i = 1; i <= count; i++) {
       const signatureContainer = document.createElement('div');
       signatureContainer.className = 'signature-container';

       const label = document.createElement('label');
       label.textContent = `Signature ${i}`;
       signatureContainer.appendChild(label);

       const canvas = document.createElement('canvas');
       canvas.id = `signatureCanvas${i}`;
       canvas.className = 'signature-pad';
       signatureContainer.appendChild(canvas);

       const clearButton = document.createElement('button');
       clearButton.type = 'button';
       clearButton.className = 'clear-button';
       clearButton.textContent = 'Clear';
       signatureContainer.appendChild(clearButton);

       signatureDetails.appendChild(signatureContainer);

       // Initialize signature pad for each canvas
       const signaturePad = new SignaturePad(canvas);

       // Clear the signature pad
       clearButton.addEventListener('click', function() {
         signaturePad.clear();
         signatureDataInputs[i - 1].value = '';
       });

       // Save the signature data to the corresponding input field
       canvas.addEventListener('mouseup', function() {
         const signatureData = signaturePad.toDataURL();
         signatureDataInputs[i - 1].value = signatureData;
       });

       // Create hidden input field to store the signature data
       const signatureDataInput = document.createElement('input');
       signatureDataInput.type = 'hidden';
       signatureDataInput.name = `signatureData${i}`;
       signatureDataInputs.push(signatureDataInput);
       signatureDetails.appendChild(signatureDataInput);
     }
   });

   document.querySelector('form').addEventListener('submit', function() {
     // Validate if all signatures are provided
     if (signatureDataInputs.some(input => input.value === '')) {
       alert('Please provide all signatures.');
       event.preventDefault();
     }
   });
 </script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>



