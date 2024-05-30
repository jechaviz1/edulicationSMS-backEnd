<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
<div class="col-xl-12 events">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center justify-content-start">
                    <div>
                        <h4 class="card-title">Events - Archive</h4>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-center justify-content-end">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="url" value="https://www.example.com/page1" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Courses    
                                    </label>
                                  </div>
                                  <div class="form-check ms-3">
                                    <input class="form-check-input" type="radio" name="url" value="https://www.example.com/page2" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Sessions
                                    </label>
                                  </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /tab-content -->
        <div class="tab-content " id="myTabContent-3">
            <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                <div class="card-body pt-0">
                    <div class="table-responsive"> 
                      
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /tab-content -->
    </div>
</div>
{{-- //modal Start --}}
{{-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" method="POST" id="course" novalidate>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Course Code <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Course Code" required name="course_code">
                                <div class="invalid-feedback">
                                    Please enter a Course Code.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Course Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Title" required name="name">
                                <div class="invalid-feedback">
                                    Please enter a name.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Course Category <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <select class="default-select wide form-control" name="course_category" id="course_category">
                                   
                                    @foreach($courseCategory  as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select Course Category.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Default Course Cost ($) <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Default Course Cost" name="cost">
                                <div class="invalid-feedback">
                                    Please enter a Course cost.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Description <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-txtarea form-control" rows="4" id="description" name="description"></textarea>
                                <div class="invalid-feedback">
                                    Please enter a Description.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Course Comments <span class="text-danger"></span>
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
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Follow-up Enquiry <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <select class="default-select wide form-control" name="follow_enquiry" id="follow_enquiry">
                                    <option value="">Select</option>
                                    @foreach( $users as $row )
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
                                    <input type="checkbox" class="form-check-input" id="customCheckBox1" value="Self Paced" name="delivery_method_self">
                                    <label class="form-check-label" for="customCheckBox1">Self Paced</label>
                                </div>
                                <div class="col-md-6 form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="customCheckBox1" value="Public Sessions" name="delivery_method_public">
                                    <label class="form-check-label" for="customCheckBox1">Public Sessions</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="default-select wide form-control" name="public_session_options" id="follow_enquiry">
                                        <option value="Single Session">Single Session</option>
                                        <option value="Multiple Sessions">Multiple Sessions</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="customCheckBox1" value="Private Sessions" name="delivery_method_private">
                                    <label class="form-check-label" for="customCheckBox1">Private Sessions</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="default-select wide form-control" name="private_session_options" id="follow_enquiry">
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
                                  <input type="text" class="form-control" id="validationCustom02"  placeholder="" name="no_of_units">
                                </div>
                                <span style="margin: 11px 5px 0px 5px;"> Including</span>
                                <div class="col-md-2">
                                    <input type="text" class="form-control col-md-2" id="validationCustom02"  placeholder="" name="core_unit">
                                </div>
                                <span style="margin: 11px 0px 0px 5px;"> Core Units</span>
                                <div class="invalid-feedback">
                                    Please enter a number of units.
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Default colour <span class="text-danger"></span>
                            </label>
                                <div class="col-lg-6">
                                        <input type="text" class="as_colorpicker form-control" value="#7ab2fa" name="color">
                                </div>
                                
                                <div class="invalid-feedback">
                                    Please enter default color.
                                </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">Report this course <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <div class="col-md-6 form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="customCheckBox1" name="report_this_course">
                                </div>
                                
                                <div class="invalid-feedback">
                                    Please check report this course.
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom02">TGA Package <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <div class="col-md-6 form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="customCheckBox1" name="tga_package">
                                </div>
                                
                                <div class="invalid-feedback">
                                    Please check tga package.
                                </div>

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-lg-8 ms-auto">
                                <button class="btn btn-primary light">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div> --}}
{{-- //modal End --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                });
    })();


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

<style>
    span.custom_inactive {
        background: #f44236;
        color: #fff;
        padding: 3px 10px;
        border-radius: 6px;
    }
    
    span.custom_active {
        background: #1de9b6;
        color: #fff;
        padding: 3px 10px;
        border-radius: 6px;
    }
    .events .card-header {
    border-color: #000000;
    position: relative;
    background: transparent;
    padding: 11px 20px;
    display: block;
    justify-content: space-between;
    align-items: center;
}
.modal-backdrop{
    display: none;
}
.leading-5 svg{
width:20px !important;
}

</style>


    <script>
     const radios = document.querySelectorAll('input[type=radio][name="url"]');

function handleChange() {
    if (this.checked) {
        window.location.href = this.value;
    }
}

radios.forEach(radio => {
    radio.addEventListener('change', handleChange);
});
</script>
<script>
    $(document).ready(function() {
        console.log("hello");
    $('#course').submit(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();
     // Get the CSRF token value
     var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Add the CSRF token to the FormData object
            var formData = new FormData(this);
            formData.append('_token', csrfToken); // Add CSRF token here
        // Send the AJAX request
        $.ajax({
            url: "{{ route('event.courses.store')}}",
            type: 'POST',
            data: formData,
            processData: false,  // Prevent jQuery from automatically converting the data to a query string
            contentType: false,  // Set content type to false as FormData will handle it
            success: function(response) {
                // Handle the successful response here
               if(response.sucess == "true"){
                $('#exampleModalToggle').modal('hide');
                location.reload();
                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(error);
            }
        });
    });
});
</script>
@stop