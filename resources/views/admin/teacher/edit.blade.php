
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Teacher</h4>
                <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="user-create.html" class="btn btn-primary light">Teacher List</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <h5>Edit Teacher</h5>

                    <form class="needs-validation" novalidate method="POST" action="{{ route('update-teacher',$teacher->id ) }}" >
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-3 col-form-label" for="validationCustom02">First Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Your valid First Name." name="first_name" value="{{ $teacher->first_name }}" required>
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
                                            placeholder="Your valid Last Name."  name="last_name" value="{{ $teacher->last_name }}"  required>
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
                                            placeholder="Your valid Last Name." name="birth" value="{{ $teacher->birth }}" required>
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
                                            placeholder="Your valid Last Name."  name="commenceDate" value="{{ $teacher->commenceDate }}" required>
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
                                        <input type="email" class="form-control" id="email1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                            placeholder="Your valid Trainer Email 1."  name="email1" value="{{ $teacher->email1 }}" required>
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
                                        <input type="email" class="form-control" id="email2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                            placeholder="Your valid Trainer Email 2." name="email2" value="{{ $teacher->email2 }}">
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
                                        <input type="email" class="form-control" id="email3" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                            placeholder="Your valid Trainer Email 3." name="email3" value="{{ $teacher->email3 }}">
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
                                            placeholder="Your valid Address Line 1."  name="address1" value="{{ $teacher->address1 }}" required>
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
                                            placeholder="Your valid Address Line 2." name="address2" value="{{ $teacher->address2 }}">
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
                                            placeholder="Your valid Suburb."  name="suburb" value="{{ $teacher->suburb }}" required>
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
                                            placeholder="Your valid State." name="state" value="{{ $teacher->state}}" required>
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
                                            placeholder="Your valid Postcode." name="postcode" value="{{ $teacher->postcode }}" required>
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
                                            <option value="Adelie Land (France)" {{ $teacher->country == "Adelie Land (France)" ? 'selected' : '' }}>Adelie Land (France)</option>
                                            <option value="Afghanistan" {{ $teacher->country == "Afghanistan" ? 'selected' : '' }}>Afghanistan</option>
                                            <option value="Africa, nfd" {{ $teacher->country == "Africa, nfd" ? 'selected' : '' }}>Africa, nfd</option>
                                            <option value="Aland Islands" {{ $teacher->country == "Aland Islands" ? 'selected' : '' }}>Aland Islands</option>
                                            <option value="Albania" {{ $teacher->country == "Albania" ? 'selected' : '' }}>Albania</option>
                                            <option value="Algeria" {{ $teacher->country == "Algeria" ? 'selected' : '' }}>Algeria</option>
                                            <option value="Americas" {{ $teacher->country == "Americas" ? 'selected' : '' }}>Americas</option>
                                            <option value="Andorra" {{ $teacher->country == "Andorra" ? 'selected' : '' }}>Andorra</option>
                                            <option value="Angola" {{ $teacher->country == "Angola" ? 'selected' : '' }}>Angola</option>
                                            <option value="Anguilla" {{ $teacher->country == "Anguilla" ? 'selected' : '' }}>Anguilla</option>
                                            <option value="Antarctica" {{ $teacher->country == "Antarctica" ? 'selected' : '' }}>Antarctica</option>
                                            <option value="Antigua and Barbuda" {{ $teacher->country == "Antigua and Barbuda" ? 'selected' : '' }}>Antigua and Barbuda</option>
                                            <option value="Argentina" {{ $teacher->country == "Argentina" ? 'selected' : '' }}>Argentina</option>
                                            <option value="Argentinian Antarctic Territory" {{ $teacher->country == "Argentinian Antarctic Territory" ? 'selected' : '' }}>Argentinian Antarctic Territory</option>
                                            <option value="Armenia" {{ $teacher->country == "Armenia" ? 'selected' : '' }}>Armenia</option>
                                            <option value="Aruba" {{ $teacher->country == "Aruba" ? 'selected' : '' }}>Aruba</option>
                                            <option value="Asia, nfd" {{ $teacher->country == "Asia, nfd" ? 'selected' : '' }}>Asia, nfd</option>
                                            <option value="At Sea" {{ $teacher->country == "At Sea" ? 'selected' : '' }}>At Sea</option>
                                            <option value="Australia" {{ $teacher->country == "Australia" ? 'selected' : '' }}>Australia</option>
                                            <option value="Australia (includes External Territories)" {{ $teacher->country == "Australia (includes External Territories)" ? 'selected' : '' }}>Australia (includes External Territories)</option>
                                            <option value="Australian Antarctic Territory" {{ $teacher->country == "Australian Antarctic Territory" ? 'selected' : '' }}>Australian Antarctic Territory</option>
                                            <option value="Australian External Territories, nec" {{ $teacher->country == "Australian External Territories, nec" ? 'selected' : '' }}>Australian External Territories, nec</option>
                                            <option value="Austria" {{ $teacher->country == "Austria" ? 'selected' : '' }}>Austria</option>
                                            <option value="Azerbaijan" {{ $teacher->country == "Azerbaijan" ? 'selected' : '' }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ $teacher->country == "Bahamas" ? 'selected' : '' }}>Bahamas</option>
                                            <option value="Bahrain" {{ $teacher->country == "Bahrain" ? 'selected' : '' }}>Bahrain</option>
                                            <option value="Bangladesh" {{ $teacher->country == "Bangladesh" ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="Barbados" {{ $teacher->country == "Barbados" ? 'selected' : '' }}>Barbados</option>
                                            <option value="Belarus" {{ $teacher->country == "Belarus" ? 'selected' : '' }}>Belarus</option>
                                            <option value="Belgium" {{ $teacher->country == "Belgium" ? 'selected' : '' }}>Belgium</option>
                                            <option value="Belize" {{ $teacher->country == "Belize" ? 'selected' : '' }}>Belize</option>
                                            <option value="Benin" {{ $teacher->country == "Benin" ? 'selected' : '' }}>Benin</option>
                                            <option value="Bermuda" {{ $teacher->country == "Bermuda" ? 'selected' : '' }}>Bermuda</option>
                                            <option value="Bhutan" {{ $teacher->country == "Bhutan" ? 'selected' : '' }}>Bhutan</option>
                                            <option value="Bolivia, Plurinational State of" {{ $teacher->country == "Bolivia, Plurinational State of" ? 'selected' : '' }}>Bolivia, Plurinational State of</option>
                                            <option value="Bonaire, Sint Eustatius and Saba" {{ $teacher->country == "Bonaire, Sint Eustatius and Saba" ? 'selected' : '' }}>Bonaire, Sint Eustatius and Saba</option>
                                            <option value="Bosnia and Herzegovina" {{ $teacher->country == "Bosnia and Herzegovina" ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                            <option value="Botswana" {{ $teacher->country == "Botswana" ? 'selected' : '' }}>Botswana</option>
                                            <option value="Brazil" {{ $teacher->country == "Brazil" ? 'selected' : '' }}>Brazil</option>
                                            <option value="British Antarctic Territory" {{ $teacher->country == "British Antarctic Territory" ? 'selected' : '' }}>British Antarctic Territory </option>
                                            <option value="Brunei Darussalam" {{ $teacher->country == "Brunei Darussalam" ? 'selected' : '' }}>Brunei Darussalam</option>
                                            <option value="Bulgaria" {{ $teacher->country == "Bulgaria" ? 'selected' : '' }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ $teacher->country == "Burkina Faso" ? 'selected' : '' }}>Burkina Faso</option>
                                            <option value="Burma (Republic of the Union of Myanmar)" {{ $teacher->country == "Burma (Republic of the Union of Myanmar)" ? 'selected' : '' }}>Burma (Republic of the Union of Myanmar)</option>
                                            <option value="Burundi" {{ $teacher->country == "Burundi" ? 'selected' : '' }}>Burundi</option>
                                            <option value="Cambodia" {{ $teacher->country == "Cambodia" ? 'selected' : '' }}>Cambodia</option>
                                            <option value="Cameroon" {{ $teacher->country == "Cameroon" ? 'selected' : '' }}>Cameroon</option>
                                            <option value="Canada" {{ $teacher->country == "Canada" ? 'selected' : '' }}>Canada</option>
                                            <option value="Cape Verde" {{ $teacher->country == "Cape Verde" ? 'selected' : '' }}>Cape Verde</option>
                                            <option value="Caribbean" {{ $teacher->country == "Caribbean" ? 'selected' : '' }}>Caribbean</option>
                                            <option value="Cayman Islands" {{ $teacher->country == "Cayman Islands " ? 'selected' : '' }}>Cayman Islands</option>
                                            <option value="Central African Republic" {{ $teacher->country == "Central African Republic" ? 'selected' : '' }}>Central African Republic</option>
                                            <option value="Central America" {{ $teacher->country == "Central America" ? 'selected' : '' }}>Central America</option>
                                            <option value="Central and West Africa" {{ $teacher->country == "Central and West Africa" ? 'selected' : '' }}>Central and West Africa</option>
                                            <option value="Central Asia" {{ $teacher->country == "Central Asia" ? 'selected' : '' }}>Central Asia</option>
                                            <option value="Chad" {{ $teacher->country == "Chad" ? 'selected' : '' }}>Chad</option>
                                            <option value="Chile" {{ $teacher->country == "Chile" ? 'selected' : '' }}>Chile</option>
                                            <option value="Chilean Antarctic Territory" {{ $teacher->country == "Chilean Antarctic Territory" ? 'selected' : '' }}>Chilean Antarctic Territory </option>
                                            <option value="China (excludes SARs and Taiwan)" {{ $teacher->country == "China (excludes SARs and Taiwan)" ? 'selected' : '' }}>China (excludes SARs and Taiwan)</option>
                                            <option value="Chinese Asia (includes Mongolia)" {{ $teacher->country == "Chinese Asia (includes Mongolia)" ? 'selected' : '' }}>Chinese Asia (includes Mongolia)</option>
                                            <option value="Colombia" {{ $teacher->country == "Colombia" ? 'selected' : '' }}>Colombia</option>
                                            <option value="Comoros" {{ $teacher->country == "Comoros" ? 'selected' : '' }}>Comoros</option>
                                            <option value="Congo, Democratic Republic of" {{ $teacher->country == "Congo, Democratic Republic of" ? 'selected' : '' }}>Congo, Democratic Republic of</option>
                                            <option value="Congo, Republic of" {{ $teacher->country == "Congo, Republic of" ? 'selected' : '' }}>Congo, Republic of </option>
                                            <option value="Cook Islands" {{ $teacher->country == "Cook Islands" ? 'selected' : '' }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ $teacher->country == "Costa Rica" ? 'selected' : '' }}>Costa Rica</option>
                                            <option value="Cote d'ivoire" {{ $teacher->country == "Cote d'ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                            <option value="Croatia" {{ $teacher->country == "Croatia" ? 'selected' : '' }}>Croatia</option>
                                            <option value="Cuba" {{ $teacher->country == "Cuba" ? 'selected' : '' }}>Cuba</option>
                                            <option value="Curacao" {{ $teacher->country == "Curacao" ? 'selected' : '' }}>Curacao</option>
                                            <option value="Cyprus" {{ $teacher->country == "Cyprus" ? 'selected' : '' }}>Cyprus</option>
                                            <option value="Czech Republic" {{ $teacher->country == "Czech Republic" ? 'selected' : '' }}>Czech Republic</option>
                                            <option value="Denmark" {{ $teacher->country == "Denmark" ? 'selected' : '' }}>Denmark</option>
                                            <option value="Djibouti" {{ $teacher->country == "Djibouti" ? 'selected' : '' }}>Djibouti</option>
                                            <option value="Dominica" {{ $teacher->country == "Dominica" ? 'selected' : '' }}>Dominica</option>
                                            <option value="Dominican Republic" {{ $teacher->country == "Dominican Republic" ? 'selected' : '' }}>Dominican Republic</option>
                                            <option value="East Asia, nfd" {{ $teacher->country == "East Asia, nfd" ? 'selected' : '' }}>East Asia, nfd</option>
                                            <option value="Eastern Europe" {{ $teacher->country == "Eastern Europe" ? 'selected' : '' }}>Eastern Europe</option>
                                            <option value="Ecuador" {{ $teacher->country == "Ecuador" ? 'selected' : '' }}>Ecuador</option>
                                            <option value="Egypt" {{ $teacher->country == "Egypt" ? 'selected' : '' }}>Egypt</option>
                                            <option value="El Salvador" {{ $teacher->country == "El Salvador" ? 'selected' : '' }}>El Salvador</option>
                                            <option value="England" {{ $teacher->country == "England" ? 'selected' : '' }}>England</option>
                                            <option value="Equatorial Guinea" {{ $teacher->country == "Equatorial Guinea" ? 'selected' : '' }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ $teacher->country == "Eritrea" ? 'selected' : '' }}>Eritrea</option>
                                            <option value="Estonia"> {{ $teacher->country == "Estonia" ? 'selected' : '' }}Estonia</option>
                                            <option value="Ethiopia" {{ $teacher->country == "Ethiopia" ? 'selected' : '' }}>Ethiopia</option>
                                            <option value="Europe, nfd" {{ $teacher->country == "Europe, nfd" ? 'selected' : '' }}>Europe, nfd</option>
                                            <option value="Falkland Islands" {{ $teacher->country == "Falkland Islands" ? 'selected' : '' }}>Falkland Islands</option>
                                            <option value="Faroe Islands" {{ $teacher->country == "Faroe Islands" ? 'selected' : '' }}>Faroe Islands</option>
                                            <option value="Fiji" {{ $teacher->country == "Fiji" ? 'selected' : '' }}>Fiji</option>
                                            <option value="Finland" {{ $teacher->country == "Finland" ? 'selected' : '' }}>Finland</option>
                                            <option value="Former USSR, nfd" {{ $teacher->country == "Former USSR, nfd" ? 'selected' : '' }}>Former USSR, nfd</option>
                                            <option value="Former Yugoslav Republic of Macedonia (FYROM)" {{ $teacher->country == "Former Yugoslav Republic of Macedonia (FYROM)" ? 'selected' : '' }}>Former Yugoslav Republic of Macedonia (FYROM)</option>
                                            <option value="France" {{ $teacher->country == "France" ? 'selected' : '' }}>France</option>
                                            <option value="French Guiana" {{ $teacher->country == "French Guiana" ? 'selected' : '' }}>French Guiana</option>
                                            <option value="French Polynesia" {{ $teacher->country == "French Polynesia" ? 'selected' : '' }}>French Polynesia</option>
                                            <option value="Gabon" {{ $teacher->country == "Gabon" ? 'selected' : '' }}>Gabon</option>
                                            <option value="Gambia" {{ $teacher->country == "Gambia" ? 'selected' : '' }}>Gambia</option>
                                            <option value="Gaza Strip and West Bank" {{ $teacher->country == "Gaza Strip and West Bank" ? 'selected' : '' }}>Gaza Strip and West Bank</option>
                                            <option value="Georgia" {{ $teacher->country == "Georgia" ? 'selected' : '' }}>Georgia</option>
                                            <option value="Germany" {{ $teacher->country == "Germany" ? 'selected' : '' }}>Germany</option>
                                            <option value="Ghana" {{ $teacher->country == "Ghana" ? 'selected' : '' }}>Ghana</option>
                                            <option value="Gibraltar" {{ $teacher->country == "Gibraltar" ? 'selected' : '' }}>Gibraltar</option>
                                            <option value="Greece" {{ $teacher->country == "Greece" ? 'selected' : '' }}>Greece</option>
                                            <option value="Greenland" {{ $teacher->country == "Greenland" ? 'selected' : '' }}>Greenland</option>
                                            <option value="Grenada" {{ $teacher->country == "Grenada" ? 'selected' : '' }}>Grenada</option>
                                            <option value="Guadeloupe" {{ $teacher->country == "Guadeloupe" ? 'selected' : '' }}>Guadeloupe</option>
                                            <option value="Guam" {{ $teacher->country == "Guam" ? 'selected' : '' }}>Guam</option>
                                            <option value="Guatemala" {{ $teacher->country == "Guatemala" ? 'selected' : '' }}>Guatemala</option>
                                            <option value="Guernsey" {{ $teacher->country == "Guernsey" ? 'selected' : '' }}>Guernsey</option>
                                            <option value="Guinea" {{ $teacher->country == "Guinea" ? 'selected' : '' }}>Guinea</option>
                                            <option value="Guinea-Bissau" {{ $teacher->country == "Guinea-Bissau" ? 'selected' : '' }}>Guinea-Bissau</option>
                                            <option value="Guyana" {{ $teacher->country == "Guyana" ? 'selected' : '' }}>Guyana</option>
                                            <option value="Haiti" {{ $teacher->country == "Haiti" ? 'selected' : '' }}>Haiti</option>
                                            <option value="Holy See" {{ $teacher->country == "Holy See" ? 'selected' : '' }}>Holy See</option>
                                            <option value="Honduras" {{ $teacher->country == "Honduras" ? 'selected' : '' }}>Honduras</option>
                                            <option value="Hong Kong (SAR of China)" {{ $teacher->country == "Hong Kong (SAR of China)" ? 'selected' : '' }}>Hong Kong (SAR of China)</option>
                                            <option value="Hungary" {{ $teacher->country == "Hungary" ? 'selected' : '' }}>Hungary</option>
                                            <option value="Iceland" {{ $teacher->country == "Iceland" ? 'selected' : '' }}>Iceland</option>
                                            <option value="Inadequately Described" {{ $teacher->country == "Inadequately Described" ? 'selected' : '' }}>Inadequately Described</option>
                                            <option value="India" {{ $teacher->country == "India" ? 'selected' : '' }}>India</option>
                                            <option value="Indonesia" {{ $teacher->country == "Indonesia" ? 'selected' : '' }}>Indonesia</option>
                                            <option value="Iran" {{ $teacher->country == "Iran" ? 'selected' : '' }}>Iran</option>
                                            <option value="Iraq" {{ $teacher->country == "Iraq" ? 'selected' : '' }}>Iraq</option>
                                            <option value="Ireland" {{ $teacher->country == "Ireland" ? 'selected' : '' }}>Ireland</option>
                                            <option value="Isle of Man" {{ $teacher->country == "Isle of Man" ? 'selected' : '' }}>Isle of Man</option>
                                            <option value="Israel" {{ $teacher->country == "Israel" ? 'selected' : '' }}>Israel</option>
                                            <option value="Italy" {{ $teacher->country == "Italy" ? 'selected' : '' }}>Italy</option>
                                            <option value="Jamaica" {{ $teacher->country == "Jamaica" ? 'selected' : '' }}>Jamaica</option>
                                            <option value="Japan" {{ $teacher->country == "Japan" ? 'selected' : '' }}>Japan</option>
                                            <option value="Japan and the Koreas" {{ $teacher->country == "Japan and the Koreas" ? 'selected' : '' }}>Japan and the Koreas</option>
                                            <option value="Jersey" {{ $teacher->country == "Jersey" ? 'selected' : '' }}>Jersey</option>
                                            <option value="Jordan" {{ $teacher->country == "Jordan" ? 'selected' : '' }}>Jordan</option>
                                            <option value="Kazakhstan" {{ $teacher->country == "Kazakhstan" ? 'selected' : '' }}>Kazakhstan</option>
                                            <option value="Kenya" {{ $teacher->country == "Kenya" ? 'selected' : '' }}>Kenya</option>
                                            <option value="Kiribati" {{ $teacher->country == "Kiribati" ? 'selected' : '' }}>Kiribati</option>
                                            <option value="Korea, Democratic People' s' republic' of' (north)'" {{ $teacher->country == "Korea, Democratic People' s' republic' of' (north)'" ? 'selected' : '' }}>Korea, Democratic People's Republic of (North)</option>
                                            <option value="Korea, Republic of (South)" {{ $teacher->country == "Korea, Republic of (South)" ? 'selected' : '' }}>Korea, Republic of (South)</option>
                                            <option value="Kosovo" {{ $teacher->country == "Kosovo" ? 'selected' : '' }}>Kosovo</option>
                                            <option value="Kurdistan, nfd" {{ $teacher->country == "Kurdistan, nfd" ? 'selected' : '' }}>Kurdistan, nfd</option>
                                            <option value="Kuwait" {{ $teacher->country == "Kuwait" ? 'selected' : '' }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ $teacher->country == "Kyrgyzstan" ? 'selected' : '' }}>Kyrgyzstan</option>
                                            <option value="Laos" {{ $teacher->country == "Laos" ? 'selected' : '' }}>Laos</option>
                                            <option value="Latvia" {{ $teacher->country == "Latvia" ? 'selected' : '' }}>Latvia</option>
                                            <option value="Lebanon" {{ $teacher->country == "Lebanon" ? 'selected' : '' }}>Lebanon</option>
                                            <option value="Lesotho" {{ $teacher->country == "Lesotho" ? 'selected' : '' }}>Lesotho</option>
                                            <option value="Liberia" {{ $teacher->country == "Liberia" ? 'selected' : '' }}>Liberia</option>
                                            <option value="Libya" {{ $teacher->country == "Libya" ? 'selected' : '' }}>Libya</option>
                                            <option value="Liechtenstein" {{ $teacher->country == "Liechtenstein" ? 'selected' : '' }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ $teacher->country == "Lithuania" ? 'selected' : '' }}>Lithuania</option>
                                            <option value="Luxembourg" {{ $teacher->country == "Luxembourg" ? 'selected' : '' }}>Luxembourg</option>
                                            <option value="Macau (SAR of China)" {{ $teacher->country == "Macau (SAR of China)" ? 'selected' : '' }}>Macau (SAR of China)</option>
                                            <option value="Madagascar" {{ $teacher->country == "Madagascar" ? 'selected' : '' }}>Madagascar</option>
                                            <option value="Mainland South-East Asia" {{ $teacher->country == "Mainland South-East Asia" ? 'selected' : '' }}>Mainland South-East Asia</option>
                                            <option value="Malawi" {{ $teacher->country == "Malawi" ? 'selected' : '' }}>Malawi</option>
                                            <option value="Malaysia" {{ $teacher->country == "Malaysia" ? 'selected' : '' }}>Malaysia</option>
                                            <option value="Maldives" {{ $teacher->country == "Maldives" ? 'selected' : '' }}>Maldives</option>
                                            <option value="Mali" {{ $teacher->country == "Mali" ? 'selected' : '' }}>Mali</option>
                                            <option value="Malta" {{ $teacher->country == "Malta" ? 'selected' : '' }}>Malta</option>
                                            <option value="Maritime South-East Asia" {{ $teacher->country == "Maritime South-East Asia" ? 'selected' : '' }}>Maritime South-East Asia</option>
                                            <option value="Marshall Islands" {{ $teacher->country == "Marshall Islands" ? 'selected' : '' }}>Marshall Islands</option>
                                            <option value="Martinique" {{ $teacher->country == "Martinique" ? 'selected' : '' }}>Martinique</option>
                                            <option value="Mauritania" {{ $teacher->country == "Mauritania" ? 'selected' : '' }}>Mauritania</option>
                                            <option value="Mauritius" {{ $teacher->country == "Mauritius" ? 'selected' : '' }}>Mauritius</option>
                                            <option value="Mayotte" {{ $teacher->country == "Mayotte" ? 'selected' : '' }}>Mayotte</option>
                                            <option value="Melanesia" {{ $teacher->country == "Melanesia" ? 'selected' : '' }}>Melanesia</option>
                                            <option value="Mexico" {{ $teacher->country == "Mexico" ? 'selected' : '' }}>Mexico</option>
                                            <option value="Micronesia" {{ $teacher->country == "Micronesia" ? 'selected' : '' }}>Micronesia</option>
                                            <option value="Micronesia, Federated States of" {{ $teacher->country == "Micronesia, Federated States of" ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                            <option value="Middle East" {{ $teacher->country == "Middle East" ? 'selected' : '' }}>Middle East</option>
                                            <option value="Moldova" {{ $teacher->country == "Moldova" ? 'selected' : '' }}>Moldova</option>
                                            <option value="Monaco" {{ $teacher->country == "Monaco" ? 'selected' : '' }}>Monaco</option>
                                            <option value="Mongolia" {{ $teacher->country == "Mongolia" ? 'selected' : '' }}>Mongolia</option>
                                            <option value="Montenegro" {{ $teacher->country == "Montenegro" ? 'selected' : '' }}>Montenegro</option>
                                            <option value="Montserrat" {{ $teacher->country == "Montserrat" ? 'selected' : '' }}>Montserrat</option>
                                            <option value="Morocco" {{ $teacher->country == "Morocco" ? 'selected' : '' }}>Morocco</option>
                                            <option value="Mozambique" {{ $teacher->country == "Mozambique" ? 'selected' : '' }}>Mozambique</option>
                                            <option value="Namibia" {{ $teacher->country == "Namibia" ? 'selected' : '' }}>Namibia</option>
                                            <option value="Nauru" {{ $teacher->country == "Nauru" ? 'selected' : '' }}>Nauru</option>
                                            <option value="Nepal" {{ $teacher->country == "Nepal" ? 'selected' : '' }}>Nepal</option>
                                            <option value="Netherlands" {{ $teacher->country == "Netherlands" ? 'selected' : '' }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ $teacher->country == "Netherlands Antilles" ? 'selected' : '' }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ $teacher->country == "New Caledonia" ? 'selected' : '' }}>New Caledonia</option>
                                            <option value="New Zealand" {{ $teacher->country == "New Zealand" ? 'selected' : '' }}>New Zealand</option>
                                            <option value="Nicaragua" {{ $teacher->country == "Nicaragua" ? 'selected' : '' }}>Nicaragua</option>
                                            <option value="Niger" {{ $teacher->country == "Niger" ? 'selected' : '' }}>Niger</option>
                                            <option value="Nigeria" {{ $teacher->country == "Nigeria" ? 'selected' : '' }}>Nigeria</option>
                                            <option value="Niue" {{ $teacher->country == "Niue" ? 'selected' : '' }}>Niue</option>
                                            <option value="Norfolk Island" {{ $teacher->country == "Norfolk Island" ? 'selected' : '' }}>Norfolk Island</option>
                                            <option value="North Africa" {{ $teacher->country == "North Africa" ? 'selected' : '' }}>North Africa</option>
                                            <option value="North Africa and the Middle East" {{ $teacher->country == "North Africa and the Middle East" ? 'selected' : '' }}>North Africa and the Middle East</option>
                                            <option value="North-East Asia" {{ $teacher->country == "North-East Asia" ? 'selected' : '' }}>North-East Asia</option>
                                            <option value="North-West Europe" {{ $teacher->country == "North-West Europe" ? 'selected' : '' }}>North-West Europe</option>
                                            <option value="Northern America" {{ $teacher->country == "Northern America" ? 'selected' : '' }}>Northern America</option>
                                            <option value="Northern Europe" {{ $teacher->country == "Northern Europe" ? 'selected' : '' }}>Northern Europe</option>
                                            <option value="Northern Ireland" {{ $teacher->country == "Northern Ireland" ? 'selected' : '' }}>Northern Ireland</option>
                                            <option value="Northern Mariana Islands" {{ $teacher->country == "Northern Mariana Islands" ? 'selected' : '' }}>Northern Mariana Islands</option>
                                            <option value="Norway" {{ $teacher->country == "Norway" ? 'selected' : '' }}>Norway</option>
                                            <option value="Not Specified" {{ $teacher->country == "Not Specified" ? 'selected' : '' }}>Not Specified</option>
                                            <option value="Oceania and Antarctica" {{ $teacher->country == "Oceania and Antarctica" ? 'selected' : '' }}>Oceania and Antarctica</option>
                                            <option value="Oman" {{ $teacher->country == "Oman" ? 'selected' : '' }}>Oman</option>
                                            <option value="Pakistan" {{ $teacher->country == "Pakistan" ? 'selected' : '' }}>Pakistan</option>
                                            <option value="Palau" {{ $teacher->country == "Palau" ? 'selected' : '' }}>Palau</option>
                                            <option value="Panama" {{ $teacher->country == "Panama" ? 'selected' : '' }}>Panama</option>
                                            <option value="Papua New Guinea" {{ $teacher->country == "Papua New Guinea" ? 'selected' : '' }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ $teacher->country == "Paraguay" ? 'selected' : '' }}>Paraguay</option>
                                            <option value="Peru" {{ $teacher->country == "Peru" ? 'selected' : '' }}>Peru</option>
                                            <option value="Philippines" {{ $teacher->country == "Philippines" ? 'selected' : '' }}>Philippines</option>
                                            <option value="Pitcairn Islands" {{ $teacher->country == "Pitcairn Islands" ? 'selected' : '' }}>Pitcairn Islands</option>
                                            <option value="Poland" {{ $teacher->country == "Poland" ? 'selected' : '' }}>Poland</option>
                                            <option value="Polynesia (excludes Hawaii)" {{ $teacher->country == "Polynesia (excludes Hawaii)" ? 'selected' : '' }}>Polynesia (excludes Hawaii)</option>
                                            <option value="Polynesia (excludes Hawaii), nec" {{ $teacher->country == "Polynesia (excludes Hawaii), nec" ? 'selected' : '' }}>Polynesia (excludes Hawaii), nec</option>
                                            <option value="Portugal" {{ $teacher->country == "Portugal" ? 'selected' : '' }}>Portugal</option>
                                            <option value="Puerto Rico" {{ $teacher->country == "Puerto Rico" ? 'selected' : '' }}>Puerto Rico</option>
                                            <option value="Qatar" {{ $teacher->country == "Qatar" ? 'selected' : '' }}>Qatar</option>
                                            <option value="Queen Maud Land (Norway)" {{ $teacher->country == "Queen Maud Land (Norway)" ? 'selected' : '' }}>Queen Maud Land (Norway)</option>
                                            <option value="Reunion" {{ $teacher->country == "Reunion" ? 'selected' : '' }}>Reunion</option>
                                            <option value="Romania" {{ $teacher->country == "Romania" ? 'selected' : '' }}>Romania</option>
                                            <option value="Ross Dependency (New Zealand)" {{ $teacher->country == "Ross Dependency (New Zealand)" ? 'selected' : '' }}>Ross Dependency (New Zealand)</option>
                                            <option value="Russian Federation" {{ $teacher->country == "Russian Federation" ? 'selected' : '' }}>Russian Federation</option>
                                            <option value="Rwanda" {{ $teacher->country == "Rwanda" ? 'selected' : '' }}>Rwanda</option>
                                            <option value="Samoa" {{ $teacher->country == "Samoa" ? 'selected' : '' }}>Samoa</option>
                                            <option value="Samoa, American" {{ $teacher->country == "Samoa, American" ? 'selected' : '' }}>Samoa, American</option>
                                            <option value="San Marino" {{ $teacher->country == "San Marino" ? 'selected' : '' }}>San Marino</option>
                                            <option value="Sao Tome and Principe" {{ $teacher->country == "Sao Tome and Principe" ? 'selected' : '' }}>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" {{ $teacher->country == "Saudi Arabia" ? 'selected' : '' }}>Saudi Arabia</option>
                                            <option value="Scotland" {{ $teacher->country == "Scotland" ? 'selected' : '' }}>Scotland</option>
                                            <option value="Senegal" {{ $teacher->country == "Senegal" ? 'selected' : '' }}>Senegal</option>
                                            <option value="Serbia" {{ $teacher->country == "Serbia" ? 'selected' : '' }}>Serbia</option>
                                            <option value="Seychelles" {{ $teacher->country == "Seychelles" ? 'selected' : '' }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ $teacher->country == "Sierra Leone" ? 'selected' : '' }}>Sierra Leone</option>
                                            <option value="Singapore" {{ $teacher->country == "Singapore" ? 'selected' : '' }}>Singapore</option>
                                            <option value="Sint Maarten (Dutch part)" {{ $teacher->country == "Sint Maarten (Dutch part)" ? 'selected' : '' }}>Sint Maarten (Dutch part)</option>
                                            <option value="Slovakia" {{ $teacher->country == "Slovakia" ? 'selected' : '' }}>Slovakia</option>
                                            <option value="Slovenia" {{ $teacher->country == "Slovenia" ? 'selected' : '' }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ $teacher->country == "Solomon Islands" ? 'selected' : '' }}>Solomon Islands</option>
                                            <option value="Somalia" {{ $teacher->country == "Somalia" ? 'selected' : '' }}>Somalia</option>
                                            <option value="South Africa" {{ $teacher->country == "South Africa" ? 'selected' : '' }}>South Africa</option>
                                            <option value="South America" {{ $teacher->country == "South America" ? 'selected' : '' }}>South America</option>
                                            <option value="South America, nec" {{ $teacher->country == "South America, nec" ? 'selected' : '' }}>South America, nec</option>
                                            <option value="South Eastern Europe" {{ $teacher->country == "South Eastern Europe" ? 'selected' : '' }}>South Eastern Europe</option>
                                            <option value="South Sudan" {{ $teacher->country == "South Sudan" ? 'selected' : '' }}>South Sudan</option>
                                            <option value="South-East Asia" {{ $teacher->country == "South-East Asia" ? 'selected' : '' }}>South-East Asia</option>
                                            <option value="Southern and Central Asia" {{ $teacher->country == "Southern and Central Asia" ? 'selected' : '' }}>Southern and Central Asia</option>
                                            <option value="Southern and East Africa" {{ $teacher->country == "Southern and East Africa" ? 'selected' : '' }}>Southern and East Africa</option>
                                            <option value="Southern and East Africa, nec" {{ $teacher->country == "Southern and East Africa, nec" ? 'selected' : '' }}>Southern and East Africa, nec</option>
                                            <option value="Southern and Eastern Europe" {{ $teacher->country == "Southern and Eastern Europe" ? 'selected' : '' }}>Southern and Eastern Europe</option>
                                            <option value="Southern Asia" {{ $teacher->country == "Southern Asia" ? 'selected' : '' }}>Southern Asia</option>
                                            <option value="Southern Europe" {{ $teacher->country == "Southern Europe" ? 'selected' : '' }}>Southern Europe</option>
                                            <option value="Spain" {{ $teacher->country == "Spain" ? 'selected' : '' }}>Spain</option>
                                            <option value="Spanish North Africa" {{ $teacher->country == "Spanish North Africa" ? 'selected' : '' }}>Spanish North Africa</option>
                                            <option value="Sri Lanka" {{ $teacher->country == "Sri Lanka" ? 'selected' : '' }}>Sri Lanka</option>
                                            <option value="St Barthelemy" {{ $teacher->country == "St Barthelemy" ? 'selected' : '' }}>St Barthelemy</option>
                                            <option value="St Helena" {{ $teacher->country == "St Helena" ? 'selected' : '' }}>St Helena</option>
                                            <option value="St Kitts and Nevis" {{ $teacher->country == "St Kitts and Nevis" ? 'selected' : '' }}>St Kitts and Nevis</option>
                                            <option value="St Lucia" {{ $teacher->country == "St Lucia" ? 'selected' : '' }}>St Lucia</option>
                                            <option value="St Martin (French part)" {{ $teacher->country == "St Martin (French part)" ? 'selected' : '' }}>St Martin (French part)</option>
                                            <option value="St Pierre and Miquelon" {{ $teacher->country == "St Pierre and Miquelon" ? 'selected' : '' }}>St Pierre and Miquelon</option>
                                            <option value="St Vincent and the Grenadines" {{ $teacher->country == "St Vincent and the Grenadines" ? 'selected' : '' }}>St Vincent and the Grenadines</option>
                                            <option value="Sub-Saharan Africa" {{ $teacher->country == "Sub-Saharan Africa" ? 'selected' : '' }}>Sub-Saharan Africa</option>
                                            <option value="Sudan" {{ $teacher->country == "Sudan" ? 'selected' : '' }}>Sudan</option>
                                            <option value="Suriname" {{ $teacher->country == "Suriname" ? 'selected' : '' }}>Suriname</option>
                                            <option value="Swaziland" {{ $teacher->country == "Swaziland" ? 'selected' : '' }}>Swaziland</option>
                                            <option value="Sweden" {{ $teacher->country == "Sweden" ? 'selected' : '' }}>Sweden</option>
                                            <option value="Switzerland" {{ $teacher->country == "Switzerland" ? 'selected' : '' }}>Switzerland</option>
                                            <option value="Syria" {{ $teacher->country == "Syria" ? 'selected' : '' }}>Syria</option>
                                            <option value="Taiwan" {{ $teacher->country == "Taiwan" ? 'selected' : '' }}>Taiwan</option>
                                            <option value="Tajikistan" {{ $teacher->country == "Tajikistan" ? 'selected' : '' }}>Tajikistan</option>
                                            <option value="Tanzania" {{ $teacher->country == "Tanzania" ? 'selected' : '' }}>Tanzania</option>
                                            <option value="Thailand" {{ $teacher->country == "Thailand" ? 'selected' : '' }}>Thailand</option>
                                            <option value="Timor-Leste" {{ $teacher->country == "Timor-Leste" ? 'selected' : '' }}>Timor-Leste</option>
                                            <option value="Togo" {{ $teacher->country == "Togo" ? 'selected' : '' }}>Togo</option>
                                            <option value="Tokelau" {{ $teacher->country == "Tokelau" ? 'selected' : '' }}>Tokelau</option>
                                            <option value="Tonga" {{ $teacher->country == "Tonga" ? 'selected' : '' }}>Tonga</option>
                                            <option value="Trinidad and Tobago" {{ $teacher->country == "Trinidad and Tobago" ? 'selected' : '' }}>Trinidad and Tobago</option>
                                            <option value="Tunisia" {{ $teacher->country == "Tunisia" ? 'selected' : '' }}>Tunisia</option>
                                            <option value="Turkey" {{ $teacher->country == "Turkey" ? 'selected' : '' }}>Turkey</option>
                                            <option value="Turkmenistan"{{ $teacher->country == "Turkmenistan" ? 'selected' : '' }}>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" {{ $teacher->country == "Turks and Caicos Islands" ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" {{ $teacher->country == "Tuvalu" ? 'selected' : '' }}>Tuvalu</option>
                                            <option value="Uganda" {{ $teacher->country == "Uganda" ? 'selected' : '' }}>Uganda</option>
                                            <option value="Ukraine" {{ $teacher->country == "Ukraine" ? 'selected' : '' }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ $teacher->country == "United Arab Emirates" ? 'selected' : '' }}>United Arab Emirates</option>
                                            <option value="United Kingdom, Channel Islands and Isle of Man" {{ $teacher->country == "United Kingdom, Channel Islands and Isle of Man" ? 'selected' : '' }}>United Kingdom, Channel Islands and Isle of Man</option>
                                            <option value="United States of America" {{ $teacher->country == "United States of America" ? 'selected' : '' }}>United States of America</option>
                                            <option value="Uruguay" {{ $teacher->country == "Uruguay" ? 'selected' : '' }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ $teacher->country == "Uzbekistan" ? 'selected' : '' }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ $teacher->country == "Vanuatu" ? 'selected' : '' }}>Vanuatu</option>
                                            <option value="Venezuela, Bolivarian Republic of" {{ $teacher->country == "Venezuela, Bolivarian Republic of" ? 'selected' : '' }}>Venezuela, Bolivarian Republic of</option>
                                            <option value="Vietnam" {{ $teacher->country == "Vietnam" ? 'selected' : '' }}>Vietnam</option>
                                            <option value="Virgin Islands, British" {{ $teacher->country == "Virgin Islands, British" ? 'selected' : '' }}>Virgin Islands, British</option>
                                            <option value="Virgin Islands, United States"{{ $teacher->country == "Virgin Islands, United States" ? 'selected' : '' }}>Virgin Islands, United States</option>
                                            <option value="Wales" {{ $teacher->country == "Wales" ? 'selected' : '' }}>Wales</option>
                                            <option value="Wallis and Futuna" {{ $teacher->country == "Wallis and Futuna" ? 'selected' : '' }}>Wallis and Futuna</option>
                                            <option value="Western Europe" {{ $teacher->country == "Western Europe" ? 'selected' : '' }}>Western Europe</option>
                                            <option value="Western Sahara" {{ $teacher->country == "Western Sahara" ? 'selected' : '' }}>Western Sahara</option>
                                            <option value="Yemen" {{ $teacher->country == "Yemen" ? 'selected' : '' }}>Yemen</option>
                                            <option value="Zambia" {{ $teacher->country == "Zambia" ? 'selected' : '' }}>Zambia</option>
                                            <option value="Zimbabwe" {{ $teacher->country == "Zimbabwe" ? 'selected' : '' }}>Zimbabwe</option>
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
                                            placeholder="Your valid Phone Number 1." name="phone1" value="{{ $teacher->phone1 }}" required>
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
                                            placeholder="Your valid Phone Number 2." name="phone2" {{ $teacher->phone2 }} required>
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
                                            placeholder="Your valid Email Summary Day(s) Prior." 
                                            name="days" value="{{ $teacher->days }}" required>
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
                                            placeholder="Your valid Additional Identifier."  name="additionalId" value="{{ $teacher->additionalId }}" required>
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
<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
    })()


    $('[name=tab]').each(function (i, d) {
        var p = $(this).prop('checked');
//   console.log(p);
        if (p) {
            $('article').eq(i)
                    .addClass('on');
        }
    });

    $('[name=tab]').on('change', function () {
        var p = $(this).prop('checked');

        // $(type).index(this) == nth-of-type
        var i = $('[name=tab]').index(this);

        $('article').removeClass('on');
        $('article').eq(i).addClass('on');
    });
</script>

@stop