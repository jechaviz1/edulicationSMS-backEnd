
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Courses</h4>
                <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('course-list') }}" class="btn btn-primary light">Courses list</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <h5>Add Courses</h5>

                    <form class="needs-validation" novalidate  method="POST" action="{{ route('store-course') }}" >
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="course_code">Course Code <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="course_code"  placeholder="Course Code" name="course_code" required>
                                            <div id="bounceMessage" style="display:none;">Checking availability...</div>
                                            <div id="responseMessage"></div>
                                            <div class="invalid-feedback">
                                                Please enter a Course Code.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="name">Course Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name"  placeholder="Title" required name="name">
                                            <div class="invalid-feedback">
                                                Please enter a name.
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="course_category">Course Category <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" name="course_category" id="course_category">
                                                @foreach( $course_category as $cate )
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select Course Category.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="cost">Default Course Cost ($) <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="cost"  placeholder="Default Course Cost" name="cost" value="0">
                                            <div class="invalid-feedback">
                                                Please enter a Course cost.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="description">Description <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-txtarea form-control" rows="4" id="description" name="description"></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a Description.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="comment">Course Comments <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-txtarea form-control" rows="4" id="comment" name="comment"></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a comment.
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="follow_enquiry">Follow-up Enquiry <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" name="follow_enquiry" id="follow_enquiry" required>
                                                <option value="">Select</option>
                                                @foreach( $user as $row )
                                                <option value="{{ $row->id }}">{{ $row->first_name }} {{$row->last_name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select follow up enquiry.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Delivery method(s) <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6 row">
                                            <div class="col-md-12 form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="delivery_method_self" value="Self Paced" name="delivery_method_self">
												<label class="form-check-label" for="delivery_method_self">Self Paced</label>
                                            </div>
                                            <div class="col-md-6 form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="delivery_method_public" value="Public Sessions" name="delivery_method_public">
												<label class="form-check-label" for="delivery_method_public">Public Sessions</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="default-select wide form-control" name="public_session_options" id="public_session_options">
                                                    <option value="Single Session">Single Session</option>
                                                    <option value="Multiple Sessions">Multiple Sessions</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="delivery_method_private" value="Private Sessions" name="delivery_method_private">
												<label class="form-check-label" for="delivery_method_private">Private Sessions</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="default-select wide form-control" name="private_session_options" id="private_session_options">
                                                    <option value="Single Session">Single Session</option>
                                                    <option value="Multiple Sessions">Multiple Sessions</option>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select delivery method.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Required Number of Units to Complete <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6 d-flex">
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="no_of_units"  placeholder="" name="no_of_units">
                                            </div>
                                            <span style="margin: 11px 5px 0px 5px;"> Including</span>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control col-md-2" id="core_unit"  placeholder="" name="core_unit">
                                            </div>
                                            <span style="margin: 11px 0px 0px 5px;"> Core Units</span>
                                            <div class="invalid-feedback">
                                                Please enter a number of units.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="color">Default colour <span class="text-danger"></span>
                                        </label>
                                            <div class="col-lg-6">
												<input type="text" class="as_colorpicker form-control" value="#7ab2fa" name="color" id="color">
											</div>

                                            <div class="invalid-feedback">
                                                Please enter default color.
                                            </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="report_this_course">Report this course <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="col-md-6 form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="report_this_course" name="report_this_course">
                                            </div>

                                            <div class="invalid-feedback">
                                                Please check report this course.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="tga_package">TGA Package <span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="col-md-6 form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="tga_package" name="tga_package">
                                            </div>

                                            <div class="invalid-feedback">
                                                Please check tga package.
                                            </div>

                                        </div>
                                    </div>
                                    <textarea class="d-none" id="unit_data" name="unit_data"></textarea>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" id="btn_submit" class="btn btn-primary light">Submit</button>
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


<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #a0cf1a;
        color: white;
    }
    .asColorPicker-dropdown {
        max-width: 100%;
    }
    .asColorPicker-wrap {
        display: inline-flex;
    }
    .asColorPicker-trigger {
        width: 35px;
        height: 38px;
        border: 0 none !important;
        left: -5px;
    }
    #responseMessage {
        color: red;
    }
