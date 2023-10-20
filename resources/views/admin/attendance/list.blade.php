<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Attendance</h4>
                <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('add-attendance') }}" class="btn btn-primary light">Mark Attendance</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <h5>Filter Attendance</h5>
                    
                    <form class="needs-validation" novalidate method="POST" action="{{ route('store-attendance' ) }}" >
                        @csrf
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="mb-3 row">
                                <label class="row-lg-3 row-form-label" for="validationCustom05"> Department <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" id="validationCustom05" name="department_id">
                                            @if(!empty($department))
                                            @foreach ($department as $row)
                                            <option value="{{$row->id}}">{{$row->department_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3 row">
                                <label class="row-lg-3 row-form-label" for="validationCustom05"> Designation <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-9">
                                        <select class="default-select wide form-control" id="validationCustom05" name="designation_id">
                                            @if(!empty($designation))
                                            @foreach ($designation as $row)
                                            <option value="{{$row->id}}">{{$row->designation_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3 row">
                                <label class="row-lg-3 row-form-label" for="attendancedate">Select Month:</label>
                                <div class="col-lg-9">
                                <!-- <input type="date" class="form-control" id="attendancedate" name="date_of_attendance"
                                    value="2023-10-20"
                                    min="2023-01-01" max="2023-12-31"> -->
                                    <input type="month" class="form-control" id="month-picker" name="selected_month" value="{{ date('Y-m') }}">

                                </div>
</div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3 row">
                                <label class="row-lg-3 col-form-label" for="validationCustom05"> Employee Category <span class="text-danger">*</span>
                                    </label>
                                    <div class="row-lg-9">
                                    <select class="default-select wide form-control" id="validationCustom05" name="employee_category_id">
                                            @if(!empty($employeecategory))
                                            @foreach ($employeecategory as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           
                            
                            
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <div class="col-lg-1 ms-auto">
                                        <button type="submit" class="btn btn-primary light">Filter</button>
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
<table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Attendance Status</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

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
    


