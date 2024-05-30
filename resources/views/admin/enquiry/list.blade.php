<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 1502px;
            }
        }
    </style>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                        class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row marg_10">
            <div class="col-sm-12 col-lg-12">
                <h5>Enquiries</h5>
                    <div class="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary ms-2 w-100">Filter</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100">Bilk Email</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100">Bulk SMS</button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                            <button type="button" class="btn btn-secondary ms-2 w-100"><i class="fa-solid fa-copy"></i></button>
                          </div>
                    </div>
                  <div class="mt-4">
                    <table id="example4" class="display table mt-3" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Course Code</th>
                                <th>Location</th>
                                <th>Last Action</th>
                                <th>Assigned To</th>
                                <th>InfoPAK sent?</th>
                                <th>Chance</th>
                                <th>Email 2</th>
                                <th>Email 3</th>
                                <th>Actions</th>
                            </th>
                            </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