</style>

@section('customjs')

<script>
   $(document).ready(function() {
        // Function to check course code
        $('#course_code').on('input', function() {
            this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
        });

        function checkCourseCode() {
            let courseCode = $('#course_code').val();
            let unitData = [];
            $('#responseMessage').text('');
            $('#btn_submit').prop('disabled', true);

            // Only proceed if the input length is more than 5 characters
            if (courseCode.length > 5) {
                $('#bounceMessage').show();

                $.ajax({
                    url: `/admin/tga-course-details/${courseCode}`,  // Replace with your endpoint URL
                    method: 'GET',
                    success: function(res) {
                        if(res.status)
                        {
                            $('#name').val(res?.data?.Title);
                            $('#description').val(res?.data?.Description);
                            if (!$('#tga_package').is(':checked')) $('#tga_package').click();
                            if(res?.data?.Releases?.Release.length === undefined)
                            {
                                unitData.push(res?.data?.Releases?.Release);
                            } else
                            {
                                unitData = res?.data?.Releases?.Release;
                            }

                            let unitCountData = getCountUnits(unitData);
                            $('#no_of_units').val(unitCountData.totalUnits);
                            $('#core_unit').val(unitCountData.coreUnits);
                            $('#unit_data').val(JSON.stringify(unitCountData.curUnits));

                        } else
                        {
                            $('#tga_package').prop('checked', false);
                            $('#name').val('');
                            $('#description').val('');
                            $('#no_of_units').val('');
                            $('#core_unit').val('');
                            $('#responseMessage').text(res?.msg);
                        }
                        $('#btn_submit').prop('disabled', false);
                        $('#bounceMessage').hide();
                    },
                    error: function() {
                        $('#btn_submit').prop('disabled', false);
                        $('#bounceMessage').hide();
                        $('#responseMessage').text('Error checking course code.');
                    }
                });
            } else {
                $('#btn_submit').prop('disabled', false);
                $('#bounceMessage').hide();
            }
        }


        // Apply debounce with a delay of 500ms to the checkCourseCode function
        $('#course_code').on('input', debounce(checkCourseCode, 500));
    });


    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated');
                    }, false);
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



<!--select2 js-->

<script src="{{ asset('admin/vendor/select2/js/select2.full.min.js')}}"></script>


<script type="text/javascript">
(function($) {
    "use strict"

    // Colorpicker
    $(".as_colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
})(jQuery);

</script>


<!-- Daterangepicker -->
<!-- momment js is must -->
<!--<script src="./vendor/moment/moment.min.js"></script>-->
<script src="{{ asset('admin/vendor/moment/moment.min.js')}}"></script>
<!--<script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<script src="{{ asset('admin/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
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
<script src="{{ asset('admin/vendor/pickadate/picker.js')}}"></script>
<script src="./vendor/pickadate/picker.time.js"></script>
<!--<script src="./vendor/pickadate/picker.date.js"></script>-->
<script src="{{ asset('admin/vendor/pickadate/picker.date.js')}}"></script>


<!-- Daterangepicker -->
<!--<script src="./js/plugins-init/bs-daterange-picker-init.js"></script>-->
<script src="{{ asset('admin/js/plugins-init/bs-daterange-picker-init.js')}}"></script>

<!-- Clockpicker init -->
<script src="./js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<!--<script src="./js/plugins-init/material-date-picker-init.js"></script>-->
<script src="{{ asset('admin/js/plugins-init/material-date-picker-init.js')}}"></script>

<!-- Pickdate -->
<script src="./js/plugins-init/pickadate-init.js"></script>

<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

        <!--<script src="./js/custom.js"></script>-->
<script src="{{ asset('admin/js/custom.js')}}"></script>
<!--<script src="./js/deznav-init.js"></script>-->
<script src="{{ asset('admin/js/deznav-init.js')}}"></script>
@endsection
@stop