
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
                <h4 class="card-title">Staff Note List</h4>
            </div>
            <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="{{ URL::route('add-staff-note') }}" class="btn btn-primary light">Create Staff Note</a>
                </li>
                <!--                <li class="nav-item" role="presentation">
                                    <button type="button" class="btn btn-primary light btn-icon-md"><i class="fa fa-filter"></i></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="dropdown ms-auto">
                                        <a href="#" class="btn btn-primary light light light sharp " data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item"><i class="fa fa-print text-primary me-2"></i> Print</li>
                                            <li class="dropdown-item"><i class="fa fa-file-pdf text-primary me-2"></i> Generate PDF</li>
                                            <li class="dropdown-item"><i class="fa fa-file-excel text-primary me-2"></i> Export to Excel</li>
                                        </ul>
                                    </div>
                                </li>-->
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
                                    <th>#</th>
                                    <th>Staff ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($rows))
                                @foreach( $rows as $key => $row )

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="#">
                                            #{{ $row->noteable->id ?? '' }}
                                        </a>
                                    </td>
                                    <td>{{$row->title}}</td>
                                    <td>
                                        @if( $row->status == 1 )
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-icon btn-success light shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            
                                            
                                    <!-- start model-->
                                    
                                    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">View {{ $title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Details View Start -->
                                                    <h4><mark class="text-primary">Title:</mark> {{ $row->title }}</h4>
                                                    <hr/>
                                                    <p><mark class="text-primary">Staff:</mark> #{{ $row->noteable->staff_id ?? '' }} - {{ $row->noteable->first_name ?? '' }} {{ $row->noteable->last_name ?? '' }}</p><hr/>
                                                    
                                                    <p><mark class="text-primary">Note:</mark> {!! $row->description !!}</p>
                                
                                                    <hr/>
                                                    <p><mark class="text-primary">Status:</mark> 
                                                    @if( $row->status == 1 )
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                    </p>
                                                    <!-- Details View End -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!--end model-->
                                            
                                            @if($row->attach)
                                             <a href="{{ asset('/staff_note/'.$row->attach) }}" class="btn btn-primary light shadow btn-xs sharp me-1" download><i class="fas fa-download"></i></a>
                                            @endif
                                            <a href="{{ route('edit-staff-note',$row->id) }}" class="btn btn-primary light shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete-staff-note',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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







@stop