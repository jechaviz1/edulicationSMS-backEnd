<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Teacher</h4>
                    <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('teacher-list') }}" class="btn btn-primary light">Teacher list</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <h5>Add Teacher</h5>

                        <form class="needs-validation" novalidate method="POST" action="{{ route('store-teacher') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="validationCustom02">First Name <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Your valid First Name." required name="first_name">
                                            <div class="invalid-feedback">
                                                Please enter a First Name.
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <div class="error">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="validationCustom02">Last Name <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Your valid Last Name." required name="last_name">
                                            <div class="invalid-feedback">
                                                Please enter a Last Name.
                                            </div>
                                            @if ($errors->has('last_name'))
                                                <div class="error">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="birth">Date of Birth<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" id="birth"
                                                placeholder="Your valid Last Name." required name="birth">
                                            <div class="invalid-feedback">
                                                Please enter a Date of Birth.
                                            </div>
                                            @if ($errors->has('birth'))
                                                <div class="error">{{ $errors->first('birth') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="commenceDate">Commence Date<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" id="commenceDate"
                                                placeholder="Your valid Last Name." required name="commenceDate">
                                            <div class="invalid-feedback">
                                                Please enter a Commence Date.
                                            </div>
                                            @if ($errors->has('commenceDate'))
                                                <div class="error">{{ $errors->first('commenceDate') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="email1">Trainer Email 1<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email1"
                                                placeholder="Your valid Trainer Email 1." required name="email1">
                                            <div class="invalid-feedback">
                                                Please enter a Trainer Email 1.
                                            </div>
                                            @if ($errors->has('email1'))
                                                <div class="error">{{ $errors->first('email1') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="email1">Trainer Email 2<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email2"
                                                placeholder="Your valid Trainer Email 2." name="email2">
                                            <div class="invalid-feedback">
                                                Please enter a Trainer Email 2.
                                            </div>
                                            @if ($errors->has('email2'))
                                                <div class="error">{{ $errors->first('email2') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="email3">Trainer Email 3<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email3"
                                                placeholder="Your valid Trainer Email 3." name="email3">
                                            <div class="invalid-feedback">
                                                Please enter a Trainer Email 3.
                                            </div>
                                            @if ($errors->has('email3'))
                                                <div class="error">{{ $errors->first('email3') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="address1">Address Line 1<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="address1"
                                                placeholder="Your valid Address Line 1." required name="address1">
                                            <div class="invalid-feedback">
                                                Please enter a Address Line 1.
                                            </div>
                                            @if ($errors->has('address1'))
                                                <div class="error">{{ $errors->first('address1') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="address2">Address Line 2<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="address2"
                                                placeholder="Your valid Address Line 2." name="address2">
                                            <div class="invalid-feedback">
                                                Please enter a Address Line 2.
                                            </div>
                                            @if ($errors->has('address2'))
                                                <div class="error">{{ $errors->first('address2') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="suburb">Suburb<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="suburb"
                                                placeholder="Your valid Suburb." required name="suburb">
                                            <div class="invalid-feedback">
                                                Please enter a Suburb.
                                            </div>
                                            @if ($errors->has('suburb'))
                                                <div class="error">{{ $errors->first('suburb') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="state">State<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="state"
                                                placeholder="Your valid State." required name="state">
                                            <div class="invalid-feedback">
                                                Please enter a State.
                                            </div>
                                            @if ($errors->has('state'))
                                                <div class="error">{{ $errors->first('state') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="postcode">Postcode<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="postcode"
                                                placeholder="Your valid Postcode." required name="postcode">
                                            <div class="invalid-feedback">
                                                Please enter a Postcode.
                                            </div>
                                            @if ($errors->has('postcode'))
                                                <div class="error">{{ $errors->first('postcode') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="country">Country<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <select name="country" id="country" class="form-select"
                                                style="width:250px;" fdprocessedid="9pcl5k">
                                                <option value="default">Select country</option>
                                                <option value="Adelie Land (France)">Adelie Land (France)</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Africa, nfd">Africa, nfd</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Americas">Americas</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Argentinian Antarctic Territory">Argentinian Antarctic
                                                    Territory</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Asia, nfd">Asia, nfd</option>
                                                <option value="At Sea">At Sea</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Australia (includes External Territories)">Australia
                                                    (includes External Territories)</option>
                                                <option value="Australian Antarctic Territory">Australian Antarctic
                                                    Territory</option>
                                                <option value="Australian External Territories, nec">Australian External
                                                    Territories, nec</option>
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
                                                <option value="Bolivia, Plurinational State of">Bolivia, Plurinational
                                                    State of</option>
                                                <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius
                                                    and Saba</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Antarctic Territory">British Antarctic Territory
                                                </option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burma (Republic of the Union of Myanmar)">Burma (Republic of
                                                    the Union of Myanmar)</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Caribbean">Caribbean</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Central America">Central America</option>
                                                <option value="Central and West Africa">Central and West Africa</option>
                                                <option value="Central Asia">Central Asia</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="Chilean Antarctic Territory">Chilean Antarctic Territory
                                                </option>
                                                <option value="China (excludes SARs and Taiwan)">China (excludes SARs and
                                                    Taiwan)</option>
                                                <option value="Chinese Asia (includes Mongolia)">Chinese Asia (includes
                                                    Mongolia)</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo, Democratic Republic of">Congo, Democratic Republic of
                                                </option>
                                                <option value="Congo, Republic of ">Congo, Republic of </option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote d" ivoire'="">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curacao">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Asia, nfd">East Asia, nfd</option>
                                                <option value="Eastern Europe">Eastern Europe</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="England">England</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Europe, nfd">Europe, nfd</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="Former USSR, nfd">Former USSR, nfd</option>
                                                <option value="Former Yugoslav Republic of Macedonia (FYROM)">Former
                                                    Yugoslav Republic of Macedonia (FYROM)</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Gaza Strip and West Bank">Gaza Strip and West Bank</option>
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
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Holy See">Holy See</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong (SAR of China)">Hong Kong (SAR of China)</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Inadequately Described">Inadequately Described</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Japan and the Koreas">Japan and the Koreas</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People" s="" republic=""
                                                    of="" (north)'="">Korea, Democratic People's Republic of
                                                    (North)</option>
                                                <option value="Korea, Republic of (South)">Korea, Republic of (South)
                                                </option>
                                                <option value="Kosovo">Kosovo</option>
                                                <option value="Kurdistan, nfd">Kurdistan, nfd</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau (SAR of China)">Macau (SAR of China)</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Mainland South-East Asia">Mainland South-East Asia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Maritime South-East Asia">Maritime South-East Asia</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Melanesia">Melanesia</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated
                                                    States of</option>
                                                <option value="Middle East">Middle East</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
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
                                                <option value="North Africa">North Africa</option>
                                                <option value="North Africa and the Middle East">North Africa and the
                                                    Middle East</option>
                                                <option value="North-East Asia">North-East Asia</option>
                                                <option value="North-West Europe">North-West Europe</option>
                                                <option value="Northern America">Northern America</option>
                                                <option value="Northern Europe">Northern Europe</option>
                                                <option value="Northern Ireland">Northern Ireland</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Not Specified">Not Specified</option>
                                                <option value="Oceania and Antarctica">Oceania and Antarctica</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Polynesia (excludes Hawaii)">Polynesia (excludes Hawaii)
                                                </option>
                                                <option value="Polynesia (excludes Hawaii), nec">Polynesia (excludes
                                                    Hawaii), nec</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Queen Maud Land (Norway)">Queen Maud Land (Norway)</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Ross Dependency (New Zealand)">Ross Dependency (New Zealand)
                                                </option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa, American">Samoa, American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Scotland">Scotland</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)
                                                </option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South America">South America</option>
                                                <option value="South America, nec">South America, nec</option>
                                                <option value="South Eastern Europe">South Eastern Europe</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="South-East Asia">South-East Asia</option>
                                                <option value="Southern and Central Asia">Southern and Central Asia
                                                </option>
                                                <option value="Southern and East Africa">Southern and East Africa</option>
                                                <option value="Southern and East Africa, nec">Southern and East Africa, nec
                                                </option>
                                                <option value="Southern and Eastern Europe">Southern and Eastern Europe
                                                </option>
                                                <option value="Southern Asia">Southern Asia</option>
                                                <option value="Southern Europe">Southern Europe</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Spanish North Africa">Spanish North Africa</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts and Nevis">St Kitts and Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Martin (French part)">St Martin (French part)</option>
                                                <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
                                                <option value="St Vincent and the Grenadines">St Vincent and the Grenadines
                                                </option>
                                                <option value="Sub-Saharan Africa">Sub-Saharan Africa</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
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
                                                <option value="United Kingdom, Channel Islands and Isle of Man">United
                                                    Kingdom, Channel Islands and Isle of Man</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian
                                                    Republic of</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, United States">Virgin Islands, United States
                                                </option>
                                                <option value="Wales">Wales</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Europe">Western Europe</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a Country.
                                            </div>
                                            @if ($errors->has('country'))
                                                <div class="error">{{ $errors->first('country') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="phone1">Phone Number 1<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="phone" class="form-control" id="phone1"
                                                placeholder="Your valid Phone Number 1." required name="phone1">
                                            <div class="invalid-feedback">
                                                Please enter a Phone Number 1.
                                            </div>
                                            @if ($errors->has('phone1'))
                                                <div class="error">{{ $errors->first('phone1') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="phone2">Phone Number 2<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="phone" class="form-control" id="phone2"
                                                placeholder="Your valid Phone Number 2." required name="phone2">
                                            <div class="invalid-feedback">
                                                Please enter a Phone Number 2.
                                            </div>
                                            @if ($errors->has('phone2'))
                                                <div class="error">{{ $errors->first('phone2') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="days">Email Summary Day(s)
                                            Prior<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="days"
                                                placeholder="Your valid Email Summary Day(s) Prior." required
                                                name="days">
                                            <div class="invalid-feedback">
                                                Please enter a Email Summary Day(s) Prior.
                                            </div>
                                            @if ($errors->has('days'))
                                                <div class="error">{{ $errors->first('days') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-3 col-form-label" for="additionalId">Additional
                                            Identifier<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="additionalId"
                                                placeholder="Your valid Additional Identifier." required
                                                name="additionalId">
                                            <div class="invalid-feedback">
                                                Please enter a Additional Identifier.
                                            </div>
                                            @if ($errors->has('additionalId'))
                                                <div class="error">{{ $errors->first('additionalId') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4"></div>
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary light">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@section('customjs')




    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated');
                    }, false);
                })
        })()


        $('[name=tab]').each(function(i, d) {
            var p = $(this).prop('checked');
            //   console.log(p);
            if (p) {
                $('article').eq(i)
                    .addClass('on');
            }
        });

        $('[name=tab]').on('change', function() {
            var p = $(this).prop('checked');

            // $(type).index(this) == nth-of-type
            var i = $('[name=tab]').index(this);

            $('article').removeClass('on');
            $('article').eq(i).addClass('on');
        });
    </script>
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <!--<script src="./vendor/moment/moment.min.js"></script>-->
    <script src="{{ asset('admin/vendor/moment/moment.min.js') }}"></script>
    <!--<script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <script src="{{ asset('admin/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- clockpicker -->
    <script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <!--<script src="./vendor/pickadate/picker.js"></script>-->
    <script src="{{ asset('admin/vendor/pickadate/picker.js') }}"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <!--<script src="./vendor/pickadate/picker.date.js"></script>-->
    <script src="{{ asset('admin/vendor/pickadate/picker.date.js') }}"></script>


    <!-- Daterangepicker -->
    <!--<script src="./js/plugins-init/bs-daterange-picker-init.js"></script>-->
    <script src="{{ asset('admin/js/plugins-init/bs-daterange-picker-init.js') }}"></script>

    <!-- Clockpicker init -->
    <script src="./js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <!--<script src="./js/plugins-init/material-date-picker-init.js"></script>-->
    <script src="{{ asset('admin/js/plugins-init/material-date-picker-init.js') }}"></script>

    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!--<script src="./js/custom.js"></script>-->
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <!--<script src="./js/deznav-init.js"></script>-->
    <script src="{{ asset('admin/js/deznav-init.js') }}"></script>
@endsection
@stop
