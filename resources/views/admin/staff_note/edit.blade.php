 
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Staff Note</h4>
                <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('staff-note-list') }}" class="btn btn-primary light">Staff Note list</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <h5>Edit Staff Note</h5>

                    <form class="needs-validation" novalidate  method="POST" action="{{ route('update-staff-note',$staff_note->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Title <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="validationCustom02"  placeholder="Title" required name="title" value="{{$staff_note->title}}">
                                            <div class="invalid-feedback">
                                                Please enter a Title.
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="emergency_contact_no">Note <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="note" id="note" required>{{$staff_note->description}}</textarea>
                                            <div class="invalid-feedback">
                                                Please enter note.
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
                                <div class="col-xl-6">

                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="emergency_contact_no">Attach<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="attach" id="attach" value="">
                                        <div class="invalid-feedback">
                                            Please select attach.
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="emergency_contact_no">Status<span class="text-danger"></span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" @if( $staff_note->status == 1 ) selected @endif>Active</option>
                                                <option value="0" @if( $staff_note->status == 0 ) selected @endif>Inactive</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select status.
                                            </div>
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
</style>

@section('customjs')
 
 


<script>
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
        
        $(document).ready(function() {
            // [ Single Select ] start
            $(".select2").select2();

            // [ Multi Select ] start
            $(".select2-multiple").select2({
                placeholder: "select multiple"
            });
        });

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