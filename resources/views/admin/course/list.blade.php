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
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
<div class="col-xl-12">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header flex-wrap d-flex justify-content-between">
            <div>
                <h4 class="card-title">Courses List</h4>
            </div>
            <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="{{ URL::route('add-course') }}" class="btn btn-primary light">Create Courses</a>
                </li>
            </ul>
        </div>
        <!-- /tab-content -->
        <div class="tab-content" id="myTabContent-3">
            <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="example4" class="display table" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Course Category</th>
                                    <th>Method Of Delivery</th>
                                    <th>Follow-up Enquiry</th>
                                    <th>Reportable?</th>
                                    <th>TGA Package?</th>
                                    <th>Active?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($rows))
                                @foreach ($rows as $k=> $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>
                                        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">{{$row->name}}</a>
                                        @include($view.'.view')
                                    </td>
                                    <td>{{$row->code}}</td>
                                    <td>
                                        @foreach($course_category as $cate)
                                        @if($cate->id ==$row->course_category_id)
                                         {{ $cate->name}}
                                        @endif

                                        @endforeach
                                    </td>
                                    <td>{{$row->delivery_method}}</td>
                                    <td>
                                        @foreach($user as $u)
                                        @if($u->id ==$row->follow_up_enquiry)
                                         {{ $u->first_name}} {{$u->last_name}}
                                        @endif

                                        @endforeach
                                    </td>
                                    <td>
                                        @if($row->reporting_this_course == '1')
                                         Y
                                        @else
                                        N
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->tga_package == '1')
                                         Y
                                        @else
                                        N
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->status == '1')
                                         Y
                                        @else
                                        N
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit-course',$row->id) }}" class="btn btn-primary light shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete-course',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            @if($row->status == '1')
                                              <a href="{{ route('change-course-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class="ms-2"><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                            @else
                                             <a href="{{ route('change-course-status',[$row->id,$row->status]) }}" onclick="return confirm('Are you sure you want to @if($row->status == 'A') DeActive @else Active @endif this course?')" class="ms-2"><i title="Activate Course" class="fa @if($row->status == 'A') fa-toggle-on @else fa-toggle-off @endif fa-2x text-success" aria-hidden="true"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /tab-content -->

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
</style>
<style>
    .modal-backdrop{
        display: none;
    }
</style>
@stop