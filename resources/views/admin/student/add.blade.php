
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registration (2023-2024) Form Validation  <span>Total 4 result found - showing records from 1 to 4</span></h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <h5>Add New Registration</h5>
                    <input type="radio" id="tab1" name="tab" checked>
                    <label for="tab1"> New Student</label>
                    <input type="radio" id="tab2" name="tab">
                    <label for="tab2"> Existing Student</label>
                    <article>
                        <form class="needs-validation" novalidate  method="POST" action="{{ route('store-student') }}" >
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Date of Registration <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" placeholder="2017-06-04" id="mdate">

                                            <div class="invalid-feedback">
                                                Please enter a Date of Registration.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="validationCustom02"  placeholder="Your valid First Name.." required name="first_name">
                                            <div class="invalid-feedback">
                                                Please enter a First Name.
                                            </div><br>
                                            <input type="text" class="form-control" id="validationCustom02"  placeholder="Your valid Middle Name.." required name="middle_name">
                                            <div class="invalid-feedback">
                                                Please enter a Middle Name.
                                            </div>
                                            <br>
                                            <input type="text" class="form-control" id="validationCustom02"  placeholder="Your valid Last Name.." required name="last_name">
                                            <div class="invalid-feedback">
                                                Please enter a Last Name.
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Gender</label>
                                            <div class="col-sm-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="1" checked>
                                                    <label class="form-check-label">
                                                        Male
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="2">
                                                    <label class="form-check-label">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="3">
                                                    <label class="form-check-label">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="date_of_birth">Date of Birth <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" placeholder="2017-06-04" id="date_of_birth" name="date_of_birth">
                                            <div class="invalid-feedback">
                                                Date of Birth.
                                            </div>
                                               @if($errors->has('date_of_birth'))
                                        <div class="error">{{ $errors->first('date_of_birth') }}</div>
                                        @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="contact_no"> Contact number <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="contact_no" placeholder="212-999-0000" required name="contact_no">
                                            <div class="invalid-feedback">
                                                Please enter a Contact number.
                                            </div>
                                              @if($errors->has('contact_no'))
                                        <div class="error">{{ $errors->first('contact_no') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="emergency_contact_no">Emergency Contact number <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="emergency_contact_no" placeholder="212-999-0000" required name="emergency_contact_no">
                                            <div class="invalid-feedback">
                                                Please enter a Emergency Contact number.
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                     <div class="mb-3 row">
                                                                                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Relation <span class="text-danger">*</span>
                                                                                                                </label>
                                                                                                                <div class="col-lg-6">
                                                                                                                    <select class="default-select wide form-control" id="validationCustom05">
                                                                                                                        <option  data-display="Select">Please select</option>
                                                                                                                        <option value="1">Father</option>
                                                                                                                        <option value="2">Mother</option>
                                                                                                                        <option value="3">Spouse</option>
                                                                                                                        <option value="4">Other</option>
                                                                                                                    </select>
                                                                                                                    <div class="invalid-feedback">
                                                                                                                        Please select a one.
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div> -->
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Address <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Address" required name="address">
                                            <div class="invalid-feedback">
                                                Address
                                            </div>
                                             @if($errors->has('address'))
                                        <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Nationality<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nationality" placeholder="" required name="nationality">
                                            <div class="invalid-feedback">
                                                Nationality
                                            </div>
                                             @if($errors->has('nationality'))
                                        <div class="error">{{ $errors->first('nationality') }}</div>
                                        @endif
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary light">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </article>

                    <article>
                    </article>

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