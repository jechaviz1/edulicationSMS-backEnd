
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

<div class="col-xl-12">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header flex-wrap d-flex justify-content-between">
            <div>
                <h4 class="card-title">Teacher</h4>
            </div>
            <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="{{ URL::route('add-teacher') }}" class="btn btn-primary light">Add Teacher</a>
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
                                    <th>Sr. no.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Send Course Summary	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($teacher))
                                @foreach ($teacher as $k=> $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->last_name}}</td>
                                    <td>{{$row->email1}} <br>{{ $row->email2 }} <br> {{ $row->email2 }}</td>
                                    <td>{{$row->address1}}</td>
                                    <td>{{$row->phone1}}</td>
                                    <td>{{$row->additionalId}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit-teacher',$row->id) }}" class="btn btn-primary light shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete-teacher',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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

@stop